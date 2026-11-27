/* Copyright (C) 2026 Dolibarr contributors
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 */

/**
 * \file       htdocs/custom/neutron/js/forms/blank-choice.js
 * \brief      Marks the blank choice of an opened list, so the style sheet can give it a text.
 */
(function () {
	'use strict';

	var N = window.Neutron;
	if (!N || !N.active) {
		return;
	}

	// CSS cannot tell a blank option (value -1, 0 or empty) from one with a label or a picture
	function mark(list) {
		list.querySelectorAll('.select2-results__option[id]').forEach(function (option) {
			option.classList.toggle('n-blank-choice', !option.textContent.trim() && !option.children.length);
		});
	}

	N.ready(function () {
		var $ = window.jQuery;
		if (!$ || !window.MutationObserver) {
			return;
		}
		var observer = null;
		$(document).on('select2:open', function (event) {
			var select2 = $(event.target).data('select2');
			var list = select2 && select2.$results[0];
			if (!list) {
				return;
			}
			if (observer) {
				observer.disconnect();
			}
			mark(list);
			// The options are redrawn while searching, or arrive later
			observer = new MutationObserver(function () {
				mark(list);
			});
			observer.observe(list, { childList: true, subtree: true });
		});
	});
})();

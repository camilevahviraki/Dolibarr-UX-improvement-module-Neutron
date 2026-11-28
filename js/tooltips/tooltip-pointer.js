/* Copyright (C) 2026 Dolibarr contributors
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 */

/**
 * \file       htdocs/custom/neutron/js/tooltips/tooltip-pointer.js
 * \brief      Places each tooltip under or over its element, with a pointer to it.
 */
(function () {
	'use strict';

	var N = window.Neutron;
	if (!N || !N.active) {
		return;
	}

	var GAP = 10;
	var MARGIN = 8;
	var CORNER = 16;

	function clamp(value, min, max) {
		return Math.max(min, Math.min(value, max));
	}

	function place($, tip, target) {
		var width = tip.offsetWidth;
		var height = tip.offsetHeight;
		if (!width || !target.isConnected) {
			return;
		}
		var box = target.getBoundingClientRect();
		var view = document.documentElement;
		var below = box.bottom + GAP + height <= view.clientHeight;
		// Too tall for both sides: the position of jQuery UI is kept, without pointer
		if (!below && box.top - GAP - height < 0) {
			tip.removeAttribute('data-n-pointer');
			return;
		}
		var center = box.left + box.width / 2;
		var left = clamp(center - width / 2, MARGIN, view.clientWidth - width - MARGIN);
		tip.setAttribute('data-n-pointer', below ? 'top' : 'bottom');
		tip.style.setProperty('--n-pointer-x', clamp(center - left, CORNER, width - CORNER) + 'px');
		$(tip).offset({
			left: left + window.pageXOffset,
			top: (below ? box.bottom + GAP : box.top - GAP - height) + window.pageYOffset
		});
	}

	N.ready(function () {
		var $ = window.jQuery;
		if (!$) {
			return;
		}
		$(document).on('tooltipopen', function (event, ui) {
			var tip = ui.tooltip[0];
			var target = document.querySelector('[aria-describedby~="' + tip.id + '"]') || event.target;
			place($, tip, target);
			// The tooltip is shown after a delay, and ajax tooltips change size
			if (window.ResizeObserver) {
				new ResizeObserver(function () {
					place($, tip, target);
				}).observe(tip);
			}
		});
	});
})();

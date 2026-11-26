# Contributing to Neutron

Thank you for helping. This page says how to propose a change. Read first the [structure](docs/structure.md) of
the module and the [rules for overrides and styles](docs/styles.md).

## Set up

1. Install Dolibarr 23 or later on your computer.
2. Clone this repository into `htdocs/custom/neutron` (see [Install](README.md#install)).
3. Enable the module and select the theme `neutron`.

## Report a problem

Open an issue with the page concerned, the width of the screen, the browser, the Dolibarr version, what you
expected and what you see. A screenshot helps: hide personal and company data first.

## Branches

- One branch per feature, named `feature/<name>`, started from `master`.
- If your work needs a branch that is not merged yet, start from it and say so in the pull request.

## Commits

- One file per commit.
- A short message in English that says what the commit does:
  `Style the tabs with a thick line under the current one`.
- End the branch with its line in [ChangeLog.md](ChangeLog.md), in its own commit.

## Code

- Follow the [Dolibarr development rules](https://wiki.dolibarr.org/index.php/Language_and_development_rules).
- Each file starts with a header: its path and what it contains.
- Keep one concern per file, with a name that says what it does.

### Styles

- Follow the [rules for overrides](docs/styles.md#rules-for-overrides) and the
  [rules for the styles](docs/styles.md#rules-for-the-styles).
- Prefer sizes that follow the screen (percentages, `vw`) to fixed widths.
- The menus of tablets and phones start at 1024px and below. This limit is written in `topbar.css.php`,
  `sidebar.css.php`, `topbar-small-screens.css.php`, `sidebar-small-screens.css.php`, `modules-sheet.css.php` and
  `js/menu/shared-menu-helpers.js`: change them together. The forms have their own limits, in `forms.css.php`.

### Scripts

- Plain JavaScript, without library or build step, one feature per file.
- Start with the check of `Neutron.active`: a script must do nothing with another theme.
- A page must stay usable if the script does not run.
- Remember a choice with `Neutron.local` or `Neutron.session`, which keep working when the browser blocks storage.
- A new script is declared in `core/modules/modNeutron.class.php`, in loading order. Disable and enable the module.

### Texts

- Add each text to `langs/en_US/neutron.lang` and `langs/fr_FR/neutron.lang`.
- In PHP, use `$langs->trans()`.
- In a script, add the key in `js/menu/translations.js.php` and read it with `Neutron.t(name, englishText)`.

## Check your change

Check the syntax of each file you changed:

```bash
php -l path/to/file.php
node --check path/to/file.js
```

Then check in the browser, with the theme `neutron` selected:

| Width | Check |
| --- | --- |
| Computer, 1280px and more | Left menu open and reduced to icons, hover preview |
| Tablet, about 820px | Menu drawer, **Modules** sheet, no sideways scrolling |
| Phone, about 390px | Same as the tablet, and forms with the label above the field |

- Narrow your browser window or use its device toolbar. Dolibarr hides its menus in a page shown inside a frame.
- Test on a real phone or tablet when you can: Dolibarr also adapts the page to the device.
- Check the pages near your change: a list, a record card, a create form and an edit form.

## Pull requests

- One feature per pull request, into `master`.
- Say what changes. Add screenshots for a visual change.
- Update the page of `docs/` that your change concerns (and the README if the install changes).
- If the look of a page of the README changes, replace its image in `docs/screenshots/`. Use example data only.
- Pull requests are merged with a merge commit.

## License

Neutron is open source, under the GNU General Public License v3 or later (see [COPYING](COPYING)). By
contributing, you agree that your work is released under this license, and you confirm that you have the right to
submit it. Keep the license and the author of any code or file taken from elsewhere.

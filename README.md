# Neutron

A modern interface for Dolibarr, as a module: it ships the theme `neutron`, built on the theme `md`, and a few
scripts for the menus. No core file is changed.

Neutron is free and open source software, under the [GNU GPL v3 or later](#license). Contributions are welcome.

## What it changes

| Part | Changes |
| --- | --- |
| Top bar | Slate bar, highlight of the current module, user menu |
| Left menu | Full height column that reduces to icons, hover preview, foldable sections, current page |
| Tabs and lists | Thick line under the current tab, lists in rounded panels |
| Forms | One field style and width, select lists, checkboxes, radios, date picker |
| Record cards | Two panels side by side, photo, readable labels |
| Tablets and phones | Left menu as a drawer, modules in a sheet that opens from the bottom |
| Font and texts | Poppins, bundled; texts of the module in English and French |

## Requirements

- Dolibarr 23 or later.
- PHP 7.2 or later.
- A recent browser: the styles use `:has()` and `color-mix()` (Chrome and Edge 111+, Firefox 121+, Safari 16.2+).
- JavaScript, for the behaviours of the menus.

## Install

1. Get the module into `htdocs/custom/neutron`. From the Dolibarr folder:

   ```bash
   git clone https://github.com/camilevahviraki/Dolibarr-UX-improvement-module-Neutron.git htdocs/custom/neutron
   ```

   The folder must be named `neutron`, and Dolibarr must load the `custom` folder
   (`$dolibarr_main_document_root_alt` in `htdocs/conf/conf.php`).
2. Enable the module **Neutron** in *Setup > Modules*.
3. Select the theme `neutron` in *Setup > Display > Theme*, then save.

## Update

1. Update the folder (`git pull`).
2. If the update adds or renames a script, disable and enable the module: Dolibarr records the list of scripts when
   the module is enabled. Disabling selects the theme `eldy` again, so select `neutron` once more.
3. If the old look remains, reload the page without the browser cache.

To remove the module, disable it in *Setup > Modules*, then delete the folder.

## Screens

| Width | Top bar | Left menu |
| --- | --- | --- |
| 1025px and more | Modules, with help, search and user at the right | Column, open or reduced to icons (the choice is kept) |
| 1024px and less | Menu button, current module, **Modules** button, search and user | Drawer over the page, closed on each page |

Forms have one label and its field per line from 1200px down, and the label above the field from 600px down.

## Colors

The defaults are in `lib/neutron.lib.php`. To replace one, add the constant `NEUTRON_COLOR_<NAME>` with a
hexadecimal value in *Setup > Other setup*, for example `NEUTRON_COLOR_ACCENT` = `#0f766e`.

*Setup > Display > Theme* shows the Neutron colors as defaults. Its color fields belong to the themes of Dolibarr:
use the constants to change Neutron.

## Translations

The texts are in `langs/<language>/neutron.lang`. English and French are provided; other languages show English.

## Known limits

- Lists scroll sideways on tablets and phones.
- Page titles, buttons, badges, the dashboard, popups and dark mode are not restyled yet.
- On a computer screen with many modules, the top bar can take two lines.
- Tablet and phone layouts were checked in narrow browser frames, not yet on real devices.
- The module number (513900) is not reserved yet.
- The browser does not keep the stylesheet in cache while the theme is being built.

## Contributing

[CONTRIBUTING.md](CONTRIBUTING.md) explains the branches, commits, pull requests and checks. The structure and the
rules of the code are below.

## License

Neutron is free software: you can redistribute it and modify it under the terms of the GNU General Public License
as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later
version. It is distributed without any warranty. The full text is in [COPYING](COPYING). This is the license of
Dolibarr itself.

The font Poppins, in `fonts/`, keeps its own license, the SIL Open Font License:
[fonts/LICENSE-Poppins.txt](fonts/LICENSE-Poppins.txt).

## Full structure

```
htdocs/custom/neutron/
├── core/modules/
│   └── modNeutron.class.php          module descriptor: declares the theme and the scripts
├── theme/neutron/
│   ├── style.css.php                 entry point required by Dolibarr: md, then the overrides
│   ├── thumb.png                     preview in Setup > Display > Theme
│   └── md-overrides/                 everything that overrides htdocs/theme/md
│       ├── index.php                 loads the folders below, in the order of md
│       ├── style.css.php/            overrides md/style.css.php
│       │   ├── index.php
│       │   ├── tokens.css.php        variables of Neutron and of md
│       │   ├── fonts.css.php         font files and font rule
│       │   ├── topbar.css.php        top bar, login block, menu toggle
│       │   ├── sidebar.css.php       left menu, icon bar, hover preview, search box
│       │   ├── topbar-small-screens.css.php   top bar of tablets and phones
│       │   ├── modules-sheet.css.php          their top bar entries, in a sheet from the bottom
│       │   ├── sidebar-small-screens.css.php  left menu drawer of tablets and phones
│       │   ├── titles.css.php        page and section titles
│       │   ├── tabs.css.php          tabs
│       │   ├── tables.css.php        lists, headers, checkboxes, pagination, scrollbars
│       │   ├── forms.css.php         fields, selects, radios, dates
│       │   ├── record.css.php        record cards
│       │   ├── cards.css.php         boxes and setup cards
│       │   ├── popups.css.php        tooltips, notifications, messages, dialogs
│       │   └── dark.css.php          dark mode for this md file
│       ├── badges.inc.php/           overrides md/badges.inc.php
│       │   ├── index.php
│       │   ├── badges.css.php
│       │   └── dark.css.php
│       ├── btn.inc.php/              overrides md/btn.inc.php
│       │   ├── index.php
│       │   ├── buttons.css.php
│       │   └── dark.css.php
│       ├── dropdown.inc.php/         overrides md/dropdown.inc.php
│       │   ├── index.php
│       │   ├── user-menu.css.php
│       │   ├── lists.css.php
│       │   └── dark.css.php
│       └── info-box.inc.php/         overrides md/info-box.inc.php
│           ├── index.php
│           ├── dashboard.css.php
│           └── dark.css.php
├── css/
│   ├── settings.css.php              default colors on the theme setup page
│   └── theme-images.css.php          images Dolibarr looks for outside of the module
├── js/menu/
│   ├── shared-menu-helpers.js        functions shared by the menu scripts
│   ├── translations.js.php           texts of the scripts, from langs/
│   ├── highlight-current-page.js     highlight of the current page
│   ├── collapsible-sections.js       section arrows and sub entries
│   ├── sidebar-open-close.js         open, icon bar, hover preview, saved state, drawer
│   └── modules-sheet.js              tablets and phones: modules in a sheet from the bottom
├── fonts/                            Poppins and its license
├── img/                              images of the module
├── admin/
│   ├── setup.php                     setup page (no option yet)
│   └── about.php
├── lib/
│   └── neutron.lib.php               default colors, shared PHP functions
├── langs/
│   ├── en_US/neutron.lang
│   └── fr_FR/neutron.lang
├── README.md                         this file: use, structure and rules
├── CONTRIBUTING.md                   how to propose a change
├── ChangeLog.md
└── COPYING                           GNU GPL v3
```

## Rules for overrides

1. **Mirror `md`.** `md-overrides/` has the same structure as `htdocs/theme/md`.
2. **A file becomes a folder.** An `md` file that is overridden becomes a folder with exactly the same name
   (`btn.inc.php` → `md-overrides/btn.inc.php/`). A sub folder of `md` (`img/`, `tpl/`...) keeps its name and place.
3. **One file per concern** inside that folder, named `<concern>.css.php`.
4. **One `index.php` per folder.** It loads the files of its folder, one `include` line each, in a fixed order.
   `md-overrides/index.php` loads the folders, in the order of `md`.
5. **Only what is overridden.** No folder for an `md` file that Neutron does not change.
6. **A rule goes where `md` has the rule it changes.** Not sure where? Search the selector in `htdocs/theme/md`.
7. **Never edit `htdocs/theme/md`**, nor any other Dolibarr core file.

## Files of eldy

`md` also loads files of the `eldy` theme (`emaillayout.inc.php`, `timeline.inc.php`, `input-feedback.css`).
If one has to be overridden, create `theme/neutron/eldy-overrides/` next to `md-overrides/`, with the same
structure and the same rules, and load its `index.php` from `theme/neutron/style.css.php`. It does not exist
as long as nothing of `eldy` is overridden.

## What does not go in the overrides

| Kind | Place |
| --- | --- |
| Styles for something new, which `md` does not have | `css/` |
| Scripts | `js/<feature>/`, one folder per feature, declared in `modNeutron.class.php` |
| Fonts and their licenses | `fonts/` |
| Default colors | `lib/neutron.lib.php` |
| Texts | `langs/<language>/neutron.lang`, never written in the code |

## Rules for the styles

- Change variables first. Neutron's variables are named `--n-*` and come from `lib/neutron.lib.php`.
- No color written by hand in a rule: use a variable.
- Use `!important` only where `md` leaves no other way, with a comment saying why.
- Dark rules go in the `dark.css.php` of the same folder.
- Each file starts with a header: its path, what it contains and which `md` file it overrides.
- Texts shown to the user go in `langs/` (`en_US` and `fr_FR`), never in a script or a style.
- File names say what the file does (`highlight-current-page.js`, not `current.js`).

## Adding something

| To add | Do |
| --- | --- |
| A concern in an existing folder | Create `<concern>.css.php`, add its line in the folder's `index.php` before `dark` |
| The override of another `md` file | Create the folder, its `index.php` and its files, add a line in `md-overrides/index.php` |
| A script | Create it in `js/<feature>/`, declare it in `modNeutron.class.php`, disable and enable the module |

After any change of the structure, update this README.

When a file becomes a folder on a running server, PHP may remember the old file for up to two minutes
(`realpath_cache_ttl`): wait, or restart the web server.

# Neutron

Theme and interface improvements for Dolibarr, as a module.

## Install

1. Put this folder in `htdocs/custom/neutron`.
2. Enable the module in *Setup > Modules*.
3. Select the theme `neutron` in *Setup > Display > Theme*.

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
│   ├── highlight-current-page.js     highlight of the current page
│   ├── collapsible-sections.js       section arrows and sub entries
│   ├── sidebar-open-close.js         open, icon bar, hover preview, saved state, drawer
│   └── modules-sheet.js              tablets and phones: modules in a sheet from the bottom
├── fonts/                            Poppins and its license
├── img/                              images of the module
├── admin/
│   ├── setup.php                     options
│   └── about.php
├── lib/
│   └── neutron.lib.php               default colors, shared PHP functions
├── langs/
│   ├── en_US/neutron.lang
│   └── fr_FR/neutron.lang
├── README.md                         this file: install, structure and rules
├── ChangeLog.md
└── COPYING
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

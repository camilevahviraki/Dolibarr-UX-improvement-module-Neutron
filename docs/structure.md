# Structure

Where everything is. The rules for the files that override `md` are in [styles.md](styles.md).

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
├── docs/
│   ├── usage.md                      screens, colors, translations, known limits
│   ├── structure.md                  this tree and where to put new files
│   ├── styles.md                     rules for overrides and styles
│   └── screenshots/                  images of the README
├── README.md                         presentation and install
├── CONTRIBUTING.md                   how to propose a change
├── ChangeLog.md
└── COPYING                           GNU GPL v3
```

## What does not go in the overrides

| Kind | Place |
| --- | --- |
| Styles for something new, which `md` does not have | `css/` |
| Scripts | `js/<feature>/`, one folder per feature, declared in `modNeutron.class.php` |
| Fonts and their licenses | `fonts/` |
| Default colors | `lib/neutron.lib.php` |
| Texts | `langs/<language>/neutron.lang`, never written in the code |

## Adding something

| To add | Do |
| --- | --- |
| A concern in an existing folder | Create `<concern>.css.php`, add its line in the folder's `index.php` before `dark` |
| The override of another `md` file | Create the folder, its `index.php` and its files, add a line in `md-overrides/index.php` |
| A script | Create it in `js/<feature>/`, declare it in `modNeutron.class.php`, disable and enable the module |

After any change of the structure, update the tree of this page.

When a file becomes a folder on a running server, PHP may remember the old file for up to two minutes
(`realpath_cache_ttl`): wait, or restart the web server.

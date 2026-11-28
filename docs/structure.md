# Structure

Where everything is. The rules for the files that override `md` are in [styles.md](styles.md).

## Full structure

Each `<name>.css` comes with a `<name>.css.php` of the same name, which loads it. The tree shows the `.css` only.

```
htdocs/custom/neutron/
├── core/modules/
│   └── modNeutron.class.php          module descriptor: declares the theme and the scripts
├── theme/neutron/
│   ├── style.css.php                 entry point required by Dolibarr: md, then the overrides
│   ├── thumb.png                     preview in Setup > Display > Theme
│   ├── theme_vars.inc.php            variables of the theme read by pages and widgets
│   └── md-overrides/                 everything that overrides htdocs/theme/md
│       ├── index.php                 loads the folders below, in the order of md
│       ├── style.css.php/            overrides md/style.css.php
│       │   ├── index.php
│       │   ├── tokens.css                     variables of Neutron and of md
│       │   ├── fonts.css                      font files and font rule
│       │   ├── topbar.css                     top bar, login block, menu toggle
│       │   ├── sidebar.css                    left menu, search box
│       │   ├── sidebar-desktop.css            full height, icon bar, hover preview
│       │   ├── topbar-small-screens.css       top bar of tablets and phones
│       │   ├── modules-sheet.css              their top bar entries, in a sheet from the bottom
│       │   ├── sidebar-small-screens.css      left menu drawer of tablets and phones
│       │   ├── titles.css                     page and section titles
│       │   ├── tabs.css                       tabs
│       │   ├── tabs-sheet.css                 tablets and phones: tabs in a sheet from the bottom
│       │   ├── tables.css                     lists, headers, checkboxes, pagination, scrollbars
│       │   ├── forms.css                      fields, selects, radios, dates
│       │   ├── record.css                     record cards
│       │   ├── cards.css                      boxes and setup cards
│       │   ├── popups.css                     tooltips, notifications, messages, dialogs
│       │   ├── login.css                      login and forgotten password pages
│       │   └── dark.css                       dark mode for this md file
│       ├── badges.inc.php/           overrides md/badges.inc.php
│       │   ├── index.php
│       │   ├── badges.css
│       │   └── dark.css
│       ├── btn.inc.php/              overrides md/btn.inc.php
│       │   ├── index.php
│       │   ├── buttons.css
│       │   └── dark.css
│       ├── dropdown.inc.php/         overrides md/dropdown.inc.php
│       │   ├── index.php
│       │   ├── user-menu.css
│       │   ├── lists.css
│       │   └── dark.css
│       └── info-box.inc.php/         overrides md/info-box.inc.php
│           ├── index.php
│           ├── dashboard.css
│           └── dark.css
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
├── js/tabs/
│   └── tabs-sheet.js                 tablets and phones: tabs in a sheet from the bottom
├── js/tooltips/
│   └── tooltip-pointer.js            tooltips placed under or over their element, with a pointer
├── js/forms/
│   └── blank-choice.js               marks the blank choice of lists, which gets a text
├── fonts/                            Poppins and its license
├── img/                              images of the module
├── admin/
│   ├── setup.php                     setup page (no option yet)
│   └── about.php
├── lib/
│   ├── dolibarr-root.php             finds the Dolibarr folder
│   ├── neutron.lib.php               default colors, shared PHP functions
│   └── theme-files.php               file created in htdocs/theme/neutron/
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
| A concern in an existing folder | Create `<concern>.css` and `<concern>.css.php`, add the line of the latter in the folder's `index.php` before `dark` |
| The override of another `md` file | Create the folder, its `index.php` and its files, add a line in `md-overrides/index.php` |
| A script | Create it in `js/<feature>/`, declare it in `modNeutron.class.php`, disable and enable the module |

After any change of the structure, update the tree of this page.

When a file becomes a folder on a running server, PHP may remember the old file for up to two minutes
(`realpath_cache_ttl`): wait, or restart the web server.

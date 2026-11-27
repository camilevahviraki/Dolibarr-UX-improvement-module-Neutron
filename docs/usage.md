# Using Neutron

Install first: see the [README](../README.md#install).

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

- Page titles, buttons, badges, the dashboard, popups and dark mode are not restyled yet.
- On a computer screen with many modules, the top bar can take two lines.
- The module number (513900) is not reserved yet.
- The browser does not keep the stylesheet in cache while the theme is being built.

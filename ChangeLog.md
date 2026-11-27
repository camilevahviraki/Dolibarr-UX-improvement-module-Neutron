# Changelog

## 0.1.0

- Folder structure, module descriptor and theme "neutron" based on md, with the Poppins font.
- Default colors of the theme (lib/neutron.lib.php), replaceable by the constants NEUTRON_COLOR_*.
- Default colors shown on Setup - Display - Theme instead of "Unknown".
- Overrides of md grouped in theme/neutron/md-overrides/, with the same file names as md.
- md-overrides/ now has one folder per md file, split into one file per area.
- index.php files load md-overrides/ and each of its folders.
- All override folders created; full structure and rules in README.md.
- Top bar and user menu styles.
- Left menu styles: full height column, icon bar, current page, hover preview (behaviours need the scripts).
- Left menu scripts, with explicit file names.
- Tab styles.
- Table and list styles.
- Form styles: fields, select lists, checkboxes, radios, widths and date ranges.
- Date, delete and drag images shown (taken from md).
- Date fields: a line calendar icon for the date picker.
- Select lists: same text size, corners and opened list as the modern theme.
- Dropdown menus and column selector styled as in the modern theme.
- Filters above lists: multiple choice lists as high as a field, text centred.
- Form labels: small and bold, as in the modern theme.
- Record cards: card panel, field tables, side by side panels and photo, as in the modern theme.
- Field widths are a share of the screen, the same for every field; tablet and phone layouts for forms.
- Tablets and phones: one row top bar, left menu as a drawer.
- Tablets and phones: the modules of the top bar open in a sheet from the bottom, by a button titled "Modules".
- The texts of the menu scripts are translated through the language files.
- Short README with the license, details in docs/, and a contribution guide.
- Screenshots of the computer, tablet and phone views.
- Lists: the page no longer scrolls sideways; the bar above a list wraps on tablets and phones.
- Styles are in .css files, each loaded by a .css.php of the same name.
- Page and section titles: no capitals, larger page titles.

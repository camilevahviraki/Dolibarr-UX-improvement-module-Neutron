# Changelog

## 0.1.0

- Folder structure, module descriptor and theme "neutron" based on md, with the Poppins font.
- Default colors of the theme (lib/neutron.lib.php), replaceable by the constants NEUTRON_COLOR_*.
- Default colors shown on Setup - Display - Theme instead of "Unknown".
- Overrides of md grouped in theme/neutron/md-overrides/, with the same file names as md.
- md-overrides/ now has one folder per md file, split into one file per area.
- index.php files load md-overrides/ and each of its folders.
- All override folders created; full structure and rules in README.md.

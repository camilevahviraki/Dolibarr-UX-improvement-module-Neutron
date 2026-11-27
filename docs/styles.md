# Styles and overrides

How Neutron changes the theme `md`. The places of the files are in [structure.md](structure.md).

## Rules for overrides

1. **Mirror `md`.** `md-overrides/` has the same structure as `htdocs/theme/md`.
2. **A file becomes a folder.** An `md` file that is overridden becomes a folder with exactly the same name
   (`btn.inc.php` → `md-overrides/btn.inc.php/`). A sub folder of `md` (`img/`, `tpl/`...) keeps its name and place.
3. **One file per concern** inside that folder, named `<concern>.css`, with a `<concern>.css.php`
   of the same name that loads it. Rules that need PHP go in the `.css.php`.
4. **One `index.php` per folder.** It loads the files of its folder, one `include` line each, in a fixed order.
   `md-overrides/index.php` loads the folders, in the order of `md`.
5. **Only what is overridden.** No folder for an `md` file that Neutron does not change.
6. **A rule goes where `md` has the rule it changes.** Not sure where? Search the selector in `htdocs/theme/md`.

## Files of eldy

`md` also loads files of the `eldy` theme (`emaillayout.inc.php`, `timeline.inc.php`, `input-feedback.css`).
If one has to be overridden, create `theme/neutron/eldy-overrides/` next to `md-overrides/`, with the same
structure and the same rules, and load its `index.php` from `theme/neutron/style.css.php`. It does not exist
as long as nothing of `eldy` is overridden.

## Rules for the styles

- Change variables first. Neutron's variables are named `--n-*` and come from `lib/neutron.lib.php`.
- No color written by hand in a rule: use a variable.
- Use `!important` only where `md` leaves no other way.
- Dark rules go in the `dark.css` of the same folder.
- Each file starts with a header: its path, what it contains and which `md` file it overrides.
- Texts shown to the user go in `langs/` (`en_US` and `fr_FR`), never in a script or a style.
- File names say what the file does (`highlight-current-page.js`, not `current.js`).

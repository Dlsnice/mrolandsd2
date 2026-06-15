
## Installation

### Requirements

`The Theme` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)
- [Tailwind Intellisense](https://marketplace.visualstudio.com/items?itemName=bradlc.vscode-tailwindcss)
- [Plugins/Database](https://themoment.dev/tm-updraft-files/updraft-restore.zip) (not required but helpful)

### Quick Start

Clone or download this repository, change its name to something else (i.e. `bag-of-snakes`), and then you'll need to do a two-step find and replace on the name in all the templates.

1. Search for `jdxstarter` to capture the text domain and replace with: `bag-of-snakes`.

```sh 
$ // Find/Replace text in all files
$ find ./ -name \*.php -exec sed -i "s/jdxstarter/new-theme-name/g" {} \;
$ find ./ -name \*.css -exec sed -i "s/jdxstarter/new-theme-name/g" {} \;
$ find ./ -name \*.css -exec sed -i "s/ Theme Name/ New Theme Name/g" {} \;
```

### Setup

To start using all the tools that come with `The Theme` you need to install Node.js dependencies, Tailwindcss, and Carbon Fields.

```sh
$ npm install
$ composer require htmlburger/carbon-fields
```

If you use VS code, copy/paste the below settings into your Workspace Settings (JSON) file. command + shift + p / Preferences: Workspace Settings (JSON) and replace all settings.

```sh
{
    "workbench.editor.untitled.hint": "hidden",
    "css.validate": false,
    "less.validate": false,
    "scss.validate": false,
    "eslint.validate": [
        "javascript"
    ],
    "eslint.codeActionsOnSave.mode": "all",
    "eslint.format.enable": true,
    "eslint.codeActionsOnSave.rules": null,
    "stylelint.snippet": [
        "css",
        "less",
        "postcss",
        "scss"
    ],
    "stylelint.validate": [
        "css",
        "less",
        "postcss",
        "scss"
    ],
    "editor.codeActionsOnSave": {
        "source.fixAll.eslint": true,
        "source.fixAll.stylelint": true
    },
    "editor.formatOnSave": true,
    "editor.fontLigatures": false,
    "editor.wordWrap": "off",
    "editor.formatOnPaste": true,
    "editor.quickSuggestions": {
        "strings": true
    }
}
```

### Available CLI commands

`The Theme` comes with CLI commands tailored for WordPress theme development:

- `build:css` : Build and Minifies all `CSS` files for production. 
- `build:js` : Build and Minifies all `JS` files for production.
- `build` : Run both `build:css` and `build:js` concurrently to ready all files for production
- `watch:css` : Start the npm watch engine to monitor all `CSS` changes during development.
- `watch:js` : Start the npm watch engine to monitor all `JS` changes and compile during development.
- `watch` : Run both `watch:css` and `watch:js` monitor all `CSS` and `JS` chqnges during development.
- `browser-sync` : Starts the `browser-sync` engine and generates a localhost url to use in multiple browsers.
- `watch-sync` : Runs both `browser-sync` and `watch` concurrently to remove the need to refresh your browser on CSS updates.

Alright, are you ready? Get going and build the next best Wordpress website!

The Theme Dev"# mrolandsd2" 

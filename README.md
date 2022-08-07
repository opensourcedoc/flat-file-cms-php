# Flat-File CMS in PHP

Implement a flat-file CMS with plain PHP.

## System Requirements

### Back End

* Production
  * A major GNU/Linux distribution is recommended
  * [PHP](https://www.php.net/) 8.1 or above
  * [CommonMark](https://commonmark.thephpleague.com/)
* Development
  * [Composer](https://getcomposer.org/)

### Front End

* Production
  * A [modern browser](https://browsehappy.com/) like Chrome or Firefox
* Development
  * [Node.js](https://nodejs.org/) 16.x or above
  * [Gulp](https://gulpjs.com/)
  * [Sass](https://sass-lang.com/)
  * [Autoprefixer](https://github.com/postcss/autoprefixer)
  * [stylelint](https://stylelint.io/)
  * [Babel](https://babeljs.io/)
  * [Flow](https://flow.org/en/)
  * [ESLint](https://eslint.org/)

### Install CLI Tools on Windows

```shell
> choco install php --version=8.1.8
> choco install composer
> choco install nodejs --version=16.16.0
> choco install rsync
> choco install sed
```

## Usage

Clone the repo:

```shell
$ git clone https://github.com/opensourcedoc/flat-file-cms-php.git
$ cd flat-file-cms-php
```

Run the website locally:

```shell
$ ./tools/bin/serve localhost:5000
```

## Copyright

Copyright (c) 2022 Michelle Chen. Licensed under MIT

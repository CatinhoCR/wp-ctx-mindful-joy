# CATIX MINDFUL JOY WP THEME

Custom WP theme based on _s to work with Gulp 4 for task automation. Work in progress and at a very young state.

## Dependencies

* Wordpress
* Node.js
* Yarn
* 

## Install and Usage

```bash
yarn install
```

```bash
yarn serve OR gulp build
```

## To Do

* Functions.php into `app/folder/files.php` modularize and create nice WP theme
  * Started doing this. Wrapper functions for content area and wrapper need work. Sidebar option and layout options in app/functions/template-functions.php
  * page.php for now is the only template including this previous wrapper and etc.
* Node Environments for building assets
* Move things from `inc` folder to corresponding place on my structure
* remove woocommerce.css and move/delete/adapt to my scss structure
* Gulp flow
  * Es6+ support
  * vendors sccs and js
  * images
  * fonts
  * language pot files
  * tasks
  * warning gulp-util@3.0.8: gulp-util is deprecated - replace it, following the guidelines at https://medium.com/gulpjs/gulp-util-ca3b1f9f9ac5

# Icons made by <a href="https://www.flaticon.com/authors/those-icons" title="Those Icons">Those Icons</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>

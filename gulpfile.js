// Gulp.js configuration
'use strict';

const

// source and build folders
    dir = {
        src: './assets/',
        build: './public/'
    },

    // Gulp and plugins
    gulp = require('gulp'),
    gutil = require('gulp-util'),
    newer = require('gulp-newer'),
    imagemin = require('gulp-imagemin'),
    sass = require('gulp-sass'),
    postcss = require('gulp-postcss'),
    deporder = require('gulp-deporder'),
    concat = require('gulp-concat'),
    stripdebug = require('gulp-strip-debug'),
    uglify = require('gulp-uglify');

// Browser-sync
var browsersync = false;


// PHP settings
const php = {
    src: '**/*.php',
    build: dir.build
};

// copy PHP files
gulp.task('php', function() {
    return gulp.src(php.src)
        .pipe(newer(php.build))
        .pipe(gulp.dest(php.build));
});

// image settings
const images = {
    src: dir.src + 'img/**/*',
    build: dir.build + 'images/'
};

// image processing
gulp.task('images', function() {
    return gulp.src(images.src)
        .pipe(newer(images.build))
        .pipe(imagemin())
        .pipe(gulp.dest(images.build));
});


// CSS settings
var css = {
    src: dir.src + 'scss/style.scss',
    watch: dir.src + 'scss/**/*',
    build: dir.build,
    sassOpts: {
        outputStyle: 'nested',
        imagePath: images.build,
        precision: 3,
        errLogToConsole: true
    },
    processors: [
        require('postcss-assets')({
            loadPaths: ['img/'],
            basePath: dir.build,
            baseUrl: '.'
        }),
        require('autoprefixer')({
            overrideBrowserslist: ['last 2 versions', '> 2%']
        }),
        require('css-mqpacker'),
        require('cssnano')
    ]
};

// CSS processing
gulp.task('css', gulp.series('images', function() {
    return gulp.src(css.src)
        .pipe(sass(css.sassOpts))
        .pipe(postcss(css.processors))
        .pipe(gulp.dest(css.build))
        .pipe(browsersync ? browsersync.reload({ stream: true }) : gutil.noop());
}));


// JavaScript settings
const js = {
    src: dir.src + 'js/**/*',
    build: dir.build + 'js/',
    filename: 'scripts.js'
};

// JavaScript processing
gulp.task('js', function() {

    return gulp.src(js.src)
        .pipe(deporder())
        .pipe(concat(js.filename))
        .pipe(stripdebug())
        .pipe(uglify())
        .pipe(gulp.dest(js.build))
        .pipe(browsersync ? browsersync.reload({ stream: true }) : gutil.noop());

});

// run all tasks
gulp.task('build', gulp.series(['php', 'css']));
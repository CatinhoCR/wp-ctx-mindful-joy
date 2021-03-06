const { src, dest, task, watch, series, parallel } = require("gulp");

// Utility plugins
// import webpack from 'webpack-stream';
const webpack = require("webpack-stream");
const named = require("vinyl-named");
const rename = require("gulp-rename");
const sourcemaps = require("gulp-sourcemaps");
const plumber = require("gulp-plumber");
const gulpif = require("gulp-if");
// const replace = require('gulp-replace');
const del = require("del");
const notify = require("gulp-notify");
const options = require("gulp-options");
const { argv } = require("yargs");

// CSS related plugins
const sass = require("gulp-sass");
const autoprefixer = require("gulp-autoprefixer");

// JS related plugins
const uglify = require("gulp-uglify");

// File paths
const mapURL = "./";
const fileSrc = {
  styleSrc: "./assets/scss/styles.scss",
  jsSrc: "./assets/js/*.js",
};
// Watch file paths
const watchFiles = {
  styleWatch: "./assets/scss/**/*.scss",
  jsWatch: "./assets/js/*.js",
  phpWatch: "./**/*.php",
};

// Public compiled destination paths
const publicDist = {
  styleURL: "./dist/",
  jsURL: "./dist/",
};

// Environments compilation options for webpack
// process.env.NODE_ENV = argv.production || 'development';
const dev_env = argv.prod || "dev";

// Browers related plugins & functions
const browserSync = require("browser-sync").create();
async function allBrowsers() {
  browserChoice = [
    `safari`,
    `firefox`,
    `google chrome`,
    `opera`,
    `microsoft-edge`,
  ];
}
/**
 * BrowserSync Functions for browser live-reloading, watching file changes and auto compile on save.
 */
function browser_sync(done) {
  browserSync.init({
    proxy: "https://www.catix-mindful-joy.dev",
    port: 3000,
    open: true,
    done,
  });
}

function reload(done) {
  browserSync.reload();
  done();
}

/**
 * Utility Functions - Cleaning, etc.
 */
function clean(cb) {
  // body omitted
  console.log(dev_env);
  cb();
}

/**
 * PHP
 */
function php(done) {
  done();
}

/**
 * Styles - Custom styles, vendor styles, different handling based on envs for dev or prod.
 */
function styles(done) {
  src([fileSrc.styleSrc])
    .pipe(sourcemaps.init())
    .pipe(
      sass({
        errLogToConsole: true,
        outputStyle: "expanded",
      })
    )
    .on("error", console.error.bind(console))
    .pipe(
      autoprefixer({
        overrideBrowserslist: ["last 2 versions", "> 5%", "Firefox ESR"],
      })
    )
    // .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write(mapURL))
    .pipe(dest(publicDist.styleURL))
    .pipe(browserSync.stream());
  done();
}

/**
 * Scripts - Custom scripts, vendor scripts, different handling based on envs for dev or prod.
 */
function scripts(done) {
  return src(["assets/js/bundle.js", "assets/js/vendors.js"])
    .pipe(named())
    .pipe(
      webpack({
        module: {
          rules: [
            {
              test: /\.js$/,
              use: {
                loader: "babel-loader",
                options: {
                  presets: ['@babel/preset-env'],
                },
              },
            },
          ],
        },
        mode: dev_env ? "production" : "development",
        devtool: !dev_env ? "inline-source-map" : false,
        output: {
          filename: "[name].js",
        },
      })
    )
    .pipe(dest("dist/"))
    .pipe(browserSync.stream());
  done();
}
/*
export const scripts = () => {
  return src('src/js/bundle.js')
  .pipe(webpack({
    module: {
      rules: [
        {
          test: /\.js$/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: []
            }
          }
        }
      ]
    },
    mode: PRODUCTION ? 'production' : 'development',
    devtool: !PRODUCTION ? 'inline-source-map' : false,
    output: {
      filename: 'bundle.js'
    },
  }))
  .pipe(dest('dist/js'));
}
function js(done) {
    jsFiles.map(function(entry) {
        return browserify({
                entries: [fileSrc.jsSrc + entry],
            })
            .transform(babelify, { presets: ["@babel/preset-env"] })
            .bundle()
            .pipe(source(entry))
            .pipe(
                rename({
                    extname: ".js",
                })
            )
            .pipe(buffer())
            .pipe(gulpif(options.has("production"), stripDebug()))
            .pipe(sourcemaps.init({ loadMaps: true }))
            .pipe(gulpif(options.has("production"), uglify()))
            .pipe(sourcemaps.write("."))
            .pipe(dest(publicDist.jsURL))
            .pipe(browserSync.stream());
    });
    done();
}
*/

function fonts(done) {
  return src(["assets/webfonts/*.*"])
    .pipe(dest("dist/webfonts"))
    .pipe(browserSync.stream());
  done();
}

/**
 * Watching
 */
function watch_files(done) {
  watch(watchFiles.styleWatch, series(styles, reload));
  watch(watchFiles.jsWatch, series(scripts, reload));
  watch(watchFiles.phpWatch, series(php, reload));
}

/**
 * Tasks from previous functions
 */
task("clean", clean);
task("styles", styles);
task("scripts", scripts);
task("fonts", fonts);
// task('js', js);
// task('images', images);
// task('fonts', fonts);
// task('html', html);
exports.dev = parallel(browser_sync, watch_files);
exports.default = series(clean, fonts, styles, scripts);
/*
function cssTranspile(cb) {
  // body omitted
  cb();
}

function cssMinify(cb) {
  // body omitted
  cb();
}

function jsTranspile(cb) {
  // body omitted
  cb();
}

function jsBundle(cb) {
  // body omitted
  cb();
}

function jsMinify(cb) {
  // body omitted
  cb();
}

function publish(cb) {
  // body omitted
  cb();
}

exports.build = series(
  clean,
  parallel(cssTranspile, series(jsTranspile, jsBundle)),
  parallel(cssMinify, jsMinify),
  publish
);
*/
/*
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
    
    postcss = require('gulp-postcss'),
    deporder = require('gulp-deporder'),
    concat = require('gulp-concat'),
    stripdebug = require('gulp-strip-debug'),
    uglify = require('gulp-uglify');

// Browser-sync
const browsersync = false;


// PHP settings
const php = {
    src: '** /*.php',
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
    src: dir.src + 'img/** /*',
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
const css = {
    src: dir.src + 'scss/style.scss',
    watch: dir.src + 'scss/** /*',
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
    src: dir.src + 'js/** /*',
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
*/

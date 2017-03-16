var gulp = require('gulp'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    browserSync = require('browser-sync').create();

var url = '127.0.0.1:8000';
var basePath = './src/AppBundle/Resources/public';

gulp.task('scripts', function () {
    return gulp.src([
        basePath + '/js/helpers/*.js',
        basePath + '/js/*.js',
    ])
        .pipe(gulp.dest(basePath + '/js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest(basePath + '/js'))
        .pipe(browserSync.stream());
});

// TODO: Maybe we can simplify how sass compile the minify and unminify version
var compileSASS = function (filename, options) {
    return sass(basePath + '/css/*.scss', options)
        .pipe(autoprefixer('last 2 versions', '> 5%'))
        .pipe(concat(filename))
        .pipe(gulp.dest(basePath + '/css'))
        .pipe(browserSync.stream());
};

gulp.task('sass', function () {
    return compileSASS('custom.css', {});
});

gulp.task('sass-minify', function () {
    return compileSASS('custom.min.css', {style: 'compressed'});
});

gulp.task('browser-sync', function () {
    browserSync.init({
        proxy: url
    });
});

gulp.task('watch', function () {
    // Watch .html files
    gulp.watch(basePath + '/../views/**/*.html.twig/*.html', browserSync.reload);
    // Watch .js files
    gulp.watch(basePath + '/js/*.js', ['scripts']);
    // Watch .scss files
    gulp.watch(basePath + '/css/*.scss', ['sass', 'sass-minify']);
});

// Default Task
gulp.task('default', ['browser-sync', 'watch']);

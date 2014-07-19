var gulp = require('gulp'),
	gutil = require('gulp-util'),
	sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	minifycss = require('gulp-minify-css'),
	jshint = require('gulp-jshint'),
	concat = require('gulp-concat'),
	uglifyjs = require('gulp-uglify'),
	imagemin = require('gulp-imagemin'),
	rename = require('gulp-rename'),
	rimraf = require('gulp-rimraf'),
	cache = require('gulp-cache');

var config = {  
    env: 'prod'
}

// npm install gulp gulp-util --save-dev
// npm install gulp-sass gulp-autoprefixer gulp-minify-css gulp-jshint gulp-concat gulp-uglify gulp-imagemin gulp-rename gulp-rimraf gulp-cache --save-dev

gulp.task('styles', function () {  
    if (config.env == 'dev') {
        return gulp.src('app/assets/sass/*.scss')
        	.pipe(sass({ style: 'expanded', }))
            .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
		    .pipe(gulp.dest('public/assets/css/'));
    } else {
        return gulp.src('app/assets/sass/*.scss')
            .pipe(sass({ style: 'expanded', }))
            .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
		    .pipe(minifycss())
		    .pipe(gulp.dest('public/assets/css/'));
    }
});

gulp.task('scripts', function () {  
    if (config.env == 'dev') {
        return gulp.src('app/assets/js/**/*')
            .pipe(gulp.dest('public/assets/js/'));
    } else {
        return gulp.src('app/assets/js/**/*')
            .pipe(uglifyjs())
            .pipe(gulp.dest('public/assets/js/'));
    }
});

gulp.task('images', function() {
  return gulp.src('app/assets/images/**/*')
    .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
    .pipe(gulp.dest('public/assets/images/'));
});

gulp.task('fonts', function(){  
    return gulp.src('app/assets/fonts/**/*')
        .pipe(gulp.dest('public/assets/fonts/'))
});

gulp.task('vendor', function () {  
    return gulp.src('app/assets/vendor/*.js')
            .pipe(uglifyjs())
            .pipe(gulp.dest('public/assets/vendor/'));
});

gulp.task('vendor_jquery', function () {  
    return gulp.src('app/assets/vendor/jquery/dist/jquery.min.js')
        .pipe(gulp.dest('public/assets/vendor/'));
});

gulp.task('clean', function() {
  return gulp.src(['public/assets/css', 'public/assets/js', 'public/assets/images', 'public/assets/fonts', 'public/assets/vendor'], { read: false })
    .pipe(rimraf());
});

gulp.task('dev', function () {  
    config.env = 'dev';
    gulp.watch('app/assets/sass/**/*.scss', ['styles']);
    gulp.watch('app/assets/js/**/*.js', ['scripts']);
    gulp.watch('app/assets/images/**/*', ['images']);
    gulp.watch('app/assets/fonts/**/*', ['fonts']);
    gulp.watch('app/assets/vendor/*.js', ['vendor']);
});

gulp.task('prod', ['clean'], function() {
    gulp.start('vendor_jquery','styles','scripts','images','fonts','vendor');
});

gulp.task('default',['dev']);



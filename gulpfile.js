var gulp = require('gulp');
var uglify = require('gulp-uglify');
concat    = require('gulp-concat');

// define plug-ins
var flatten = require('gulp-flatten');
var gulpFilter = require('gulp-filter');
var minifycss = require('gulp-minify-css');
var rename = require('gulp-rename');
var mainBowerFiles = require('main-bower-files');
var sass = require('gulp-sass');


// Define paths variables
var src_path = 'public/components';
var dest_path =  'public';


gulp.task('minify', function () {
   gulp.src('public/js/app.js')
      .pipe(uglify())
      .pipe(gulp.dest(dest_path + '/build/js/vendor'))
});


// grab libraries files from bower_components, minify and push in /public
gulp.task('libs', function() {

	var jsFilter = gulpFilter('*.js');
    var cssFilter = gulpFilter('*.css');
    var fontFilter = gulpFilter(['*.eot', '*.woff', '*.svg', '*.ttf']);

	return gulp.src(mainBowerFiles())

	// grab vendor js files from bower_components, minify and push in /public
	.pipe(jsFilter)
	.pipe(gulp.dest(dest_path + '/build/js/vendor'))
	.pipe(uglify())
	.pipe(rename({
        suffix: ".min"
    }))
	.pipe(gulp.dest(dest_path + '/build/js/vendor'))
	.pipe(jsFilter.restore())

	// grab vendor css files from bower_components, minify and push in /public
	.pipe(cssFilter)
	.pipe(gulp.dest(dest_path + '/build/css'))
	.pipe(minifycss())
	.pipe(rename({
        suffix: ".min"
    }))
	.pipe(gulp.dest(dest_path + '/build/css'))
	.pipe(cssFilter.restore())

	// grab vendor font files from bower_components and push in /public 
	.pipe(fontFilter)
	.pipe(flatten())
	.pipe(gulp.dest(dest_path + '/build/fonts'))
});

//sass

gulp.task('sass', function () {
    return gulp.src('public/scss/*.scss')
        .pipe(sass())
        .pipe(gulp.dest(dest_path + '/build/css'))
        .pipe(concat('style.css'))
        .pipe(minifycss())
        .pipe(rename('style.css'))
        .pipe(gulp.dest(dest_path + '/css'));
});

gulp.task('default', ['sass','libs']);



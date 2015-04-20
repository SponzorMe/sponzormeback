var gulp = require('gulp');
var uglify = require('gulp-uglify');
concat    = require('gulp-concat');
var jasmine = require('gulp-jasmine');

// define plug-ins
var flatten = require('gulp-flatten');
var gulpFilter = require('gulp-filter');
var minifycss = require('gulp-minify-css');
var rename = require('gulp-rename');
var mainBowerFiles = require('main-bower-files');
var sass = require('gulp-sass');
// var browserSync = require('browser-sync');
// var reload = browserSync.reload;

// livereload
var livereload = require('gulp-livereload');
// var lr = require('tiny-lr');
// var server = lr();


// Define paths variables
var src_path = 'public/components';
var dest_path =  'public';


// gulp.task('minify', function () {
//    gulp.src('public/js/app.js')
//       .pipe(uglify())
//       .pipe(gulp.dest(dest_path + '/build/js/vendor'))
// });


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
	.pipe(gulp.dest(dest_path + '/css'))
	.pipe(cssFilter.restore())

	// grab vendor font files from bower_components and push in /public 
	.pipe(fontFilter)
	.pipe(flatten())
	.pipe(gulp.dest(dest_path + '/build/fonts'))
	.pipe(livereload());
});

//sass

 gulp.task('sass', function () {
 	console.log('entro....');
    gulp.src('public/scss/*.scss')
    return gulp.src('public/scss/*.scss')
        .pipe(sass())
        .pipe(gulp.dest(dest_path + '/build/css'))
        .pipe(concat('dashboard.css'))
        .pipe(minifycss())
        .pipe(rename('dashboard.css'))
        .pipe(gulp.dest(dest_path + '/css'))
        .pipe(concat('style.css'))
        .pipe(minifycss())
        .pipe(rename('style.css'))
        .pipe(gulp.dest(dest_path + '/css'))
        .pipe(livereload());
 });

// watch files for changes and reload
// gulp.task('serve', function() {
// 	gulp.watch('public/scss/*.scss', ['sass'],{cwd: 'public'}, reload);
// 	gulp.watch('public/scss/layout/*.scss', ['sass'],{cwd: 'public'}, reload);
//   	gulp.watch('public/js/*.js', ['libs']);
// 	  browserSync({
// 	  	proxy: {
// 		    target: "local.sponzor.me",
// 		    middeware: function (req, res, next) {
// 		        console.log(req.url);
// 		        next();
// 		    }
// 		}
// 	  });
  
// });

/* Watcher */
gulp.task('watcher', function() {
    livereload.listen({
    	port: 8081,
    	host: 'local.sponzor.me',
    	reloadPage:   'index.html'
    });
    gulp.watch('public/scss/*.scss', ['sass']);
	gulp.watch('public/scss/layout/*.scss', ['sass']);
  	gulp.watch('public/js/*.js', ['libs']);
});

/* jasmine*/

// gulp.task('testjasmine', function () {
//     return gulp.src('public/js/*.js')
//         .pipe(jasmine());
// });

//gulp.task('default', ['libs','sass','watcher','testjasmine']);
//gulp.task('default', ['libs','sass','testjasmine']);
gulp.task('default', ['libs','sass','watcher']);



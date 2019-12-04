var gulp           = require('gulp'),
gutil          = require('gulp-util' ),
sass           = require('gulp-sass'),
browserSync    = require('browser-sync'),
concat         = require('gulp-concat'),
uglify         = require('gulp-uglify'),
cleanCSS       = require('gulp-clean-css'),
rename         = require('gulp-rename'),
del            = require('del'),
autoprefixer   = require('gulp-autoprefixer'),
fileinclude    = require('gulp-file-include'),
gulpRemoveHtml = require('gulp-remove-html'),
bourbon        = require('node-bourbon'),
notify         = require("gulp-notify"),
sourcemaps 		 = require('gulp-sourcemaps'),
runSequence 	 = require('run-sequence'),
replace 			 = require('gulp-replace-task'),
dir_theme 		 = "app/wp-content/themes/dizzain-template";


gulp.task('browser-sync', function() {
	browserSync({
		proxy: "dizzain-template.loc",
		notify: false,
		browser: "chrome"
	});
});

gulp.task('sass', ['headersass'], function() {
	return gulp.src(dir_theme + '/sass/**/*.scss')
		// .pipe(sourcemaps.init())
		.pipe(sass({
			includePaths: bourbon.includePaths
		}).on("error", notify.onError()))
		// .pipe(sourcemaps.write())
		.pipe(rename({suffix: '.min', prefix : ''}))
		.pipe(autoprefixer(['last 15 versions']))
		// .pipe(cleanCSS( {level: { 1: { specialComments: 0 } } })) // Opt., comment out when debugging
		.pipe(gulp.dest(dir_theme + '/css/'))
		.pipe(browserSync.reload({stream: true}))
	});

gulp.task('headersass', function() {
	return gulp.src(dir_theme + '/header.scss')
	.pipe(sourcemaps.init())
	.pipe(sass({
		includePaths: bourbon.includePaths
	}).on("error", notify.onError()))
	.pipe(sourcemaps.write())
	.pipe(rename({suffix: '.min', prefix : ''}))
	.pipe(autoprefixer(['last 15 versions']))
	.pipe(cleanCSS())
	.pipe(gulp.dest(dir_theme + '/'))
	.pipe(browserSync.reload({stream: true}))
});

gulp.task('imagereplace', function() {
	return gulp.src(dir_theme + '/img/**/*')
	.pipe(gulp.dest('dist/dizzain-template/img'));
});

//Libraries for carrepair common auto
gulp.task('libs', function() {
	return gulp.src([
		dir_theme + '/libs/jquery/dist/jquery.min.js',
		dir_theme + '/libs/magnific-popup/dist/jquery.magnific-popup.min.js',
		dir_theme + '/libs/wow/wow.min.js',
		dir_theme + '/libs/jqueryvalidation/jquery.validate.min.js',
		dir_theme + '/libs/jqueryvalidation/additional-methods.min.js',
		])
	.pipe(concat('libs.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest(dir_theme + '/js'))
	.pipe(browserSync.reload({ stream: true }));
});

gulp.task('watch', ['sass', 'libs', 'browser-sync'], function() {
	gulp.watch(dir_theme + '/header.scss', ['headersass']);
	gulp.watch(dir_theme + '/header.min.css', browserSync.reload);
	gulp.watch(dir_theme + '/sass/**/*.scss', ['sass']);
	gulp.watch(dir_theme + '/**/*.php', browserSync.reload);
	gulp.watch(dir_theme + '/js/**/*.js', browserSync.reload);
});

gulp.task('removedist', function() { return del.sync('dist'); });

gulp.task('phpreplace', function() {
	gulp.src(dir_theme + '/**/*.php')
	.pipe(gulp.dest('dist/dizzain-template'));
});

gulp.task('build', ['removedist', 'phpreplace', 'cssreplace', 'imagereplace', 'sass', 'libs'], function() {

	var buildLanguage = gulp.src([dir_theme + '/languages/*.pot'])
	.pipe(gulp.dest('dist/dizzain-template/languages'));

		// var buildCss = gulp.src([dir_theme + '/css/**/*.css'])
		// .pipe(cleanCSS())
		// .pipe(gulp.dest('dist/ankar-theme/css'));

		// var buildSTYLECss = gulp.src([dir_theme + '/style.css'])
		// .pipe(cleanCSS())
		// .pipe(gulp.dest('dist/ankar-theme/css'));

		var buildFonts = gulp.src(dir_theme + '/fonts/**/*')
		.pipe(gulp.dest('dist/dizzain-template/fonts'));

		var buildSWF = gulp.src(dir_theme + '/files/**/*')
		.pipe(gulp.dest('dist/dizzain-template/files'));

		var buildJs = gulp.src(dir_theme + '/js/**/*')
		.pipe(uglify())
		.pipe(gulp.dest('dist/dizzain-template/js'));

		var screenshotIMG = gulp.src(dir_theme + '/screenshot.png')
		.pipe(gulp.dest('dist/dizzain-template'));
	});

gulp.task('cssreplace', function() {
	gulp.src([dir_theme + '/**/*.css'])
	.pipe(cleanCSS())
	.pipe(gulp.dest('dist/dizzain-template'));
});

gulp.task('default', ['build']);

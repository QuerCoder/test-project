//gulp
var gulp = require('gulp');

//gulp plugins
var sass = require('gulp-sass'),
	watch = require('gulp-watch'),
	prefixer = require('gulp-autoprefixer'),
	cssmin = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    sourcemaps = require('gulp-sourcemaps'),
    rigger = require('gulp-rigger'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    rimraf = require('rimraf'),
    browserSync = require("browser-sync"),
    reload = browserSync.reload;


var path = {
	build: {
		html: 'dist/',
		js: 'dist/js/',
		css: 'dist/css/',
		img: 'dist/img/',
		fonts: 'dist/fonts/',
	},
	src: {
		html: 'src/*.html',
		js: 'src/js/main.js',
		style: 'src/style/main.scss',
		img: 'src/img/**/*.*',
		fonts: 'src/fonts/**/*.*'
	},
	watch: {
		html: 'src/**/*.html',
		js: 'src/js/**/*.js',
		style: 'src/style/**/*.scss',
		img: 'src/img/**/*.*',
		fonts: 'src/img/**/*.*'
	},
	clean: './dist/'
};


var config = {
	server: {
		baseDir: "./dist"
	},
	tunnel: true,
	host: 'localhost',
	port: 9000,
	logPrefix: "Frontend_Devil"
};


//build html
gulp.task('html:build', function() {
	gulp.src(path.src.html) //select files
	.pipe(rigger()) 
	.pipe(gulp.dest(path.build.html)) //save the files to build
	.pipe(reload({stream: true})); //reload server
});

//build js
gulp.task('js:build', function () {
    gulp.src(path.src.js) //select js file
        .pipe(rigger()) 
        .pipe(sourcemaps.init()) 
        .pipe(uglify()) //compress js
        //.pipe(sourcemaps.write())
        .pipe(gulp.dest(path.build.js)) //save the file to build
        .pipe(reload({stream: true})); //reload server
});


//build css
gulp.task('style:build', function () {
    gulp.src(path.src.style) //select file main.scss
        .pipe(sourcemaps.init())
        .pipe(sass()) //compilation
        .pipe(prefixer()) //add vendor prefixes
        .pipe(cssmin()) //compress
        //.pipe(sourcemaps.write())
        .pipe(gulp.dest(path.build.css)) //save the file to build
        .pipe(reload({stream: true})); //reload
});

//build images
gulp.task('image:build', function () {
    gulp.src(path.src.img) //select all images
        /*.pipe(imagemin({ //compress it!
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()],
            interlaced: true
        }))*/
        .pipe(gulp.dest(path.build.img)) //save the file to build
        .pipe(reload({stream: true})); //reload
});

//build fonts
gulp.task('fonts:build', function() {
    gulp.src(path.src.fonts) // select all fonts
        .pipe(gulp.dest(path.build.fonts)) //save files to build
});

//create build task
gulp.task('build', [
    'html:build',
    'js:build',
    'style:build',
    'fonts:build',
    'image:build'
]);


//watch files
gulp.task('watch', function(){
    watch([path.watch.html], function(event, cb) {
        gulp.start('html:build');
    });
    watch([path.watch.style], function(event, cb) {
        gulp.start('style:build');
    });
    watch([path.watch.js], function(event, cb) {
        gulp.start('js:build');
    });
    watch([path.watch.img], function(event, cb) {
        gulp.start('image:build');
    });
    watch([path.watch.fonts], function(event, cb) {
        gulp.start('fonts:build');
    });
});

//create webserver
gulp.task('webserver', function () {
    browserSync(config);
});

//remove build
gulp.task('clean', function (cb) {
    rimraf(path.clean, cb);
});

//final
gulp.task('default', ['build', 'webserver', 'watch']);
var gulp = require('gulp');

var concat = require('gulp-concat');
var less = require('gulp-less');
var minifyCSS = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var cssnano = require('gulp-cssnano');


// compile and concat less
gulp.task('less', function(){
    gulp.src('./styles/less/style.less')
    .pipe(less())
    .pipe(cssnano())
    .pipe(gulp.dest('./'));
});

// concat JS
gulp.task('ccjs', function () {
    gulp.src([
        './js/app/**/*.js'
     ])
    .pipe(concat('theme.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./js'));
});

gulp.task('default', function(){
    gulp.watch('./js/app/**/*.js',['ccjs']);

    
    gulp.watch('./styles/less/**/*.less', [
        'less'
    ]
    );  
});

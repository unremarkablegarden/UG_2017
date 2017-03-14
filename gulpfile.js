var gulp           = require('gulp'),
    concat         = require('gulp-concat'),
    uglify         = require('gulp-uglify'),
    rename         = require('gulp-rename'),
    sass           = require('gulp-sass');

var config = {
    scripts: [
        './assets/js/vendor/**/*.js',
        './assets/js/app/**/*.js'
    ]
};

gulp.task('scripts', function() {
    return gulp.src(config.scripts)
            .pipe(concat('app.js'))
            // .pipe(uglify())
            .pipe(rename({ extname: '.min.js' }))
            .pipe(gulp.dest('./assets/'));
});

gulp.task('sass', function () {
    return gulp.src('./assets/sass/style.scss')
            // .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
            .pipe(sass.sync().on('error', sass.logError))
            .pipe(rename({ extname: '.min.css' }))
            .pipe(gulp.dest('./assets/'));
});


gulp.task('watch', function () {
    gulp.watch('./assets/sass/**/*.scss', ['sass']);
    gulp.watch('./assets/sass/**/*.sass', ['sass']);
    gulp.watch('./assets/js/app/**/*.js', ['scripts']);
});

gulp.task('default', ['sass', 'scripts', 'watch']);

var gulp = require('gulp');
var webserver = require('gulp-webserver');
//var sass = require('gulp-sass');
var scsslint = require('gulp-scsslint');
var browserify = require('browserify');
var babelify = require('babelify');
var source = require('vinyl-source-stream');
var minify = require('gulp-minify-css');
var argv = require('yargs').argv;

var env = (argv.e == 'prod')? 'prod' : 'dev';

gulp.task('sass', function() {
  gulp.src(['./dev/style.scss'])
    .pipe(sass({
      'include css': true,
    }))
    .pipe(minify())
    .pipe(gulp.dest('./app/' + env + '/css/'));
})

gulp.task('sassLint', function() {
  gulp.src(['dev/**/*.scss', '!./dev/common/vendor/**/*.scss'])
    .pipe(scsslint())
    .pipe(scsslint('scss-lint.yml'))
    .pipe(scsslint.reporter());
});

gulp.task('build', function() {
  browserify({
    entries: './dev/index.jsx',
    extensions: ['.jsx', '.js'],
    debug: true
  })
  .transform(babelify)
  .bundle()
  .pipe(source('bundle.js'))
  .pipe(gulp.dest('./app/' + env + '/js'));
  gulp.src(['dev/views/index.html'],{})
  .pipe(gulp.dest('app/' + env));
});

gulp.task('vendor', function() {
  gulp.src(['dev/vendor/**/*'],{base: './dev/vendor/'})
  .pipe(gulp.dest('app/' + env + '/vendor/'));
  gulp.src(['dev/images/**/*'],{base: './dev/images/'})
  .pipe(gulp.dest('app/' + env + '/images/'));
});

gulp.task('serve', function() {
  gulp.watch('./dev/**/*.jsx', ['build']);
  gulp.watch('./dev/**/*.js', ['build']);
  //gulp.watch(['./dev/**/*.scss'], ['sass']);
  gulp.watch(['./dev/vendor/**/*'], ['vendor']);
})

gulp.task('default', ['serve'])

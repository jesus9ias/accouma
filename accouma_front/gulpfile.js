var gulp = require('gulp')
var webserver = require('gulp-webserver')
var sass = require('gulp-sass')
var browserify = require('browserify')
var babelify = require('babelify')
var source = require('vinyl-source-stream')
var minify = require('gulp-minify-css')
var php = require('gulp-connect-php')

gulp.task('sass', function() {
  gulp.src('./dev/style.scss')
    .pipe(sass({
      'include css': true,
    }))
    .pipe(minify())
    .pipe(gulp.dest('./app/build/css/'))
})

gulp.task('build', function() {
  browserify({
    entries: './dev/index.jsx',
    extensions: ['.jsx'],
    debug: true
  })
  .transform(babelify)
  .bundle()
  .pipe(source('bundle.js'))
  .pipe(gulp.dest('./app/build/js'))
})

gulp.task('watch', function() {
  gulp.watch('./dev/**/*.jsx', ['build'])
  gulp.watch(['./dev/**/*.scss'], ['sass'])
})

gulp.task('default', ['watch'])

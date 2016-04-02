var gulp = require('gulp')
var webserver = require('gulp-webserver')
var less = require('gulp-less')
var browserify = require('browserify')
var babelify = require('babelify')
var source = require('vinyl-source-stream')
var minify = require('gulp-minify-css')
var php = require('gulp-connect-php')

gulp.task('less', function() {
  gulp.src('./dev/style.less')
    .pipe(less({
      'include css': true,
    }))
    .pipe(minify())
    .pipe(gulp.dest('./build/css/'))
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
  .pipe(gulp.dest('./build/js'))
})

gulp.task('watch', function() {
  gulp.watch('./dev/**/*.jsx', ['build'])
  gulp.watch(['./dev/**/*.less'], ['less'])
})

gulp.task('php', function() {

    // start the php server
    // make sure we use the public directory since this is Laravel
    php.server({
        base: '../accouma_api'
    });

})

gulp.task('default', ['watch'])

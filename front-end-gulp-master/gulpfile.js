var gulp = require('gulp');
var ejs = require('gulp-ejs');


gulp.task('template', function(){
  var files =
      [
        'src/template/**.ejs',
        '!src/template/_**.ejs'];

  gulp.src(files)
    .pipe(ejs())
    .pipe(gulp.dest('./dist'));
});

gulp.task('default', ['template']);



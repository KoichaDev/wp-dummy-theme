import gulp from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCSS from 'gulp-clean-css';
import gulpIf from 'gulp-if';

const PRODUCTION = yargs.argv.prod;

export const styles = () => {
  return gulp
    .src('src/assets/scss/bundle.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(
      gulpIf(
        // We want to run the production environment if it's true
        PRODUCTION,
        cleanCSS({
          compatibility: 'ie8',
        })
      )
    )
    .pipe(gulp.dest('dist/asset/css'));
};

// export default hello;

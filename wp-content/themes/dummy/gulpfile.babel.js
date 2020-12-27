import gulp from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import uglify from 'gulp-uglify';
import named from 'vinyl-named';

const PRODUCTION = yargs.argv.prod;

const paths = {
  styles: {
    src: ['src/assets/scss/bundle.scss', 'src/assets/scss/admin.scss'],
    dest: 'dist/assets/css',
  },
  images: {
    src: 'src/assets/img/**/*.{jpg, jpeg, png, gif, svg}',
    dest: 'dist/assets/img',
  },
  scripts: {
    src: ['src/assets/js/bundle.js', 'src/assets/js/admin.js'],
    dest: 'dist/assets/js',
  },
  other: {
    src: ['src/assets/**/*', '!src/assets/{img, js, scss}', '!src/assets/{img, js, scss}/**/*'],
    dest: 'dist/assets',
  },
};

export const clean = () => del(['dist']);

export const styles = () => {
  return gulp
    .src(paths.styles.src)
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(
      gulpif(
        // We want to run the production environment if it's true
        PRODUCTION,
        cleanCSS({
          compatibility: 'ie8',
        })
      )
    )
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(gulp.dest(paths.styles.dest));
};

export const images = () => {
  return gulp
    .src(paths.images.src)
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(gulp.dest(paths.images.dest));
};

export const watch = () => {
  // 2nd param: which task to run when the file is changed
  gulp.watch('src/assets/scss/**/*.scss', styles);
  gulp.watch(paths.images.src, images);
  gulp.watch(paths.other.src, copy);
};

export const copy = () => {
  return gulp.src(paths.other.src).pipe(gulp.dest(paths.other.dest));
};

export const scripts = () => {
  return gulp
    .src(paths.scripts.src)
    .pipe(named())
    .pipe(
      webpack({
        mode: PRODUCTION ? 'production' : 'development',
        module: {
          rules: [
            {
              test: /\.js$/,
              use: {
                loader: 'babel-loader',
                options: {
                  presets: ['@babel/preset-env'], //or ['babel-preset-env']
                },
              },
            },
          ],
        },
        output: {
          filename: '[name].js',
        },
        devtool: !PRODUCTION ? '#inline-source-map' : false,
      })
    )
    .pipe(gulpif(PRODUCTION, uglify()))
    .pipe(gulp.dest(paths.scripts.dest));
};

// This will pass multiple tasks and it'll run each task one after the other
// gulp.parallel will run everything at the same time as in parallel mode
export const dev = gulp.series(clean, gulp.parallel(styles, images, copy), watch);
export const build = gulp.series(clean, gulp.parallel(styles, images, copy));

export default dev;

import gulp from 'gulp';
//import less from 'gulp-less';
import sass from 'gulp-sass';
import babel from 'gulp-babel';
import concat from 'gulp-concat';
import uglify from 'gulp-uglify';
import rename from 'gulp-rename';
import cleanCSS from 'gulp-clean-css';
import del from 'del';

const paths = {
   styles: {
       src: 'resources/assets/sass/app.scss',
       dest: 'assets/css'
   },
   scripts: {
       src: ('node_modules/jquery/dist/jquery.min.js', 
        'node_modules/foundation-sites/dist/js/foundation.min.js',
        'node_modules/slick-carousel/slick/slick.min.js'),
       dest: 'assets/js'
   }
};

export const clean = () => del(['assets']);

export function styles() {
    return gulp.src(paths.styles.src)
        .pipe(sass())
        .pipe(cleanCSS())
        .pipe(rename({
            basename: 'app',
            suffix: ''
        }))
        .pipe(gulp.dest(paths.styles.dest));
}

export function scripts() {
    return gulp.src(paths.scripts.src, { sourcemaps: true})
        .pipe(babel())
        .pipe(uglify())
        .pipe(concat('app.js'))
        .pipe(gulp.dest(paths.scripts.dest));
}

function watchFiles() {
    gulp.watch(paths.scripts.src, scripts);
    gulp.watch(paths.styles.src, styles);
}
export { watchFiles as watch };

const build = gulp.series(clean, gulp.parallel(styles, scripts));

export default build;
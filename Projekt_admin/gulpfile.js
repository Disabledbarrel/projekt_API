/* Installationer */
const { src, dest, watch, series, parallel } = require("gulp");
//const del = require("del");
//const browserSync = require('browser-sync').create()
const sass = require("gulp-sass");
sass.compiler = require("node-sass");
const sourcemaps = require("gulp-sourcemaps");

/* Sökvägar */
const files = {
  sassPath: "scss/*.scss"
};

/* Task: Sass */
function sassTask() {
  return src(files.sassPath)
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
    .pipe(sourcemaps.write("./maps"))
    .pipe(dest("css"));
  //.pipe(browserSync.stream());
}

/* Task: städa pub 
function delTask() {
    return del(['pub/**']);
}*/

/* Task: Watcher */
function watchTask() {
  /*browserSync.init({
        server: {
            baseDir: 'pub/'
        }
    });*/

  watch([files.sassPath], parallel(sassTask)); //.on("change", browserSync.reload);
}

exports.default = series(
  //delTask,
  parallel(sassTask),
  watchTask
);

const gulp = require("gulp"),
  sass = require("gulp-sass")(require("sass")),
  sourcemaps = require("gulp-sourcemaps"),
  autoprefixer = require("gulp-autoprefixer"),
  browserSync = require("browser-sync").create(),
  webpack = require("webpack");

const server = function (cb) {
  browserSync.init({
    proxy: "http://localhost/sellace",
  });
  cb();
};

const css = function () {
  return gulp
    .src("src/scss/bundle.scss")
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
    .pipe(autoprefixer())
    .pipe(sourcemaps.write("."))
    .pipe(gulp.dest("dist/css"))
    .pipe(browserSync.stream());
};

const js = function (cb) {
  return webpack(require("./webpack.config.js"), function (err, stats) {
    if (err) throw err;
    console.log(stats);
    browserSync.reload();
    cb();
  });
};

const watch = function (cb) {
  gulp.watch("src/scss/*.scss", gulp.series(css));
  gulp.watch("src/js/*.js", gulp.series(js));
  gulp.watch("**/*.php").on("change", browserSync.reload);
  cb();
};

exports.default = gulp.series(css, server, watch);
exports.css = css;
exports.js = js;
exports.watch = watch;

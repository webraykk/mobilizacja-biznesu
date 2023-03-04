const path = require("path");

module.exports = {
  entry: "./src/js/script.js",
  output: {
    path: path.resolve(__dirname, "dist/js"),
    filename: "bundle.min.js",
  },
  watch: false,
  devtool: "source-map",
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
    ],
  },
};

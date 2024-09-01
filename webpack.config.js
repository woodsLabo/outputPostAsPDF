const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const FixStyleOnlyEntriesPlugin = require("webpack-fix-style-only-entries");

module.exports = {
  entry: {
    "field": path.resolve(__dirname, "./assets/src/js/Field.js"),
    "form": path.resolve(__dirname, "./assets/src/js/Form.js"),
    "style": path.resolve(__dirname, "./assets/src/scss/style.scss"),
    "post": path.resolve(__dirname, "./assets/src/scss/post.scss"),
    "layout": path.resolve(__dirname, "./assets/src/scss/layout.scss"),
  },
  output: {
    path: path.resolve(__dirname, "./assets/dist/"),
    filename: "js/[name].js",
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        loader: "babel-loader",
        exclude: /node_modules/,
      },
      {
        test: /\.(sa|sc|c)ss$/,
        use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
      },
    ],
  },
  plugins: [
    new FixStyleOnlyEntriesPlugin(),
    new MiniCssExtractPlugin({
      filename: "css/[name].css",
    }),
  ],
};

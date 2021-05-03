const path = require('path');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const GoogleFontsPlugin = require('@beyonk/google-fonts-webpack-plugin');

module.exports = {
	mode: 'production',
	entry: './src/main.js',
	output: {
		filename: '[name].[contenthash].js',
		path: __dirname + '/dist',
	},
	module: {
		rules: [
			{
				test: /\.css$/,
				use: [MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader'],
			},
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: {
					// without additional settings, this will reference .babelrc
					loader: 'babel-loader',
				},
			},
			{
				test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
				exclude: /node_modules/,
				use: {
					loader: 'file-loader',
					options: {
						name: 'font/[name].[ext]',
						publicPath: 'dist/../',
					},
				},
			},
		],
	},
	devtool: 'source-map',
	devServer: {
		contentBase: path.join(__dirname, 'dist'),
		compress: true,
		port: 9000,
		hot: true,
	},
	optimization: {
		minimize: true,
		minimizer: [
			// For webpack@5 you can use the `...` syntax to extend existing minimizers (i.e. `terser-webpack-plugin`), uncomment the next line
			`...`,
			new CssMinimizerPlugin(),
		],
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: '[name].[contenthash].css',
			chunkFilename: '[id].[contenthash].css',
		}),
		new GoogleFontsPlugin({
			fonts: [
				{ family: 'Open Sans', variants: ['400', '600'] },
				{ family: 'Josefin Sans', variants: ['600'] },
			],
			/* ...options */
		}),
	],
};

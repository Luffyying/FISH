var webpack = require('webpack');
var = require();
module.exports = {
	entry:'./index.js',
	output:{
		path:__dirname,
		filename:'main.js'
	},
	module:{
		loaders:[
		{test:/\.css$/,loader:'style!css'}
		]
	},
	plugins:[
		new webpack.BannerPlugin('this is create by somebody'),
		new 
	]
}
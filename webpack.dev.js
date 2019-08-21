const merge = require('webpack-merge');
const common = require('./webpack.common.js');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');


module.exports = merge(common, {
  watch: true,
  plugins: [
    new BrowserSyncPlugin({
        files: [
          './**/*.php',
          './**/*.twig'
        ],
        host: 'localhost',
        port: 3000,
        proxy: 'http://localhost/gb',
        logPrefix: 'webpack',
        logLevel: 'debug',
        ghostMode: false
    })
  ]
});
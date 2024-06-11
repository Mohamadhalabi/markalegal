const path = require('path')
const mix = require('laravel-mix')
const webpackNodeExternals = require('webpack-node-externals')

mix
  .js('resources/js/ssr.js', 'public/js')
  .vue()
  .alias({ '@': path.resolve('resources/js') })
  .webpackConfig({
    target: 'node',
    externals: [webpackNodeExternals()],
  })
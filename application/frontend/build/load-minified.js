'use strict'

const fs = require('fs')
const UglifyJS = require('uglify-es')

module.exports = function(filePath) {
  const code = fs.readFileSync(filePath, 'utf-8')
  const result = UglifyJS.minify(code, {ecma: 6})
  if (result.error) return ''
  return result.code
}

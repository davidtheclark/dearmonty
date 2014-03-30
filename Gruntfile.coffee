 # If you are unfamiliar with Grunt, go to http://gruntjs.com/
# Especially http://gruntjs.com/getting-started, to get a sense
# of how it all works.

module.exports = (grunt) ->

  # Load grunt tasks without verbosity
  require("load-grunt-tasks")(grunt)

  # Configuration object
  grunt.initConfig

    pkg: grunt.file.readJSON "package.json"

    # VARIABLES
    vars:
      srcDir: "assets-src"
      distDir: "assets-dist"
      scssDir: "<%= vars.srcDir %>/scss"
      cssDir: "<%= vars.distDir %>/css"
      jsSrcDir: "<%= vars.srcDir %>/js"
      jsDistDir: "<%= vars.distDir %>/js"
      imageSrcDir: "<%= vars.srcDir %>/images"
      imageDistDir: "<%= vars.distDir %>/images"
      fontSrcDir: "<%= vars.srcDir %>/fonts"
      fontDistDir: "<%= vars.distDir %>/fonts"
      iconfontAssetDir: "<%= vars.imageSrcDir %>/iconfont-assets"
      iconfontStyleDir: "<%= vars.scssDir %>/iconfonts"
      iconfontFontDir: "<%= vars.fontDistDir %>/iconfonts"
      svgAssetDir: "<%= vars.imageSrcDir %>/svg-assets"
      svgStyleDir: "<%= vars.scssDir %>/datauris"
      spriteAssetDir: "<%= vars.imageSrcDir %>/sprite-assets"
      spriteStyleDir: "<%= vars.scssDir %>/sprites"
      spriteDir: "<%= vars.imageDistDir %>/sprites"


    # ================================
    # STYLE
    # ================================

    # Compile SCSS to CSS.
    sass:
      options:
        lineNumbers: true
      style:
        dest: "<%= vars.cssDir %>/main.css"
        src: "<%= vars.scssDir %>/main.scss"

    # Add vendor prefixes to CSS.
    autoprefixer:
      options:
        browsers: ["> 1%", "last 3 versions", "ie 9"]
      style:
        files:
          "<%= sass.style.dest %>": "<%= sass.style.dest %>"

    # Compress CSS.
    cssmin:
      dist:
        files: "<%= autoprefixer.style.files %>"


    # ================================
    # IMAGE THINGS
    # ================================

    # Minify SVG font and image assets.
    svgmin:
      options:
        plugins: [removeViewBox: false]
      iconfont:
        files: [
          expand: true
          cwd: "<%= vars.iconfontAssetDir %>/raw/"
          src: ["*.svg"]
          dest: "<%= vars.iconfontAssetDir %>/opt/"
        ]
      svg:
        files: [
          expand: true
          cwd: "<%= vars.svgAssetDir %>/raw/"
          src: ["*.svg"]
          dest: "<%= vars.svgAssetDir %>/opt/"
        ]

    # Turn SVGs into data-uris stored in SCSS variables.
    datauri:
      options:
        varPrefix: 'svg-'
      all:
        src: "<%= vars.svgAssetDir %>/opt/*.svg"
        dest: "<%= vars.svgStyleDir %>/_svg-datauris.scss"

    # Create an icon font with SVG icon-assets.
    webfont:
      font:
        options:
          font: "icons"
          stylesheet: "scss"
          relativeFontPath: "../fonts/iconfonts"
          hashes: false
          htmlDemo: false
          template: "utils/icon-font-template.css"
        src: "<%= vars.iconfontAssetDir %>/opt/*.svg"
        dest: "<%= vars.iconfontFontDir %>"
        destCss: "<%= vars.iconfontStyleDir %>"

    # Create a spritesheet.
    spriteHD:
      options:
        imgUrl: "../images/sprites"
        destImg: "<%= vars.spriteDir %>"
        destCSS: "<%= vars.spriteStyleDir %>"
      all:
        src: ["<%= vars.spriteAssetDir %>/all/*"]
        spriteName: "all"


    # ================================
    # JAVASCRIPT
    # ================================

    # Compile JS modules into a single file.
    browserify:
      main:
        src: "<%= vars.jsSrcDir %>/main.js"
        dest: "<%= vars.jsDistDir %>/app.js"

    # Create a custom LoDash build.
    lodash:
      build:
        dest: "<%= vars.jsSrcDir %>/lib/lodash.build.js"
        options:
          include: "debounce"
          flags: ["debug"]

    # Concatenate third-party JS.
    concat:
      lib:
        src: [
          # Insert third-party JS here, in the right order
          "<%= lodash.build.dest %>"
          "bower_components/jquery/dist/jquery.js"
        ]
        dest: "<%= vars.jsDistDir %>/libs.js"

    # Prepare production-built Modernizr.
    modernizr:
      build:
        devFile: "<%= vars.jsSrcDir %>/lib/modernizr-dev.js"
        outputFile: "<%= vars.jsDistDir %>/modernizr-custom.js"


    # Uglify JS.
    uglify:
      dist:
        files: [
          # libs
          "<%= concat.lib.dest %>": "<%= concat.lib.dest %>"
          # app
          "<%= browserify.main.dest %>": "<%= browserify.main.dest %>"
        ]


    # ================================
    # MISC THINGS
    # ================================

    # Copy certain assets from src to dist, just as they are
    copy:
      js:
        src: "<%= vars.jsSrcDir %>/lib/modernizr-dev.js"
        dest: "<%= vars.jsDistDir %>/modernizr-dev.js"
      images:
        files: [
          expand: true
          cwd: "<%= vars.imageSrcDir %>/copy-to-dist/"
          src: ["*", "**/*"]
          dest: "<%= vars.imageDistDir %>"
        ]
      fonts:
        files: [
          expand: true
          cwd: "<%= vars.fontSrcDir %>/"
          src: ["*"]
          dest: "<%= vars.fontDistDir %>"
        ]

    # Clean up folders.
    clean:
      css: [
        "<%= vars.cssDir %>/*"
      ]
      svg: [
        "<%= vars.iconfontAssetDir %>/opt/*"
        "<%= vars.iconfontFontDir %>/*"
        "<%= vars.iconfontStyleDir %>/*"
        "<%= vars.svgAssetDir %>/opt/*"
        "<%= vars.svgStyleDir %>/*"
      ]
      js: [
        "<%= vars.jsDistDir %>"
      ]
      sprite: [
        "<%= vars.spriteDir %>/*"
        "<%= vars.spriteStyleDir %>/*"
      ]
      dist: ["<%= vars.distDir %>"]

    # Watch for changes and run tasks.
    watch:
      # Post-processing livereload.
      livereload:
        options:
          livereload: true
          debounceDelay: 2000
        files: [
          "<%= vars.cssDir %>/*.css"
          "<%= vars.jsDistDir %>/*.js"
          "<%= vars.imageDistDir %>/*"
          "<%= vars.imageDistDir %>/**/*"
          "<%= vars.distDir %>/fonts/*"
          "<%= vars.distDir %>/fonts/**/*"
        ]
      # General watching.
      style:
        files: ["<%= vars.scssDir %>/*.scss"]
        tasks: ["style"]
      sprite:
        files: ["<%= vars.spriteAssetDir %>/**/*"]
        tasks: ["sprite"]
      font:
        files: ["<%= vars.iconfontAssetDir %>/raw/*.svg"]
        tasks: ["font"]
      svg:
        files: ["<%= vars.svgAssetDir %>/raw/*.svg"]
        tasks: ["svg"]
      js:
        files: ["<%= vars.jsSrcDir %>/*.js"]
        tasks: ["browserify:main"]


  # Load the plugins.
  # "grunt"-prefixed are loaded via `load-grunt-tasks`, at the top.

  # Register the tasks.

  # Style tasks.
  grunt.registerTask "style", [
    "sass:style"
    "autoprefixer:style"
  ]

  # Image thing tasks
  grunt.registerTask "sprite", [
    "spriteHD"
    "style"
  ]
  grunt.registerTask "reSprite", [
    "clean:sprite"
    "sprite"
  ]
  grunt.registerTask "svg", [
    "svgmin"
    "datauri"
    "webfont"
    "style"
  ]
  grunt.registerTask "reSvg", [
    "clean:svg"
    "svg"
  ]

  # JS things
  grunt.registerTask "jsLibs", [
    "modernizr:build"
    "lodash:build"
    "concat:lib"
  ]

  # Build
  grunt.registerTask "build", [
    "style"
    "cssmin:dist"
    "jsLibs"
    "browserify:main"
    "uglify:dist"
    "copy"
  ]

  grunt.registerTask "reBuild", [
    "reSprite"
    "reSvg"
    "build"
  ]
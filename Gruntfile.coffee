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
      grunticonAssetDir: "<%= vars.imageSrcDir %>/grunticon-assets"
      spriteAssetDir: "<%= vars.imageSrcDir %>/sprite-assets"
      spriteStyleDir: "<%= vars.scssDir %>/sprites"
      spriteDir: "<%= vars.imageDistDir %>/sprites"


    # ================================
    # STYLE
    # ================================

    # Compile SCSS to CSS.
    sass:
      options:
        sourceComments: "map"
      main:
        dest: "<%= vars.cssDir %>/main.css"
        src: "<%= vars.scssDir %>/main.scss"
      style:
        dest: "<%= vars.cssDir %>/style.css"
        src: "<%= vars.scssDir %>/style.scss"


    # Add vendor prefixes to CSS.
    autoprefixer:
      options:
        browsers: ["> 1%", "last 3 versions", "ie 9"]
      style:
        files:
          "<%= sass.main.dest %>": "<%= sass.main.dest %>"
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
      grunticon:
        files: [
          expand: true
          cwd: "<%= vars.grunticonAssetDir %>/raw/"
          src: ["*.svg"]
          dest: "<%= vars.grunticonAssetDir %>/opt/"
        ]

    # Grunticon: SVGs as data-uris with PNG fallback.
    grunticon:
      options:
        cssprefix: ".grunticon-"
        colors:
          white: "#fff"
          gray: "#696969"
      all:
        files: [
          expand: true
          cwd: "<%= vars.grunticonAssetDir %>/opt/"
          src: "*.svg"
          dest: "<%= vars.distDir %>/grunticon/"
        ]


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
          include: [
            "throttle"
            "sample"
          ]
          flags: ["debug"]

    # Concatenate third-party JS.
    concat:
      lib:
        src: [
          # Insert third-party JS here, in the right order
          "<%= lodash.build.dest %>"
          "bower_components/jquery/dist/jquery.js"
          "bower_components/velocity/jquery.velocity.js"
          "bower_components/matchmedia/matchMedia.js"
        ]
        dest: "<%= vars.jsDistDir %>/libs.js"

    # Prepare production-built Modernizr.
    modernizr:
      build:
        parseFiles: false
        tests: [
          "csstransforms"
          "csstransforms3d"
        ]
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
      dist:
        files: [
          expand: true
          cwd: "<%= vars.srcDir %>/copy-to-assets/"
          src: ["*", "**/*"]
          dest: "<%= vars.distDir %>"
        ]

    # Clean up folders.
    clean:
      css: [
        "<%= vars.cssDir %>/*"
      ]
      svg: [
        "<%= vars.grunticonAssetDir %>/opt/*"
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
          "*.php"
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
      svg:
        files: ["<%= vars.grunticonAssetDir %>/raw/*.svg"]
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
  grunt.registerTask "svg", [
    "svgmin"
    "grunticon"
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
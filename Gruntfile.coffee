module.exports = (grunt) ->

  # Project configuration.
  grunt.initConfig
    pkg: grunt.file.readJSON("package.json")

    # Clean out the source directory
    clean: ["src/assets/src/js/"]

    # Compress and minify
    uglify:
      options:
        banner: "/*! <%= pkg.name %> <%= grunt.template.today(\"yyyy-mm-dd\") %> */\n"
        mangle:
          except: ["jQuery", "Backbone"]

      structure:
        files:
          "public/js/structure.min.js": ["public/js/structure.js"]

    compass:
      gumby:
        options:
          sassDir: 'src/assets/sass/gumby'
          cssDir: 'public/css'
          config: 'compass.rb'

    # Compile coffee files to src/json
    coffee:
      glob_to_multiple:
        options:
          bare: true
        expand: true
        cwd: 'src/assets/coffee'
        src: ['**/*.coffee']
        dest: 'src/assets/src/js/'
        ext: '.js'

    # Concat all our src files
    concat:
      modernizr:
        src: [
          'src/assets/vendor/modernizr/modernizr-2.6.2.min.js'
        ]
        dest: 'public/js/modernizr.js'
      gumby:
        src: [
          'src/assets/vendor/jquery/jquery-1.9.1.js'
          'src/assets/vendor/gumby/gumby.js'
          'src/assets/vendor/gumby/ui/*.js'
          'src/assets/vendor/gumby/gumby.init.js'
        ]
        dest: 'public/js/gumby.js'

      ember:
        src: [
          'src/assets/vendor/handlebars/handlebars-1.0.0-rc.4.js'
          'src/assets/vendor/ember/ember-1.0.0-rc.6.1.js'
        ]
        dest: 'public/js/ember.js'

      app:
        src: [
          'src/assets/src/js/app.js'
          'src/assets/src/js/router.js'
        ]
        dest: 'public/js/app.js'

    watch:
      coffee:
        files: 'src/assets/coffee/**/*.coffee'
        tasks: ["clean", "coffee", "concat"]
        options:
          interrupt: true
      compass:
        files: 'src/assets/sass/**/*.scss'
        tasks: ["clean", "compass", "concat"]
      src:
        files: 'src/assets/vendor/**/*.js'
        tasks: ["concat", "livereload"]
        options:
          interrupt: true

  # Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks "grunt-contrib-uglify"
  grunt.loadNpmTasks "grunt-contrib-concat"
  grunt.loadNpmTasks "grunt-contrib-coffee"
  grunt.loadNpmTasks "grunt-contrib-watch"
  grunt.loadNpmTasks "grunt-contrib-clean"
  grunt.loadNpmTasks "grunt-contrib-compass"

  # Default task(s).
  # grunt.registerTask('watch', ['livereload-start', 'regarde']);
  grunt.registerTask "default", ["clean","compass", "coffee", "concat"]
  grunt.registerTask "deploy", ["clean","compass", "coffee", "concat", "uglify"]

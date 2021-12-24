'use strict';

//https://codex.wordpress.org/I18n_for_WordPress_Developers#Translating_Plugins_and_Themes

module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        pot: {
            options:{
          text_domain: 'zettatel-wcsms', //Your text domain. Produces my-text-domain.pot
          dest: 'languages/', //directory to place the pot file
          keywords: [ 'gettext', 'ngettext:1,2' ], //functions to look for
          msgmerge: true
          },
          files:{
            src:  [ '**/*.php' ], //Parse all php files
            expand: true,
             }
        },
      });

      // Load the plugin that provides the "grunt-pot" task.
      grunt.loadNpmTasks('grunt-pot');

      // Alternatively, Use https://www.npmjs.com/package/grunt-wp-i18n here and comment everything above

};
module.exports = function(grunt) {

	// Project configuration
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
			},

			js: {
				src: 'assets/js/general.js',
				dest: '',
				expand: true, 
				ext: '.min.js',
			}
		},

		sass: {
			dist: {
				options: {
					style: 'compressed',
				},

				files: [{
					cwd: 'assets/scss',
					src: ['*.scss'],
					dest: 'assets/css/',
					expand: true,
					flatten: false, 
					ext: '.css',
				}]
			}
		},

		watch: {
			css: {
				files: ['assets/scss/*.scss'],
				tasks: ['sass']
			},

			js: {
				files: ['assets/js/general.js'],
				tasks: ['uglify']
			}
		}
    });

	// Load plugins
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');

	// Default tasks
	grunt.registerTask('default', ['uglify', 'sass']);

};

module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
				files: {
					'assets/css/main.css' : 'sass/main.scss'
				}
			}
		},
		cssmin: {
		  target: {
		    files: {
		      'assets/css/main.min.css': ['assets/css/main.css']
		    }
		  }
		},
		copy: {
		  main: {
		    src:  ['assets/css/main.min.css', 'assets/js/main.min.js', 'assets/img/**/*', 'modules/**/*', '*.html', '*.php'],
		    dest: 'build/',
		  },
		},
		concat: {
		    options: {
		      separator: ';',
		    },
		    dist: {
		      src: ['assets/js/modules/**/*.js', 'assets/js/vendor/**/*.js'],
		      dest: 'assets/js/main.js',
		    },
		 },
		uglify: {
			my_target: {
		    	files: {
		    		'assets/js/main.min.js': ['assets/js/main.js']
		      	}
			}
		},
		watch: {
			css: {
				files: 'sass/**/*.scss',
				tasks: ['sass']
			},
			html: {
				files: ['**/*.html', '**/*.php']
			},
			concat: {
				files: ['assets/js/modules/**/*.js', 'assets/js/vendor/**/*.js'],
				tasks: ['concat']
			 },
			 options: {
			    livereload: true,
    		}
		}
	});


	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	grunt.registerTask('default',['watch']);
	grunt.registerTask('build',['cssmin','concat', 'uglify', 'copy']);
}
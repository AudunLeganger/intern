module.exports = function(grunt)
{
	var js_files = [
		"./bower_components/jquery/dist/jquery.js",
		"./bower_components/bootstrap/dist/js/bootstrap.js",
		"./bower_components/underscore/underscore.js",
		"./bower_components/backbone/backbone.js",
		"./bower_components/handlebars/handlebars.min.js",
		"./bower_components/moment/moment.js",
		"./bower_components/moment/lang/nb.js",
		"./app/assets/javascript/app.js",
		"./app/assets/javascript/models/printer.js",
		"./app/assets/javascript/models/groups.js",
		"./app/assets/javascript/models/users.js",
		"./app/assets/javascript/models/dugnaden.old.js",
		"./app/assets/javascript/views/index.js",
		"./app/assets/javascript/views/printer.last.js",
		"./app/assets/javascript/views/printer.fakturere.js",
		"./app/assets/javascript/views/groups.js",
		"./app/assets/javascript/views/users.js",
		"./app/assets/javascript/views/dugnaden.old.js",
		"./app/assets/javascript/views/profile.js",
		"./app/assets/javascript/handlebars.helpers.js",
		"./public/assets/datepicker/js/bootstrap-datepicker.js"
	];
	grunt.initConfig({
		concat: {
			options: {
				separator: ";"
			},
			js_frondend: {
				src: js_files,
				dest: "./public/assets/javascript/frontend.js"
			}
		},
		less: {
			development: {
				options: {
					//compress: true
				},
				files: {
					"./public/assets/stylesheets/frontend.css": "./app/assets/stylesheets/frontend.less"
				}
			}
		},
		uglify: {
			all: {
				files: {
					// TODO
				}
			}
		},
		//phpunit: {},
		watch: {
			js: {
				files: js_files,
				tasks: ['concat'],
				options: {
					livereload: true // reloads browser
				}
			},
			less: {
				files: ["./app/assets/stylesheets/*.less"],
				tasks: ["less"],
				options: {
					livereload: true // reloads browser
				}
			}
		}
	});

	// Plugin loading
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	
	// Task definition
	grunt.registerTask('default', ['watch']);

	//$collection->add('../vendor/twitter/bootstrap/less/bootstrap.less')->apply('Less');
	//$collection->javascript('//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
	//$collection->directory('../vendor/twitter/bootstrap/js', function($collection) {
	//		$collection->requireDirectory();

};
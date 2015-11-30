module.exports = function(grunt) {
    require('jit-grunt')(grunt);
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        less: {
            compile: {
                options: {
                    compress: true,
                    yuicompress: true,
                    optimization: 2
                },
                files: {
                    'public/assets/css/bootstrap.min.css' : 'bower_components/bootstrap/less/bootstrap.less',
                    'public/assets/css/app.min.css' : 'resources/less/app.less'
                }
            }
        },
        watch: {
            styles: {
                files: ['resources/**/*.less'],
                task: ['less'],
                options: {
                    nospawn: true
                }
            }
        },
        uglify: {
            bootstrap: {
                files: {
                    'public/assets/js/bootstrap.min.js' : [
                        'bower_components/bootstrap/js/alert.js',
                        'bower_components/bootstrap/js/button.js',
                        'bower_components/bootstrap/js/modal.js'
                    ]
                }
            }
        }
    });

    grunt.registerTask('default', 'watch', ['uglify', 'less']);
}

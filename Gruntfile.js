// Обязательная обёртка
module.exports = function(grunt) {

    // Задачи
    grunt.initConfig({
        // Склеиваем
        concat: {
            main: {
                src: [
                    ['js/libs/jquery-ui.js', 'js/libs/reject/reject.js', 'js/libs/jquery.mobile.custom.min.js', 'js/libs/mirgate.js', 'js/libs/jquery.swipe.js',
                     'js/libs/gray/functions.js', 'js/libs/jquery.color.js', 'js/libs/transition.js',
                     'js/libs/imgareaselect/jquery.imgareaselect.min.js', 'js/libs/mask.js', 'js/libs/jquery.swipe.js', 'js/map/jqueryrotate.min.js', 
                     'js/libs/magnific.js', 'js/devs/front.js', 'js/devs/back.js', 'js/main.js', 'js/devs/social.js']// Все JS-файлы в папке
                ],
                dest: 'js/scripts.js'
            },
            css: {
                src: [
                    ['css/**/*.css', 'js/libs/reject/style.css']
                ],
                dest: 'css/style.css'
            }
        },
        // Сжимаем
        uglify: {
            main: {
                files: {
                    // Результат задачи concat
                    'js/scripts.min.js': '<%= concat.main.dest %>'
                }
            }
        },
        cssmin: {
            main: {
                src: 'css/style.css',
                dest: 'css/style.min.css'
            }
        },
        imagemin: {                          // Task
            main: {
              options: {
                optimizationLevel: 7
              },
              files: [
                {
                  // Set to true to enable the following options…
                  expand: true,
                  // cwd is 'current working directory'
                  cwd: 'images/',
                  src: ['**/*.{png,jpg,gif}'],
                  // Could also match cwd line above. i.e. project-directory/img/
                  dest: 'images/compressed/'
                }
              ]
            }
        }
    });

    // Загрузка плагинов, установленных с помощью npm install
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-css');
    grunt.loadNpmTasks('grunt-contrib-imagemin');

    // Задача по умолчанию
    grunt.registerTask('default', ['concat', 'uglify', 'cssmin']);
    grunt.registerTask('js', ['concat:main', 'uglify']);
    grunt.registerTask('image', ['imagemin']);
};
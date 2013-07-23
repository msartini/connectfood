
module.exports = function(grunt) {
  var utils;
  utils = (require('./gruntcomponents/misc/commonutils'))(grunt);
  grunt.task.loadTasks('gruntcomponents/tasks');
  grunt.task.loadNpmTasks('grunt-contrib-watch');
  grunt.initConfig({
    growl: {
      ok: {
        title: 'COMPLETE!!',
        msg: '＼(^o^)／'
      }
    },
    coffee: {
      dist2: {
        dir: 'wp-content/themes/bb/js',
        dest: 'wp-content/themes/bb/js'
      }, 
      dist3: {
        dir: 'js/',
        dest: 'js/'
      } 
    },
    watch: {
      dist2: {
        files: 'wp-content/themes/bb/js/*.coffee',
        tasks: ['coffee:dist2', 'growl:ok']
      },  
      dist3: {
        files: 'js/*.coffee',
        tasks: ['coffee:dist3', 'growl:ok']
      } 
    }
  });
  grunt.event.on('coffee.error', function(msg) {
    console.log('teste');
    return utils.growl('ERROR!!', msg);
  });
  return grunt.registerTask('default', ['coffee', 'growl:ok']);
};

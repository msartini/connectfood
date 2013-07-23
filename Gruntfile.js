
module.exports = function(grunt) {
  var utils;
  utils = (require('./gruntcomponents/misc/commonutils'))(grunt);
  
  grunt.task.loadTasks('gruntcomponents/tasks');
  grunt.task.loadNpmTasks('grunt-contrib-watch');
  grunt.task.loadNpmTasks('grunt-contrib-less');
  
  grunt.initConfig({
    distdir: 'wp-content/themes/connectfood',
    pkg: grunt.file.readJSON('package.json'),

    growl: {
      ok: {
        title: 'COMPLETE!!',
        msg: '＼(^o^)／'
      }
    },

    coffee: {
      compile: {
        dir: '<%=distdir%>/js',
        dest: '<%=distdir%>/js'
      }
    },

    less: {
      theme: {
        // options : { yuicompress: true },
        src: '<%=distdir%>/css/less/style.less',
        dest: '<%=distdir%>/css/styleall.css'
      }, 
      styleIpad: {
        // options : { yuicompress: true },
        src:  '<%=distdir%>/css/less/style-768.less', 
        dest: '<%=distdir%>/css/style-768.css'
      }, 
      style980: {
        // options : { yuicompress: true },
        src:  '<%=distdir%>/css/less/style-980.less', 
        dest: '<%=distdir%>/css/style-980.css'
      }, 
      bootstrap: {
        // options : { yuicompress: true },
        src:  '<%=distdir%>/library/less/bootstrap.less', 
        dest: '<%=distdir%>/library/css/bootstrap.css'
      }
       
    },
    watch: {
      coffee: {
        files: '<%=distdir%>/js/**/*.coffee',
        tasks: ['coffee', 'growl:ok']
      },  
      less: {
        files: ['<%=distdir%>/css/less/**/*.less', '<%=distdir%>/library/less/**/*.less' ],
        tasks: 'less'
      } 
    }
  });
  grunt.event.on('coffee.error', function(msg) {
    return utils.growl('ERROR!!', msg);
  });
  return grunt.registerTask('default', ['coffee', 'less', 'growl:ok']);
};

require.config({//配置路径
	baseUrl: 'scripts',//基准路径
	paths: {
    "jquery": "lib/jquery-2.1.1",
    "text": "lib/text",
    "knockout":"lib/knockout-3.1.0.debug",
    "ko-amd":"lib/knockout-amd-helpers",
    "sammy":"lib/sammy-0.7.4",
    "app":"modules/app"
  },
  shim: {
    "jquery":{
      exports:"jquery"
    },
    "sammy": {
      deps:["jquery"]
    }
  }
});
//引来需要的文件
require(["knockout", "app", "ko-amd"], function(ko, app){
	ko.bindingHandlers.module.baseDir = "modules";//connect to the js
  ko.amdTemplateEngine.defaultPath = "templates";//connect to the html ,the template of module
  // sammy做了简单的路由
  
  ko.applyBindings(new app());
});
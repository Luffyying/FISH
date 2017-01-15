/* 定义一个入口文件的程序*/
define(["knockout", "sammy"],function(ko, Sammy){
  return function(){
    var self = this;
    
    self.menus = ko.observableArray([//菜单栏制定
      { title:"主页", route:"#" },
      { title:"菜单一", route:"#/area1/list1" },
      { title:"菜单二", route:"#/area1/list2" }
    ]);
    
    self.loading = ko.observable(false);
    self.moduleOptions = ko.observable({});
    self.loadError = ko.observableArray(false);
    self.updateError = ko.observable(false);
    
    self.updateError.subscribe(function(error){
      if (error){
        alert(error);
        
        self.updateError(false);
      }
    });
    
    self.loadError.subscribe(function(error){
      if (error){
        self.moduleOptions({ name:"error", data: {app: self }});
      }
    });
    +-
    Sammy(function(){
      this.get('#home', function () {
        self.moduleOptions({ name: "home", data: { app: self }});
        self.loading(true);
      });

      this.get(/\#\/([^/]+)\/([^/]+)/, function () {
        var area = this.params.splat[0];
        var module = this.params.splat[1];
        console.log(area + module);
        self.moduleOptions({ name: area + "/" + module, data: { app:self, data:{} }});
        self.loading(true);
      });
      
      this.get('/index.html', function () { this.app.runRoute('get', '#home') });
    });
    
    Sammy().run();
  }
});
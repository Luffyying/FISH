define(["knockout"],
       function(ko){
         
  return function(context){
    
    this.name = "area1/list1";
    this.list = ko.observableArray(["Jquery","KnockoutJS","RequireJS","SammyJS"]);
    
    this.throwError = function(){
      context.app.updateError('更新出错了。');
    }
    
    this.page = ko.observable(sessionStorage.getItem("area1/list1"));
    
    this.page.subscribe(function(newValue){
      sessionStorage.setItem("area1/list1", newValue);
    });
    
    
    var self = this;
    
    this.setPage = function(page){
      self.page(page);
    }
    
    this.partialData = ko.observable({ text:"data for partial1"});
    
    //when ajax done
    setTimeout(function(){
      context.app.loading(false);
    },2000);
  }
});
define(["knockout"],function(ko){
  return function(context){
    this.name = "home";
    
    //when ajax successed
    setTimeout(function(){
      context.app.loading(false);
    },2000);
  }
});
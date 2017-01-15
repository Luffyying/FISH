define(["knockout"],function(ko){
  return function(context){
    this.name = "error";
    
    this.error = context.app.loadError();
    
    //when ajax successed
    setTimeout(function(){
      context.app.loading(false);
    },0);
  }
});
define(["knockout"],function(ko){
  return function(context){
    this.name = "area1/list2";
    
    //when ajax fail
    setTimeout(function(){
      context.app.loadError({ message:"some error here" });
    },2000);
  }
});
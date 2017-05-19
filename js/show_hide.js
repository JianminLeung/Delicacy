window.onload=function(){
  var oButton = document.getElementsByClassName("click");
var oDiv = document.getElementsByClassName("show-text");
function addHandler(element,event,handler){
	if(element.addEventListener){
		element.addEventListener(event,handler,false);
	}else if(element.attachEvent){
		element.attachEvent('on'+event,handler);
	}else{
		element['on'+event]=handler;
	}

}
for(var i=0;i<oButton.length;i++){
	var _this=i;
	(function(_this){
	  addHandler(oButton[_this],'click',function(){
	  if(oDiv[_this].style.display=='none')	{
		   oDiv[_this].style.display='block';
      }else{
		 oDiv[_this].style.display='none'; 
	 }
    });	
	})(_this);
}	
}
// JavaScript Document
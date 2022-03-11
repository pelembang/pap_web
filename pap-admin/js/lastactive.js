function lastActive() {
$.getJSON("?lastactive", function(result){
$.ajaxSetup({ cache: true}); 
  })
}

setInterval('lastActive()', 300000);


var start = 600;
var timer = start;
function countdown(){
if(timer > 0){
timer -= 1;
setTimeout("countdown()",1000);
}
else{
location.href="?logout";
}
}
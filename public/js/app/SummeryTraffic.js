$(document).ready(function(){
	console.log("test");
	$.ajax({
		type:'get',
		url:'api/ApiAgentPerformance/summarycase',
		data:{},
		success:function(r){
			console.log(r.data);
		},
		error:function(r){
			alert("error");
		},
	});
});
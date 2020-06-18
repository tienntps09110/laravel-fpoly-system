$(document).ready(function(){
	$(function(){
		var toDate = new Date();
		
		var month = toDate.getMonth() + 1;
		var day = toDate.getDate();
        var year = toDate.getFullYear();
        
		if(month < 10)
			month = '0' + month.toString();
		if(day < 10)
			day = '0' + day.toString();
		
		var minDate= year + '-' + month + '-' + day;
		
		$('.txtDate').attr('min', minDate);
	});
})
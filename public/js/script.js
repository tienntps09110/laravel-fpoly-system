$(document).ready(function() {
	$('#sidebarCollapse').click(function() {
		$('#sidebar').toggleClass('active');
	});

	// diem-danh 
	$("#kiem-tra-tong").hide();
	$("#kiem-tra-tong").click(function(){
		$(":checked").closest('tr').show('1000');
		$("#kiem-tra-vang").show();
		$("#kiem-tra-tong").hide();
	})
	$("#kiem-tra-vang").click(function(){
		$(":checked").closest('tr').hide('1000');
		$("#kiem-tra-tong").show();
		$("#kiem-tra-vang").hide();
	})
	$("#Luu").click(function(){
		$('body').prepend('<div class="dark-screen"></div>');
		$('body').prepend('<div class="message"> Đã Lưu thành công </div>');
		$(".message").add(".dark-screen").click(function(){
			$(".message").add(".dark-screen").remove();
		})
	})
	

	// end diem-danh

});
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
	type: 'line',
	data: {
		labels: [ 'Tiền', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange' ],
		datasets: [
			{
				label: '# of Votes',
				data: [ 12, 19, 3, 5, 2, 3 ],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}
		]
	},
	options: {
		scales: {
			yAxes: [
				{
					ticks: {
						beginAtZero: true
					}
				}
			]
		}
	}
});

var ctxRadian = document.getElementById('myChartRadian');
var myChartRadian = new Chart(ctxRadian, {
	type: 'doughnut',
	data: {
		labels: [ 'Tiền', 'Linh', 'Bình', 'Lợi' ],
		datasets: [
			{
				label: '# of Votes',
				data: [ 12, 19, 3, 5 ],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}
		]
	}
	// options: {
	// scales: {
	// 	yAxes: [
	// 		{
	// 			ticks: {
	// 				beginAtZero: true
	// 			}
	// 		}
	// 	]
	// }
	// }
 
 
});

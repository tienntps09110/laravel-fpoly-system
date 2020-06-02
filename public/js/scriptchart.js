let dataClient = JSON.parse(dataRes);
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
	type: 'line',
	data: {
		labels: dataClient.labels,
		datasets: [
			{
				label: '# of Votes',
				data: dataClient.data,
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
		responsive: true,
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

let dataRadiantClient = JSON.parse(dataRadianRes);
var ctxRadian = document.getElementById('myChartRadian');
var myChartRadian = new Chart(ctxRadian, {
	type: 'doughnut',
	data: {
		labels: dataRadiantClient.labels,
		datasets: [
			{
				label: '# of Votes',
				data: dataRadiantClient.data,
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

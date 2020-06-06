
    <div class="container myChart" style="width:100%;">
        <h4 class="text-center p-4"style="font-weight:bold">Biểu đồ thể hiện theo tháng </h4>
        <canvas style="border: none" id="myChart"></canvas>
</div>

{{-- DATA --}}
<script>
    var dataClient = JSON.parse({!! json_encode($countMonth) !!});
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
	type: 'line',
	data: {
		labels: dataClient.labels,
		datasets: [
			{
				label: '',
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
		maintainAspectRatio:true
	}
});

</script>
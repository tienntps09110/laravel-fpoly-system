$(document).ready(function() {
	$('#table_id').DataTable({
		sProcessing: 'Đang xử lý...',
		sLengthMenu: 'Xem _MENU_ mục',
		sZeroRecords: 'Không tìm thấy dòng nào phù hợp',
		sInfo: 'Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục',
		sInfoEmpty: 'Đang xem 0 đến 0 trong tổng số 0 mục',
		sInfoFiltered: '(được lọc từ _MAX_ mục)',
		sInfoPostFix: '',
		sSearch: 'Tìm:',
		sUrl: '',
		oPaginate: {
			sFirst: 'Đầu',
			sPrevious: 'Trước',
			sNext: 'Tiếp',
			sLast: 'Cuối'
		}
	});
	$('#sidebarCollapse').click(function() {
		$('#sidebar').toggleClass('active');
	});

	// nút up
	$(".nut-up").click(function(){
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	})

	// diem-danh 
	$(".kiem-tra-tong").hide();
	$(".kiem-tra-tong").click(function(){
		$(":checked").closest('tr').show('1000');
		$(".kiem-tra-vang").show();
		$(".kiem-tra-tong").hide();
	})
	$(".kiem-tra-vang").click(function(){
		$(":checked").closest('tr').hide('1000');
		$(".kiem-tra-tong").show();
		$(".kiem-tra-vang").hide();
	})
	$("#Luu").click(function(){
		$('body').prepend('<div class="dark-screen"></div>');
		$('body').prepend('<div class="message"> Vui lòng chờ... </div>');
		$('.message').add('.dark-screen').click(function() {
			$('.message').add('.dark-screen').remove();
		});
	});

	// end diem-danh
});

$(document).ready(function() {
	// ************************
	// nút up
	// ************************
	$(".nut-up").hide();
	$(window).scroll(function(){
		if($(this).scrollTop()>800){
			$(".nut-up").fadeIn(500);
		}else{
			$(".nut-up").fadeOut(100);
		}
	})
	$(".nut-up").click(function(){
		$(window).scrollTop(0);
	})
	// ***************************
	// nút menu
	// ***************************
	$("#btn-menu").on(
		{
			"click":function(){
				if(document.body.clientWidth < 1000){
					$(".fixed-sidebar").toggleClass('active')
				}
		}
	})
	$("#content").children('div').on(
		{
			"click":function(){
				if(document.body.clientWidth < 1000){
					$(".fixed-sidebar").removeClass('active')
				}
		}
	})
	// *************************
	// diem-danh 
	// *************************
	$("#kiem-tra-tong").click(function(){
		$(":checked").closest('tr').show('500');
		$("#kiem-tra-vang").show();
		$("#kiem-tra-tong").hide();
	})
	$("#kiem-tra-vang").click(function(){
		$(":checked").closest('tr').hide('500');
		$("#kiem-tra-tong").show();
		$("#kiem-tra-vang").hide();
	})
	
	$("input[checked]").closest('.row-center').css("background-color","#ebfffb");
	$(".row-center").click(function(){
		if($(this).find('input').hasClass('checked')){
			$(this).find('input').toggleClass('checked');
			$(this).find('input').removeAttr('checked');
			$(this).css('background-color','white');
		}else{
			$(this).find('input').toggleClass('checked');
			$(this).find('input').attr('checked','');
			$(this).css('background-color','#ebfffb');
		}
	})
	
	// ****************************************
	// datatable
	// ****************************************
	$('#table_detail_class_subject').DataTable({
		language:{
			sProcessing: 'Đang xử lý...',
			sLengthMenu: 'Xem _MENU_ mục',
			sZeroRecords: 'Không tìm thấy dòng nào phù hợp',
			sInfo: 'Đang xem <b> _START_ </b> đến <b> _END_ </b> trong tổng số <b> _TOTAL_ </b> mục',
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
		}
	});

	 
	$('#table_detail_class_subject_filter').find('input').addClass('table-input-search');
	$("select[name='table_detail_class_subject_length']").addClass('length-select');
	 

	// *****************************
});

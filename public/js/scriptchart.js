// nút menu
// ***************************
$('#btn-menu').on({
	click: function() {
		if (document.body.clientWidth < 1000) {
			$('.fixed-sidebar').toggleClass('active');
		}
	}
});
$('#content').children('div').on({
	click: function() {
		if (document.body.clientWidth < 1000) {
			$('.fixed-sidebar').removeClass('active');
		}
	}
});
// *************************

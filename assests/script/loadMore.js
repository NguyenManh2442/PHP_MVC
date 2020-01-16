$(document).ready(function(){

	$(document).on('click','#btnLoad', function(){

		var lastid = $(this).data('id');
		var menuid = $(this).data('mi');
		$('#btnLoad').html('Đang tải...');
		$.ajax({
			url:"http://localhost/php0519E/PRJ_Web_PHP/?controller=product&action=loadmore",
			method:"POST",
			data:{
				lastid:lastid, menuid:menuid,
			},
			dataType:"text",
			success:function(data){
				if (data!='') {
					$("#btnLoad").remove();
					$("#broad").append(data);
				}
				else{
					 $("#btnLoad").remove();
					$("#broad").append('');
				}
			}
		});
	});

	$(function(){
    $('#sapxep').trigger('change'); 
    $('#sapxep').change(function(){
      var sort= $(this).val();
		   $.ajax({
			url:"http://localhost/php0519E/PRJ_Web_PHP/?controller=product&action=sortProductByPrice",
			method:"POST",
			data:{
				sort:sort,
			},
			dataType:"text",
			success:function(sort){
				$(".item1").remove();
				$("#broad").append(sort);
				
			}         
    	});
	});
});
});
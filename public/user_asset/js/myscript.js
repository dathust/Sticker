$(document).ready(function(){
	$(".updatecart").click( function(){
		var rowid = $(this).attr('id');
		
		var qty = $(this).parent().parent().find(".qty").val();

		var kt = $(this).parent().parent().find(".size").val();

		
		var token = $("input[name='_token']").val();

		
		$.ajax({
			url:'cap-nhat/'+rowid+'/'+qty+'/'+kt,
			type: 'GET',
			cache: false,
			data: {"_token":token,"id":rowid,"qty":qty,"kt":kt},

			success: function (data){
				if (data == "oke"){
						window.location = "gio-hang"
						//alert(kt);
				}
			}

			
		});
		
		
	});	
});

function khaosatnd(){
	var result = confirm('Bạn có muốn làm bài khảo sát để nhận quà từ Shop?');

  if(result == true){
   
    //windown.location('khoa-sat')
   //redirect('http://localhost:8080/Sticker/public/khao-sat');
	// windowChild = window.open('khao-sat', "windowChild ", "width=500, height=500");
 //        	return false;
 window.location.assign("khao-sat")
 	return false;
  }
  else if(result ==false){
    
 window.location.assign("thanh-toan")
 	return false;
   
  }
  
}
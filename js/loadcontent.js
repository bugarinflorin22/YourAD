$(document).ready(function(){
 
	$(window).scroll(function(){
	
	 var position = $(window).scrollTop();
	 var bottom = $(document).height() - $(window).height();
   
	 if( position == bottom ){
   
	  var row = Number($('#row').val());
	  var allcount = Number($('#all').val());
	  var rowperpage = 12;
	  row = row + rowperpage;
   
	  if(row <= allcount){
	   $('#row').val(row);
	   $.ajax({
		url: 'fetch_details.php',
		type: 'post',
		data: {row:row},
		success: function(response){
		 $(".box:last").after(response).show().fadeIn("slow");
		}
	   });
	  }
	 }
   
	});
	
   });
   
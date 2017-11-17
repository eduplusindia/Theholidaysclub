/**
 * @author Kishor Mali
 */


jQuery(document).ready(function(){
	
	jQuery(document).on("click", ".deleteUser", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deleteUser",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this user ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("User successfully deleted"); }
				else if(data.status = false) { alert("User deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	
});


jQuery(document).ready(function(){
	
	jQuery(document).on("click", ".deleteVoucher", function(){
		var voucherId = $(this).data("voucherid");

			hitURL = baseURL + "deleteVoucher",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this voucher ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { voucherId : voucherId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("voucher successfully deleted"); }
				else if(data.status = false) { alert("voucher deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
});




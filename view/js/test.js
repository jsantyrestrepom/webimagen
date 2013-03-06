$(document).onload( function() {
	$.ajax({
		type: "POST" ,
        url: "webservices/loadPhotos.php?" ,
        data: $("#username") ,
        success: function (data) {
        	$("#gallery_bar").css("width" , "100%");
        	var obj = eval ( \'(\' + data + \')\' );
        	$("#gallery").html("");
        	$.each() {
        		
        	}
         	$("#gallery").append(data
        		
        	);
        }
	});
            
});
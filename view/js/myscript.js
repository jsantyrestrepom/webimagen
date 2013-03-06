$(document).onload( function() {
	$.ajax({
		type: "POST" ,
        url: "webservices/wservice_loadPhotos.php?" ,
        data: $("#username") ,
        success: function (data) {
        	$("#gallery_bar").css("width" , "100%");
        	var obj = eval ( \'(\' + data + \')\' );
        	$("#gallery").html("");
        	obj.toString();
        	$.each() {
        		
        	}
         	// $("#gallery").append(data
        	//	<a class="thumbnail" href="#">
        	//	<img src="..." class="img-polaroid">
        		</a>
        	//);
        }
	});
            
});
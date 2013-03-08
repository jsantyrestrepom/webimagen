$(window).load(function() {
                var idusr = $("#id_user").val();alert(idusr);
                $.ajax({
                    type: "POST" ,
                    url: "http://localhost:8080/webimagen/webservices/wservice_loadPhotos.php?" ,
                    data: { id : idusr } ,
                    success: function (data) {
                        var obj = eval ( \'(\' + data + \')\' );
                        $.each(obj.list, function(key , value) {
                            //wrap value
                        }); alert(data);
                    }
                 });
            });
<?php


    require_once ('../model/class/Usuario.php');

     
    session_start();
    
    
    $username = $_SESSION['user']->getNombre();
    $id_user = $_SESSION['user']->getId();
    $html = '
    <!DOCTYPE html >
    <html >
    <head ><title >WebImagen</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="css/webimagen.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" >
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" > </script>
        <script type="text/javascript" src="js/jquery-1.9.1.js" ></script>
        <script type="text/javascript" >
            <!--
            $(document).ready(function() {
                var idusr = $("#id_user").val();
                $.ajax({
                    type: "POST" ,
                    url: "http://localhost:8080/webimagen/webservices/wservice_loadPhotos.php?" ,
                    data: { id : idusr } ,
                    success: function (data) {
                        var obj = eval ( \'(\' + data + \')\' );
                        var usrdirectory = $("#username").text();
                        $.each(obj.list, function(key , value) {
                            $("#gallery").append(\'<div class="wrap-img"><a href="../photos/\'+ usrdirectory +\'/\'+ value +\'"><img src="../photos/\'+ usrdirectory +\'/\'+ value +\'" class="img-polaroid" ></a></div>\');
                        });
                    }
                 });
            });
            -->
        </script>
    </head>
    
    <body >
        <script src="http://code.jquery.com/jquery.js" ></script>
        <script src="bootstrap/js/bootstrap.min.js" ></script>
        
        <div class="navbar navbar-inverse controls controls-row offset12" >
        <div class="span" id="username" ><i class="icon-user" ></i>'. $username .'</div>
        <div class="span" ><form id="logout" method="post" action="../controller/controller.php" >
            <input class="btn btn-mini" type="submit" id="bttn_logout" name="bttn_logout" value="Logout" />
        </form></div>
        </div>
        <hr />
        <div class="container" >
        
            <div id="upload_photos" >
            <form class="form-inline" id="form_upload" method="post" action="../controller/controller.php?" enctype="multipart/form-data" >
                <input class="upload" id="id_user" type="hidden" name="id_user" value="'. $id_user .'" />
                <label for="upload_photo" id="lbl_upload" >Agregar:</label>
                <input class="input-xxlarge" type="file" name="upload_photo" id="upload_photo" required />
                <input class="btn btn-large btn-primary" type="submit" name="bttn_upload" value="UPLOAD" />
            </form></div>
            <hr />
            <div class="gallery container" id="gallery" ></div>
        
        </div>
        
        
        <footer class="footer" style="background-color: rgb(245, 245, 245);">
        <div class="container" id="cc_rights">
            <p class="span4 offset10"> Develop by: Javier Santiago Restrepo Moncada</p>
            <p class="span4 offset10"><time datetime="2013-02-18"></time><a rel="license" target="_blank" href="http://creativecommons.org/licenses/by-sa/3.0/us/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/3.0/us/80x15.png" /></a></p>
        </div>
        </footer>
    </body>
    </html> ';
    echo $html;


?>
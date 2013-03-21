<?php


    $msg = '';
    if ( isset($_GET['error']) ) {
    	$msg = "The username or password you have entered is incorrect.";
    }
    
    $html = '
    <!DOCTYPE html>
    <html>
    <head><title>WebImagen</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="css/webimagen.css" rel="stylesheet" type="text/css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"> </script>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    
    <body>
        <script src="http://code.jquery.com/jquery.js" ></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        
        <div class="container" >
        
            <div id="status" class="alert alert-error" ><button type="button" class="close" data-dismiss="alert" >&times;</button>'. $msg .'</div>
            <div id="form_login" >
            <form class="form-horizontal" method="post" action="../controller/controller.php?" >
                <fieldset>
                <legend>Sign In</legend>
                <div class="control-group">
                    <label class="control-label" for="username">Username</label>
                    <div class="controls">
                        <input class="input-medium" type="text" name="username" maxlength="20" autocomplete="on" placeholder="Username" required autofocus />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input class="input-medium" type="password" name="password" maxlength="40" required min="10" placeholder="Password" />
                    </div>
                </div>
                <div class="control-group">
                    <input class="btn" type="submit" name="bttn_login" value="submit form &rarr;" />
                </div>
                </fieldset>
            </form>
            </div>
            
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
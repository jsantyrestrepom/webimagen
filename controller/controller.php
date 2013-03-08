<?php
	
	
	require_once ('../model/class/BaseDatos_postgresql.php');
	require_once ('../model/class/Usuario.php');
	
	$db = new BaseDatos();
    $usuario = new Usuario();

	session_start();


	if ( isset( $_SESSION['user'] ) ) {
		$usuario = $_SESSION['user'];
        if (isset($_POST['bttn_logout'])) {
            session_destroy();
            header ("Location: ../view/login.php");
            exit();
        } else if ( isset($_POST['bttn_upload']) ) {
            if ((($_FILES['upload_photo']['type'] == "image/gif") || ($_FILES['upload_photo']['type'] == "image/jpeg") || ($_FILES['upload_photo']['type'] == "image/png") || ($_FILES['upload_photo']['type'] == "image/pjpeg")) && ($_FILES['upload_photo']['type'] < 20000)) {
                $username = $_SESSION['user']->getNombre();
                $id_user = $_SESSION['user']->getId();
                $tmp = $_FILES['upload_photo']['tmp_name'];
                $extension = end(explode(".", $_FILES['upload_photo']['name']));
                $date_imagen = time();
                $new_name_imagen = "img-$date_imagen";
                $path = $_SERVER['DOCUMENT_ROOT'] . "/photos/$username/$new_name_imagen.$extension";
                if( move_uploaded_file($tmp, $path) ) {
                    $query = "
                        INSERT INTO tbl_imagen
                        (cod_imagen,id_user,name_imagen,date_imagen,type_imagen)
                        VALUES
                        (nextval('seq_tbl_imagen_cod'),$id_user,'$new_name_imagen',$date_imagen,'$extension')
                    ";
                    $db->query ( $query );
                }
            }//exit();
        }        
        header ("Location: ../view/startPage.php");
        exit();    
	} else {
		if ( isset ( $_POST['username'] ) && isset ( $_POST['password'] ) ) {
			$username = $_POST['username'];
			$password = md5( $_POST['password'] );
            header("Location: ../model/model.php?usr=$username&pwd=$password" );
            exit();
        }
        header ("Location: ../view/login.php");
        exit();
	}
	
?>
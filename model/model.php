<?php


    require_once ('class/BaseDatos_postgresql.php');
    require_once ('class/Usuario.php');
    
    $db = new BaseDatos();
    $usuario = new Usuario();

    session_start();


    if ( isset ( $_GET['usr'] ) && isset ( $_GET['pwd'] ) ) {
        $username = $_GET['usr'];
        $password = $_GETT['pwd'];      // ¿no almacena el valor?
        $query = "
            SELECT
                id_user,username_user
            FROM
                tbl_user
            WHERE
                username_user='$username'
            AND
                password_user='". $_GET['pwd'] ."'
            LIMIT 1 
        ";
        $db->query( $query );
        if ( $db->numRows() > 0 ) {
            $datos = $db->fetchArray();
            session_cache_expire(1800);
            $sessionId = session_id();
            $ip = $_SERVER["REMOTE_ADDR"];
            $usuario->setNombre( $datos['username_user'] );
            $usuario->setCodigo( $datos['id_user'] );
            $usuario->setSession( $sessionId );
            $usuario->setIp( $ip );
        
            $_SESSION['user'] = $usuario;
            header ("Location: ../view/startPage.php");
            exit();
        } else {
            header ("Location: ../view/login.php?error=e");
            exit();
        }
    } else {
        header ("Location: ../view/login.php");
        exit();
    }
    
?>
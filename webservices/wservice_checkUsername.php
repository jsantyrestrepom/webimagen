<?php


    require_once ('../model/class/BaseDatos_postgresql.php');
    
    // POST request
    if ( isset( $_POST['username'] ) ) {
        $db = new BaseDatos();
        $username = $_POST['username'];
        $query = "
            SELECT 
                id_user,username_user
            FROM
                tbl_user
            WHERE
                username_user='$username'
            LIMIT 1
        ";
        $db->query( $query );
        if ( $db->numRows() > 0 ) {
            $response = TRUE;
        } else {
            $response = FALSE;
        }
        echo "({'response': '$response'})";
    }
    
    // GET request
    if ( isset( $_GET['username'] ) ) {
        $db = new BaseDatos();
        $username = $_GET['username'];
        $query = "
            SELECT 
                id_user,username_user
            FROM
                tbl_user
            WHERE
                username_user='$username'
            LIMIT 1
        ";
        $db->query( $query );
        if ( $db->numRows() > 0 ) {
            $response = TRUE;
        } else {
            $response = FALSE;
        }
        echo "({'response': '$response'})";
    }
    
?>
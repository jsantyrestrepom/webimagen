<?php


    require_once ('../model/class/BaseDatos_postgresql.php');
    
    // POST request
    if ( isset($_POST['id']) ) {
        $db = new BaseDatos();
        $id_user = $_POST['id'];
        $query = "
            SELECT
                name_imagen,type_imagen
            FROM
                tbl_imagen
            WHERE
                id_user=$id_user 
        ";
        $db->query( $query );
        if ( $db->numRows() > 0 ) {
            $totalImg = 0;
            $listImg = "";
            while( $arr_img = $db->fetchArray() ) {
                $listImg .=  "'". $arr_img['name_imagen'] .".". $arr_img['type_imagen'] ."' , ";
                $totalImg += 1;
            }
            $listImg = substr($listImg,0,strlen($listImg)-3);
            echo "({ 'total' : '$totalImg' , 'list' : [ $listImg ] })"; 
        } else {
            echo "({ 'total' : '0' })";
        }
    }

?>
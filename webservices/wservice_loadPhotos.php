<?php


    require_once ('../model/class/BaseDatos_postgresql.php');
    
    // POST request
    if ( isset($_POST['id']) ) {
        $db = new BaseDatos();
        $id_user = $_POST['id'];
        $query = "
            SELECT
                name_imagen
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
                $listImg += "{ 'name' : '". $arr_img['name_imagen'] ."' } ,";
                $totalImg += 1;
            }//echo $listImg;
            //$listImg = substr($listImg,0,strlen($listImg)-1);
            //echo "{ 'total' : '$totalImg' , 'list' : [ $listImg ] }";
        } else {
            echo "{ 'total' : '0' }";
        }
    }

?>
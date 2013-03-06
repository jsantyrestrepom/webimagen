<?php
    
    
    //echo md5('jsrm');
    $response = file_get_contents('../webservices/wservice_checkUsername?username='. $_POST['username']);
            $response = json_decode($response); echo "$response<br />";
            var_dump($_POST);
?>
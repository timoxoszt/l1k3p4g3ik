<?php
    
    require "main.php";

    if(isset($_SESSION['token'])){
        
        $id = $_POST['page'];
        
        $res = $fb->get('/me/likes?limit=1000', $_SESSION['token']);
        $res = $res->getGraphEdge()->asArray();
        
        $pages = array();
        
        foreach($res as $page){
            $pages[] = $page['id'];
        }
        
        if(in_array($id, $pages)){
            echo "The user has liked the page.";
        }
        else{
            echo "The user hasn't liked the page.";
        }
        
    }


?>
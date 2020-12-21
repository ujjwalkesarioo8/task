<?php


function clean($data){
    // return the clean data for processing purpose
	 $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}



?>
<?php

class ManageDatabase {
    public  $link;
    
    function _construct () {
        include_once('class.database.php');
        
        $conn = new Database;
        $this-> link = $conn-> connect();
        return $this->link;
    }
}

//test connection
$something = new ManageDatabase;
echo $something;
?>

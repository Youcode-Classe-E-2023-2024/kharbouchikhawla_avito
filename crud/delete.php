<?php
 require_once("config.php");
 $record = new config();

 if(isset($_GET["id"]) && isset($_GET["req"])) { 
    if($_GET['req'] == "delete"){
        $record->setId($_GET["id"]);
        $record->delete();
        echo "<script>alert('data Deleted successfuly');document.location='alldata.php'</script>";
    }
 }
?>
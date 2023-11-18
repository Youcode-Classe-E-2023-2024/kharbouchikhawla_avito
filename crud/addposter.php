<?php
if(isset($_POST['save'])){
   require_once("config.php");
   $sc = new config();
   
   $sc->setTitre($_POST['title']);
   $sc->setPrix($_POST['price']);
   $sc->setDescription($_POST['description']);
   $sc->insertData();
   echo "<script>alert('Data saved successfully');document.location='alldata.php'</script>";
}
?>
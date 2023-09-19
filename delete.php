<?php
    include "crud_init.php";
    $delID=$_GET['id'];
    $queryExe = "DELETE FROM $crudtbl WHERE $delID=$id";
    mysqli_query($con,$queryExe);
    header("Location:index.php");
?>
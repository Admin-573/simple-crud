<?php
    include "crud_init.php";
    $delID=$_GET['id'];
    $queryExe = "DELETE FROM $crudtbl WHERE $delID=$id";
    $sql = mysqli_query($con,$queryExe);
    if($sql)
    {
        ?> 
            <script>
                alert("Deleted");
                window.open("http://localhost/simple%20crud/index.php","_self");
            </script>
        <?php
    }
    else {
        ?> 
            <script>
                alert("Error Occured");
            </script>
        <?php
    }
?>
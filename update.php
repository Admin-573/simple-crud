<?php
    //error_reporting(0);
    include "crud_init.php";
    $getID = $_GET[$id];
    $queryExe = "SELECT * FROM $crudtbl WHERE $id=$getID";
    $data=mysqli_query($con,$queryExe);
    $row=mysqli_fetch_array($data);
?>
<html>
    <head>
        <title> Update Data </title>
    </head>
    <body>
        <form action="" method="post">
        <center>
            <table>
                <h1> Update Data </h1>
                <tr>
                    <td> Roll No </td>
                    <td> <input type="text" id="id" name="id" value="<?php echo $row[$id] ?>" disabled> </td>
                </tr>
                <tr>
                    <td> Update Name </td>
                    <td> <input type="text" id="name" name="name" value="<?php echo $row[$name] ?>"> </td>
                </tr>
                <tr>
                    <td> Update Email </td>
                    <td> <input type="email" id="email" name="email" value="<?php echo $row[$email] ?>" > </td>
                </tr>
                <tr>
                    <td> Update Password </td>
                    <td> <input type="password" id="pass" name="pass" value="<?php echo $row[$pass] ?>"> </td>
                </tr>
                <tr>
                    <td>  </td>
                    <td style="text-align: center;"> <input type="submit" id="btn_upd" name="btn_upd" value="Update Data"> </td>
                </tr>
            </table>
        </center>
        </form>
    </body>
</html>

<?php

    include "crud_init.php";
    if(isset($_POST['btn_upd'])){
        $upd_id = $_GET[$id];
        $upd_name = $_POST[$name];
        $upd_email = $_POST[$email];
        $upd_pass = $_POST[$pass];

        $updateQuery = "UPDATE $crudtbl SET $name='$upd_name' , $email='$upd_email' , $pass='$upd_pass' WHERE $id=$upd_id";
        $queryExe = mysqli_query($con,$updateQuery);

        if(!$queryExe){
            ?>
                <script>
                    alert("Not Updated")    
                </script>
            <?php
        }
        else 
        {
            ?>
                <script>
                    alert("Updated")
                    window.open("http://localhost/simple%20crud/index.php","_self")
                </script>
            <?php
        }
    }
    


?>
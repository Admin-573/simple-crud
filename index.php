<html>
    <head>
        <title> Simple Crud </title>
    </head>
    <body>
        <form action="" method="post">
        <center>
            <table>
                <h1> BASIC CRUD</h1>
                <tr>
                    <td> Enter Roll No </td>
                    <td> <input type="text" id="id" name="id" required> </td>
                </tr>
                <tr>
                    <td> Enter Name </td>
                    <td> <input type="text" id="name" name="name" required> </td>
                </tr>
                <tr>
                    <td> Enter Email </td>
                    <td> <input type="email" id="email" name="email" required> </td>
                </tr>
                <tr>
                    <td> Enter Password </td>
                    <td> <input type="password" id="pass" name="pass" required> </td>
                </tr>
                <tr>
                    <td>  </td>
                    <td style="text-align: center;"> <input type="submit" id="btn_add" name="btn_add" value="Add Data"> </td>
                </tr>
            </table>
        </center>
        </form>
    </body>
</html>

<?php

    include "crud_init.php";
    $createtbl = "CREATE TABLE IF NOT EXISTS $crudtbl($id int primary key,$name text,$email text,$pass text)";
    $queryExe = mysqli_query($con,$createtbl);

    if(isset($_POST['btn_add'])){
        $ID = $_POST[$id];
        $NAME = $_POST[$name];
        $EMAIL=$_POST[$email];
        $PASS = $_POST[$pass];

        $sql = "SELECT * FROM $crudtbl WHERE $ID=$id";
        $dbquery = mysqli_query($con,$sql);
        $data = mysqli_num_rows($dbquery);

        if($data){
            ?>
                <script>
                    alert("Data Exist")
                </script>
            <?php
        } else {
            $insertData = "insert into $crudtbl values($ID,'$NAME','$EMAIL','$PASS')";
            $queryExe = mysqli_query($con,$insertData);
            if ($queryExe){
                ?>
                    <script>
                        alert("Data Added Succesfully")
                        window.open("http://localhost/simple%20crud/index.php","_self")
                    </script>
                <?php
            }
        }
    }

    ?>
        <center>
            <table border="2">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th colspan="2">Action</th>
                </tr>

                <?php

                    include "crud_init.php";
                    $sql = "select * from $crudtbl";
                    $queryExe = mysqli_query($con,$sql);
                    $data = mysqli_num_rows($queryExe);
                    if($data){
                        while ($row = mysqli_fetch_array($queryExe)){
                            ?>
                                <tr>
                                    <td>
                                        <?php
                                            echo "$row[$id]";
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo "$row[$name]";
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo "$row[$email]";
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo "$row[$pass]";
                                        ?>
                                    </td>
                                    <td>
                                        <a href="update.php?id=<?php echo $row[$id]; ?>">
                                            Update
                                        </a>
                                    </td>
                                    <td>
                                        <a href="delete.php?id=<?php echo $row[$id]?>">
                                            Delete
                                    </td>
                                </tr>
                            <?php
                        }
                    }

                ?>
            </table>
        </center>
    <?php

?>
<?php

$DATABASE_NAME="crud";
$HOST="localhost";
$USER="root";
$PASSWORD="";

$crudtbl='crudtbl';
$id='id';
$name='name';
$email='email';
$pass='pass';

$con = mysqli_connect($HOST,$USER,$PASSWORD,$DATABASE_NAME);
if(!$con)
{
    mysqli_connect_error();
} else{

}


?>
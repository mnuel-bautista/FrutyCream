<?php
// Realizar la conexión con la base de datos

function db_query($query) {
    $db_host = 'localhost';	  // Servidor donde está alojada la base de datos
    $db_user = 'root';		  // Usuario de la base de datos
    $db_password = 'efciqa2208';		  // Contraseña de la base de datos
    $db_name = 'paleteria';	      // Nombre de la base de datos
    $db_port = '3306';
    $connection =mysqli_connect($db_host,$db_user,$db_password,$db_name,$db_port);// = mysqli_connect($db_host,$db_user,$db_password,$db_name);
    $result = mysqli_query($connection,$query);
    return $result;
}

function select($tbl_name){
    $sql = "Select * from $tbl_name";
    $db=db_query($sql);
    return $db;
}

function insert($tbl_name,$db_values){
    $sql="INSERT INTO ".$tbl_name." VALUES( ".$db_values.");";
    echo $sql;
    return db_query($sql);
 }

function select_id($tbl_name,$field_name,$field_value){
    $sql = "Select * from ".$tbl_name." where ".$field_name." = ".$field_value."";
    $db=db_query($sql);
    return $db;
}

function select_where($tbl_name,$field_where){
    $sql = "Select * from ".$tbl_name." where ".$field_where."";
    $db=db_query($sql);
    return $db;
}

function update($tbl_name,$field_col,$field_where){
    $sql = "update ".$tbl_name.
           " SET ".$field_col.
           " WHERE ".$field_where;
    $db=db_query($sql);
    return $db;
}

function delete($tbl_name,$field_name,$field_value){

    $sql = "delete FROM ".$tbl_name." WHERE ".$field_name." = ".$field_value."";
    $db=db_query($sql);
    return $db;
}


?>
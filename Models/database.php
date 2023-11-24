<?php
    function  OpenDataBase(){
        return mysqli_connect("localhost:3306", "proyecto_ambiente", "123456", "proyecto_ambiente");
    }

    function closeDataBase($dataBase) {
        mysqli_close($dataBase);
    }

    function ExecuteQuery($sql) {
        $database = OpenDataBase();
        $recordSet = mysqli_query($database, $sql);
        closeDataBase($database);
        return $recordSet;
    }
?>
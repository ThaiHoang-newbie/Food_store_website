<?php

    function connect(){
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'company';
        $conn = mysqli_connect($host, $user, $pass, $dbname);
        return $conn;
    };
    ?>
<?php
    $servidor = "localhost";
    $banco = "bk";
    $usuario = "root";
    $senha = "";

    // colococar $servidor,$usuario,$senha,$banco
    $con = mysqli_connect($servidor,$usuario,$senha,$banco) or  die ("não foi possível conectar ao banco");
    
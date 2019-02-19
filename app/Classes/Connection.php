<?php

class Connection {

    private $user = "root";
    private $pass = "secret123";
    private $path = "mysql";
    private $bd = "webapi";
    private $con;

    public function __construct() {
        $this->con = mysqli_connect($this->path, $this->user, $this->pass) or die("Conexão com o banco de dados falhou!" . mysqli_error($this->con));
        mysqli_select_db($this->con, $this->bd) or die("Conexão com o banco de dados falhou!" . mysqli_error($this->con));
    }

    public function getCon() {
        return $this->con;
    }
}
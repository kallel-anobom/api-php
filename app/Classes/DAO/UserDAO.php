<?php

class UserDAO {

    private $connection;

    public function __construct() {
        $this->connection = new Connection();
    }

    public function consultAllUsers() {
        $sql = "SELECT * FROM usuarios";

        $result = mysqli_query($this->connection->getCon(), $sql);

        if (mysqli_num_rows($result) > 0 ) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function getByIdUser($id) {
        $sql = "SELECT * FROM usuarios WHERE id = '$id'";

        $result = mysqli_query($this->connection->getCon(), $sql);

        if (mysqli_num_rows($result) > 0 ) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function getBySexAndAgeUser($sex, $age) {
        $sql = "SELECT * FROM usuarios WHERE sexo = '$sex' AND idade >= '$age'";

        $result = mysqli_query($this->connection->getCon(), $sql);

        if (mysqli_num_rows($result) > 0 ) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function getAddressByIdUser($id) {
        $sql = "SELECT e.id_usuario, e.pais, e.estado, e.cidade, e.logradouro, u.id, u.nome, u.sobrenome, u.idade, u.sexo
                FROM address AS e INNER JOIN usuarios AS u ON(e.id_usuario = u.id) WHERE u.id = '$id'";

        $result = mysqli_query($this->connection->getCon(), $sql);

        if (mysqli_num_rows($result) > 0 ) {
            return $result;
        } else {
            return FALSE;
        }
    }
}
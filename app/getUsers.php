<?php

include '/var/www/html/Classes/Connection.php';
include '/var/www/html/Classes/DAO/UserDAO.php';

$userDAO = new UserDAO();

$getID = $_GET['id'];
$getSex = $_GET['sexo'];
$getAge = $_GET['idade'];

$query = $userDAO->consultAllUsers();
$queryById = $userDAO->getByIdUser($getID);
$queryByIdInAddress = $userDAO->getAddressByIdUser($getID);

$queryBySexAndAge = $userDAO->getBySexAndAgeUser($getSex, $getAge);


if($getID) {

    if ($queryById == true) {
        for ($i = 0; $i < mysqli_num_rows($queryById); $i++) {
            $linha = mysqli_fetch_array($queryById);
    
            $result[] = array(
                'id' => $linha['id'],
                'nome' => $linha['nome'],
                'sobrenome' => $linha['sobrenome'],
                'idade' => $linha['idade'],
                'sexo' => $linha['sexo'],
            );
        }
    }

} elseif ($queryBySexAndAge) {

    if ($queryBySexAndAge == true) {
        for ($i = 0; $i < mysqli_num_rows($queryBySexAndAge); $i++) {
            $linha = mysqli_fetch_array($queryBySexAndAge);
    
            $result[] = array(
                'id' => $linha['id'],
                'nome' => $linha['nome'],
                'sobrenome' => $linha['sobrenome'],
                'idade' => $linha['idade'],
                'sexo' => $linha['sexo'],
            );
        }
    }

} else {

    if ($query == true) {
        for ($i = 0; $i < mysqli_num_rows($query); $i++) {
            $linha = mysqli_fetch_array($query);
    
            $result[] = array(
                'id' => $linha['id'],
                'nome' => $linha['nome'],
                'sobrenome' => $linha['sobrenome'],
                'idade' => $linha['idade'],
                'sexo' => $linha['sexo'],
            );
        }

    }

}

echo json_encode($result);
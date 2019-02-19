<?php

include '/var/www/html/Classes/Connection.php';
include '/var/www/html/Classes/DAO/UserDAO.php';

$userDAO = new UserDAO();

$getID = $_GET['id'];

$queryByIdInAddress = $userDAO->getAddressByIdUser($getID);


if($getID) {

    if ($queryByIdInAddress == true) {
        for ($i = 0; $i < mysqli_num_rows($queryByIdInAddress); $i++) {
            $linha = mysqli_fetch_array($queryByIdInAddress);
    
            $result[] = array(
                'id' => $linha['id'],
                'nome' => $linha['nome'],
                'sobrenome' => $linha['sobrenome'],
                'idade' => $linha['idade'],
                'sexo' => $linha['sexo'],
                'pais' => $linha['pais'],
                'estado' => $linha['estado'],
                'cidade' => $linha['cidade'],
                'logradouro' => $linha['logradouro'],
            );
        }
    }

} 

echo json_encode($result);
<?php
require 'database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

  // Create.
  $sql = "INSERT INTO clientes ( id, usuario, senha, cep, cidade ) VALUES ( NULL, '{$request->usuario}', '{$request->senha}', '{$request->cep}', '{$request->cidade}')";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $customer = [
      'usuario' => $request->usuario,
      'senha' => $request->senha,
      'cep' => $request->cep,
      'cidade' => $request->cidade,
      'id'    => mysqli_insert_id($con)
    ];
    echo json_encode($customer);
  }
  else
  {
    http_response_code(422);
  }
}
?>
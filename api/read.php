<?php
/**
 * Returns the list of customers.
 */
require 'database.php';

$clientes = [];
$sql = "SELECT id, usuario, senha, cep, cidade FROM clientes";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $clientes[$i]['id']    = $row['id'];
    $clientes[$i]['usuario'] = $row['usuario'];
    $clientes[$i]['senha'] = $row['senha'];
    $clientes[$i]['cep'] = $row['cep'];
    $clientes[$i]['cidade'] = $row['cidade'];
    $i++;
  }

  echo json_encode($clientes);
}
else
{
  http_response_code(404);
}
?>

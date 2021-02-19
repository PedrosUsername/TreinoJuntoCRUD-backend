<?php
require 'database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

  $id = mysqli_real_escape_string($con, (int)$request->id);

  // Update.
  $sql = "UPDATE `clientes` SET `usuario`='$request->usuario',`senha`='$request->senha',`cep`='$request->cep',`cidade`='$request->cidade' WHERE `id` = '{$id}' LIMIT 1";

  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}
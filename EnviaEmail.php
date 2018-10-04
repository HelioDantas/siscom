<?php

$getPost = filter_input_array(Imput_post);


$Nome = $getPost["nome"];
$email = $getPost["email"];

include_once "";
include_once  "  ";

$Miler = new PHPMiler;
$Miler->Charset = "uft-8";
$Miler->SMTPDebug = 3;
$Miler->isSMTP();
$Miler->Host = "localHost";
$Miler->SMTPAuth = true;
$Miler->Username = "";
$Miler->Password = "";
$Miler->SMTPSecure = tls;
$Miler->Port = 587;
$Miler->FromName = "{$Nome}";
$Miler->from = "";
$Miler->addAddress();
$Miler->isHTML(true);
$Miler->Subject



?>
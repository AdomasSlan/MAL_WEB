<?php
setcookie("code", $_GET["code"]);
$code=$_GET["code"];
$ch = curl_init();
$Postdata = array(
    "client_id" => "ad4176c5dbfb57f011fd72efd9701d96",
    "grant_type" => "authorization_code",
    "code" => $code,
    "code_verifier" => "JbO6DwASy6zt48g44F6ED3T-jLo4zOaTlKb8DToWHqM",
    "client_secret" => "a2c49368a3378ffc5dd67fb91706146e5b66bd3df4fc0031e23d99e0b3a1b927"
);

curl_setopt($ch, CURLOPT_URL, "https://myanimelist.net/v1/oauth2/token");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($Postdata));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);
$server_output = json_decode($server_output, true);
setcookie("access_token", $server_output["access_token"]);

curl_close($ch);
header("Location: http://localhost/MangaList1");
die();


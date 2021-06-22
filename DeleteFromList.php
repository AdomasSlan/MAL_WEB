<?php

if (isset($_COOKIE["code"])) {
    $ch = curl_init();
    $ID = $_POST['ID'];
    $type = $_POST['type'];
    $authorization = "Authorization: Bearer " . $_COOKIE["access_token"];
    curl_setopt($ch, CURLOPT_URL, "https://api.myanimelist.net/v2/$type/$ID/my_list_status");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    $server_output = json_decode($server_output, true);
    curl_close($ch);
}
<?php
//TODO fix function
if (isset($_COOKIE["code"])) {
    $ch = curl_init();
    $ID = $_POST["ID"];
    $type = $_POST["type"];
    $status=$_POST["status"];
    $score=$_POST["score"];
    $data = array(
        "status" => $status,
        "score" => $score
    );
    $authorization = "Authorization: Bearer " . $_COOKIE["access_token"];
    //TODO type for url
    curl_setopt($ch, CURLOPT_URL, "https://api.myanimelist.net/v2/$type/$ID/my_list_status");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', $authorization));
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    $server_output = json_decode($server_output, true);

    curl_close($ch);
}

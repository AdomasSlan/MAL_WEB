<?php
if (isset($_COOKIE["code"])) {
    $ch = curl_init();
    $Status=$_POST['status'];
    if($Status=="all") $Status="";
    $authorization = "Authorization: Bearer " . $_COOKIE["access_token"];
    curl_setopt($ch, CURLOPT_URL, "https://api.myanimelist.net/v2/users/@me/animelist?status=$Status&fields=list_status,mean,media_type,alternative_titles&sort=list_score&limit=100" );
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    $server_output = json_decode($server_output, true);

    curl_close($ch);
    echo "<table class='table table-hover'>";
    echo "<tr>
      <th>Rank</th>
      <th>Title</th>
      <th>English title</th>
      <th>My score</th>
      <th>Score</th>
      <th>Picture</th>
      <th>Type</th>
      <th>Status</th>
    </tr>";
    foreach ($server_output["data"] as $key => $count) {
        echo "<tr class='active'  onclick='GetMangaDetails(".$count['node']['id'].");'>";
        echo "<td>" . $key + "1" . "</td>";
        echo "<td>" . $count["node"]["title"] . "</td>";
        echo "<td>" . $count["node"]["alternative_titles"]["en"] . "</td>";
        echo "<td>" . $count["list_status"]["score"] . "</td>";
        if(isset($count["node"]["mean"])) {
            echo "<td>" . $count["node"]["mean"] . "</td>";
        }
        else echo "<td>". "not enough votes"."</td>";
        if(isset($count["node"]["main_picture"]["medium"])) {
            echo "<td><img height='200px' src='" . $count["node"]["main_picture"]["medium"] . "'></td>";
        }
        else echo "<td>". "no picture"."</td>";
        echo "<td>" . $count["node"]["media_type"] . "</td>";
        echo "<td>" . $count["list_status"]["status"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

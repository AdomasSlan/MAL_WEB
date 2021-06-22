<?php
if (isset($_COOKIE["code"])) {
    $ch = curl_init();
    $authorization = "Authorization: Bearer " . $_COOKIE["access_token"];
    curl_setopt($ch, CURLOPT_URL, 'https://api.myanimelist.net/v2/anime/season/2021/spring?sort=anime_score&limit=100&fields=mean,alternative_titles,my_list_status');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    $server_output = json_decode($server_output, true);
    curl_close($ch);
    echo "<h1 style='text-align: center'>Currently airing anime</h1>";
    echo "<table class='table table-hover' >";
    echo "<tr>
      <th>Number</th>
      <th>Title</th>
      <th>English title</th>
      <th>Score</th>
      <th>Picture</th>
      <th>Status</th>
    </tr>";

    foreach ($server_output["data"] as $key => $count) {
        echo "<tr class='active'  onclick='GetAnimeDetails(".$count['node']['id'].");'>";
        echo "<td>" . $key + "1" . "</td>";
        echo "<td>" . $count["node"]["title"] . "</td>";
        echo "<td>" . $count["node"]["alternative_titles"]["en"] . "</td>";
        if(isset($count["node"]["mean"])) {
            echo "<td>" . $count["node"]["mean"] . "</td>";
        }
        else echo "<td>". "not enough votes"."</td>";
        echo "<td><img height='200px' src='" . $count["node"]["main_picture"]["medium"] . "'></td>";
        if(isset($count["node"]["my_list_status"]["status"])) {
            echo "<td>" . $count["node"]["my_list_status"]["status"] . "</td>";
        }
        else echo "<td>". ""."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

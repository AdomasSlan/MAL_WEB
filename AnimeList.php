<?php
if (isset($_COOKIE["code"])) {
    $ch = curl_init();
    $Type = $_POST["type"];

    $authorization = "Authorization: Bearer " . $_COOKIE["access_token"];
    curl_setopt($ch, CURLOPT_URL, "https://api.myanimelist.net/v2/anime/ranking?ranking_type=$Type&limit=500&fields=mean,media_type,alternative_titles,my_list_status");
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
      <th>Score</th>
      <th>Picture</th>
      <th>Type</th>
      <th>Status</th>
    </tr>";
foreach ($server_output["data"] as $count) {
    echo "<tr class='active'  onclick='GetAnimeDetails(" . $count['node']['id'] . ");'>";
    echo "<td>" . $count["ranking"]["rank"] . "</td>";
    echo "<td>" . $count["node"]["title"] . "</td>";
    echo "<td>" . $count["node"]["alternative_titles"]["en"] . "</td>";
    if (isset($count["node"]["mean"])) {
        echo "<td>" . $count["node"]["mean"] . "</td>";
    } else echo "<td>" . "not enough votes" . "</td>";
    echo "<td><img height='200px' src='" . $count["node"]["main_picture"]["medium"] . "'></td>";
    echo "<td>" . $count["node"]["media_type"] . "</td>";
    if (isset($count["node"]["my_list_status"]["status"])) {
        echo "<td>" . $count["node"]["my_list_status"]["status"] . "</td>";
    } else echo "<td>" . "" . "</td>";
    echo "</tr>";
}
echo "</table>";
}

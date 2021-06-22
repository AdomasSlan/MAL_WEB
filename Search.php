<?php
if (isset($_COOKIE["code"])) {
    $ch = curl_init();
    $searchInput =$_POST['searchInput'];
    $searchType =$_POST['searchType'];
    $authorization = "Authorization: Bearer " . $_COOKIE["access_token"];
    curl_setopt($ch, CURLOPT_URL, "https://api.myanimelist.net/v2/$searchType?q=$searchInput&fields=my_list_status");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    $server_output = json_decode($server_output, true);

    curl_close($ch);
    echo "<table class='table table-hover'>";
    echo "<tr>
      <th>Number</th>
      <th>Title</th>
      <th>Picture</th>
      <th>Status</th>
    </tr>";
    
    foreach ($server_output["data"] as $key => $count) {
        echo "<tr class='active'  onclick='Get".ucwords($searchType)."Details(" . $count['node']['id'] . ");'>";
        echo "<td>" . $key + "1" . "</td>";
        echo "<td>" . $count["node"]["title"] . "</td>";
        echo "<td><img height='200px' src='" . $count["node"]["main_picture"]["medium"] . "'></td>";

        if(isset($count["node"]["my_list_status"]["status"])) {
            echo "<td>" . $count["node"]["my_list_status"]["status"] . "</td>";
        }
        else echo "<td>". ""."</td>";
        echo "</tr>";
    }
    echo "</table>";
}
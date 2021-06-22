<?php

if (isset($_COOKIE["code"])) {
    $ch = curl_init();
    $AnimeID = $_POST['AnimeID'];
    $authorization = "Authorization: Bearer " . $_COOKIE["access_token"];
    curl_setopt($ch, CURLOPT_URL, "https://api.myanimelist.net/v2/anime/$AnimeID?fields=rank,alternative_titles,synopsis,media_type,my_list_status,mean,rank,start_date,end_date,studios");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    $server_output = json_decode($server_output, true);
    curl_close($ch);



    echo "<h1 style='text-align: center'>" . $server_output["title"] . "</h1>";
    echo "<div></div>";
    echo "<table>";
    echo "    <tr>
                <th></th>
                <th></th>
                <th width='300px' style='text-align: center'>User information</th>
              </tr>";
    echo "    <tr>";
    echo "        <td><img height='400px' src='" . $server_output["main_picture"]["large"] . "'></td>";
    echo "        <td style='vertical-align:top;margin-left:10px;'>" . "Synopsis:<br> " . $server_output["synopsis"] . "</td>";
    echo "        <td style='vertical-align:top;margin-left:10px;'>";
    echo "            <table style='margin-left:10px;'>";
    echo "                <tr>";
    echo "                    <td>" . "Status: " . "</td>";
    if (isset($server_output["my_list_status"]["status"])) {
        echo "<td>" . $server_output["my_list_status"]["status"] . "</td>";
    } else echo "<td>" . "" . "</td>";
    echo "                </tr>";
    echo "                <tr>";
    echo "                    <td>";
    echo "                    <a for='statusSelect'>Select status</a>";
    echo "                    </td>";
    echo "                    <td>";
    echo "                    <select class='form-control' id='statusSelect'>";
    echo "                    <option>watching</option>";
    echo "                    <option>completed</option>";
    echo "                    <option>on_hold</option>";
    echo "                    <option>dropped</option>";
    echo "                    <option>plan_to_watch</option>";
    echo "                    </select>";
    echo "                    </td>";
    echo "                </tr>";
    echo "                <tr>";
    echo "                    <td>" . "Score: " . "</td>";
    if (isset($server_output["my_list_status"]["score"])) {
        echo "<td>" . $server_output["my_list_status"]["score"] . "</td>";
    } else echo "<td>" . "" . "</td>";
    echo "                </tr>";
    echo "                <tr>";
    echo "                    <td>";
    echo "                    <a for='scoreSelect'>Select status</a>";
    echo "                    </td>";
    echo "                    <td>";
    echo "                    <select class='form-control' id='scoreSelect'>";
    echo "                    <option>10</option>";
    echo "                    <option>9</option>";
    echo "                    <option>8</option>";
    echo "                    <option>7</option>";
    echo "                    <option>6</option>";
    echo "                    <option>5</option>";
    echo "                    <option>4</option>";
    echo "                    <option>3</option>";
    echo "                    <option>2</option>";
    echo "                    <option>1</option>";
    echo "                    </select>";
    echo "                    </td>";
    echo "                </tr>";
    echo "                <tr>";
    echo "                <td>";
    echo "                <button class='btn btn-success' onclick='UpdateMyList(" . $server_output['id'] . ",\"anime\");'>Update</button>";
    echo "                </td>";
    echo "                <td>";
    echo "                <button class='btn btn-danger' onclick='DeleteFromList(" . $server_output['id'] .",\"anime\");'>Delete</button>";
    echo "                </td>";
    echo "                </tr>";
    echo "            </table>";
    echo "        </td>";
    echo "    </tr>";
    echo "</table>";
    echo "<div></div>";
    echo "<table>";
    echo "    <tr>";
    echo "        <td>English title: </td>";
    echo "        <td>" .$server_output["alternative_titles"]["en"] . "</td>";
    echo "    </tr>";
    echo "    <tr>";
    echo "        <td>Media type: </td>";
    echo "        <td>" .$server_output["media_type"]. "</td>";
    echo "    </tr>";
    echo "    <tr>";
    echo "        <td>Score: </td>";
    if (isset($server_output["mean"])) {
        echo "<td>" . $server_output["mean"] . "</td>";
    } else echo "<td>" . "not enough votes" . "</td>";
    echo "    </tr>";
    echo "    <tr>";
    echo "        <td>Start Date: </td>";
    echo "        <td>" .$server_output["start_date"]. "</td>";
    echo "    </tr>";    echo "    <tr>";
    echo "        <td>End date: </td>";
    if (isset($server_output["end_date"])) {
        echo "<td>" . $server_output["end_date"] . "</td>";
    } else echo "<td>Unknown</td>";
    echo "    </tr>";
    echo "    <tr>";
    echo "        <td>Animation studios:</td>";
    echo "        <td>";
    echo "            <table>";
    foreach ($server_output["studios"] as $count) {
        echo"<tr>";
        echo "        <td>".$count["name"]."</td>";
        echo "</tr>";
    }
    echo "            </table>";
    echo "        </td>";
    echo "   </tr>";
    echo "</table>";


}


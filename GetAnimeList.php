<?php
echo "<ul class='nav nav-tabs'>";
echo "    <li class='nav-item'>";
echo "        <a class='nav-link active' data-toggle='tab' href='#all'>All</a>";
echo "    </li>";
echo "    <li class='nav-item'>";
echo "        <a class='nav-link' data-toggle='tab' href='#tv'>tv</a>";
echo "    </li>";
echo "    <li class='nav-item'>";
echo "        <a class='nav-link' data-toggle='tab' href='#ova'>ova</a>";
echo "    </li>";
echo "    <li class='nav-item'>";
echo "        <a class='nav-link' data-toggle='tab' href='#movie'>manhwa</a>";
echo "    </li>";
echo "</ul>";
echo "<div id=\"myTabContent\" class=\"tab-content\">";
echo "  <div class=\"tab-pane fade show active\" id=\"all\"></div>";
echo "  <div class=\"tab-pane fade\" id=\"tv\"></div>";
echo "  <div class=\"tab-pane fade\" id=\"ova\"></div>";
echo "  <div class=\"tab-pane fade\" id=\"movie\"></div>";
echo "</div>";

echo "<script>";
echo "AnimeList(\"all\");";
echo "AnimeList(\"tv\");";
echo "AnimeList(\"ova\");";
echo "AnimeList(\"movie\");";
echo "</script>";



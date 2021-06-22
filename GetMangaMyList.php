<?php

echo "<ul class='nav nav-tabs'>";
echo "    <li class='nav-item'>";
echo "        <a class='nav-link active' data-toggle='tab' href='#all'>All</a>";
echo "    </li>";
echo "    <li class='nav-item'>";
echo "        <a class='nav-link' data-toggle='tab' href='#reading'>reading</a>";
echo "    </li>";
echo "    <li class='nav-item'>";
echo "        <a class='nav-link' data-toggle='tab' href='#completed'>completed</a>";
echo "    </li>";
echo "    <li class='nav-item'>";
echo "        <a class='nav-link' data-toggle='tab' href='#on_hold'>on hold</a>";
echo "    </li>";
echo "    <li class='nav-item'>";
echo "        <a class='nav-link' data-toggle='tab' href='#dropped'>dropped</a>";
echo "    </li>";echo "
    <li class='nav-item'>";
echo "        <a class='nav-link' data-toggle='tab' href='#plan_to_read'>plan to read</a>";
echo "    </li>";
echo "</ul>";
echo "<div id=\"myTabContent\" class=\"tab-content\">";
echo "  <div class=\"tab-pane fade show active\" id=\"all\"></div>";
echo "  <div class=\"tab-pane fade\" id=\"reading\"></div>";
echo "  <div class=\"tab-pane fade\" id=\"completed\"></div>";
echo "  <div class=\"tab-pane fade\" id=\"on_hold\"></div>";
echo "  <div class=\"tab-pane fade\" id=\"dropped\"></div>";
echo "  <div class=\"tab-pane fade\" id=\"plan_to_read\"></div>";
echo "</div>";

echo "<script>";
echo "MangaMyList(\"all\");";
echo "MangaMyList(\"reading\");";
echo "MangaMyList(\"completed\");";
echo "MangaMyList(\"on_hold\");";
echo "MangaMyList(\"dropped\");";
echo "MangaMyList(\"plan_to_read\");";
echo "</script>";


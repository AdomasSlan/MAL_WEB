<?php
session_start();
if (isset($_COOKIE["code"])){
    echo 1;
}
else echo 0;

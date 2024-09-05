<?php

$conn = mysqli_connect("localhost", "root", "", "mysylhet");

if (!$conn) {
    echo "Connection Failed";
}
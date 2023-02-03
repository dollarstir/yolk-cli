<?php
header('Content-Type: application/json');
$projectname = $_GET['name'];
$newurl = 'https://phpyolk.com/Archive.zip';




echo json_encode($newurl);
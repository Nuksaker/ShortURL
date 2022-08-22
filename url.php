<?php
require_once 'Config/db.php';
$url = $_REQUEST['u'];
// echo $url;

$check = $conn->prepare("SELECT full_url, click FROM `url` WHERE short_url = '$url'");
$check->execute();
$row = $check->fetch(PDO::FETCH_ASSOC);

// echo '<br>'.$row->full_url;
// echo '<br>'.$row->click;

if (!empty($row)) {
    $click = $row['click'] + 1;
    // echo '<br>' . $click;
}

$instClick = $conn->prepare("UPDATE `url` SET click=:click WHERE short_url = '$url'");
$instClick->bindParam(":click", $click, PDO::PARAM_INT);
$instClick->execute();
// print_r($row);
$full_url = $row['full_url'];
header("Location: $full_url");


<?php
require_once '../Config/db.php';
if ($_REQUEST['full_url']) {
    $full_url = $_POST['full_url'];
    $n = 8;

    // $servername = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].$short_url;
    $checkURL = $conn->prepare("SELECT * FROM url WHERE full_url = '$full_url'");
    $checkURL->execute();
    $rowURL = $checkURL->fetch(PDO::FETCH_ASSOC);

    if (empty($rowURL)) {
        $short_url = GenerateURL($n);
        $servername = $_SERVER['SERVER_NAME'] . '/shorturl/url?u=' . $short_url;
        $insetUrl = $conn->prepare("INSERT INTO url(full_url, short_url) VALUE(:full_url, :short_url)");
        $insetUrl->bindParam(":full_url", $full_url, PDO::PARAM_STR);
        $insetUrl->bindParam(":short_url", $short_url, PDO::PARAM_STR);
        $insetUrl->execute();
        // echo json_encode('ยังไม่มี');
    } else {
        $history = $rowURL['history'] + 1;
        $short = $rowURL['short_url'];
        $servername = $_SERVER['SERVER_NAME'] . '/shorturl/url?u=' . $rowURL['short_url'];
        $updateHistory = $conn->prepare("UPDATE `url` SET history=:history WHERE short_url = '$short'");
        $updateHistory->bindParam(":history", $history, PDO::PARAM_INT);
        $updateHistory->execute();
        // echo json_encode('มีแล้ว');
    }
    echo json_encode($servername);
}



function GenerateURL($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

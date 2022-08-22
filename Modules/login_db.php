<?php
require_once '../Config/db.php';
if ($_REQUEST['password']) {

    $stmt = $conn->prepare("SELECT password FROM user");
    $stmt->execute();
    $pass = $stmt->fetch(PDO::FETCH_OBJ);

    if ($_REQUEST['password'] == $pass->password) {
        echo json_encode(1);
    } else {
        echo json_encode(0);
    }
}

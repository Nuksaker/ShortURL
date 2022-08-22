<?php
require_once '../Config/db.php';

if ($_REQUEST['id']) {
    $id = $_REQUEST['id'];
    $delete = $conn->prepare('DELETE FROM `url` WHERE id = :id');
    $delete->bindParam(':id', $id);
    $delete->execute();
    // echo json_encode(1);
}

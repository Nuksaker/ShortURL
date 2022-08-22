<?php
require_once '../Config/db.php';

echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
if (isset($_REQUEST['insertData'])) {
    $full_url = $_POST['full_url'];
    $n = 8;
    $short_url = GenerateURL($n);

    if (empty($full_url)) {
        echo '<script>
        setTimeout(function() {
         swal({
             title: "กรุณากรอกข้อมูล",
             type: "error"
         }, function() {
             window.location = "../"; //หน้าที่ต้องการให้กระโดดไป
         });
       }, 500);
    </script>';
    } else {
        $checkURL = $conn->prepare("SELECT * FROM url WHERE full_url = '$full_url' OR short_url = '$short_url'");
        $checkURL->execute();
        $rowURL = $checkURL->fetchAll();
        // echo $full_url . '<br>';
        // echo $short_url . '<br>';

        if (!empty($rowURL)) {
            echo "มีข้อข้อมูลนี้อยู่แล้ว";
            echo '<script>
                        setTimeout(function() {
                        swal({
                            title: "มีเว็ปนี้อยู่แล้ว",
                            text: "มีเว็ปไซต์นี้อยู่ในระบบแล้ว !!"
                            type: "warning"
                        }, function() {
                            window.location = "../"; //หน้าที่ต้องการให้กระโดดไป
                        });
                    }, 500);
                </script>';
            // echo json_encode(0);
        } else {
            $insetUrl = $conn->prepare("INSERT INTO url(full_url, short_url) VALUE(:full_url, :short_url)");
            $insetUrl->bindParam(":full_url", $full_url, PDO::PARAM_STR);
            $insetUrl->bindParam(":short_url", $short_url, PDO::PARAM_STR);
            $insetUrl->execute();
            // echo json_encode(1);
            // echo "เพิ่มเรียบร้อย";
            echo '<script>
                            setTimeout(function() {
                            swal({
                                title: "เพิ่มเรียบร้อย",
                                type: "success"
                            }, function() {
                                window.location = "../"; //หน้าที่ต้องการให้กระโดดไป
                            });
                          }, 500);
                </script>';
        }
    }
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
  
// echo GeanareteShort($n);

<?php
require_once 'Config/db.php';
if (isset($_REQUEST['u'])) {
    $url = $_REQUEST['u'];
    // echo $url;

    $check = $conn->prepare("SELECT full_url, click FROM `url` WHERE short_url = '$url'");
    $check->execute();
    $row = $check->fetch(PDO::FETCH_OBJ);

    // echo '<br>'.$row->full_url;
    // echo '<br>'.$row->click;

    $click = $row->click + 1;

    echo '<br>' . $click;
    $instClick = $conn->prepare("UPDATE `url` SET click=:click WHERE short_url = '$url'");
    $instClick->bindParam(":click", $click, PDO::PARAM_INT);
    $instClick->execute();
    print_r($row);

    header("Location: $row->full_url");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Short URL</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        td {
            vertical-align: middle;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header bg-white mt-3">
                <h1 class="text-center ">Short URL</h1>
            </div>
            <div class="card-body">
                <form action="Modules/Insert.php" method="post">
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <span type="text" class="form-control-plaintext h6 text-end" id="staticEmail2">URL</span>
                        </div>
                        <div class="col-6">
                            <label for="fullURL" class="visually-hidden"></label>
                            <input type="text" class="form-control" name="full_url" id="fullURL" placeholder="Full URL">
                        </div>
                        <div class="col-3">
                            <button type="submit" name="insertData" id="addShort" class="btn btn-primary">Short URL</button>
                            <!-- <button id="summit" class="btn btn-primary mb-3">Short URL</button> -->
                            <!-- <button type="button" id="editShort" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ShortURL"> -->
                            <!-- Short URL -->
                            <!-- </button> -->
                        </div>
                    </div>
                </form>

                <div class="container my-3 w-auto">
                    <table class="table table-hover ">
                        <thead class="text-center">
                            <th style="width: 5vw;">ลำดับ</th>
                            <th style="width: 40vw;">Full URL</th>
                            <th style="width: 10vw;">จำนวนการคลิก</th>
                            <th style="width: 30vw;">Short URL</th>
                            <th style="width: 15vw;">QR Code</th>
                        </thead>
                        <tbody class="text-center" id="dataURL">
                            <?php
                            require_once 'Modules/data.php';
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <footer class="position-fixed bottom-0 end-0 w-100 bg-white" style="height: 25px;">
        <div class="container-fluid">
            <div class="row text-end">
                <div class="col-12">
                    <div class="copyright text-sm y">
                        <span class="text-bold">Sorawit Siamhong</span>
                    </div>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // $("#addShort").on("click", function() {
        //     FullURL = $("#fullURL").val();
        //     if (FullURL == '') {
        //         Swal.fire(
        //             'ไม่มีข้อมูล Full URL!',
        //             'กรุณากรอกข้อมูลลิ้ง !!!',
        //             'error'
        //         )
        //     }
        // })
    </script>

</html>
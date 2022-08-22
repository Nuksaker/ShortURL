<?php
require_once 'Config/db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Short URL</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <style>
        td {
            vertical-align: middle;
        }

        .text__footer {
            font-weight: bolder;
        }
        .dataTables_length{
            display: none;
        }
    </style>
</head>

<body class="bg-info">
    <div class="container-fluid mt-5 d-flex justify-content-center">
        <div class="card ">
            <div class="card-header bg-white mt-3">
                <div class="row">
                    <h1 class="text-center">Short URL</h1>
                </div>
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
                            <button type="submit" name="insertData" id="addShort" class="btn btn-primary">Short</button>
                        </div>
                    </div>
                </form>

                <div class="container my-5 w-auto">
                    <div class="table-responsive">
                        <table class="table table-hover" id="myTable">
                            <thead class="text-center">
                                <th style="width: 5vw;">#</th>
                                <th style="width: 40vw;">Full URL</th>
                                <th style="width: 10vw;">Click</th>
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
    </div>


    <footer class="position-fixed bottom-0 end-0 w-100 bg-info" style="height: 25px;">
        <div class="container-fluid">
            <div class="row text-end">
                <div class="col-12">
                    <div class="copyright">
                        <span class="text-bold text-white text__footer">Sorawit Siamhong</span>
                    </div>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                ordering: false,
                // lengthMenu: false,
                oLanguage: {
                    sSearch: "ค้นหาเว็ปไซต์",
                },
                language: {
                    zeroRecords: 'ยังไม่มีนักศึกษาในกลุ่มเรียน',
                    info: 'Page _PAGE_ to _PAGES_',
                    infoEmpty: 'No records available',
                    infoFiltered: '(filtered from _MAX_ total records)',
                },
            });
        });
    </script>

</html>
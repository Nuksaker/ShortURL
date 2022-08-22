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
            font-weight: bold;
        }

        .dataTables_length {
            display: none;
        }

        table.dataTable thead th {
            text-align: center;
        }
    </style>
</head>

<body class="bg-info">
    <nav class="navbar bg-info">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"></span>
            <button class="btn bg-light text-end text-boder" id="logout">Loout</button>
        </div>
    </nav>
    <div class="container-fluid d-flex justify-content-center">
        <div class="card ">
            <div class="card-header bg-white mt-3">
                <div class="row">
                    <h1 class="text-center">Short URL</h1>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="table-responsive mb-3 w-auto">
                        <table class="table table-hover w-100" id="myTable">
                            <thead class="text-center">
                                <th>#</th>
                                <th>Full URL</th>
                                <th style="width: 5vw;">Click</th>
                                <th style="width: 5vw;">History URL</th>
                                <th>Short URL</th>
                                <th style="width: 7vw;">QR Code</th>
                                <th>Delete</th>
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

        $("#logout").on("click", function() {
            logout()
        })

        function logout() {
            Swal.fire({
                title: 'ต้องการออกจากระบบ !',
                text: "คุณต้องการออกจากระบบหรือไม่",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ต้องการออกจากระบบ',
                cancelButtonText: 'ไม่, ไม่ต้องการ',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "./";
                }
            })
        }

        $(".delete").each(function() {
            $(this).on("click", function() {
                let id = $(this).attr("data-delete");
                Swal.fire({
                    title: 'ต้องการลบข้อมูลนี้ ?',
                    text: "คุณต้องการลบข้อมูลนี้ออกจากระบบ!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'ใช่, ต้องการลบข้อมูล!',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.isConfirmed) {
                        del(id);
                    }
                })
            })
        })

        function del(id) {
            // alert(id);
            $.ajax({
                type: 'POST',
                url: 'Modules/delete.php',
                data: {
                    id: id
                },
                success: function(respones) {
                    location.reload(true);
                }
            })
        }
    </script>

</html>
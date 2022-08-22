<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Short URL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        /* .data_short {
            height: 350px;
        } */
    </style>
</head>

<body class="bg-info">
    <nav class="navbar bg-info">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"></span>
            <button class="btn bg-light text-end text-boder" id="login">Login</button>
        </div>
    </nav>
    <div class="d-flex justify-content-center align-items-center" style="height: 65vh;">
        <div class="container w-auto">
            <div class="card h-auto">
                <div class="card-header bg-white border-bottom-0">
                    <h1 class="text-center">Short URL</h1>
                </div>
                <div class="card-body my-3">
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <span type="text" class="form-control-plaintext h6 text-end" id="staticEmail2">URL</span>
                        </div>
                        <div class="col-6">
                            <label for="fullURL" class="visually-hidden"></label>
                            <input type="text" class="form-control" name="full_url" id="fullURL" placeholder="Full URL">
                        </div>
                        <div class="col-3">
                            <button id="addShort" class="btn btn-primary">Short</button>
                        </div>
                    </div>
                    <div class="row data_short p-4">
                        <div class="card h-auto">
                            <div class="card-body ">
                                <p class="text-center" id="text_title">
                                    <span class="h3">กรอกข้อมูล Full URL</span>
                                </p>
                                <p class="text-center py-3" id="QrCode">
                                    <!-- ดึงข้อมูลจาก ajex -->
                                </p>
                                <p class="text-center" id="Short">
                                    <a href="#" class="form-control-plaintext h6" id="TextShort" target="_blank">shortURL</a>
                                    <!-- <button class="btn bg-info text-white w-100" id="CopyShort">Copy</button> -->
                                </p>
                            </div>
                        </div>
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
                        <span class="text-white text__footer">Sorawit Siamhong</span>
                    </div>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>

    <script>
        $("#addShort").attr("disabled", true);
        $("#TextShort").hide();
        $("#QrCode").hide();
        $("#Short").hide();
        $("#addShort").on("click", function() {
            let fullurl = $("#fullURL").val();
            fetchshort(fullurl)
        })
        $("#fullURL").keyup(function() {
            let fullurl = $(this).val();
            if (fullurl == "") {
                $("#addShort").attr("disabled", true);
            } else if (fullurl != "") {
                $("#addShort").attr("disabled", false);
            }
        });

        function fetchshort(url) {
            $.ajax({
                type: "POST",
                url: "Modules/insert.php",
                data: {
                    full_url: url
                },
                success: function(respones) {
                    let short = JSON.parse(respones)
                    let path = '//' + short;
                    let QR_Code = 'https://api.qrserver.com/v1/create-qr-code/?size=140x140&data=' + short;
                    $("#text_title").hide();
                    $("#TextShort").show();
                    $("#Short").show();
                    $("#QrCode").show();
                    $("#TextShort").attr("href", path).html(short);
                    $("#QrCode").html("<img src=" + QR_Code + ">");
                }
            })
        }

        $("#login").on("click", function() {
            login()
        })

        async function login() {
            const {
                value: password
            } = await Swal.fire({
                title: 'กรอกรหัสผ่านเข้าสู่ระบบ',
                input: 'password',
                inputLabel: 'ADMIN',
                inputPlaceholder: 'Enter your password',
                inputAttributes: {
                    maxlength: 10,
                    autocapitalize: 'off',
                    autocorrect: 'off'
                }
            })
            if (password) {
                // Swal.fire(`Entered password: ${password}`)
                login_db(password);
            } else {
                Swal.fire(
                    'รหัสผ่าน !',
                    'กรุณากรอกรหัสผ่าน.',
                    'error'
                )
            }
        }

        function login_db(password) {
            $.ajax({
                type: 'POST',
                url: 'Modules/login_db.php',
                data: {
                    password: password
                },
                success: function(status) {
                    // let pass = JSON.parse(status);
                    // console.log(pass);
                    if (status == 1) {
                        window.location.href = "admin";
                    } else {
                        Swal.fire(
                            'รหัสผ่านไม่ถูกต้อง !',
                            'กรุณากรอกรหัสผ่านใหม่อีกครั้ง.',
                            'error'
                        )
                    }
                }
            })
        }
    </script>
</body>

</html>
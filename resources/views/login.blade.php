<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>

<body>
    <div class="l-background">
        <div class="box-login">
            <div class="title-login">Đăng nhập khong xai</div>
            <form class="form-login px-5">
                <label for="username" class="form-label">Tên đăng nhập</label>
                <div class="mb-3 d-flex form-custom">
                    <div class="d-inline-block icon-username"><i class="bi bi-person-circle"></i></div>
                    <input type="text" class="form-custom-input" id="username" name="username" placeholder="example@gmail.com">
                </div>
                <label for="password" class="form-label">Mật khẩu</label>
                <div class="mb-3 d-flex form-custom">
                    <div class="d-inline-block icon-password"><i class="bi bi-key-fill"></i></div>
                    <input type="password" class="form-custom-input" id="password" name="password" placeholder="123456789">
                </div>
                <div class="d-flex checkbox justify-content-center">
                    <div class="form-check mx-3 text-start">
                        <input class="form-check-input" type="radio" name="sinhvien" id="sinhvien">
                        <label class="form-check-label" for="sinhvien">
                            Sinh viên
                        </label>
                    </div>
                    <div class="form-check mx-3 text-end">
                        <input class="form-check-input" type="radio" name="admin" id="admin">
                        <label class="form-check-label" for="admin">
                            Admin
                        </label>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-check my-3">
                        <input class="form-check-input" type="checkbox" value="" id="rememberMe" checked>
                        <label class="form-check-label" for="rememberMe">
                            Ghi nhớ đăng nhập
                        </label>
                    </div>
                    <a href="#" class="forgetPass my-3">Quên mật khẩu?</a>
                </div>
                <div class="submit text-end my-3">
                    <input type="submit" class="btn btn-primary d-inline-block px-4" value="Đăng nhập">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
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
        <div class="row">
            @if($mess = Session::get('invalid'))
            <div class="alert alert-info" role="alert">
                {{$mess}}
            </div>
            @endif
        </div>
        <div class="box-login">
            <div class="title-login">Đăng nhập khong xai</div>
            <form class="form-login px-5" method="post" action="{{ route('myLogin') }}">
                @csrf

                <label for="username" class="form-label">Tên đăng nhập</label>
                <div class="mb-3 d-flex form-custom">
                    <div class="d-inline-block icon-username"><i class="bi bi-person-circle"></i></div>
                    <input type="text" class="form-custom-input" id="username" name="username" placeholder="Ex: 22211TT0001" required>
                    <x-input-error :messages="$errors->get('MSSV')" class="mt-2" />
                </div>
                @error('username')
                <div class="alert alert-danger" role="alert">
                    <!-- Bien $message cua laravel -->
                    {{$message}}
                </div>
                @enderror

                <label for="password" class="form-label">Mật khẩu</label>
                <div class="mb-3 d-flex form-custom">
                    <div class="d-inline-block icon-password"><i class="bi bi-key-fill"></i></div>
                    <input type="password" class="form-custom-input" id="password" name="password" required>
                </div>
                @error('password')
                <div class="alert alert-danger" role="alert">
                    <!-- Bien $message cua laravel -->
                    {{$message}}
                </div>
                @enderror
                <div class="d-flex checkbox justify-content-center">
                    <div class="form-check mx-3 text-start">
                        <input class="form-check-input" type="radio" name="permission" id="sinhvien" value="student" checked>
                        <label class="form-check-label" for="sinhvien">
                            Sinh viên
                        </label>
                    </div>
                    <div class="form-check mx-3 text-end">
                        <input class="form-check-input" type="radio" name="permission" id="admin" value="admin">
                        <label class="form-check-label" for="admin">
                            Người quản lý
                        </label>
                    </div>
                </div>
                @error('permission')
                <div class="alert alert-danger" role="alert">
                    <!-- Bien $message cua laravel -->
                    {{$message}}
                </div>
                @enderror
                <div class="d-flex">
                    <div class="form-check my-3">
                        <input class="form-check-input" type="checkbox" value="" id="rememberMe">
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
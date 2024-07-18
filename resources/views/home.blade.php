<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/index.css"> -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">

</head>

<body>
    <div class="i-banner">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="hidden-nav text-center"><i class="bi bi-caret-up-fill icon-nav-hidden"></i></div>
            <div class="container-fluid">
                <div class="navbar-before"></div>
                <a class="navbar-brand" href="#">
                    <div class="logo"></div>
                </a>
                <a class="navbar-brand" href="#">
                    <div class="title-home">Kí túc xá</div>
                    <div class="title-home-hidden px-5">TDC</div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav mx-5">
                        <li class="nav-item">
                            <a class="active px-3 btn btn-navigation" aria-current="page"
                                href="{{ route('home')}}">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="px-3 btn-navigation" aria-current="page"
                                href="{{ route('myRegister') }}">Đơn vào</a>
                        </li>
                        <li class="nav-item">
                            <?php if ($user != null) { ?>
                            <a class="active px-3 btn-navigation" aria-current="page"
                                href="{{ route('outKTX') }}">Đơn ra</a>
                            <?php } else {?>
                                <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="btn btn-navigation" type="submit">Đơn ra</button>
                                    </form>
                            <?php }?>

                        </li>
                        <li class="nav-item">
                        <a class="active px-3 btn-navigation" aria-current="page"
                        href="{{ route('rules') }}">Nội quy</a>
                        </li>
                        <li class="nav-item">
                            <a class="active px-3 btn-navigation" aria-current="page" href="#">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="box-event-personal text-center me-3">
                    <?php if ($user != null) { ?>
                    <div class="personal position-relative">
                        <i class="bi bi-gear-fill btn-event-personal"></i>
                        <div id="popup-personal" class="popup-personal">
                            <ul>
                                <li>
                                    <button id="yourButtonId" type="button" class="btn btn-primary">
                                        Xin ra KTX
                                    </button>

                                    <div id="yourModalId" class="modal fade" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Modal body text goes here.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="btn btn-outline-danger my-1" type="submit">Đăng xuất</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="name-person">{{$user->name}}</div>
                    <?php } else {
                        ?>
                    <a href="{{ route('login') }}" class="btn-login text-center">
                        <i class="bi bi-box-arrow-in-right icon-login"></i>
                        <div class="name-person">Đăng nhập</div>
                    </a>
                    <?php }
                        ?>
                </div>
            </div>
        </nav>
        <div class="i-pre-image-btn">&#60;</div>
        <div class="i-next-image-btn">&#62;</div>
    </div>
    <div class="i-about">
        <div class="container">
            <div class="i-title bg-primary text-white px-5 py-2">Thông tin</div>
            <div class="row">
                <div class="col-12 i-info px-3 py-3">
                   <b>
                    <h1>
                        
Chào mừng bạn đến với Kí túc xá TDC
                    </h1>
                    
                   </b>
                </div>
                <div class="col-12 col-md-6">
                    <div class="i-about-image-first"></div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="i-about-image-second-1 mb-3"></div>
                    <div class="i-about-image-second-2"></div>
                </div>
                <div class="col-12 i-info px-3 py-3 ">
                    Kí túc xá trường Cao đẳng Công nghệ Thủ Đức là nơi tiện nghi và thoải mái, với vị trí nằm trong khuôn viên trường mang lại sự thoải mái và tiết kiệm thời gian khi di chuyển cho sinh viên.
                   Khuôn viên thoáng mát, an toàn và bảo mật, cây xanh và nơi học tập thoải mái tạo ra một môi trường vừa kỹ luật riêng tư nhưng cũng không kém phần sôi động. Đến với Kí túc xá TDC bạn cũng cần phải tuân thủ những quy định của kí túc xá, nhưng đồng thời bạn sẽ rèn được tính kỷ luật và tự giác cũng như sự an toàn. Bạn còn chần chờ gì mà không đăng kí để trở thành thành viên của kí túc xá TDC với những ưu điểm tiện lợi, tiết kiệm thời gian và chi phí, kỷ luật và thoải mái!!!
                </div>
            </div>
        </div>
    </div>
    <div class="i-content">
        <div class="container">
            <div class="i-title bg-success text-white px-5 py-2">Đăng kí</div>
            <div class="i-info-content px-3 py-3">
                Bạn cần chuẩn bị các thông tin và giấy tờ liên quan như sau:
            </div>
            <div class="i-content-box mx-3 text-left">
                <div class="i-title-box bg-primary text-white">Hồ sơ</div>
                <div class="i-content-item" style="--i: 0;"> - Thẻ sinh viên</div>
                <div class="i-content-item" style="--i: 1;"> - Thẻ căn cước công dân (có gắn chip)</div>
                <div class="i-content-item" style="--i: 2;"> - 2 hình 3x4</div>
                <div class="i-content-item" style="--i: 3;"> - Số tiền đóng hồ sơ: 30.000vnd</div>
                <div class="i-content-item" style="--i: 4;"> - Các giấy tờ có liên quan</div>
            </div>
            <div class="text-right mx-3">
                <button class="btn btn-outline-primary mt-3"> Đăng kí ngay </button>
            </div>
            <div class="i-info-content px-3 text-center">
                Hoặc liên hệ đến trang quản trị sinh viên để được hỗ trợ:
            </div>
            <div class="i-content-box-contact d-flex justify-content-center my-4">
                <div class="i-content-item-contact mx-2">
                    <img src="/images/logo_facebook.png" alt="" class="i-content-icon" srcset="">
                </div>
                <div class="i-content-item-contact mx-2">
                    <img src="/images/ins_logo.jpg" alt="" class="i-content-icon" srcset="">
                </div>
                <div class="i-content-item-contact mx-2">
                    <img src="/images/zalo_logo.png" alt="" class="i-content-icon"
                        style="transform: scale(2); margin-top: 20px;" srcset="">
                </div>
            </div>
        </div>
    </div>
    <div class="i-event">
        <div class="i-pre-event-btn">&#60;</div>
        <div class="i-next-event-btn">&#62;</div>
        <div class="container">
            <div class="i-title bg-warning text-white px-5 py-2 mb-4">Tin nổi bật</div>
            <div class="row">
                @foreach ($events as $index => $event)
                    @if (true)
                        <div class="col-md-4 mb-4">
                            <div class="i-event-image">
                                <img class="i-event-image" src="/images/{{ $event->img }}" alt="">
                            </div>
                            <div class="i-event-title">{{ $event->title }}</div>
                            <div class="i-event-text">
                                {{ $event->content }}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="i-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.523387609766!2d106.7598254!3d10.852075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752755cc3274a5%3A0x4b637fd0b7f89e!2zNTMgVsO1IFbEg24gTmfDtG4sIExpbmggQ2hp4buBdSwgVGjhu6UgxJDhu6ljLCBI4buNYyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1svi!2s!4v1626862356625!5m2!1svi!2s"
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="i-footer">
            <div class="footer-background">
                <div class="container">
                    <div class="title-address-footer text-white">
                        Kí túc xá trường Cao Đẳng Công Nghệ Thủ Đức
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="address-footer">
                                <div class="icon-footer text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                                    </svg>
                                    <span class="address-first">Số 53 Võ Văn Ngân, Linh Chiểu, Thành Phố Thủ Đức, Thành
                                        phố
                                        Hồ Chí Minh hoặc </span>
                                    <span class="address-second">Số 29 Chương Dương, Linh Chiểu, Thủ Đức, Thành phố Hồ
                                        Chí
                                        Minh</span>
                                    <br><br>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                    </svg>
                                    <span class="phone-number-first">02838966825 (Phòng Tổ chức - Hành chính)</span>
                                </div>
                            </div>
                            <div class="phone-number-footer"></div>
                            <div class="email-footer"></div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="title-contact text-white"> Kết nối với chúng tôi </div>
                            <div class="i-footer-box-contact d-flex my-2">
                                <div class="i-footer-item-contact mx-2">
                                    <img src="/images/logo_facebook.png" alt="" class="i-footer-icon" srcset="">
                                </div>
                                <div class="i-footer-item-contact mx-2">
                                    <img src="/images/ins_logo.jpg" alt="" class="i-footer-icon" srcset="">
                                </div>
                                <div class="i-footer-item-contact mx-2">
                                    <img src="/images/zalo_logo.png" alt="" class="i-footer-icon"
                                        style="transform: scale(2); margin-top: 7px;" srcset="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            document.getElementById('yourButtonId').addEventListener('click', function () {
                var myModal = new bootstrap.Modal(document.getElementById('yourModalId'));
                myModal.show();
            });
            document.getElementById('yourModalId').addEventListener('hidden.bs.modal', function () {
                document.querySelectorAll('.modal-backdrop').forEach(function (backdrop) {
                    backdrop.remove();
                });
            });

        </script>
</body>

</html>
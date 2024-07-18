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
    <link href="{{ asset('css/registerIn.css') }}" rel="stylesheet">

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
                            <a class="active px-3 btn-navigation" aria-current="page" href="#">Nội quy</a>
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
    <div class="i-content">
        <div class="container">
            <div class="box-content my-5 px-5" style="border: 4px solid teal;">
                <div class="h1 font-weight-bold text-center my-5 text-info">Nội quy kí túc xá</div>
                <div class="title-rules font-weight-bold">Điều 1: Về thời gian</div>
                <div class="content-rules font-italic text-secondary">1.    Thời gian ra, vào KTX: từ 05g30 đến 22g30</div>
                <div class="content-rules font-italic text-secondary">2.    Thời gian tiếp khách: <br>
                <div class="ml-5">Trưa từ 11g00 đến 12g30 </div>
                <div class="ml-5">Chiều tối từ 16g30 đến 19g30 </div>
                </div>
                <div class="content-rules font-italic text-secondary">3.    Thời gian tự học: từ 20g00 đến 22g30
                </div>
                <br>

                <div class="title-rules font-weight-bold">Điều 2:  Những điều HS-SV phải làm</div>
                <div class="content-rules font-italic text-secondary">1.    Lễ độ, kính trọng thầy cô giáo, cán bộ nhân viên. Ăn mặc đúng đắn, thực hiện nếp sống văn minh. </div>
                <div class="content-rules font-italic text-secondary">2.    Ở đúng nơi được bố trí, không tự ý chuyển đổi phòng. </div>
                <div class="content-rules font-italic text-secondary">3.    Gởi xe, tiếp khách đúng nơi quy định. </div>
                <div class="content-rules font-italic text-secondary">4.    Nộp đủ và đúng hạn phí nội trú theo quy định.</div>
                <div class="content-rules font-italic text-secondary">5.    Nâng cao tinh thần cảnh giác, phát hiện, ngăn chặn hoặc báo cho nhân viên quản lý KTX về các hành vi, hiện tượng gây nguy hại đến con người và tài sản trong KTX. HS-SV phải có trách nhiệm đền bù thiệt hại, khắc phục hậu quả do mình làm hư hỏng, mất mát.</div>
                <div class="content-rules font-italic text-secondary">6.    Tích cực tham gia các hoạt động thi đua xây dựng KTX văn hoá, sinh hoạt chính trị, văn nghệ, thể dục, thể thao, phòng chống tệ nạn, công tác xã hội, hoạt động từ thiện, lao động vệ sinh và các hoạt động khác do nhà trường phát động. Tổ chức các sinh hoạt văn hoá, văn nghệ, không ảnh hưởng đến việc học tập, sinh hoạt của HS-SV khác trong phòng ở và khu nội trú. Đoàn kết với HS-SV trong khu nội trú.</div>
                <div class="content-rules font-italic text-secondary">7.    Giữ gìn hành lang, ban công sạch sẽ, phòng ở gọn gàng, ngăn nắp. </div>
                <div class="content-rules font-italic text-secondary">8.    Tích cực bảo vệ tài sản chung, tự bảo quản tài sản cá nhân, tài sản được trang bị trong KTX, trong phòng ở. Tiết kiệm điện, nước, phòng chống cháy nổ.</div>
                <div class="content-rules font-italic text-secondary">9.    Đăng ký sử dụng máy vi tính đúng quy định vào mục đích học tập, giải trí lành mạnh.</div>
                <div class="content-rules font-italic text-secondary">10.    Thực hiện đăng ký tạm trú theo đúng quy định của Luật cư trú hiện hành. Nếu vắng mặt tại khu nội trú quá 01 ngày phải báo với Quản lý KTX.</div>
                <div class="content-rules font-italic text-secondary">11.    Phản ánh kịp thời các vụ việc xảy ra trong nội trú liên quan đến HSSV vi phạm nội quy, quy chế và các đề xuất, kiến nghị chính đáng với Quản lý KTX.    </div>
                        <br>

                <div class="title-rules font-weight-bold">Điều 3: Các điều nghiêm cấm HSSV</div>
                <div class="content-rules font-italic text-secondary">1.    Cải tạo phòng, thay đổi hoặc tự ý di chuyển trang thiết bị trong phòng ở; gây mất trật tự, an ninh, vệ sinh môi trường.</div>
                <div class="content-rules font-italic text-secondary">2.    Dán giấy, tranh ảnh, viết vẽ, kẻ, đóng đinh trên tường, treo rèm, mắc võng trong phòng ở.</div>
                <div class="content-rules font-italic text-secondary">3.    Văng tục, chửi thề, có hành vi bạo lực, xúc phạm nhân phẩm, danh dự, xâm phạm thân thể, tài sản cá nhân của người khác.</div>
                <div class="content-rules font-italic text-secondary">4.    Tổ chức gây gổ, kích động hoặc tham gia đánh nhau gây mất trật tự trị an. </div>
                <div class="content-rules font-italic text-secondary">5.    Đun, nấu dưới mọi hình thức trong KTX.</div>
                <div class="content-rules font-italic text-secondary">6.    Tiếp bạn khác phái hoặc chứa chấp người lạ trong phòng.</div>
                <div class="content-rules font-italic text-secondary">7.    Sản xuất, buôn bán, vận chuyển, phát tán, tàng trữ, sử dụng hoặc lôi kéo người khác sử dụng vũ khí, chất nổ, các chất ma túy, các loại hoá chất cấm sử dụng, các tài liệu, ấn phẩm, thông tin phản động, đồi trụy mê tín dị đoan và các tài liệu cấm khác theo quy định của Nhà nước.</div>
                <div class="content-rules font-italic text-secondary">8.    Chứa chấp, che giấu hàng quốc cấm, tội phạm; phá hoại, ăn cắp của công, tài sản công dân.</div>
                <div class="content-rules font-italic text-secondary">9.    Tổ chức hoặc tham gia uống rượu, bia, đánh bài; mang thuốc lá, hút thuốc lá trong  KTX và các hình thức cờ bạc khác. </div>
                <div class="content-rules font-italic text-secondary">10.    Có hành vi mua bán dâm hoặc quan hệ nam nữ bất chính.</div>
                <div class="content-rules font-italic text-secondary">11.    Leo tường (rào) vào khuôn viên KTX, leo ban công, cửa sổ vào phòng ở, leo trèo, ngồi vắt vẻo trên ban công hoặc cửa sổ phòng; đùa giỡn, ca hát gây ồn ào, mất trật tự.</div>
                <div class="content-rules font-italic text-secondary">12.    Tự tiện câu móc điện, tháo gỡ, tự ý sửa chữa, điều chỉnh hệ thống điện, đèn, quạt của KTX.
                </div>
                        <br>
                        
                <div class="title-rules font-weight-bold">Điều 4: Khen thưởng – Kỷ luật</div>
                <div class="content-rules font-italic text-secondary">1.    HS-SV thực hiện tốt nội quy này sẽ được cộng điểm trong đánh giá kết quả rèn luyện vào cuối mỗi học kỳ, được nhà trường khen thưởng trong các đợt thi đua. </div>
                <div class="content-rules font-italic text-secondary">2.    HS-SV vi phạm nội quy này tùy hình thức, mức độ vi phạm hoặc tái phạm sẽ chịu kỷ luật của nhà trường.</div>
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
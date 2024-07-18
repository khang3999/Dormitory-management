<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

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
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="success-checkmark">
                        <div class="check-icon"></div>
                    </div>
                    <div class="text-success font-italic mt-3">
                        {{ session('success') }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                $('#successModal').modal('show');
            });
        </script>
    @endif
    <div class="r-content pb-4">
        <div class="container">
            <div class="title-navigation my-5">Đăng kí vào kí túc xá</div>
            <div class="text-navigation">Bạn hãy điền đầy đủ các thông tin dưới đây: </div>
            <div class="box-content my-3" style="line-height: 40px; vertical-align:middle;">
                <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-2 px-4 py-3">
                            <div id="avatarPreview" class="text-center box-avatar-3x4">Chọn ảnh</div>
                            <input type="file" id="fileInput" name="avatar" required style="display: none;">
                        </div>
                        <div class="col-md-9">
                            <div class="h4 mt-3 text-center">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</div>
                            <div class="text-country text-center">Độc lập - Tự do - Hạnh Phúc</div>
                            <hr class="mx-5">
                            <div class="title-application h4 mb-4 text-center font-weight-bold">ĐƠN XIN NỘI TRÚ KÍ TÚC
                                XÁ
                            </div>
                            <div class="d-block text-right">
                                <div class="d-inline-block h5 font-weight-bold mx-5">Kính gửi:</div>
                                <div class="d-inline-block h5 font-weight-bold">- Hiệu trưởng trường Cao Đẳng Công Nghệ
                                    Thủ
                                    Đức</div>
                            </div>
                            <div class="d-block h5 font-weight-bold text-right mx-5">- Phòng Công tác Chính trị - Học
                                sinh
                                sinh viên.</div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="box-data mx-5 my-4">

                        <div class="data d-flex justify-content-between">
                            <div class="mr-3">Họ và tên HSSV: </div>
                            <input class="input-name form-control" type="text" name="fullname" id="fullname" required>
                            <div class="gender text-right">
                                <div class="d-flex">
                                    <div class="form-check mx-3 text-start">
                                        <input class="form-check-input" type="radio" name="gender" id="nam" value="1"
                                            required>
                                        <label class="form-check-label" for="nam">
                                            Nam
                                        </label>
                                    </div>
                                    <div class="form-check mx-3 text-end">
                                        <input class="form-check-input" type="radio" name="gender" id="nu" value="0">
                                        <label class="form-check-label" for="nu">
                                            Nữ
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="data d-flex justify-content-between">
                            <div class="mr-3">Ngày sinh: </div>
                            <input class="input-day form-control" type="date" name="dayBorn" id="dayBorn" required>
                        </div>
                        <div class="data d-flex justify-content-between">
                            <div class="mr-5">Mail: </div>
                            <input class="input-email form-control" type="email" name="mail" id="mail" required>
                            <div class="mr-3">Dân tộc: </div>
                            <select name="ethnic" id="ethnic" class="input-ethnic form-control">
                                <option value="Kinh">Kinh</option>
                                <option value="Tày">Tày</option>
                                <option value="Thái">Thái</option>
                                <option value="Hoa">Hoa</option>
                                <option value="Khơ-me">Khơ-me</option>
                                <option value="Mường">Mường</option>
                                <option value="Nùng">Nùng</option>
                                <option value="H'mông">H'mông</option>
                                <option value="Dao">Dao</option>
                                <option value="Gia-rai">Gia-rai</option>
                                <option value="Ngái">Ngái</option>
                                <option value="Ê-đê">Ê-đê</option>
                                <option value="Ba-na">Ba-na</option>
                                <option value="Xơ-đăng">Xơ-đăng</option>
                                <option value="Sán Chay">Sán Chay</option>
                                <option value="Cơ-ho">Cơ-ho</option>
                                <option value="Chăm">Chăm</option>
                                <option value="Sán Dìu">Sán Dìu</option>
                                <option value="Hrê">Hrê</option>
                                <option value="Mnông">Mnông</option>
                                <option value="Ra-glai">Ra-glai</option>
                                <option value="Xtiêng">Xtiêng</option>
                                <option value="Bru-Vân Kiều">Bru-Vân Kiều</option>
                                <option value="Thổ">Thổ</option>
                                <option value="Giáy">Giáy</option>
                                <option value="Cơ-tu">Cơ-tu</option>
                                <option value="Gié-Triêng">Gié-Triêng</option>
                                <option value="Mạ">Mạ</option>
                                <option value="Khơ-mú">Khơ-mú</option>
                                <option value="Co">Co</option>
                                <option value="Tà-ôi">Tà-ôi</option>
                                <option value="Chơ-ro">Chơ-ro</option>
                                <option value="Kháng">Kháng</option>
                                <option value="Xinh-mun">Xinh-mun</option>
                                <option value="Hà Nhì">Hà Nhì</option>
                                <option value="Chu-ru">Chu-ru</option>
                                <option value="Lào">Lào</option>
                                <option value="La Chí">La Chí</option>
                                <option value="La Ha">La Ha</option>
                                <option value="Phù Lá">Phù Lá</option>
                                <option value="La Hủ">La Hủ</option>
                                <option value="Lự">Lự</option>
                                <option value="Lô Lô">Lô Lô</option>
                                <option value="Chứt">Chứt</option>
                                <option value="Mảng">Mảng</option>
                                <option value="Pà Thẻn">Pà Thẻn</option>
                                <option value="Cờ Lao">Cờ Lao</option>
                                <option value="Bố Y">Bố Y</option>
                                <option value="Cống">Cống</option>
                                <option value="Si La">Si La</option>
                                <option value="Pu Péo">Pu Péo</option>
                                <option value="Brâu">Brâu</option>
                                <option value="Ơ Đu">Ơ Đu</option>
                                <option value="Rơ-măm">Rơ-măm</option>
                            </select>
                        </div>
                        <div class="data d-flex justify-content-between">
                            <div class="mr-3">Thường trú tại: </div>
                            <input class="input-live form-control" type="text" name="liveIn" id="liveIn" required>
                        </div>
                        <div class="data d-flex justify-content-between">
                            <div class="mr-3">Là HSSV lớp: </div>
                            <input class="input-class form-control" type="text" name="class" id="class" required>
                            <div class="mr-1">Khóa: </div>
                            <input class="input-course form-control" type="number" min="0" max="24" step="1"
                                name="course" id="course" required>
                        </div>
                        <div class="data d-flex justify-content-between">
                            <div class="mr-3">Mã số HSSV: </div>
                            <input class="input-codeStudent form-control" type="text" name="codeStudent"
                                id="codeStudent" minlength="11" required>
                            <div class="mr-1">Số điện thoại: </div>
                            <input class="input-phoneNumber form-control" type="text" name="phoneNumber"
                                id="phoneNumber" minlength="10" required>
                        </div>
                        <div class="data d-flex justify-content-between">
                            <div class="mr-3">Ngành: </div>
                            <input class="input-live form-control" type="text" name="job" id="job" required>
                        </div>
                        <div class="data d-flex justify-content-between">
                            <div class="mr-3">CCCD số: </div>
                            <input class="input-live form-control" type="text" name="cccd" minlength="12" id="cccd"
                                required>
                        </div>
                        <div class="data d-flex justify-content-between">
                            <div class="mr-3">Đối tượng ưu tiên (nếu có): </div>
                            <input class="input-l form-control" type="text" name="uutien" id="uutien">
                        </div>
                        <div class="data d-block justify-content-between">
                            <div class="mr-3 font-italic">Đề nghị nhà trường xem xét, tiếp nhận tôi được nội trú Kí túc
                                xá
                                Trường Cao Đẳng Công Nghệ Thủ Đức.</div>
                            <div class="mr-3 font-italic">Tôi xin cam kết thực hiện đầy đủ các điều khoản được quy định
                                tại
                                Thông tư số 27/TT-BGDDT ngày 31/02/2024 của Bộ Giáo dục và đào tạo ban hành Quy chế công
                                tác
                                sinh viên, sinh viên nội trú tại các cơ sở giáo dục thuộc hệ thống giáo dục quốc dân và
                                nội
                                quy Kí túc xá hiện hành.</div>
                        </div>

                    </div>
                    <div class="row my-5">
                        <div class="col-6 text-center">
                            <div class="font-weight-bold date-create">Ý kiến của P.CT Chính trị - HSSV</div>
                        </div>
                        <div class="col-6 text-center">
                            <div id="current-date" class="font-italic"></div>
                            <div class="date-create font-weight-bold">Người làm đơn</div>
                            <div class="font-italic">(Kí tên, ghi rõ họ tên)</div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5 py-3 font-weight-bold">Đăng kí</button>
                    </div>
                </form>
                <hr>
                <div class="rule text-left mx-5">
                    <div class="title-rule font-weight-bold h3 my-5 text-center">TRÍCH DẪN NỘI QUY KÍ TÚC XÁ</div>
                    <div class="h5 my-2 font-weight-bold">Điều 3.Các hành vi HS-SV không được làm</div>
                    <div class=""><b>1.</b> Cải tạo phòng, thay đổi hoặc tự ý di chuyển trang thiết bị trong phòng ở;
                        gây mất trật tự, an ninh, vệ sinh môi trường; Dán giấy, tranh ảnh, viết vẽ, kẻ, đóng đinh trên
                        tường, treo rèm, mắc võng trong phòng ở.</div>
                    <div class=""><b>2.</b> Đun, nấu và sử dụng các thiết bị dễ gây cháy, nổ trong KTX; Tự ý câu móc,
                        tháo gỡ, sửa chữa, điều chỉnh hệ thống điện và các thiết bị điện của KTX; Tự tiện dịch chuyển,
                        làm hư hỏng các trang thiết bị PCCC trong KTX.</div>
                    <div class=""><b>3.</b> Tổ chức hoặc tham gia đánh bạc, mại dâm dưới mọi hình thức; Tổ chức hoặc
                        tham gia uống rượu bia; mang thuốc lá, hút thuốc lá trong KTX</div>
                    <div class=""><b>4.</b> Văng tục, chửi thề, có hành vi bạo lực, xúc phạm nhân phẩm, danh dự của
                        người khác; Tổ chức hoặc tham gia các hoạt động gây ồn ào, ảnh hưởng đến học tập, sinh hoạt của
                        HS - SV trong KTX; Kích động hoặc tham gia gây gỗ, đánh nhau gây mất trật tự an ninh KTX.</div>
                    <div class=""><b>5.</b> Leo tường, rào vào khuôn viên KTX; Leo trèo, ngồi ở ban công, cửa sổ phòng
                        ở.</div>
                    <div class=""><b>6.</b> Tiếp bạn khác phái (đang lưu trú tại KTX) trong phòng ở; Tiếp hoặc chứa chấp
                        khách (không phải là HS - SV đang lưu trú tại kí túc xá) trong phòng ở của KTX</div>
                    <div class=""><b>7.</b> Sản xuất, buôn bán, vận chuyển, phát tán, tàng trữ, sử dụng hoặc lôi kéo
                        người khác sử dụng vũ khí, chất nổ, các chất ma túy, các loại hóa chất cấm sử dụng, các tài
                        liệu, ấn phẩm, thông tin phản động, đồi trụy, mê tín dị đoan và các tài liệu cấm khác theo quy
                        định của Nhà nước; Chứa chấp, che dấu hàng quốc cấm; phá hoại, ăn cắp của công, tài sản của công
                        dân.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="i-footer">
        <div class="footer-background">
            <div class="container">
                <div class="title-address-footer text-white">
                    Kí túc xá trường Cao Đẳng Công Nghệ Thủ Đức
                </div>
                <div class="row">
                    <!-- Địa chỉ -->
                    <div class="col-8">
                        <div class="address-footer">
                            <div class="icon-footer text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                                </svg>
                                <span class="address-first">Số 53 Võ Văn Ngân, Linh Chiểu, Thành Phố Thủ Đức, Thành phố
                                    Hồ Chí Minh hoặc </span>
                                <span class="address-second">Số 29 Chương Dương, Linh Chiểu, Thủ Đức, Thành phố Hồ Chí
                                    Minh</span>
                                <br>
                                <br>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                </svg>
                                <span class="phone-number-first"></span>
                                <span class="phone-number-first">02838966825 (Phòng Tổ chức - Hành chính)</span>
                            </div>
                        </div>
                        <div class="phone-number-footer"></div>
                        <div class="email-footer"></div>
                    </div>
                    <!-- Contact -->
                    <div class="col-4">
                        <div class="title-contact text-white"> Kết nối với chúng tôi </div>
                        <div class="i-footer-box-contact d-flex my-2">
                            <div class="i-footer-item-contact">
                                <img src="/images/logo_facebook.png" alt="" class="i-footer-icon" srcset="">
                            </div>
                            <div class="i-footer-item-contact">
                                <img src="/images/ins_logo.jpg" alt="" class="i-footer-icon" srcset="">
                            </div>
                            <div class="i-footer-item-contact">
                                <img src="/images/zalo_logo.png" alt="" class="i-footer-icon"
                                    style="scale: 2; margin-top: 7px;" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>

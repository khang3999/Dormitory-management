<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$title ?? 'TDC-Dormitory'}}</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="{{ asset('css/style-admin.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body>
  <header>
    <!-- nền -->
    <div class="header-banner container py-4">
      <div class="row">
        <div class="col-2">
          <a class="img-fluid">
            <div class="logo"></div>
          </a>
        </div>
        <div class="col-10">
          <h1 class="text-center title text-white">Trang Quản Lí Ký Túc Xá TDC</h1>
          <div class="row mt-4">

            <div class="col-6 text-white">
              Địa chỉ: 53 Võ Văn Ngân, Linh Chiểu, Tp Thủ Đức, Tp Hồ Chí Minh
            </div>
            <div style="text-align: right" class="col-6 text-white">Số điện thoại: 0283 8966 825 - 028 3897 0023</div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- thanh tác vụ -->
  <div class="navbar row">
    <div class="col-3 d-flex justify-content-center">
      <a href="{{route('admin.rooms')}}" class="admin-btn"><i class="bi bi-buildings-fill me-1"></i>Quản lý phòng</a>
    </div>
    <div class="col-3 d-flex justify-content-center">
      <a href="{{route('admin.students')}}" class="admin-btn"><i class="bi bi-people-fill me-1"></i>Quản lý sinh viên</a>
    </div>
    <div class="col-3 d-flex justify-content-center">
      <a href="{{route('admin.posts')}}" class="admin-btn"><i class="bi bi-postcard-fill me-1"></i>Quản lý bài viết</a>
    </div>
    <div class="col-3 d-flex justify-content-center">
      <a href="#" class="admin-btn"><i class="bi bi-bar-chart-line-fill me-1"></i>Thống kê</a>
    </div>
  </div>
  <div class="row">
    <div class="col-1 navbarTrai py-3">
      <div class="typeOfStudentManagerment btnDonXin">
        <a href="{{route('admin.student-in')}}"><i class="bi bi-person-plus-fill"></i></a>
      </div>
      <div class="typeOfStudentManagerment btnDonXinRut">
        <a href="{{route('admin.student-out')}}"><i class="bi bi-person-dash-fill"></i></a>
      </div>
      <div class="typeOfStudentManagerment quanLyThongBao">
        <a href="{{route('admin.students')}}"><i class="bi bi-people-fill"></i></a>
      </div>
      <div class="typeOfStudentManagerment btnGhiChu">
        <a href="#ghichu"><i class="bi bi-card-checklist"></i></a>
      </div>

      <div class="typeOfStudentManagerment btnGhiChu">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn btn-danger" type="submit">Đăng xuất</button>
        </form>
      </div>
    </div>

    <div class="col-11 khungLamViec">
      {{$slot}}
    </div>
  </div>

  <div class="home">
    <a href="#">
      <i class="bi bi-house-door-fill" style="color: white"></i>
    </a>
  </div>

  <!-- Footer -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  {{$script ?? ''}}
</body>

</html>
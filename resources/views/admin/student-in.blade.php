<x-admin-layout>
    <x-slot:title>
        Đơn xin vào kí túc xá
    </x-slot:title>
    <div class="bang" id="donXinVao">
        <div class="tableName">Đơn xin vào kí túc xá</div>
        <div class="row py-2">
            <div class="col-8">
                <div class="checkbox-group">
                    <label for="checkbox1">
                        <input class="loc" type="checkbox" id="checkbox1" name="options" value="male" />
                        Giới tính nam
                    </label>
                    <label for="checkbox2">
                        <input class="loc" type="checkbox" id="checkbox2" name="options" value="female" />
                        Giới tính nữ
                    </label>
                    <label for="checkbox3">
                        <input class="loc" type="checkbox" id="checkbox3" name="options" value="priority" />
                        Trường hợp ưu tiên
                    </label>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group">
                    <input type="search" id="search-input" class="form-control rounded" placeholder="Tìm kiếm bằng tên"
                        aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" id="search-button" class="btn btn-outline-primary"
                        data-mdb-ripple-init>search</button>
                </div>
            </div>
        </div>
        {{-- DANH SÁCH SINH VIÊN --}}
        <div class="table-responsive bang-noi-dung">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-12">ID</th>
                        <th scope="col" class="text-12">Tên</th>
                        <th scope="col" class="text-12">MSSV</th>
                        <th scope="col" class="text-12">Email</th>
                        <th scope="col" class="text-12">Giới tính</th>
                        <th scope="col" class="text-12">Phone</th>
                        <th scope="col" class="text-12">CCCD</th>
                        <th scope="col" class="text-12">Ngày Sinh</th>
                        <th scope="col" class="text-12">Quê Quán</th>
                        <th scope="col" class="text-12">Dân Tộc</th>
                        <th scope="col" class="text-12">Ghi Chú</th>
                        <th scope="col" class="text-12">Thời Gian</th>
                        <th scope="col" class="text-12">Phòng</th>
                        <th scope="col" class="text-12">Công Cụ</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($students->isEmpty())
                        <p>Không có sinh viên nào để hiển thị.</p>
                    @else
                        @foreach ($students as $student)
                            <tr>
                                <td class="text-12">{{ $student->id }}</td>
                                <td class="text-12">{{ $student->name }}</td>
                                <td class="text-12">{{ $student->MSSV }}</td>
                                <td class="text-12">{{ $student->mail }}</td>
                                <td class="text-12">{{ $student->gender }}</td>
                                <td class="text-12">{{ $student->phone }}</td>
                                <td class="text-12">{{ $student->cccd }}</td>
                                <td class="text-12">{{ $student->birthday }}</td>
                                <td class="text-12 text-limit">{{ $student->address }}</td>
                                <td class="text-12">{{ $student->nation }}</td>
                                <td class="text-12 text-limit">{{ $student->note }}</td>
                                <td class="text-12">{{ $student->time }}</td>
                                <td class="text-12">{{ $student->room ? $student->room->name : 'Chưa có phòng' }}</td>
                                <td class="text-15">
                                    <i class="bi bi-app"></i>
                                    <i class="bi bi-pencil-square"></i>
                                    <i class="bi bi-eye" type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modalStudent" data-student-name="{{ $student->name }}"
                                        data-student-id="{{ $student->id }}" data-student-mssv="{{ $student->MSSV }}"
                                        data-student-mail="{{ $student->mail }}"
                                        data-student-gender="{{ $student->gender }}"
                                        data-student-phone="{{ $student->phone }}"
                                        data-student-cccd="{{ $student->cccd }}"
                                        data-student-birthday="{{ $student->birthday }}"
                                        data-student-address="{{ $student->address }}"
                                        data-student-nation="{{ $student->nation }}"
                                        data-student-note="{{ $student->note }}"
                                        data-student-time="{{ $student->time }}"
                                        data-student-phong="{{ $student->idphong }}"
                                        data-student-image="{{ $student->avatar }}" {{-- boSung --}}
                                        data-student-job="{{ $student->job }}"
                                        data-student-class="{{ $student->class }}"
                                        data-student-course="{{ $student->course }}">
                                    </i>
                                </td>
                                <!-- Thêm các trường khác nếu cần thiết -->
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>

        <div class="groupbutton">
            <button class="btn-file">Xuất file</button>
            <button class="btn-file">Nhập file</button>
        </div>
    </div>

    {{-- MODAL HIỂN THỊ CHI TIẾT CỦA SINH VIÊN --}}
    <div class="modal fade" id="modalStudent" tabindex="-1" role="dialog" aria-labelledby="modalStudentTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modalsinhvien">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalStudentTitle">Thông tin sinh viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="studentForm">
                    @csrf
                    <div class="modal-body row">
                        <input type="hidden" name="student_id" id="student-id">
                        <div class="form-group col-md-6" style="display: none">
                            <label for="student-id-display">ID:</label>
                            <input type="text" class="form-control" id="student-id-display" name="student_id"
                                readonly>
                        </div>
                        <div class="form-group col-md-12 text-center">
                            <img class="student-image " id="student-image" src="" alt="Student Image"
                                class="img-fluid rounded">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="student-name">Tên:</label>
                            <input type="text" class="form-control" id="student-name" name="name" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="student-mssv">MSSV:</label>
                            <input type="text" class="form-control" id="student-mssv" name="MSSV" readonly>
                        </div>
                        {{-- bosung --}}
                        <div class="form-group col-md-6">
                            <label for="student-job">Ngành:</label>
                            <input type="text" class="form-control" id="student-job" name="job">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="student-class">Lớp:</label>
                            <input type="text" class="form-control" id="student-class" name="class">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="student-course">Khoá:</label>
                            <input type="text" class="form-control" id="student-course" name="course">
                        </div>
                        {{-- bosung --}}
                        <div class="form-group col-md-6">
                            <label for="student-mail">Email:</label>
                            <input type="email" class="form-control" id="student-mail" name="mail" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="student-gender">Giới tính:</label>
                            <input type="text" class="form-control" id="student-gender" name="gender" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="student-phone">Phone:</label>
                            <input type="text" class="form-control" id="student-phone" name="phone" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="student-cccd">CCCD:</label>
                            <input type="text" class="form-control" id="student-cccd" name="cccd" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="student-birthday">Ngày sinh:</label>
                            <input type="date" class="form-control" id="student-birthday" name="birthday"
                                readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="student-address">Quê quán:</label>
                            <input type="text" class="form-control" id="student-address" name="address" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="student-nation">Dân tộc:</label>
                            <input type="text" class="form-control" id="student-nation" name="nation" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="student-note">Ghi chú:</label>
                            <input type="text" class="form-control" id="student-note" name="note" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="student-time">Thời gian:</label>
                            <input type="text" class="form-control" id="student-time" name="time" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="student-phong">Phòng:</label>
                            <select class="form-control" id="student-phong" name="phong">
                                <!-- Options sẽ được tải ở đây -->
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="deleteStudent">Từ chối </button>
                        <button type="button" class="btn btn-success" id="saveStudent">Chấp nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL HIỂN THỊ DANH SÁCH PHÒNG --}}
    <div class="modal fade" id="chosenRoomModal" tabindex="-1" role="dialog"
        aria-labelledby="chosenRoomModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal_chon_phong">
                <div class="modal-header">
                    <h5 class="modal-title" id="chosenRoomModalTitle">Chọn phòng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="room-list" class="row">
                        <!-- Room list will be loaded here -->
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>
    {{-- MODAL HIỂN THỊ CHI TIẾT PHÒNG --}}
    <div class="modal fade " id="exampleModalRoom" role="dialog" aria-labelledby="exampleModalRoomTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg-custom" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title" id="exampleModalRoomTitle">
                        <p id="modal-room-name"></p>
                    </h5>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="modal-room-gender"></p>
                    <p id="modal-room-status"></p>
                    <p id="modal-room-note"></p>
                    <table class="table" id="student-table">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>MSSV</th>
                                <th>Email</th>
                                <th>Giới tính</th>
                                <th>Phone</th>
                                <th>CCCD</th>
                                <th>Ngày Sinh</th>
                                <th>Quê Quán</th>
                                <th>Dân Tộc</th>
                                <th>Ghi Chú</th>
                                <th>Thời Gian</th>
                                <th>Công Cụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Danh sách sinh viên sẽ được hiển thị ở đây -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- <script src="https://cdn.emailjs.com/dist/email.min.js"></script> --}}
    <script type="text/javascript"  src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

      

        $(document).ready(function() {

            $('#modalStudent').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var modal = $(this);

                modal.find('#student-id').val(button.data('student-id'));
                modal.find('#student-name').val(button.data('student-name'));
                modal.find('#student-mssv').val(button.data('student-mssv'));
                modal.find('#student-mail').val(button.data('student-mail'));
                modal.find('#student-gender').val(button.data('student-gender'));
                modal.find('#student-phone').val(button.data('student-phone'));
                modal.find('#student-cccd').val(button.data('student-cccd'));
                modal.find('#student-birthday').val(button.data('student-birthday'));
                modal.find('#student-address').val(button.data('student-address'));
                modal.find('#student-nation').val(button.data('student-nation'));
                modal.find('#student-note').val(button.data('student-note'));
                modal.find('#student-time').val(button.data('student-time'));

                var studentCode = modal.find('#student-mssv').val();

                modal.find('#student-job').val(button.data('student-job'));
                modal.find('#student-course').val(button.data('student-course'));
                modal.find('#student-class').val(button.data('student-class'));

                var studentImage = button.data('student-image');
                modal.find('#student-image').attr('src', studentImage ? studentImage :
                    "../images/avatar/" + studentCode + '.jpg'
                );

                // Load room options
                $.ajax({
                    url: '{{ route('rooms.layphongtrong') }}',
                    method: 'GET',
                    success: function(rooms) {
                        var roomSelect = modal.find('#student-phong');
                        roomSelect.empty();

                        // Thêm tùy chọn "Chưa có phòng" vào đầu danh sách
                        roomSelect.append('<option value="" selected>Chưa có phòng</option>');

                        rooms.forEach(function(room) {
                            var selected = room.id == button.data('student-phong') ?
                                'selected' : '';
                            var roomOption =
                                `<option value="${room.id}" ${selected}>Phòng: ${room.name}  - Số lượng sinh viên: ${room.students_count} - Phòng của: ${room.gender}</option>`;
                            roomSelect.append(roomOption);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching rooms:', error);
                    }
                });
            });

           
            $('#saveStudent').click(function() {
                var phongValue = $('#student-phong').val();
                if (!phongValue) {
                    toastr.error('Vui lòng chọn phòng trước khi lưu thay đổi.');
                    return;
                }

                var studentData = {
                    student_id: $('#student-id').val(),
                    name: $('#student-name').val(),
                    MSSV: $('#student-mssv').val(),
                    mail: $('#student-mail').val(),
                    gender: $('#student-gender').val(),
                    phone: $('#student-phone').val(),
                    cccd: $('#student-cccd').val(),
                    birthday: $('#student-birthday').val(),
                    address: $('#student-address').val(),
                    nation: $('#student-nation').val(),
                    note: $('#student-note').val(),
                    time: $('#student-time').val(),
                    phong: $('#student-phong').val() || null
                };

                $.ajax({
                    url: '{{ route('student.duyetdon') }}',
                    type: 'POST',
                    data: studentData,
                    success: function(response) {
                        toastr.success('Duyệt sinh viên thành công!');

                        var userData = {
                            name: $('#student-name').val(),
                            email: $('#student-mail').val(),
                            mssv: $('#student-mssv').val(),
                            password: $('#student-mssv').val(),
                        };
                        $.ajax({
                            url: '{{ route('users.create') }}',
                            type: 'POST',
                            data: userData,
                            success: function(response) {
                                toastr.success('Đã tạo tài khoản cho sinh viên');
                                sendEmail();
                                // location.reload();
                                $('#modalStudent').modal('hide');
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                                toastr.error('Tạo tài khoản sinh viên không thành công');
                            }
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        toastr.error('Tạo user thất bại.');
                    }
                });
            });
        });
        $('#chosenRoomModal').on('show.bs.modal', function(event) {
            $.ajax({
                url: '{{ route('rooms.all') }}',
                method: 'GET',
                success: function(rooms) {
                    var roomList = $('#room-list');
                    roomList.empty();
                    rooms.forEach(function(room) {
                        var roomElement = `
                            <div class="col-2 px-1">
                                <div class="room  " >
                                    <div class="room-name">
                                        ${room.name}
                                    </div>
                                    <div class="room-infor row">
                                        <div class="styleComponentOfRoom col-4 py-2">${room.gender}</div>
                                        <div class="styleComponentOfRoom col-4 py-2">${room.students_count}/15</div>
                                        <i class="styleComponentOfRoom col-4  py-2 bi bi-eye" data-toggle="modal"
                                            data-target="#exampleModalRoom" data-room-id="${room.id}"
                                            data-room-name="${room.name}" data-room-gender="${room.gender}"
                                            data-room-status="${room.status}" data-room-note="${room.note}">
                                        </i>
                                       
                                    </div>
                                </div>
                            </div>
                        `;
                        roomList.append(roomElement);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching rooms:', error);
                }
            });
        });

        $('#deleteStudent').click(function() {
            var studentId = $('#student-id').val();
            if (confirm('Bạn có chắc chắn không duyệt sinh viên này không?')) {
                sendDeneyEmail();
                $.ajax({
                    url: '/admin/student/' + studentId,
                    type: 'DELETE',
                    success: function(response) {
                        toastr.success('Từ chối sinh viên thành công!');
                        $('#modalStudent').modal('hide');
                        location.reload(); 
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        toastr.error('Từ chối sinh viên thất bại!');
                    }
                });
            }
        });

        function filterStudents() {
            var searchKeyword = $('#search-input').val().toLowerCase();
            var genderFilter = $('input[name="options"]:checked').map(function() {
                return $(this).val();
            }).get();

            $('table tbody tr').each(function() {
                var MSSV = $(this).find('td:eq(2)').text().toLowerCase();
                var studentName = $(this).find('td:eq(1)').text().toLowerCase();
                var studentGender = $(this).find('td:eq(4)').text().toLowerCase();
                var studentNote = $(this).find('td:eq(10)').text().toLowerCase();
                var isMatch = true;

                if (searchKeyword && !studentName.includes(searchKeyword) && !MSSV.includes(searchKeyword)) {
                    isMatch = false;
                }

                if (genderFilter.includes('male') && !genderFilter.includes('female') && studentGender !== '0') {
                    isMatch = false;
                }


                if (!genderFilter.includes('male') && genderFilter.includes('female') && studentGender !== '1') {
                    isMatch = false;
                }
                if (genderFilter.includes('male') && genderFilter.includes('male') && studentGender !== '') {

                }

                if (genderFilter.includes('priority') && studentNote === '') {
                    isMatch = false;
                }
                if (isMatch) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        $(document).ready(function() {
            $('.loc').change(function() {
                filterStudents();
            });

            $('#search-button').click(function() {
                filterStudents();
            });

            $('#search-input').on('keyup', function(event) {
                if (event.key === 'Enter') {
                    filterStudents();
                }
            });
        });


        function sendEmail() {
            console.log("a nhawn nhawn nhawn");
            var userData = {
                name: document.getElementById('student-name').value,
                email: document.getElementById('student-mail').value,
                mssv: document.getElementById('student-mssv').value,
          
            };
            console.log(userData);
            emailjs.send("service_ku7iubq", "template_lznxjig", {
                    name: userData.name,
                    email: userData.email,
                    mssv: userData.mssv,
                    to: userData.email,
                }, "gCR1IbwGCipNlyaAE")
                .then(function(response) {
                    console.log("Email sent successfully", response);
                    toastr.success('Gửi email thành công');
                }).catch(function(error) {
                    console.log("Failed to send email", error);
                    toastr.error('Gửi email không thành công');
                }).finally(function () {
                 location.reload();
                })
        }
        function sendDeneyEmail() {
            console.log("a nhawn nhawn nhawn");
            var userData = {
                name: document.getElementById('student-name').value,
                email: document.getElementById('student-mail').value,
                mssv: document.getElementById('student-mssv').value,
            };
            console.log(userData);
            emailjs.send("service_ku7iubq", "template_t4k5c68", {
                    name: userData.name,
                    email: userData.email,
                    mssv: userData.mssv,
                    to: userData.email,
                }, "gCR1IbwGCipNlyaAE")
                .then(function(response) {
                    console.log("Email sent successfully", response);
                    toastr.success('Gửi email thành công');
                }).catch(function(error) {
                    console.log("Failed to send email", error);
                    toastr.error('Gửi email không thành công');
                }).finally(function () {
                    // location.reload();
                })
        }
    </script>

</x-admin-layout>

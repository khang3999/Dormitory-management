<x-admin-layout>
    <x-slot:title>
        Quản lí phòng
    </x-slot:title>
    <div class="bang bangquanlyphong" id="quanLyPhong">
        <div class="tableName">Quản lý phòng</div>
        <div class="row py-2 house">
            <div class="row">
                @foreach ($rooms as $room)
                    <div class="col-2 mx-2 ">
                        <div class="room">
                            <div class="room-logo text-center text-white font-weight-bold">Kí túc xá TDC</div>
                            <div class="room-infor row">
                                @if ($room->gender == 'nam')
                                    <div class="styleComponentOfRoom col-4 py-1 text-primary font-weight-bold"><i class="bi bi-gender-male"></i></div>
                                @else
                                    <div class="styleComponentOfRoom col-4 py-1 text-danger font-weight-bold"><i class="bi bi-gender-female"></i></div>
                                @endif
                                <div class="styleComponentOfRoom col-4 py-1">{{ $room->students_count }}/15</div>
                                @if (!empty($room->note))
                                    <i style="color: rgb(255, 77, 0)"
                                        class="styleComponentOfRoom col-4 py-1 bi bi-patch-exclamation-fill"></i>
                                @else
                                    <i style="color: rgb(173, 217, 255)"
                                        class="styleComponentOfRoom col-4 py-1 bi bi-patch-exclamation-fill"></i>
                                @endif
                            </div>
                            <div class="room-door"></div>
                            <div class="room-button row">
                                <div class="col-4">
                                    <i class="styleComponentOfRoom col-4 bi bi-app"></i>
                                </div>
                                <div class="col-4">
                                    <div class="room-door-active" data-toggle="modal"
                                        data-target="#exampleModalRoom" data-room-id="{{ $room->id }}"
                                        data-room-name="{{ $room->name }}" data-room-gender="{{ $room->gender }}"
                                        data-room-status="{{ $room->students_count }}" data-room-note="{{ $room->note }}">
                                        <div class="room-name-active">{{ $room->name }}</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <i class="styleComponentOfRoom col-4  bi bi-pen" data-toggle="modal"
                                        data-target="#editModalRoom" data-room-id="{{ $room->id }}"
                                        data-room-name="{{ $room->name }}" data-room-gender="{{ $room->gender }}"
                                        data-room-status="{{ $room->status }}" data-room-note="{{ $room->note }}"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="groupbutton">
            <a href="{{route('export.rooms')}}" class="btn btn-outline-primary">Xuất file</a>
            <button  class="btn btn-outline-primary">Nhập file</button>
        </div>
    </div>

    {{-- modal của phòng --}}
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

    {{-- modal của sinh viên --}}
    <div class="modal fade" id="modalStudent" tabindex="-1" role="dialog" aria-labelledby="modalStudentTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modalsinhvien">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalStudentTitle">Thông tin sinh viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="form-group col-md-12 text-center">
                        <img  class="student-image " id="student-image" src="" alt="Student Image" class="img-fluid rounded">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="student-name">Tên:</label>
                        <input type="text" class="form-control" id="student-name" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="student-MSSV">MSSV:</label>
                        <input type="text" class="form-control" id="student-MSSV" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="student-mail">Email:</label>
                        <input type="text" class="form-control" id="student-mail" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="student-gender">Giới tính:</label>
                        <input type="text" class="form-control" id="student-gender" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="student-phone">Phone:</label>
                        <input type="text" class="form-control" id="student-phone" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="student-cccd">CCCD:</label>
                        <input type="text" class="form-control" id="student-cccd" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="student-birthday">Ngày sinh:</label>
                        <input type="text" class="form-control" id="student-birthday" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="student-address">Quê quán:</label>
                        <input type="text" class="form-control" id="student-address" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="student-nation">Dân tộc:</label>
                        <input type="text" class="form-control" id="student-nation" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="student-note">Ghi chú:</label>
                        <input type="text" class="form-control" id="student-note" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="student-time">Thời gian:</label>
                        <input type="text" class="form-control" id="student-time" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="student-phong">Phòng:</label>
                        <input type="text" class="form-control" id="student-phong" readonly>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Edit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModalRoom" tabindex="-1" role="dialog" aria-labelledby="editModalRoomTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa phòng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editRoomForm">
                        <input type="hidden" id="room-id"> <!-- Hidden input to store room ID -->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="room-name">Tên:</label>
                                <input type="text" class="form-control" id="room-name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="room-gender">Giới tính:</label>
                                <input type="text" class="form-control" id="room-gender">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="room-note">Ghi chú:</label>
                                <input type="text" class="form-control" id="room-note">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveUpdateRoom">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('#exampleModalRoom').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var roomId = button.data('room-id');
            var roomName = button.data('room-name');
            var roomGender = button.data('room-gender');
            var roomStatus = button.data('room-status');
            var roomNote = button.data('room-note');

            var modal = $(this);
            modal.find('#modal-room-name').text('Tên phòng: ' + roomName);
            modal.find('#modal-room-gender').text('Giới tính: ' + roomGender);
            modal.find('#modal-room-status').text('Số lượng sinh viên ' + roomStatus);
            modal.find('#modal-room-note').text('Ghi chú: ' + (roomNote ? roomNote : 'Không có'));

            // Gọi AJAX để lấy danh sách sinh viên
            $.ajax({
                url: '/admin/rooms/' + roomId + '/students',
                method: 'GET',
                success: function(data) {
                    var studentTable = modal.find('#student-table tbody');
                    studentTable.empty();
                    if (data.length > 0) {
                        data.forEach(function(student) {
                            studentTable.append(
                                '<tr><td class="text-12">' +
                                student.name +
                                '</td><td class="text-12 center">' +
                                student.MSSV +
                                '</td><td class="text-12 ">' +
                                student.mail +
                                '</td><td class="text-12 center">' +
                                student.gender +
                                '</td><td class="text-12 center">' +
                                student.phone +
                                '</td><td class="text-12 center">' +
                                student.cccd +
                                '</td><td class="text-12">' +
                                student.birthday +
                                '</td><td class="text-12">' +
                                student.address +
                                '</td><td class="text-12">' +
                                student.nation +
                                '</td><td class="text-12">' +
                                student.note +
                                '</td><td class="text-12">' +
                                student.time +
                                '</td><td>' +
                                '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalStudent"' +
                                'data-student-name="' + student.name + '" ' +
                                'data-student-mssv="' + student.MSSV + '" ' +
                                'data-student-mail="' + student.mail + '" ' +
                                'data-student-gender="' + student.gender + '" ' +
                                'data-student-phone="' + student.phone + '" ' +
                                'data-student-cccd="' + student.cccd + '" ' +
                                'data-student-birthday="' + student.birthday + '" ' +
                                'data-student-address="' + student.address + '" ' +
                                'data-student-nation="' + student.nation + '" ' +
                                'data-student-note="' + student.note + '" ' +
                                'data-student-time="' + student.time + '" ' +
                                'data-student-phong="' + roomId + '">' +
                                // Pass room ID here
                                'Chi tiết</button>' +
                                '</td></tr>'
                            );
                        });
                    } else {
                        studentTable.append(
                            '<tr><td colspan="12">Không có sinh viên nào trong phòng</td></tr>');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX error: ' + textStatus + ' : ' + errorThrown);
                }
            });
        });

        $('#modalStudent').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var studentName = button.data('student-name');
            var studentMSSV = button.data('student-mssv');
            var studentMail = button.data('student-mail');
            var studentGender = button.data('student-gender');
            var studentPhone = button.data('student-phone');
            var studentCCCD = button.data('student-cccd');
            var studentBirthday = button.data('student-birthday');
            var studentAddress = button.data('student-address');
            var studentNation = button.data('student-nation');
            var studentNote = button.data('student-note');
            var studentTime = button.data('student-time');
            var studentPhong = button.data('student-phong');
            var studentImage = button.data('student-image');
                // modal.find('#student-image').attr('src', studentImage ? studentImage :
                //     'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxdYCUFoUPaFmn2NytlDMr6_kj2c3bq_3jkA&s'
                //     );

            console.log(studentName, studentMSSV, studentMail, studentGender, studentPhone, studentCCCD,
                studentBirthday, studentAddress, studentNation, studentNote, studentTime, studentPhong);

            var modal = $(this);
            modal.find('#student-name').val(studentName);
            modal.find('#student-MSSV').val(studentMSSV);
            modal.find('#student-mail').val(studentMail);
            modal.find('#student-gender').val(studentGender);
            modal.find('#student-phone').val(studentPhone);
            modal.find('#student-cccd').val(studentCCCD);
            modal.find('#student-birthday').val(studentBirthday);
            modal.find('#student-address').val(studentAddress);
            modal.find('#student-nation').val(studentNation);
            modal.find('#student-note').val(studentNote);
            modal.find('#student-time').val(studentTime);
            modal.find('#student-phong').val(studentPhong);
        });

        $('#editModalRoom').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var roomId = button.data('room-id');
            var roomName = button.data('room-name');
            var roomGender = button.data('room-gender');
            var roomNote = button.data('room-note');

            var modal = $(this);
            modal.find('#room-id').val(roomId); // Hidden input to store room ID
            modal.find('#room-name').val(roomName);
            modal.find('#room-gender').val(roomGender);
            modal.find('#room-note').val(roomNote);
        });

        $('#saveUpdateRoom').click(function() {
            var formData = {
                room_id: $('#room-id').val(),
                room_name: $('#room-name').val(),
                room_gender: $('#room-gender').val(),
                room_note: $('#room-note').val(), // Đảm bảo gửi dữ liệu của trường note
                _token: '{{ csrf_token() }}' // CSRF token để bảo mật
            };

            // Kiểm tra nếu room_note là rỗng thì gán giá trị null
            if (formData.room_note === '') {
                formData.room_note = null;
            }

            $.ajax({
                url: '{{ route("update-room") }}',
                type: 'POST', // Đảm bảo phương thức POST ở đây
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Show success notification
                        toastr.success(response.message);
                    } else {
                        // Show error notification
                        toastr.error(response.message);
                    }

                    $('#editModalRoom').modal('hide'); // Đóng modal sau khi cập nhật thành công
                    // Cập nhật giao diện nếu cần thiết
                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi
                    console.error(error);
                    toastr.error('Cập nhật thất bại. Vui lòng thử lại.'); // Show error notification
                }
            });
        });
        $(document).ready(function() {
            $('.check').change(function() {
                filterRooms();
            });
        });

        function filterRooms() {
            // Lấy giá trị của các checkbox đã chọn
            var filters = [];
            $('.check:checked').each(function() {
                filters.push($(this).val());
            });

            // Gửi yêu cầu AJAX đến server với các bộ lọc đã chọn
            $.ajax({
                url: '/admin/filter-rooms', // Địa chỉ API để lọc phòng
                type: 'GET',
                data: {
                    filters: filters
                },
                dataType: 'json',
                success: function(response) {
                    // Cập nhật danh sách phòng dựa trên phản hồi từ server
                    var roomsContainer = $('#quanLyPhong .row').last();
                    roomsContainer.empty();

                    response.rooms.forEach(function(room) {
                        roomsContainer.append(
                            `<div class="col-2">
                        <div class="room">
                            <div class="room-name">${room.name}</div>
                            <div class="room-infor row">
                                <div class="styleComponentOfRoom col-4 py-1">${room.gender}</div>
                                <div class="styleComponentOfRoom col-4 py-1">${room.status}/15</div>
                                ${room.note ? '<i style="color: rgb(255, 77, 0)" class="styleComponentOfRoom col-4 py-1 bi bi-patch-exclamation-fill"></i>' : '<i style="color: rgb(173, 217, 255)" class="styleComponentOfRoom col-4 py-1 bi bi-patch-exclamation-fill"></i>'}
                            </div>
                            <div class="room-button row">
                                <i class="styleComponentOfRoom col-4 bi bi-app"></i>
                                <i class="styleComponentOfRoom col-4 bi bi-eye" data-toggle="modal" data-target="#exampleModalRoom" data-room-id="${room.id}" data-room-name="${room.name}" data-room-gender="${room.gender}" data-room-status="${room.status}" data-room-note="${room.note}"></i>
                                <i class="styleComponentOfRoom col-4 bi bi-pen" data-toggle="modal" data-target="#editModalRoom" data-room-id="${room.id}" data-room-name="${room.name}" data-room-gender="${room.gender}" data-room-status="${room.status}" data-room-note="${room.note}"></i>
                            </div>
                        </div>
                    </div>`
                        );
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX error: ' + textStatus + ' : ' + errorThrown);
                }
            });
        }
    </script>
</x-admin-layout>

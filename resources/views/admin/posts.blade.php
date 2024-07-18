<x-admin-layout>
    <x-slot:title>
        Quản lí bài viết
    </x-slot:title>
    <div class="bang" id="quanLyPhong">
        <div class="tableName">Quản lý bài viết</div>
        <div class="row py-2">
            
            <div class="col-8">
                <div class="groupbutton">
                    <button class="btn-file btn-create-post" data-toggle="modal" data-target="#createPostModal">Tạo bài
                        viết</button>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Tìm kiếm theo tên bài viết" aria-label="Search"
                        aria-describedby="search-addon" />
                   
                </div>
            </div>
        </div>

        <div class="table-responsive bang-noi-dung">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-12">ID</th>
                        <th scope="col" class="text-12">Tên Bài Viết</th>
                        <th scope="col" class="text-12">Nội dung</th>
                        <th scope="col" class="text-12">Ảnh</th>
                        <th scope="col" class="text-12">Loại bài viết</th>
                        <th scope="col" class="text-12">Công Cụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="text-12">{{ $post->id }}</td>
                            <td class="text-12">{{ $post->title }}</td>
                            <td class="text-12">{{ $post->content }}</td>
                            <td class="text-12">{{ $post->img }}</td>
                            <td class="text-12">{{ $post->type }}</td>
                            <td class="text-15">
                                <i class="bi bi-app"></i>
                                <i class="bi bi-eye" type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#postModal" data-post-title="{{ $post->title }}"
                                    data-post-id="{{ $post->id }}" data-post-content="{{ $post->content }}"
                                    data-post-img="{{ $post->img }}" data-post-type="{{ $post->type }}"></i>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for viewing post details -->
    <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-coustome" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel">Bài Viết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control" id="modalPostId" name="id" hidden>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="modalPostTitle">Tên bài viết:</label>
                        <input type="text" class="form-control" id="modalPostTitle" name="title">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="modalPostImg">Ảnh:</label>
                        <input type="file" class="form-control" id="modalPostImg" name="img">
                        <img class="img-fluid" src="" alt="ảnh hiện tại" id="currentImg">
                        <p id="currentImgName" hidden></p>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="modalPostContent">Nội dung:</label>
                        <input type="text" class="form-control" id="modalPostContent" name="content">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="deletePostButton">Delete Post</button>
                    <button type="button" class="btn btn-primary" id="savePostChanges">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for creating a new post -->
    <div class="modal fade" id="createPostModal" tabindex="-1" role="dialog"
        aria-labelledby="createPostModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-coustome" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPostModalLabel">Tạo bài viết mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="form-group col-md-12">
                        <label for="createPostTitle">Tên bài viết:</label>
                        <input type="text" class="form-control" id="createPostTitle" name="title">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="createPostImg">Ảnh:</label>
                        <input type="file" class="form-control" id="createPostImg" name="img">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="createPostContent">Nội dung:</label>
                        <input type="text" class="form-control" id="createPostContent" name="content">
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-primary" id="savePostButton">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Sự kiện khi thay đổi nội dung ô tìm kiếm
            $('input[type="search"]').on('keyup', function() {
                var searchText = $(this).val()
            .toLowerCase(); // Lấy nội dung tìm kiếm và chuyển thành chữ thường

                // Lặp qua từng hàng trong bảng
                $('table tbody tr').each(function() {
                    var found = false;
                    // Lặp qua từng ô dữ liệu trong hàng
                    $(this).find('td').each(function() {
                        var cellText = $(this).text()
                    .toLowerCase(); // Lấy nội dung của ô và chuyển thành chữ thường
                        // Kiểm tra xem chuỗi tìm kiếm có tồn tại trong nội dung ô không
                        if (cellText.indexOf(searchText) !== -1) {
                            found = true;
                            return false; // Thoát khỏi vòng lặp nếu tìm thấy kết quả
                        }
                    });

                    // Hiển thị hoặc ẩn dòng dựa trên kết quả tìm kiếm
                    if (found) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#postModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data('post-id'); // Extract info from data-* attributes
                var title = button.data('post-title');
                var img = button.data('post-img');
                var content = button.data('post-content');

                var modal = $(this);
                modal.find('#modalPostId').val(id);
                modal.find('#modalPostTitle').val(title);
                modal.find('#modalPostContent').val(content);

                if (img) {
                    modal.find('#currentImg').attr('src', '/' + img); // Set src attribute for the image
                    var imgName = img.split('/').pop(); // Extract the file name from the path
                    modal.find('#currentImgName').text(imgName); // Show the file name
                }
            });
            $('#savePostButton').click(function() {
                const title = $('#createPostTitle').val();
                const img = $('#createPostImg')[0].files[0]; // Lấy file ảnh
                const content = $('#createPostContent').val();

                const formData = new FormData();
                formData.append('title', title);
                formData.append('img', img);
                formData.append('content', content);
                formData.append('_token', '{{ csrf_token() }}'); // CSRF token

                $.ajax({
                    url: '/posts',
                    method: 'POST',
                    data: formData,
                    processData: false, // Không xử lý dữ liệu thành query string
                    contentType: false, // Không đặt Content-Type header
                    success: function(response) {
                        alert(response.message);
                        $('#createPostModal').modal('hide');
                        location.reload(); // Reload the page to update the list
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';
                            for (var field in errors) {
                                if (errors.hasOwnProperty(field)) {
                                    errorMessage += errors[field].join(' ') + '\n';
                                }
                            }
                            alert('Lỗi xác thực: \n' + errorMessage);
                        } else {
                            alert('An error occurred. Please try again.');
                        }
                    }
                });
            });

            $('#savePostChanges').on('click', function() {
                var id = $('#modalPostId').val();
                var title = $('#modalPostTitle').val();
                var img = $('#modalPostImg')[0].files[0]; // Lấy file ảnh
                var content = $('#modalPostContent').val();

                var formData = new FormData();
                formData.append('title', title);
                formData.append('img', img);
                formData.append('content', content);
                formData.append('_method', 'PUT'); // Let Laravel recognize this as a PUT request
                formData.append('_token', '{{ csrf_token() }}'); // CSRF token

                $.ajax({
                    url: `/posts/${id}`,
                    method: 'POST',
                    data: formData,
                    processData: false, // Không xử lý dữ liệu thành query string
                    contentType: false, // Không đặt Content-Type header
                    success: function(response) {
                        alert('Bài viết đã được cập nhật thành công!');
                        $('#postModal').modal('hide');
                        location.reload(); // Reload the page to see changes
                    },
                    error: function(xhr) {
                        alert('Có lỗi xảy ra, vui lòng kiểm tra lại.');
                    }
                });
            });

            // Delete post
            $('#deletePostButton').on('click', function() {
                var id = $('#modalPostId').val();

                if (confirm('Are you sure you want to delete this post?')) {
                    $.ajax({
                        url: `/posts/${id}`,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}' // CSRF token
                        },
                        success: function(response) {
                            alert(response.message);
                            $('#postModal').modal('hide');
                            location.reload(); // Reload the page to see changes
                        },
                        error: function(xhr) {
                            alert('An error occurred while deleting the post.');
                        }
                    });
                }
            });
        });
    </script>
</x-admin-layout>

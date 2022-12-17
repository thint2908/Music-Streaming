<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ quản lý</title>
    <link rel="stylesheet" href="./css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="col-lg">
        <div class="container-fluid">
            <div class="col-lg-3">
                <div class="side-part">
                    <div class="side-logo">
                        <h3>Admin</h3>
                    </div>
                    <div class="side-content">
                        <p id="song">Quản lý bài hát</p>
                        <p id="category">Quản lý danh mục</p>
                        <p id="user">Quản lý người dùng</p>
                    </div>
                    <div class="side-logout">
                        <a href="">Đăng xuất</a>
                    </div>
                </div>
            </div>
        
            <div class="col-lg">
                <div class="content-part">
                    <div class="content-search">
                        <form class="form-search" action="" method="post">
                            <input id="inputSearch" type="search" name="search" placeholder="Nhập thông tin tìm kiếm">
                            <button id="btnSearch" class="btn-search" name="btnSearch">Search</button>
                        </form>
                    </div>
                    <div id="songManage">
                        <div class="content-header">
                            <h3>Quản lý bài hát</h3>
                        </div>
                    <!-- add button -->
                        <div class="add-btn">    
                            <button type="button" data-bs-toggle ="modal" data-bs-target="#addSongModal" id="btnAdd">Thêm +</button>
                            <div class="modal" id="addSongModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Thêm bài hát</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                    <!-- Modal body -->
                                        <div class="modal-body">
                                            <form>
                                                <div class="col-lg">
                                                    <label class="form-label">ID bài hát</label>
                                                    <input type="text" class="form-control" id="input-song-id">
                                                </div>
                                                <div class="col-lg">
                                                    <label class="form-label">Tên bài hát</label>
                                                    <input type="text" class="form-control" id="input-song-name">
                                                </div>
                                                <div class="col-lg">
                                                    <label class="form-label">ID ca sĩ</label>
                                                    <input type="text" class="form-control" id="input-singer-id">
                                                </div>
                                                <div class="col-lg">
                                                    <label class="form-label">Lyrics</label>
                                                    <input type="text" class="form-control" id="input-lyrics">
                                                </div>
                                                <div class="col-lg">
                                                    <label class="form-label">Mô tả</label>
                                                    <input type="text" class="form-control" id="input-song-des">
                                                </div>
                                                <div class="col-lg">
                                                    <label class="form-label">Đánh giá</label>
                                                    <input type="text" class="form-control" id="input-rating">
                                                </div>
                                                <div class="col-lg">
                                                    <label class="form-label">ID thể loại</label>
                                                    <input type="text" class="form-control" id="input-cate-id">
                                                </div><br>
                                                <div class="col-lg">
                                                    <label class="form-label">Tải file nhạc</label>
                                                    <input type="file" id="fileSong-upload" required />
                                                </div>
                                                <div class="col-lg">
                                                    <label class="form-label">Tải file ảnh nhạc</label>
                                                    <input type="file" id="fileImg-upload" required />
                                                </div>
                                                <div class="col-lg">
                                                    <label class="form-label">Lượt nghe</label>
                                                    <input type="text" class="form-control" id="input-listens">
                                                </div>
                                                <br>
                                            </form>
                                        </div>
                                    <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-table">
                            <table class="song-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên bài hát</th>
                                        <th>Nghệ sĩ</th>
                                        <th>Hình Ảnh</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Tên bài hát</td>
                                        <td>Nghệ sĩ</td>
                                        <th>Hình Ảnh</th>
                                        <th>
                                            <button type="button" data-bs-toggle ="modal" data-bs-target="#editSongModal" id="btnEdit">Chỉnh sửa</button>
                                            <div class="modal" id="editSongModal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Chỉnh sửa bài hát</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                    <!-- Modal body -->
                                                        <div class="modal-body">
                                                        <form>
                                                            <div class="col-lg">
                                                                <label class="form-label">ID bài hát</label>
                                                                <input type="text" class="form-control" id="input-song-id">
                                                            </div>
                                                            <div class="col-lg">
                                                                <label class="form-label">Tên bài hát</label>
                                                                <input type="text" class="form-control" id="input-song-name">
                                                            </div>
                                                            <div class="col-lg">
                                                                <label class="form-label">ID ca sĩ</label>
                                                                <input type="text" class="form-control" id="input-singer-id">
                                                            </div>
                                                            <div class="col-lg">
                                                                <label class="form-label">Lyrics</label>
                                                                <input type="text" class="form-control" id="input-lyrics">
                                                            </div>
                                                            <div class="col-lg">
                                                                <label class="form-label">Mô tả</label>
                                                                <input type="text" class="form-control" id="input-song-des">
                                                            </div>
                                                            <div class="col-lg">
                                                                <label class="form-label">Đánh giá</label>
                                                                <input type="text" class="form-control" id="input-rating">
                                                            </div>
                                                            <div class="col-lg">
                                                                <label class="form-label">ID thể loại</label>
                                                                <input type="text" class="form-control" id="input-cate-id">
                                                            </div><br>
                                                            <div class="col-lg">
                                                                <label class="form-label">Tải file nhạc</label>
                                                                <input type="file" id="fileSong-upload" required />
                                                            </div>
                                                            <div class="col-lg">
                                                                <label class="form-label">Tải file ảnh nhạc</label>
                                                                <input type="file" id="fileImg-upload" required />
                                                            </div>
                                                            <div class="col-lg">
                                                                <label class="form-label">Lượt nghe</label>
                                                                <input type="text" class="form-control" id="input-listens">
                                                            </div>
                                                            <br>
                                                        </form>
                                                        </div>
                                                    <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" data-bs-toggle ="modal" data-bs-target="#deleteSongModal" id="btnDel">Xóa</button>
                                            <div class="modal" id="deleteSongModal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Chỉnh sửa bài hát</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                    <!-- Modal body -->
                                                        <div class="modal-body">
                                                        
                                                            Bạn có muốn xóa bài hát này?
                                                        </div>
                                                    <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-success">Đồng ý</button>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="userManage" style="display: none;">
                        <div class="content-header">
                            <h3>Quản lý người dùng</h3>
                        </div>
                        <div class="add-btn">    
                        <button type="button" data-bs-toggle ="modal" data-bs-target="#addUserModal" id="btnAdd">Thêm +</button>
                            <div class="modal" id="addUserModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Thêm người dùng</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                    <!-- Modal body -->
                                        <div class="modal-body">
                                            <form>
                                                <div class="col-lg">
                                                    <label class="form-label">ID người dùng</label>
                                                    <input type="text" class="form-control" id="input-user-id">
                                                </div>
                                                <div class="col-lg">
                                                    <label class="form-label">Tên tài khoản</label>
                                                    <input type="text" class="form-control" id="input-user-name">
                                                </div>
                                                <div class="col-lg">
                                                    <label class="form-label">Mật khẩu</label>
                                                    <input type="text" class="form-control" id="input-user-password">
                                                </div>
                                                <div class="col-lg">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="input-user-email">
                                                </div>
                                                <div class="col-lg">
                                                    <label class="form-label">Tên người dùng</label>
                                                    <input type="text" class="form-control" id="input-name">
                                                </div>
                                            </form>
                                        </div>
                                    <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-table">
                            <table class="song-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên tài khoản</th>
                                        <th>Mật khẩu</th>
                                        <th>Email</th>
                                        <th>Tên người dùng</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Tên tài khoản</td>
                                        <td>Mật khẩu</td>
                                        <td>Email</td>
                                        <td>Tên người dùng</td>
                                        <th>
                                            <button type="button" data-bs-toggle ="modal" data-bs-target="#editUserModal" id="btnAdd">Chỉnh sửa</button>
                                            <div class="modal" id="editUserModal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Chỉnh sửa người dùng</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                    <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="col-lg">
                                                                    <label class="form-label">ID người dùng</label>
                                                                    <input type="text" class="form-control" id="input-user-id">
                                                                </div>
                                                                <div class="col-lg">
                                                                    <label class="form-label">Tên tài khoản</label>
                                                                    <input type="text" class="form-control" id="input-user-name">
                                                                </div>
                                                                <div class="col-lg">
                                                                    <label class="form-label">Mật khẩu</label>
                                                                    <input type="text" class="form-control" id="input-user-password">
                                                                </div>
                                                                <div class="col-lg">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="email" class="form-control" id="input-user-email">
                                                                </div>
                                                                <div class="col-lg">
                                                                    <label class="form-label">Tên người dùng</label>
                                                                    <input type="text" class="form-control" id="input-name">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" data-bs-toggle ="modal" data-bs-target="#deleteUserModal" id="btnDel">Xóa</button>
                                            <div class="modal" id="deleteUserModal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Xóa người dùng</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                    <!-- Modal body -->
                                                        <div class="modal-body">     
                                                            Bạn có muốn xóa người dùng này?
                                                        </div>
                                                    <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-success">Đồng ý</button>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="categoryManage" style="display: none;">
                        <div class="content-header">
                            <h3>Quản lý danh mục</h3>
                        </div>
                        <div class="add-btn">    
                            <button type="button" data-bs-toggle ="modal" data-bs-target="#addCategoryModal" id="btnAdd">Thêm +</button>
                            <div class="modal" id="addCategoryModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Thêm danh mục</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                    <!-- Modal body -->
                                        <div class="modal-body">
                                            <form>
                                                <div class="col-lg">
                                                    <label class="form-label">ID danh mục</label>
                                                    <input type="text" class="form-control" id="input-cate-id">
                                                </div>
                                                <div class="col-lg">
                                                    <label class="form-label">Tên danh mục</label>
                                                    <input type="text" class="form-control" id="input-cate-name">
                                                </div>
                                            </form>
                                        </div>
                                    <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-table">
                            <table class="song-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên danh mục</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Tên danh mục</td>
                                        <th>
                                            <button type="button" data-bs-toggle ="modal" data-bs-target="#editCategoryModal" id="btnEdit">Chỉnh sửa</button>
                                            <div class="modal" id="editCategoryModal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Chỉnh sửa danh mục</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                    <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="col-lg">
                                                                    <label class="form-label">ID danh mục</label>
                                                                    <input type="text" class="form-control" id="input-cate-id">
                                                                </div>
                                                                <div class="col-lg">
                                                                    <label class="form-label">Tên danh mục</label>
                                                                    <input type="text" class="form-control" id="input-cate-name">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" data-bs-toggle ="modal" data-bs-target="#deleteCategoryModal" id="btnDel">Xóa</button>
                                            <div class="modal" id="deleteCategoryModal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Xóa danh mục</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                    <!-- Modal body -->
                                                        <div class="modal-body">     
                                                            Bạn có muốn xóa danh mục này?
                                                        </div>
                                                    <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-success">Đồng ý</button>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./js/admin.js"></script>
</html>

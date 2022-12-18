<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ quản lý</title>
    <link rel="stylesheet" href="./css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
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
                <div>
                    <button type="button" class="btn btn-primary addMusicBtn">
                        Thêm
                    </button>
                </div>
                <div class="content-table">
                    <table class="song-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên bài hát</th>
                                <th>Nghệ sĩ</th>
                                <th>Thể loại</th>
                                <th>Hình Ảnh</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id = "songBody">
                            <!-- chứa nhạc -->
                        </tbody>
                    </table>
                </div>
                <div id="addMusicModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <form class="form" action="api/upload.php" method="post" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Thêm Bài Hát</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="songName">Tên bài hát: </label>
                                        <input class="form-control" type="text" name="songName" id="songName" placeholder="Nhập tên bài hát">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="singerName">Tên ca sĩ: </label>
                                        <select class="form-control" id="song_singerName" name="song_singerName">
                                            <option value="Sơn Tùng MTP">Sơn Tùng MTP</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="type">Thể loại: </label>
                                        <select class="form-control" name="category" id="category">
                                            <option value="Pop">Pop</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="lyrics">Lyrics: </label>
                                        <textarea class="form-control" type="text" name="lyrics" id="lyrics" placeholder="Nhập lời bài hát"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="description">Description: </label>
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="10" maxlength="50" placeholder="Nhập mô tả"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="fileImage">Hình: </label>
                                        <input class="form-control" type="file" name="fileImage" id="fileImage">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="fileMusic">Chọn file nhạc: </label>
                                        <input class="form-control" type="file" name="fileMusic" id="fileMusic">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <input class="btn btn-primary" type="submit" value="Thêm nhạc" name="submit">
                                </div>

                            </div>
                        </form>
                        <!-- Modal content-->
                    </div>
                </div>
                <!-- End modal add music -->
            </div>

            <div id="userManage" style="display: none;">
                <div class="content-header">
                    <h3>Quản lý người dùng</h3>
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
                        <tbody id = "singerBody">
                            <tr>
                                <td>ID</td>
                                <td>Tên bài hát</td>
                                <td>Nghệ sĩ</td>
                                <th>Hình Ảnh</th>
                                <th>
                                    <button id="btnEdit"><a href="">Chỉnh sửa</a></button>
                                    <button id="btnDel"><a href="">Xóa</a></button>
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
                <div class="content-table">
                    <table class="song-table table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên bài hát</th>
                                <th scope="col">Nghệ sĩ</th>
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>Tên bài hát</td>
                                <td>Nghệ sĩ</td>
                                <th>Hình Ảnh</th>
                                <th>
                                    <button id="btnEdit"><a href="">Chỉnh sửa</a></button>
                                    <button id="btnDel"><a href="">Xóa</a></button>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


</body>
<script src="./js/admin.js"></script>

</html>
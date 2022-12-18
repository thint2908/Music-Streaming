<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if(!isset($_SESSION['userName'])){
        header("Location: login.html");
    }else{
        if($_SESSION['userName'] != 'admin'){
            header("Location: index.php");
        }
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ quản lý</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="side-part col-lg-3">
                <div class="side-logo">
                    <h3>Admin</h3>
                </div>
                <div class="side-content">
                    <p id="song">Quản lý bài hát</p>
                    <p id="category">Quản lý danh mục</p>
                    <p id="user">Quản lý người dùng</p>
                    <p id="singer">Quản lý ca sĩ</p>
                </div>
                <div class="side-logout">
                    <a href="./api/logOut.php">Đăng xuất</a>
                </div>
            </div>
            <div class="content-part col-lg-9">
                <div id="songManage" style="display:block">
                    <div class="content-header">
                        <h3>Quản lý bài hát</h3>
                        <div class="musicManagerError">
                            <?php if (isset($_GET['success'])) {
                                echo $_GET['success'];
                            }
                            if (isset($_GET['error'])) {
                                echo $_GET['error'];
                            }
                            ?>
                        </div>
                    </div>
                    <div class="add-btn">
                        <button type="button" class="btn btn-success addMusicBtn">
                            Thêm
                        </button>
                    </div>
                    <div class="content-table table-song">
                        <table class="table">
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
                            <tbody id="songBody">
                                <!-- chứa nhạc -->
                            </tbody>
                        </table>
                    </div>
                    <!-- modal thêm nhạc -->
                    <div id="addMusicModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form id="addSongForm" class="form" action="api/upload.php" method="post" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Thêm Bài Hát</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="add-song-name">Tên bài hát: </label>
                                            <input class="form-control" type="text" name="songName" id="add-song-name" placeholder="Nhập tên bài hát" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="add-song-singer">Tên ca sĩ: </label>
                                            <select class="form-control" id="add-song-singer" name="song_singerName" required>
                                                <!-- chứa tên ca sĩ -->
                                                <option value="">Tên ca sĩ</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="add-song-category">Thể loại: </label>
                                            <select class="form-control" name="song_category" id="add-song-category" required>
                                                <!-- chứa tên thể loại -->
                                                <option value="">Tên thể loại</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="add-song-lyrics">Lyrics: </label>
                                            <textarea class="form-control" type="text" name="lyrics" id="add-song-lyrics" placeholder="Nhập lời bài hát" required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="add-song-description">Description: </label>
                                            <textarea class="form-control" name="description" id="add-song-description" cols="30" rows="10" maxlength="50" placeholder="Nhập mô tả" required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="add-song-fileImage">Hình: </label>
                                            <input class="form-control" type="file" name="fileImage" id="add-song-fileImage" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="add-song-fileMusic">Chọn file nhạc: </label>
                                            <input class="form-control" type="file" name="fileMusic" id="add-song-fileMusic" required>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input class="btn btn-primary" type="submit" value="Thêm nhạc" name="addSongBtn">
                                    </div>

                                </div>
                            </form>
                            <!-- Modal content-->
                        </div>
                    </div>
                    <!-- End modal add music -->

                    <!-- modal sửa nhạc -->
                    <div id="updateMusicModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form id="updateSongForm" class="form" action="api/updateSong.php" method="post" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Chỉnh Sửa Bài Hát</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" name="update-song-id" id="update-song-id" name="update-song-id" hidden>
                                        <div class="mb-3">
                                            <label class="form-label" for="update-song-name">Tên bài hát: </label>
                                            <input class="form-control" type="text" name="songName" id="update-song-name" readonly placeholder="Nhập tên bài hát">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="update-song-singer">Tên ca sĩ: </label>
                                            <select class="form-control" id="update-song-singer" name="song_singerName" required>
                                                <!-- chứa tên ca sĩ -->
                                                <option value="">Tên ca sĩ</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="update-song-category">Thể loại: </label>
                                            <select class="form-control" name="song_category" id="update-song-category" required>
                                                <!-- chứa tên thể loại -->
                                                <option value="">Tên thể loại</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="update-song-lyrics">Lyrics: </label>
                                            <textarea class="form-control" type="text" name="lyrics" id="update-song-lyrics" placeholder="Nhập lời bài hát"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="update-song-description">Description: </label>
                                            <textarea class="form-control" name="description" id="update-song-description" cols="30" rows="10" maxlength="50" placeholder="Nhập mô tả"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="update-song-fileImage">Hình: </label>
                                            <input class="form-control" type="file" name="fileImage" id="update-song-fileImage">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="update-song-fileMusic">Chọn file nhạc: </label>
                                            <input class="form-control" type="file" name="fileMusic" id="update-song-fileMusic">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input class="btn btn-primary" type="submit" value="Sửa" name="updateSongBtn">
                                    </div>

                                </div>
                            </form>
                            <!-- Modal content-->
                        </div>
                    </div>
                    <!-- End modal update music -->

                    <!-- Delete modal -->
                    <div id="deleteMusicModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form id="deleteSongForm" class="form" action="" method="post" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Xóa</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="md-3">
                                            <label for="name" id="songDeleteText"></label>
                                            <input type="text" name="songId" id="songId" hidden>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input class="btn btn-primary" type="submit" value="Xóa" name="submit">
                                    </div>

                                </div>
                            </form>
                            <!-- Modal content-->
                        </div>
                    </div>
                </div>
                <!--singer part-->

                <div id="singerManage" style="display: none;">
                    <div class="content-header">
                        <h3>Quản lý ca sĩ</h3>
                    </div>
                    <div class="content-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Hình Ảnh</th>
                                    <th>Tên Ca Sĩ</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="singerBody">

                            </tbody>
                        </table>
                    </div>
                </div>

                <!--user part-->
                <div id="userManage" style="display: none;">
                    <div class="content-header">
                        <h3>Quản lý người dùng</h3>
                    </div>
                    <div class="add-btn">
                        <button type="button" class="btn btn-success addSingerBtn">
                            Thêm
                        </button>
                    </div>
                    <div class="content-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên bài hát</th>
                                    <th>Nghệ sĩ</th>
                                    <th>Hình Ảnh</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="singerBody">
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
                
                <!-- category part -->
                <div id="categoryManage" style="display: none;">
                    <div class="content-header">
                        <h3>Quản lý danh mục</h3>
                    </div>
                    <div class="content-table">
                        <table class="table table">
                            <thead>
                                <tr>
                                    <th colspan="2" >ID</th>
                                    <th colspan="8" >Tên thể loại</th>
                                    <th colspan="2" >Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="categoryBody">
                                <!-- chứa ds thể loại -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div id="deleteCaModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form id="deleteCaForm" class="form" action="" method="post" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Xóa</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="md-3">
                                            <label for="name" id="caDeleteText"></label>
                                            <input type="text" name="caId" id="caId" hidden>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input class="btn btn-primary" type="submit" value="Xóa" name="submit">
                                    </div>

                                </div>
                            </form>
                            <!-- Modal content-->
                        </div>
                    </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->


</body>
<script src="./js/admin.js"></script>

</html>
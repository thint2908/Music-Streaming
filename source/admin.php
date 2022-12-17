<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ quản lý</title>
    <link rel="stylesheet" href="admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
            
            <div id="categoryManage" style="display: none;">
                <div class="content-header">
                    <h3>Quản lý danh mục</h3>
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
<script src="admin.js"></script>
</html>
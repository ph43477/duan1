<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin dự án 1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
        .text-center{
            height: 100px !important;
        }
        .jumbotron{
            background-color: #CCCC !important;
            padding-top:20px !important;
        }
        
    </style>
</head>

<body>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Admin - Dự án 1</h1>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=danhmuc">Quản lý danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=sanpham">Quản lý sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=taikhoan">Quản lý tài khoản</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=binhluan">Quản lý bình luận</a>
                </li>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Thống kê <i class="fa fa-angle-down mt-1"></i></a>
                        <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                            <a href="index.php?act=thongkesp" class="dropdown-item">Thống kê sản phẩm</a>
                            <a href="index.php?act=thongkedm" class="dropdown-item">Thống kê danh mục</a>
                            <a href="index.php?act=thongkebl" class="dropdown-item">Thống kê bình luận</a>
                        </div>
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

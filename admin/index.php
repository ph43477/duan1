<?php
    include "../model/pdo.php";
    include "header.php";
    include "../model/danhmuc.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
    include "../model/sanpham.php";
    include "../model/cart.php";
    //controller
    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch ($act) {
            case 'adddm':
                //kiểm tra xem ng dùng có click vào nút add hay ko
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";           
                }
                include "danhmuc/add.php";
                break;
                case 'listdm':
                    $listdanhmuc = loadall_danhmuc();
                    include "danhmuc/list.php";
                    break;
                case 'xoadm':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        delete_danhmuc($_GET['id']);
                    }
                    $listdanhmuc = loadall_danhmuc();
                    include "danhmuc/list.php";
                    break;
                case 'suadm':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $dm = loadone_danhmuc($_GET['id']);
                    }
                    include "danhmuc/update.php";
                    break;
                case 'updatedm':
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $tenloai = $_POST['tenloai'];
                        $id = $_POST['id'];
                        update_danhmuc($id, $tenloai);
                        $thongbao = "Cập nhật thành công";           
                    }
                    $listdanhmuc = loadall_danhmuc();
                    include "danhmuc/list.php";
                    break;
                    /* controller sản phẩm */

                    case 'addsp':
                        //kiểm tra xem ng dùng có click vào nút add hay ko
                        if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                            $id_danhmuc = $_POST['id_danhmuc'];
                            $tensp = $_POST['tensp'];
                            $giasp = $_POST['giasp'];
                            $mota = $_POST['mota'];
                            $hinh = $_FILES['hinh']['name'];
                            $target_dir = "../upload/";
                            $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                            if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                                //echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                            } else {
                                //echo "Sorry, there was an error uploading your file.";
                            }
                            insert_sanpham($tensp, $giasp, $mota, $hinh, $id_danhmuc);
                            $thongbao = "Thêm thành công";           
                        }
                        $listdanhmuc = loadall_danhmuc();
                        include "sanpham/add.php";
                        break;
                    case 'listsp':
                        if(isset($_POST['listloc'])&&($_POST['listloc'])){
                            $keyword = $_POST['keyword'];
                            $id_danhmuc = $_POST['id_danhmuc'];
                        }else{
                            $keyword = '';
                            $id_danhmuc = 0;
                        }
                            $listdanhmuc = loadall_danhmuc();
                            $listsanpham = loadall_sanpham($keyword, $id_danhmuc);
                            include "sanpham/list.php";
                            break;
                    case 'xoasp':
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                delete_sanpham($_GET['id']);
                            }
                            $listsanpham = loadall_sanpham("", 0);
                            include "sanpham/list.php";
                            break;
                    case 'suasp':
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                $sp = loadone_sanpham($_GET['id']);
                            }
                            $listdanhmuc = loadall_danhmuc();
                            include "sanpham/update.php";
                            break;
                    case 'updatesp':
                            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                            $id = $_POST['id'];
                            $id_danhmuc = $_POST['id_danhmuc'];
                            $tensp = $_POST['tensp'];
                            $giasp = $_POST['giasp'];
                            $mota = $_POST['mota'];
                            $hinh = $_FILES['hinh']['name'];
                            $target_dir = "../upload/";
                            $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                            if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                                //echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                            } else {
                                //echo "Sorry, there was an error uploading your file.";
                            }
                                update_sanpham($id, $id_danhmuc, $tensp, $giasp, $mota, $hinh);
                                $thongbao = "Cập nhật thành công";           
                            }
                            $listdanhmuc = loadall_danhmuc();
                            $listsanpham = loadall_sanpham("", 0);
                            include "sanpham/list.php";
                            break;
                    case 'dskh':                       
                        $listtaikhoan = loadall_taikhoan("", 0);
                        include "taikhoan/list.php";
                        break;
                    case 'dsbl':                       
                        $listbinhluan = loadall_binhluan(0);
                        include "binhluan/list.php";
                        break;
                    case 'thongke':                       
                        $listthongke = loadall_thongke();
                        include "thongke/list.php";
                        break;
                    case 'bieudo':                       
                        $listthongke = loadall_thongke();
                        include "thongke/bieudo.php";
                        break;
            default:
                include "home.php";
                break;
        }

    }else {
        include "home.php";
    } 

    include "footer.php";

?>
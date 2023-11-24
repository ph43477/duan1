<?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
    include "../model/thongke.php";

    include "view/header.php";
if(isset($_GET["act"])){
    $act=$_GET["act"];
    switch ($act) {
        case 'danhmuc':
            //lấy all danh mục
            $dsdm=loai_select_all();
            include "view/danhmuc.php";
            break;

            case 'adddm':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $name=$_POST['name'];
                    // thêm bản ghi "$name" vào bảng "danhmuc".
                    $sql="insert into danhmuc(name) values('$name')";
                    pdo_execute($sql);
                    loai_insert($name);
                    $thongbao="Thành công";
                }
                include "view/danhmuc_add.php";
                break;

                case "suadm":
                    if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                        $iddm = intval($_GET['iddm']);
                        $sql = "SELECT * FROM danhmuc WHERE iddm='".$iddm."'";
                        $dm = pdo_query_one($sql);
                    } 
                    include "view/danhmuc_update.php";
                    break;
                
                    case 'updatedm':
                        if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                            $name = $_POST['name'];
                            $iddm = intval($_POST['iddm']);
                            
                            $sql = "UPDATE danhmuc SET name='".$name."' WHERE iddm=".$iddm;
                            pdo_execute($sql);
                            $thongbao = "Cập nhật thành công";
                        }
                        $sql = "SELECT * FROM danhmuc ORDER BY iddm DESC";
                        $dsdm = pdo_query($sql);
                        include "view/danhmuc.php";
                        break;
                
                case 'xoadm':
                    // kiểm tra GET "id" có được khai báo và có giá trị lớn hơn 0 hay không. 
                    if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                        $sql="delete from danhmuc where iddm=".$_GET['iddm'];
                        pdo_execute($sql);
                    }
                    // lấy danh sách các bản ghi trong bảng "danhmuc"
                    $sql=" select* from danhmuc order by name";
                    $dsdm=pdo_query($sql);
                    // hiển thị danh sách các bản ghi trong bảng "danhmuc".
                    include "view/danhmuc.php";
                    break;

                case 'sanpham':
                        if(isset($_POST['clickOK'])&&($_POST['clickOK'])){
                            $keyw=$_POST['keyw'];
                            $iddm=$_POST['iddm'];
                        }else{
                            $keyw="";
                            $iddm=0;
                        }
                        $dsdm= loai_select_all();
                        $dssp = sanpham_select_all($keyw,$iddm);
                    include "sanpham/sanpham.php";
                    break;

                case 'addsp':
                    if(isset($_POST['themmoi'])&& ($_POST['themmoi'])){
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $mota = $_POST['mota'];
                        $iddm = $_POST['iddm'];
                        $image = $_FILES['image']['name'];
    //                    echo $hinh;
                        $target_dir = "../upload";
                        $target_file = $target_dir.basename($_FILES['image']['name']);
    //                    echo $target_file;
                        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
    //                        echo "Bạn đã upload ảnh thành công";
                        }else{
    //                        echo "Upload ảnh không thành công";
                        }
    //                    echo $iddm;
                        sanpham_insert($name, $price, $image, $mota, $iddm);
                        $thanhcong = "Thêm thành công";
                    }
    
                    $dsdm= loai_select_all();
                    include "sanpham/add.php";
                    break;

                case "suasp";
                if(isset($_GET["idpro"])&& ($_GET["idpro"]>0)){
                    $sanpham= sanpham_select_by_id($_GET['idpro']);
                }
                $dsdm=loai_select_all();
                include "sanpham/update.php";
                break;

                case "updatesp":
                    if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                        $idpro = $_POST['idpro'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $mota = $_POST['mota'];
                        $iddm = $_POST['iddm'];
                        $image = $_FILES['image']['name'];
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($_FILES["image"]["name"]);
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                        sanpham_update($idpro, $name, $price, $image, $mota, $iddm);
                        $thongbao = "Cập nhật thành công!";
                    }
                    $dssp = sanpham_select_all("", 0);
                    $dsdm = loai_select_all();
                    include "sanpham/sanpham.php";
                    break;

                case "xoasp":
                    if (isset($_GET["idpro"]) && ($_GET["idpro"]>0)) {
                        sanpham_delete($_GET['idpro']);
                    }
                    $dssp = sanpham_select_all('', 0);
                    include'sanpham/sanpham.php';
                    break;

                case 'taikhoan':
                    $dstk = taikhoan_select_all();
                    include "taikhoan/ds.php";
                    break;

                case "binhluan":
                    $dsbl=loadall_binhluan(0);
                    include "binhluan/dsbinhluan.php";
                    break;

                    case 'xoabl':
                        // kiểm tra GET "id" có được khai báo và có giá trị lớn hơn 0 hay không. 
                        if(isset($_GET['id'])&&($_GET['id']>0)){
                            $sql="delete from binhluan where id=".$_GET['id'];
                            pdo_execute($sql);
                        }
                        // lấy danh sách các bản ghi trong bảng "danhmuc"
                        $sql=" select* from binhluan order by noidung";
                        $dsbl=pdo_query($sql);
                        // hiển thị danh sách các bản ghi trong bảng "danhmuc".
                        include "binhluan/dsbinhluan.php";
                        break;
                    
                    case 'thongkedm':
                        $dsthongkedm=thongke_sanpham_danhmuc();
                        include 'thongke/listdanhmuc.php';
                        break;

                    case 'thongkesp':
                        $dsthongkesp=thongke_sanpham();
                        include 'thongke/listsanpham.php';
                        break;

                    case 'thongkebl':
                        $dsthongkebl=thongke_binhluan();
                        include 'thongke/listbinhluan.php';
                        break;

                    case 'bieudodm':
                        $dsthongke=thongke_sanpham_danhmuc();
                        include 'thongke/bieudodm.php';
                        break;

                    case 'bieudosp':
                        $dsthongkesp=thongke_sanpham();
                        include 'thongke/bieudosp.php';
                        break;

        default:
            include "view/home.php";
            break;
    }
}else{
    include "view/home.php";
}

    

    include "view/footer.php";

?>
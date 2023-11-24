<?php
require_once 'pdo.php';

function thongke_sanpham(){
    $sql = "SELECT sp.idpro, sp.name,"
            . " COUNT(*) soluong,"
            . " MIN(sp.price) gia_min,"
            . " MAX(sp.price) gia_max,"
            . " AVG(sp.price) gia_avg"
            . " FROM sanpham sp "
            . " JOIN danhmuc dm ON dm.iddm=sp.iddm "
            . " GROUP BY sp.idpro, sp.name" ;
    return pdo_query($sql);
}

function thongke_binhluan(){
    $sql = "SELECT bl.iduser, bl.noidung,"
            . " COUNT(*) soluong,"
            . " MIN(bl.ngaybinhluan) cu_nhat,"
            . " MAX(bl.ngaybinhluan) moi_nhat"
            . " FROM binhluan bl "
            . " JOIN sanpham sp ON sp.idpro=bl.idpro "
            . " GROUP BY bl.iduser, bl.noidung"
            . " HAVING soluong > 0";
    return pdo_query($sql);
}

function thongke_sanpham_danhmuc(){
    $sql= "SELECT dm.iddm, dm.name, 
    COUNT(*) 'soluong', 
    MIN(price) 'gia_min', 
    MAX(price) 'gia_max', 
    AVG(price) 'gia_avg' 
    FROM danhmuc dm JOIN sanpham sp ON dm.iddm=sp.iddm 
    GROUP BY dm.iddm, dm.name ORDER BY soluong DESC ";
    return pdo_query($sql);
}
<?php
require_once 'pdo.php';

function sanpham_insert($name, $price, $image, $mota, $iddm){
    $sql = "INSERT INTO sanpham(name, price, image, mota, iddm) VALUES (?,?,?,?,?)";
    pdo_execute($sql, $name, $price, $image, $mota, $iddm);
}

function sanpham_update($idpro, $name, $price, $image, $mota, $iddm){
        // Thực hiện câu lệnh UPDATE
        if ($image != "") {
            $sql = "UPDATE sanpham SET name=?, price=?, image=?, mota=?, iddm=? WHERE idpro=?";
        } else {
            $sql = "UPDATE sanpham SET name=?, price=?, mota=?, iddm=? WHERE idpro=?";
        }
        pdo_execute($sql, $idpro, $name, $price, $image, $mota, $iddm);
}

function sanpham_select_by_id($idpro){
    $sql = "SELECT * FROM sanpham WHERE idpro=?";
    return pdo_query_one($sql, $idpro);
}

function sanpham_delete($idpro){
    $sql = "DELETE FROM sanpham WHERE  idpro=?";
    if(is_array($idpro)){
        foreach ($idpro as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $idpro);
    }
}

function sanpham_select_all($keyw="",$iddm=0){
    $sql = "SELECT * FROM sanpham";
    return pdo_query($sql);
}



function sanpham_exist($idpro){
    $sql = "SELECT count(*) FROM sanpham WHERE idpro=?";
    return pdo_query_value($sql, $idpro) > 0;
}

function sanpham_tang_so_luot_xem($idpro){
    $sql = "UPDATE sanpham SET so_luot_xem = so_luot_xem + 1 WHERE idpro=?";
    pdo_execute($sql, $idpro);
}

function sanpham_select_top10(){
    $sql = "SELECT * FROM sanpham WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
    return pdo_query($sql);
}

function sanpham_select_dac_biet(){
    $sql = "SELECT * FROM sanpham WHERE dac_biet=1";
    return pdo_query($sql);
}

function sanpham_select_by_loai($iddm){
    $sql = "SELECT * FROM sanpham WHERE iddm=?";
    return pdo_query($sql, $iddm);
}

function sanpham_select_keyw($keyw){
    $sql = "SELECT * FROM sanpham hh "
            . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
            . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
    return pdo_query($sql, '%'.$keyw.'%', '%'.$keyw.'%');
}

function exist_param($param_name){
    return (isset($_REQUEST[$param_name]) && $_REQUEST[$param_name] != "");
}

function sanpham_select_page(){
    if(!isset($_SESSION['page_no'])){
        $_SESSION['page_no'] = 0;
    }
    if(!isset($_SESSION['page_count'])){
        $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
        $_SESSION['page_count'] = ceil($row_count/10.0);
    }
    if(exist_param("page_no")){
        $_SESSION['page_no'] = $_REQUEST['page_no'];
    }
    if($_SESSION['page_no'] < 0){
        $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
    }
    if($_SESSION['page_no'] >= $_SESSION['page_count']){
        $_SESSION['page_no'] = 0;
    }
    $sql = "SELECT * FROM sanpham ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
    return pdo_query($sql);
}
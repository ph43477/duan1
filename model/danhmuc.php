<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_loai là tên loại
 * @throws PDOException lỗi thêm mới
 */

 function loai_insert($name){
    $sql = "INSERT INTO danhmuc(name) VALUES('$name')";
    pdo_execute($sql);
}
/**
 * Cập nhật tên loại
 * @param int $ma_loai là mã loại cần cập nhật
 * @param String $ten_loai là tên loại mới
 * @throws PDOException lỗi cập nhật
 */

 function load_ten_dm($iddm) {
    if ($iddm > 0) {
        $sql = "SELECT * FROM danhmuc WHERE iddm=".$iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    } else {
        return "";
    }
}

/**
 * Xóa một hoặc nhiều loại
 * @param mix $ma_loai là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function loai_delete($iddm){
    $sql = "DELETE FROM danhmuc WHERE iddm=".$iddm;
    if(is_array($iddm)){
        foreach ($iddm as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $iddm);
    }
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function loai_select_all(){
    $sql = "SELECT * FROM danhmuc";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo mã
 * @param int $ma_loai là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function loai_select_by_id($iddm){
    $sql = "SELECT * FROM danhmuc WHERE iddm=?";
    return pdo_query_one($sql, $iddm);
}
/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $ma_loai là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
function loai_exist($iddm){
    $sql = "SELECT count(*) FROM danhmuc WHERE iddm=?";
    return pdo_query_value($sql, $iddm) > 0;
}
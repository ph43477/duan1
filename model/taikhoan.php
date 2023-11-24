<?php
require_once 'pdo.php';

function taikhoan_insert($iduser, $user, $password, $email, $phone, $role){
    $sql = "INSERT INTO taikhoan(iduser, user, password, email, phone, role) VALUES (?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $iduser, $user, $password, $email, $phone, $role);
}

function taikhoan_update($iduser, $user, $password, $email, $phone, $role){
    $sql = "UPDATE taikhoan SET user=?,password=?,email=?,phone=?,role=? WHERE iduser=?";
    pdo_execute($sql, $iduser, $user, $password, $email, $phone, $role);
}

function taikhoan_delete($iduser){
    $sql = "DELETE FROM taikhoan  WHERE iduser=?";
    if(is_array($iduser)){
        foreach ($iduser as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $iduser);
    }
}

function taikhoan_select_all(){
    $sql = "SELECT * FROM taikhoan";
    return pdo_query($sql);
}

function taikhoan_select_by_id($iduser){
    $sql = "SELECT * FROM taikhoan WHERE iduser=?";
    return pdo_query_one($sql, $iduser);
}

function taikhoan_exist($iduser){
    $sql = "SELECT count(*) FROM taikhoan WHERE $iduser=?";
    return pdo_query_value($sql, $iduser) > 0;
}

function taikhoan_change_password($iduser, $password){
    $sql = "UPDATE taikhoan SET password=? WHERE iduser=?";
    pdo_execute($sql, $password, $iduser);
}
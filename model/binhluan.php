<?php 
    function loadall_binhluan($idpro){
        $sql = "select * from binhluan where 1 ";
            if($idpro > 0 ) {
                $sql.=" AND idpro='".$idpro."'";
            }
            $sql.=" order by id desc";
         $listbl=  pdo_query($sql);
        return $listbl;
    }
    function insert_binhluan($idpro, $noidung){
        $date = date('Y-m-d');
        $sql = "
            INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
            VALUES ('$noidung','2','$idpro','$date');
        ";
        //echo $sql;
        //die;
        pdo_execute($sql);
    }

    function binhluan_delete($id){
        $sql = "DELETE FROM binhluan WHERE id=".$id;
        if(is_array($id)){
            foreach ($id as $ma) {
                pdo_execute($sql, $ma);
            }
        }
        else{
            pdo_execute($sql, $id);
        }
    }

    // function loadall_binhluan($idsp){
    //     $sql = "
    //         SELECT binhluan.id, binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan FROM `binhluan` 
    //         LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
    //         LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
    //         WHERE sanpham.id = $idsp;
    //     ";
    //     $result =  pdo_query($sql);
    //     return $result;
    // }
?>
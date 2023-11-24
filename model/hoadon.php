<?php
    function loadall_hoadon($idpro){
        $sql = "select * from hoadon where 1";
            if($idpro > 0 ) {
                $sql.=" AND idpro='".$idpro."'";
            }
            $sql.=" order by idhd desc";
         $listhd=  pdo_query($sql);
        return $listhd;
    }
?>
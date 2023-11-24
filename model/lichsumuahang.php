<?php
     function loadall_lichsumuahang($idhd){
        $sql = "select * from lichsumuahang where 1";
            if($idhd > 0 ) {
                $sql.=" AND idhd='".$idhd."'";
            }
            $sql.=" order by id desc";
         $listlichsumuahang=  pdo_query($sql);
        return $listlichsumuahang;
    }
?>
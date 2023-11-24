<?php
      function loadall_giohang($idpro){
        $sql = "select * from giohang where 1";
            if($idpro > 0 ) {
                $sql.=" AND idpro='".$idpro."'";
            }
            $sql.=" order by iddh desc";
         $listdh=  pdo_query($sql);
        return $listdh;
    }

    function donhang_delete($iddh){
        $sql = "DELETE FROM giohang WHERE iddh=".$iddh;
        if(is_array($iddh)){
            foreach ($iddh as $madh) {
                pdo_execute($sql, $madh);
            }
        }
        else{
            pdo_execute($sql, $iddh);
        }
    }
?>
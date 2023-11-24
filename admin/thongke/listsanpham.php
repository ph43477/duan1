<div class="container">
          <h1>Thống kê sản phẩm</h1>
         <div>
          <form action="#" method="POST">
           <div>
           <table class="table table-striped">
            <tr>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th>Số lượng</th>
                <th>Gía nhỏ nhất</th>
                <th>Gía lớn nhất</th>
                <th>Gía trung bình</th>
            
            </tr>

            <?php 
                foreach($dsthongkesp as $thongke) {
                    extract($thongke);
            ?>
            <tr>
                <td><?=$idpro?></td>
                <td><?=$name?></td>
                <td><?=$soluong?></td>
                <td>$ <?=$gia_min?></td>
                <td>$ <?=$gia_max?></td>
                <td>$ <?=number_format($gia_avg,2)?></td>
            </tr>
            <?php } ?>
            
           
            
           </table>
           </div>
           <div class="row mb10 ">
            <a href="?act=bieudosp"> <input  class="mr20" type="button" value="XEM BIỂU ĐỒ"></a>
           </div>
          </form>
         </div>
        </div>
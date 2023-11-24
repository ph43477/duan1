<div class="container">
          <h1>Thống kê bình luận</h1>
         <div>
          <form action="#" method="POST">
           <div>
           <table class="table table-striped">
            <tr>
                <th>Iduser</th>
                <th>Nội dung</th>
                <th>Ngày bình luận cũ</th>
                <th>Ngày bình luận mới</th>
            </tr>

            <?php 
                foreach($dsthongkebl as $thongkebl) {
                    extract($thongkebl);
            ?>
            <tr>
                <td><?=$iduser?></td>
                <td><?=$noidung?></td>
                <td><?=$cu_nhat?></td>
                <td><?=$moi_nhat?></td>
            </tr>
            <?php } ?>
            
           
            
           </table>
           </div>
          </form>
         </div>
        </div>
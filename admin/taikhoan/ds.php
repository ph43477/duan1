<div class="container">
        <h1>Danh sách tài khoản</h1>
        <p><a href="../index.php?act=dangky">Thêm tài khoản</a></p>
    <div>
    <form action="#" method="POST">
           <div>
        <table class="table table-striped">
            <tr>
                <th></th>
                <th>Mã tài khoản</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Role</th>
                <th></th>
            </tr>
            <?php
                foreach ($dstk as $taikhoan){
                    extract($taikhoan);
                    $suatk="index.php?act=suatk&id=".$iduser;
                    $xoatk="index.php?act=xoatk&id=".$iduser;

                    echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>'.$iduser.'</td>
                        <td>'.$user.'</td>
                        <td>'.$password.'</td>
                        <td>'.$email.'</td>
                        <td>'.$phone.'</td>
                        <th>'.$role.'</th>
                        <td><a href="'.$suatk.'"><input type="button" value="Sửa"></a> <a href="'.$xoatk.'"><input type="button" value="Xóa"></a></td>
                    </tr>';
                }
            ?>
        </table>
           </div>
    </div>
    <div class="row mb10">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Bỏ tất cả">
        <input type="button" value="Xóa các mục đã chọn">
    </div>
            </form>
</div>
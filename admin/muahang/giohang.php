<div class="container">
        <h2>Giỏ hàng</h2>
        <div>
    <form action="#" method="POST">
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>STT Đơn hàng</th>
                <th>IDuser</th>
                <th>IDpro</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Ngày đặt hàng</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Vòng lặp foreach để lặp qua mảng $listbinhluan và hiển thị thông tin của từng bình luận trong bảng.
                foreach ($dsgiohang as $donhang){ 
                // Trích xuất các phần tử trong mảng $binhluan thành các biến riêng lẻ.
                    extract($donhang);
                    $huydonhang="index.php?act=huydonhang&iddh=".$iddh;

                    echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>'.$iddh.'</td>
                        <td>'.$iduser.'</td>
                        <td>'.$idpro.'</td>
                        <td>'.$soluong.'</td>
                        <td>$'.$price.'</td>
                        <td>'.$ngaydathang.'</td>
                        <td><a href="'.$huydonhang.'"><input type="button" value="Hủy đơn hàng"></a></td>
                    </tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
    </div>
            </form>
</div>
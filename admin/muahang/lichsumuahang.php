<div class="container">
        <h2>Lịch sử mua hàng</h2>
        <div>
    <form action="#" method="POST">
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>STT</th>
                <th>ID Hóa đơn</th>
                <th>IDuser</th>
                <th>IDpro</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Ngày mua hàng</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Vòng lặp foreach để lặp qua mảng $listbinhluan và hiển thị thông tin của từng bình luận trong bảng.
                foreach ($lichsu as $lsmh){ 
                // Trích xuất các phần tử trong mảng $binhluan thành các biến riêng lẻ.
                    extract($lsmh);

                    echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>'.$id.'</td>
                        <td>'.$idhd.'</td>
                        <td>'.$iduser.'</td>
                        <td>'.$idpro.'</td>
                        <td>'.$soluong.'</td>
                        <td>$'.$price.'</td>
                        <td>'.$ngaydathang.'</td>
                    </tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
    </div>
            </form>
</div>
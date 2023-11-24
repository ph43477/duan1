<div class="container">
        <h2>Danh sách bình luận</h2>
        <div>
    <form action="#" method="POST">
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Nội dung bình luận</th>
                <th>Iduser</th>
                <th>Idpro</th>
                <th>Ngày bình luận</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Vòng lặp foreach để lặp qua mảng $listbinhluan và hiển thị thông tin của từng bình luận trong bảng.
                foreach ($dsbl as $binhluan){ 
                // Trích xuất các phần tử trong mảng $binhluan thành các biến riêng lẻ.
                    extract($binhluan);
                    $xoabl="index.php?act=xoabl&id=".$id;

                    echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>'.$id.'</td>
                        <td>'.$noidung.'</td>
                        <td>'.$iduser.'</td>
                        <td>'.$idpro.'</td>
                        <td>'.$ngaybinhluan.'</td>
                        <td><a href="'.$xoabl.'"><input type="button" value="Xóa"></a></td>
                    </tr>';
                }
            ?>
            </tbody>
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
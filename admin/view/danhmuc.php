<div class="container">
    <h2>Quản lý danh mục</h2>
    <p><a href="index.php?act=adddm">Thêm danh mục</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>STT</th>
                <th>Tên danh mục</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dsdm as $loai) {
                extract($loai);
                $suadm="index.php?act=suadm&iddm=".$iddm;
                $xoadm="index.php?act=xoadm&iddm=".$iddm;
                echo '<tr>
                    <td><input type="checkbox" iddm="" name=""></td>
                    <td>'.$iddm.'</td>
                    <td>'.$name.'</td>
                    <td><img src="#" alt="" height="80"></td>
                    <td><a href="'.$suadm.'"><input type="button" value="Sửa"></a>   <a href="'.$xoadm.'"><input type="button" value="Xóa"></a></td>
                </tr>';
            }
            ?>
            
       </tbody>
    </table>
</div>

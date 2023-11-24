<div class="container">
        <h1>Danh sách sản phẩm</h1>
        <div>
        <form action="#" method="POST">
                <form action="index.php?act=sanpham" method="post">
                    <p><a href="index.php?act=addsp">Thêm sản phẩm</a></p>
                    <input type="text" name="keyw">
                    <select name="iddm" id="">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($dssp as $danhmuc) {
                            extract($danhmuc);
                            echo '<option value="' . $idpro . '">' . $name . '</option>';
                        }
                        ?>
                    </select>
                    <input type="submit" name="clickOK" value="GO">
                </form>
                <table class="table table-striped">
                    <tr>
                        <th></th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Hình</th>
                        <th>Mô tả</th>
                        <th>Iddm</th>
                        <th></th>
                    </tr>

                    <?php
                    foreach ($dssp as $sp) {
                        extract($sp);
                        $suasp = "index.php?act=suasp&idpro=" . $idpro;
                        $xoasp = "index.php?act=xoasp&idpro=" . $idpro;
                        $hinhpath = "../upload/" . $image;
                        if (is_file($hinhpath)) {
                            $hinhpath = "<img src= '" . $hinhpath . "' width='100px' height='100px'>";
                        } else {
                            $hinhpath = "No file img!";
                        }
                        echo '<tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>' . $idpro . '</td>
                            <td>' . $name . '</td>
                            <td>$' . $price . '</td>
                            <td>' . $hinhpath . '</td>
                            <td>' . $mota . '</td>
                            <td>' . $iddm . '</td>
                            <td>
                                <a href="' . $suasp . '"><input type="button" value="Sửa"> </a>  
                                <a href="' . $xoasp .'"><input type ="button" value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')"></a>
                            </td>
                    </tr>';
            
                    }
                    ?>
                </table>
            </div>
        </form>
        <div class="row mb10">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Bỏ tất cả">
        <input type="button" value="Xóa các mục đã chọn">
    </div>
    </div>
</div>




</div>
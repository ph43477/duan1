<div class="row">
            <div class="row formtitle mb">
                <h1>Danh sách loại hàng</h1>
            </div>
            <form action="index.php?act=listsp" method="post">
                        <input type="text" name="keyword">
                        <select name="id_danhmuc">
                            <option value="0" selected>Tất cả</option>
                        <?php
                                foreach ($listdanhmuc as $danhmuc) {
                                    extract($danhmuc);
                                    echo '<option value="'.$id.'">'.$name.'</option>';
                                }
                        ?>
                        </select>
                        <input type="submit" name="listloc" value="Lọc">
            </form>
            <div class="row formcontent">
                <div class="row mb10 formdsloai">
                    <table>
                        <tr>
                            <th></th>
                            <th>Mã loại</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Lượt xem</th>
                            <th></th>
                        </tr>
                        <?php
                            foreach ($listsanpham as $sanpham) {
                                extract($sanpham);
                                $suasp="index.php?act=suasp&id=".$id;
                                $xoasp="index.php?act=xoasp&id=".$id;
                                $hinhpath = "../upload/".$img; //đường dẫn hình
                                if(is_file($hinhpath)){
                                    $hinh = "<img src='".$hinhpath."' height='100'";
                                }else{
                                    $hinh = "No image";
                                }
                                echo'<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$id.'</td>
                                <td>'.$name.'</td>
                                <td>'.$price.'</td>
                                <td>'.$hinh.'</td>
                                <td>'.$luotxem.'</td>
                                <td><a href="'.$suasp.'"><input type="button" value="Sửa"></a> <a href="'.$xoasp.'"><input type="button" value="Xoá"></a></td>
                            </tr>';
                            }
                        ?>
                        
                    </table>
                </div>
                <div class="row mb10">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xoá các mục đã chọn">
                    <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
                </div>
            </div>
        </div>
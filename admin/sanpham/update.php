<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$image = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : "";
$hinhpath = "../upload/" . $image;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' width='100px' height='100px'>";
} else {
    $hinh = "LỖI";
}
?>

<div class="container">
    <h1>Sửa sản phẩm</h1>
    <div>
        <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
            <div>
                <label>Danh mục</label><br>
                <select name="iddm">
                    <option value="0" selected>Tất cả</option>
                    <?php
                    foreach ($dsdm as $danhmuc) {
                        extract($danhmuc);
                        if($iddm==$idpro) echo '<option value="'.$idpro.'" selected>'.$name.'</option>';
                        else echo '<option value="'.$idpro.'">'.$name.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="row2 mb10 form_content_container">
                <label>Tên sản phẩm</label><br>
                <input type="text" name="name" value="<?php echo isset($name) ? $name: ''; ?>">
            </div>
            <div class="row2 mb10">
                <label>Giá sản phẩm</label><br>
                <input type="text" name="price" value="<?php echo isset($price) ? $price : ''; ?>">
            </div>
            <div class="row2 mb10">
                <label>Hình ảnh</label><br>
                <input type="file" name="image">
                    <?php echo isset($hinh) ? $hinh: ''; ?>
            </div>
            <div class="row2 mb10">
                <label>Mô tả</label><br>
                <textarea name="mota" cols="30" rows="10"><?php echo isset($mota) ? $mota : ''; ?></textarea>
            </div>
            <div class="row mb10">
                <input type="hidden" name="idpro" value="<?php echo isset($idpro) ? $idpro : ''; ?>">
                <input class="mr20" name="capnhat" type="submit" value="Cập nhật">
                <input class="mr20" type="reset" value="Nhập lại">
                <a href="index.php?act=sanpham"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thanhcong) && $thanhcong != "") {
                echo $thanhcong;
            }
            ?>
        </form>
    </div>
</div>
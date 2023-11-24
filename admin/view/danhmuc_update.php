<?php
if(is_array($dm)){
    extract($dm);
}
?>

<div class="container">
        <h2>Sửa danh mục</h2>
        <form method="post" action="index.php?act=updatedm">
            <div class="form-group">
                <label for="text">STT:</label>
                <input type="text" class="form-control" id="text" name="text">
            </div>
            <div class="form-group">
                <label for="name">Tên danh mục:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($name)&&($name!="")) echo $name; ?>">
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
            </div>
            <input type="hidden" name="iddm" value="<?php if(isset($iddm)&&($iddm>0))echo $iddm ;?>">
            <input class="btn btn-primary" type="submit" name="capnhat" value="Cập nhật">
            <input class="btn btn-primary" type="reset" name="resert" value="Nhập lại">
            <a href="index.php?act=danhmuc"><input class="btn btn-primary" type="button" value="Danh sách"></a>
        <?php 
            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
        ?>
        </form>
        <br>
    </div>
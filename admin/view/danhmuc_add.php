<div class="container">
        <h2>Thêm danh muc</h2>
        <form method="post">
            <div class="form-group">
                <label for="text">STT:</label>
                <input type="text" class="form-control" id="text" name="STT">
            </div>
            <div class="form-group">
                <label for="name">Tên danh muc:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
      </label>
            </div>
            <input class="btn btn-primary" type="submit" name="themmoi" value="Thêm mới">
            <input class="btn btn-primary" type="reset" name="resert" value="Nhập lại">
            <a href="index.php?act=danhmuc"><input class="btn btn-primary" type="button" value="Danh sách"></a>
        <?php 
            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
        ?>
        </form>
        <br>
    </div>
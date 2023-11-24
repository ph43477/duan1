<div class="container">
          <h1>THÊM MỚI SẢN PHẨM</h1>
         <div>
          <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
              <div>
                  <label> Danh mục </label> <br>
                  <select name="iddm" id="">
<!--                      <option value="">Danh mục 1</option>-->
<!--                      <option value="">Danh mục 2</option>-->
                      <?php
                      foreach ($dsdm as $danhmuc){
                          extract($danhmuc);
                          echo '<option value="'.$iddm.'">'.$name.'</option>';
                      }
                      ?>
                  </select>
              </div>
           <div class="row2 mb10 form_content_container">
           <label> Tên sản phẩm </label> <br>
            <input type="text" name="name" placeholder="nhập vào tên san phẩm">
           </div>
           <div class="row2 mb10">
            <label>Giá sản phẩm </label> <br>
            <input type="text" name="price" placeholder="nhập vào của sản phẩm">
           </div>
              <div class="row2 mb10">
                  <label>Hình ảnh </label> <br>
                  <input type="file" name="image" >
              </div>
              <div class="row2 mb10">
                  <label>Mô tả </label> <br>
                  <textarea name="mota" cols="30" rows="10"></textarea>
              </div>
           <div class="row mb10 ">
         <input class="mr20" name="themmoi" type="submit" value="THÊM MỚI">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=sanpham"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
              <?php
              if(isset($thanhcong)&& ($thanhcong!="")){
                  echo $thanhcong;
              }

              ?>
          </form>
         </div>
        </div>
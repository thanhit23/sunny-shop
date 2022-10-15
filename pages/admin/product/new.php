<form method="post" enctype="multipart/form-data">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Add Product</p>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Tên</label>
                  <input name="name" class="form-control" type="text" placeholder="Tên Sản Phẩm...">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Đơn Giá</label>
                  <input name="price" class="form-control" type="number" placeholder="Đơn Giá...">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Giảm Giá</label>
                  <input name="discount" class="form-control" type="number" placeholder="Giảm Giá...">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Hình Ảnh</label>
                  <input name="uploadFile" class="form-control" type="file">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">
                    Mô tả
                    <textarea name="description" rows="6" cols="45"></textarea>
                  </label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Lượt Xem</label>
                  <input name="view" class="form-control" type="number" placeholder="Lượt Xem Của Sản Phẩm...">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="special" class="form-control-label">Đặc Biệt</label>
                  <select name="special" id="special" style="border: 1px solid #d2d6da;font-size: 0.875rem;font-weight: 400;line-height: 1.4rem;color: #495057;">
                    <option value="1">Có</option>
                    <option value="2">Không</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="type" class="form-control-label">Loại</label>
                  <select name="type" id="type" style="border: 1px solid #d2d6da;font-size: 0.875rem;font-weight: 400;line-height: 1.4rem;color: #495057;">
                    <option value="0">Chọn Loại</option>
                    <option value="1">Samsung</option>
                    <option value="2">Iphone</option>
                    <option value="3">Redmi</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <button name="btn-submit" class="btn btn-primary btn-sm ms-auto">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    require($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/admin/footer.php');
    ?>
  </div>
</form>

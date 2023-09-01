
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="?page=posts&action=list&categori=0&custom=add" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề bài viết</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Dường dẫn</label>
                    <input type="text" class="form-control" name="slug" id="exampleInputEmail1" placeholder="Thẻ">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Danh mục</label>
                    <input type="text" class="form-control" name="posts_category_id" id="exampleInputEmail1" placeholder="Thẻ">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nội dung</label>
                    <textarea id="summernote" name="content" ></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Ảnh đại diện</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="thumbnail" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label"  for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit"  class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            
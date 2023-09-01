<?php
include 'function/functions.php';
$value = GetId('posts','name, slug, content, thumbnail, posts_category_id');
?>

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <?php if(isset($value)): ?>
                <?php foreach($value as $key) ?>
              <form method="post" action="?page=posts&action=list&categori=0&custom=edit&edit=<?= $key['id'] ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề bài viết</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề" value="<?= $key["name"]?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Dường dẫn</label>
                    <input type="text" class="form-control" name="slug" id="exampleInputEmail1" placeholder="Thẻ" value="<?= $key['slug'] ?> ">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Danh mục</label>
                    <input type="text" class="form-control" name="posts_category_id" id="exampleInputEmail1" placeholder="Thẻ" value="<?= $key['posts_category_id']?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nội dung</label>
                    <textarea id="summernote" name="content"  ><?= $key['content']?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Ảnh đại diện</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="thumbnail" value="<?= $key['thumbnail'] ?>" class="custom-file-input" id="exampleInputFile">
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
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <?php endif; ?>
            </div>
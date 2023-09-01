<?php
include_once 'function/mainusers.php';
?>
<table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>TÊN</th>
                      <th>EMAIL</th>
                      <th>PASSWORD</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if(isset($data)): ?>
                      <?php foreach($data as $key): ?>
                    <tr>
                      <td><?= $key['id'] ?></td>
                      <td><p><?= $key['name']  ?></p></td>
                      <td> <?= $key['email']  ?></td>
                      <td><?= $key['password']  ?></td>
                      <td><a href="?page=users&action=edit&edit=<?= $key['id']?>"><button
                                            class="btn btn-primary"><i class="fa-solid fa-pen fa-beat fa-xs"></i>
                                            Sửa</button></a>
                                    <a href="?page=users&action=list&remove=<?= $key['id']?>&page-item=1"><button
                                            class="btn btn-danger"><i class="fa-regular fa-circle-xmark fa-spin"
                                                style="color: #ffffff;"></i> Xóa Người Dùng</button></a></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
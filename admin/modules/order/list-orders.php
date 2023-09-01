<?php
include_once 'function/functions.php';

$data = SelectData('orders','customer_name,customer_phone,customer_email,shipping_address,note,total,created_at');



?>
<div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr class='center'>
                                <th>MÃ ĐƠN HÀNG</th>
                                <th>TÊN KHÁCH HÀNG</th>
                                <th>SĐT</th>
                                <th>EMAIL</th>
                                <th>TỔNG TIỀN</th>
                                <th class="content">ĐỊA CHỈ</th>
                                <th>HÀNH ĐỘNG</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($data)): ?>
                            <?php foreach($data as $key): ?>
                            <tr>
                                <td><?= $key['id'] ?></td>
                                <td><?= $key['customer_name'] ?></td>
                                <td><?= $key['customer_phone'] ?></td>
                                <td><?= $key['customer_email'] ?></td>
                                <td><?= number_format($key['total'],0,',','.')?></td>
                                <td class="content"><p><?= $key['shipping_address']?></p></td>
                                <td><a href="?page=order&action=view&id=<?= $key['id']?>"><button
                                            class="btn btn-primary"><i class="fa-solid fa-pen fa-beat fa-xs"></i>
                                            Xem</button></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                
                </div>
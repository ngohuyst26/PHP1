<?php
include_once 'functions.php';
$value = postDataPosts();
AddPosts($value);    
EditPosts($value);
if(isset($_GET['categori'])){
    $value = Paging(CountRow($_GET['categori'],'posts','posts_category_id'),3);
    $data = SelectDataPage('posts','name, slug, content, thumbnail, posts_category_id', 'posts_category_id', $value['startFrom'], $value['recordsPerPage'],$_GET['categori']);
}
Remove('posts');


?>
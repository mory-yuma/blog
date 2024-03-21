<?php 
require_once('blog.php');

$blogs = $_POST;

$blog = new Blog();
$blog->blogValidate($blogs);
$blog->blog_Update($blogs);
?>
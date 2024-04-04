<?php
require_once('blog.php');

$blog = new Blog();
$result = $blog->getById($_GET['id']);
?>



<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <title>ブログ詳細</title>
</head>
<body class="blogDetail">
    <div class="innerWrap">
        <h2>ブログ詳細</h2>
        <hr>
        <div class="flex">
            <h3><?php echo $result['title']?></h3>
            <div>
            <p class="category">カテゴリ：<?php echo $blog->setCategoryName($result['category'])?></p>
                <p class="time"><?php echo $result['post_at']?></p>
            </div>
        </div>
        <hr>
        <div class="text">
            <p><?php echo $result['content']?></p>
        </div>
        <p class="backHome"><a href="/">戻る</a></p>
    </div>
</body>
</html>
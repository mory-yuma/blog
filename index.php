<?php 
require_once('blog.php');
ini_set('display_errors', "On");
$blog = new Blog();
$blogDate = $blog->getAll();

function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <title>ブログ一覧</title>
</head>
<body class="topPage">
    <div class="innerWrap">
        <h1>ブログ一覧</h1>
        <hr>
        <table>
            <tr>
                <th>タイトル</th>
                <th>カテゴリ</th>
                <th>投稿日時</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach($blogDate as $column): ?>
            <tr class="posts">
                <td class="title"><?php echo h($column['title']) ?></td>
                <td><?php echo h($blog->setCategoryName($column['category']))?></td>
                <td><?php echo h($column['post_at']) ?></td>
                <td><a href="detail.php?id=<?php echo $column['id'] ?>">詳細</a></td>
                <td><a href="update_form.php?id=<?php echo $column ['id'] ?>">編集</a></td>
                <td class="delete"><a href="blog_delete.php?id=<?php echo $column ['id'] ?>">削除</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p class="formBtn"><a href="form.html">新規作成</a></p>
    </div>
</body>
</html>

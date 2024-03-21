<?php

require_once('blog.php');

$blog = new Blog();
$result = $blog->getById($_GET['id']);

$title = $result['title'];
$content = $result['content'];
$category = $result['category'];
$publish_status = $result['publish_status'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <title>BlogForm</title>
</head>
<body class="blogForm">
    <div class="innerWrap">
        <h2>ブログ更新フォーム</h2>
        <form action="blog_update.php" method="POST">
            <p class="blogTitle">ブログタイトル<input type="text" name="title" value="<?php echo $title ?>" ></p>
            <p class="blogText">ブログ本文<textarea name="content" id="content" cols="30" rows="10"><?php echo $content ?></textarea></p>
            <p class="blogCategory">カテゴリ
                <select name="category">
                    <option value="1" <?php if($category === 1) echo "selected"?>>日常</option>
                    <option value="2" <?php if($category === 2) echo "selected"?>>プログラミング</option>
                </select>
            </p>
            <input type="radio" name="publish_status" value="1" <?php if($publish_status === 1) echo "checked"?>>公開
            <input type="radio" name="publish_status" value="2" <?php if($publish_status === 2) echo "checked"?>>非公開
            <br>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <p class="send"><input type="submit" value="送信"></p>
        </form>
        <p class="backHome"><a href="/">戻る</a></p>
    </div>
</body>
</html>
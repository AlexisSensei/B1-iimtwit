<?php 
require 'config/database.php'; 

$tags = $db->prepare('SELECT tag_name as name, tag_slug as slug, tag_color as color FROM tags ORDER BY tag_name ASC');
$tags->execute();
$tags = $tags->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIMTWIT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-layout">
        <header class="header">

        </header>
        <main class="feed">
            <?php require 'tpl/loop/single-twit.php'; ?>
        </main>
        <aside>
            <div class="tags-wrapper">
                <?php foreach($tags as $tag) { ?>
                    <button class="tag-button <?= $tag['slug']; ?>" style="--tag-color: #<?= $tag['color']; ?>"><?= $tag['name']; ?></button>
                <?php } ?>
            </div>
        </aside>
    </div>
    
    <footer></footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/main.js"></script>
</body>
</html>
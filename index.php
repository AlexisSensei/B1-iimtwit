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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-layout">
        <header class="header">

        </header>
        <main>

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
    <script src="js/main.js"></script>
</body>
</html>
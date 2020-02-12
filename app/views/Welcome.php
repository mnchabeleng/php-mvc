<?php include "inc/header.php" ?>
<h1><?= $data["page_title"] ?></h1>
<ul>
    <?php foreach($data["posts"] as $post): ?>
    <?= "<li>" ?>
    <?= "<h3>$post->title</h3>" ?>
    <?= "<p>$post->body</p>" ?>
    <?= "</li>" ?>
    <?php endforeach ?>
</ul>
<?php include "inc/footer.php" ?>
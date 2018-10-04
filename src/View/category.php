<!DOCTYPE html>
<html>
<head> ... </head>
<body>
<section>
    <h1>Categorys</h1>
    <ul>
        <?php foreach ($categorys as $category) : ?>
            <li><?= $category['title'] ?></li>
        <?php endforeach ?>
    </ul>
    <a href='showCategory.php?route=categorys'></a>
</section>
</body>
</html>
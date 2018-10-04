
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 01/10/18
 * Time: 17:13
 */
<!DOCTYPE html>
<html>
<head> ... </head>
<body>
    <section>
        <h1>Items</h1>
            <ul>
            <?php foreach ($items as $item) : ?>
                <li><?= $item['title'] ?></li>
            <?php endforeach ?>
            </ul>
        <a href='showItem.php?route=items'></a>
        </section>
</body>
</html>

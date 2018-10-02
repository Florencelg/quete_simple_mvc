<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 01/10/18
 * Time: 17:12
 */
namespace Model;
require __DIR__ . '/../../app/db.php';

class ItemManager
{

    public function selectAllItems(): array
    {
        $pdo = new \PDO(DSN, USER, PASS);
        $query = "SELECT * FROM item";
        $res = $pdo->query($query);
        return $res->fetchAll();
    }
}

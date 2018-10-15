<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 04/10/18
 * Time: 11:57
 */

namespace Model;
require __DIR__ . '/../../app/db.php';

class CategoryManager
{
    public function selectAllCategory():array
    {
        $pdo = new \PDO(DSN, USER, PASS);
        $query = "SELECT * FROM simplemvc.category";
        $res = $pdo->query($query);

        return $res->fetchAll();
    }
    public function selectOneCategory(int $id):array{

        $pdo = new \PDO(DSN, USER, PASS);
        $query = "SELECT * FROM simplemvc.category WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        // contrairement à fetchAll(), fetch() ne renvoie qu'un seul résultat
        return $statement->fetch();
    }
}
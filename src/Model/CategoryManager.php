<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 04/10/18
 * Time: 11:57
 */

namespace Model;


class CategoryManager extends AbstractManager
{
    /**
     * @return array
     */
    public function selectAllCategory():array
    {
        $query = "SELECT * FROM category";
        $res = $pdo->query($query, Category::class);

        return $res->fetchAll();
    }
    public function selectOneCategory(int $id):array
    {
        $query = "SELECT * FROM category WHERE id = :id";
        $statement = $this->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        // contrairement à fetchAll(), fetch() ne renvoie qu'un seul résultat
        return $statement->fetch();
    }
}

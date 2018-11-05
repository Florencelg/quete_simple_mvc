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
     * CategoryManager constructor.
     * @param string $table
     * @param \PDO $pdo
     */
    public function __construct(string $table, \PDO $pdo)
    {
        parent::__construct($table, $pdo);
    }

    /**
     * @param Category $category
     * @return int
     */
    public function category(Category $category):string
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (`category`) VALUES (:title)");
        $statement->bindValue('name', $category->getCategory(), \PDO::PARAM_STR);

        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }
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

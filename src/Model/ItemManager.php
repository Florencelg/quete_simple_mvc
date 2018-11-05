<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 01/10/18
 * Time: 17:12
 */
namespace Model;


class ItemManager extends AbstractManager
{
    public function __construct(string $table, \PDO $pdo)
    {
        parent::__construct($table, $pdo);
    }

    /**
     * @param Item $item
     * @return int
     */
    public function insert(Item $item):string
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (`item`) VALUES (:title)");
        $statement->bindValue('name', $item->getItem(), \PDO::PARAM_STR);

        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }
    /**
     * @return array
     */
    public function selectAllItems():array
    {

        $query = "SELECT * FROM item";
        $res = $pdo->query($query, Item::class);

        return $res->fetchAll();
    }

    /**
     * @param int $id
     * @return array
     */
    public function selectOneItem(int $id):array{

        $query = "SELECT * FROM item WHERE id = :id";
        $statement = $this->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        // contrairement à fetchAll(), fetch() ne renvoie qu'un seul résultat
        return $statement->fetch();
    }
}

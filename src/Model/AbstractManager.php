<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 21/10/18
 * Time: 20:04
 */

namespace Model;

use App\Connection;

abstract class AbstractManager
{
    protected $pdo; // connexion
    protected $table;
    protected $className;

    public function __construct(string $table, \PDO $pdo)
    {

        $this->table = $table;
        $this->className = __NAMESPACE__ . '\\' . ucfirst($table);
        $this->pdo = $pdo;
    }

    public function selectAll(): array
    {
        return $this->pdo->query('SELECT * FROM ' . $this->table, \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }

    public function selectOneById(int $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE id=:id");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
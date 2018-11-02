<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 21/10/18
 * Time: 19:54
 */

namespace Model;


class Category
{
    private $id;
    private $title;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): Category
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle($title):Category
    {
        $this->title = $title;
        return $this;
    }
}

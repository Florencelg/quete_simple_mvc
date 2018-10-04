<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 04/10/18
 * Time: 11:51
 */

namespace Controller;
use Model\CategoryManager;

class CategoryController
{
    public function index()
    {
        $categoryManager = new CategoryManager();
        $categorys = $categoryManager->selectAllCategory();
        require __DIR__ . '/../View/category.php';
    }
    public function show(int $id)
    {
        $categoryManager = new CategoryManager();
        $category = $categoryManager->selectOneCategory($id);

        require __DIR__ . '/../View/showCategory.php';
    }
}

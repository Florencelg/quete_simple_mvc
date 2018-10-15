<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 01/10/18
 * Time: 17:11
 */

namespace Controller;

use Twig_Loader_Filesystem;
use Twig_Environment;
use Model\ItemManager;

class ItemController
{
    private $twig;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
        $this->twig = new Twig_Environment($loader);
    }
    public function index()
   {
       $itemManager = new ItemManager();
       $items = $itemManager->selectAllItems();
       return $this-> twig->render('item.html.twig',['items'=>$items]);
       /**return $view->render(__DIR__.'/../View/View.php',['items'=>$items]);*/
   }
    public function show(int $id)
    {
        $itemManager = new ItemManager();
        $item = $itemManager->selectOneItem($id);
        return $this-> twig->render('showItem.html.twig',['items'=>$item]);
        /**require __DIR__ . '/../View/showItem.html.twig';*/
    }
}

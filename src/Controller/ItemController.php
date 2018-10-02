<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 01/10/18
 * Time: 17:11
 */

namespace Controller;

use Model\ItemManager;



class ItemController
{

   public function index()
   {
       $itemManager = new ItemManager();
       $items = $itemManager->selectAllItems();
       require __DIR__ . '/../View/item.php';
   }

}
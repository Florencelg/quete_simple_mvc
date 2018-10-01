<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 01/10/18
 * Time: 17:11
 */
require __DIR__ . '/../Model/ItemManager.php';

require __DIR__ . '/../View/item.php';

class ItemController
{

   public function index(){
       $items = selectAllItems();
   }

}
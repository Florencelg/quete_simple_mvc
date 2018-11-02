<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 01/10/18
 * Time: 17:11
 */

namespace Controller {

    use Model\Item;
    use Model\ItemManager;

    class ItemController extends AbstractController
    {
        protected $twig;

        public function index()
        {
            $itemManager = new ItemManager($this->pdo);
            $items = $itemManager->selectAll();
            return $this->pdo->render('item.html.twig', ['items' => $items]);
            /**return $view->render(__DIR__.'/../View/View.php',['items'=>$items]);*/
        }

        public function show(int $id)
        {
            $itemManager = new ItemManager($this->pdo);
            $item = $itemManager->selectOneById($id);
            return $this->pdo->render('showItem.html.twig', ['items' => $item]);
            /**require __DIR__ . '/../View/showItem.html.twig';*/
        }

        public function add()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $itemManager = new ItemManager($this->getPdo());
                // l'objet $item hydraté est simplement envoyé en paramètre de insert()
                $item = new Item();
                $item->setTitle(trim($_POST['title']));
                $itemManager->insert($item);
                // si tout se passe bien, redirection
                header('Location: /');
                exit();
            }
            // le formulaire HTML est affiché (vue à créer)
            return $this->pdo->render('item/add.html.twig');
        }
    }
}



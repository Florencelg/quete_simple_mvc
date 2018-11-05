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

    /**
     * Class ItemController
     * @package Controller
     */
    class ItemController extends AbstractController
    {
        /**
         * @return string
         * @throws \Twig_Error_Loader
         * @throws \Twig_Error_Runtime
         * @throws \Twig_Error_Syntax
         */
        public function index():string
        {
            $itemManager = new ItemManager($this->getPdo());
            $items = $itemManager->selectAll();

            return $this->twig->render('Item/index.html.twig', ['items' => $items]);

        }

        /**
         * @param int $id
         * @return string
         * @throws \Twig_Error_Loader
         * @throws \Twig_Error_Runtime
         * @throws \Twig_Error_Syntax
         */
        public function show(int $id)
        {
            $itemManager = new ItemManager($this->getPdo());
            $item = $itemManager->selectOneById($id);

            return $this->twig->render('Item/show.html.twig', ['items' => $item]);

        }

        /**
         * @param int $id
         * @return string
         * @throws \Twig_Error_Loader
         * @throws \Twig_Error_Runtime
         * @throws \Twig_Error_Syntax
         */
        public function edit(int $id): string
        {
            $itemManager = new ItemManager($this->getPdo());
            $item = $itemManager->selectOneById($id);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $item->setTitle($_POST['title']);
                $itemManager->update($item);
            }
            return $this->twig->render('Item/edit.html.twig', ['item' => $item]);
        }

        /**
         * @return string
         * @throws \Twig_Error_Loader
         * @throws \Twig_Error_Runtime
         * @throws \Twig_Error_Syntax
         */
        public function add()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $itemManager = new ItemManager($this->getPdo());
                // l'objet $item hydraté est simplement envoyé en paramètre de insert()
                $item = new Item();
                $item->setTitle($_POST['title']);
                $id=$itemManager->insert($item);
                // si tout se passe bien, redirection
                header('Location: /item/'.$id);
            }
            // le formulaire HTML est affiché (vue à créer)
            return $this->twig->render('Item/add.html.twig');
        }

        /**
         * @param int $id
         */
        public function delete(int $id)
        {
            $itemManager = new ItemManager($this->getPdo());
            $itemManager->delete($id);
            header('Location:/');
        }

    }
}



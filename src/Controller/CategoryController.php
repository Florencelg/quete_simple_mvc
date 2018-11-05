<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 04/10/18
 * Time: 11:51
 */
namespace Controller {

    use Model\Category;
    use Model\CategoryManager;

    class CategoryController extends AbstractController
    {
        private $twig;

        public function index()
        {
            $categoryManager = new CategoryManager($this->pdo);
            $categorys = $categoryManager->selectAll();
            return $this-> twig->render('category.html.twig',['categorys'=>$categorys]);
        }
        public function show(int $id)
        {
            $categoryManager = new CategoryManager($this->pdo);
            $category = $categoryManager->selectOneById($id);

            return $this-> twig->render('showCategory.html.twig',['category'=>$category]);
        }
        public function add()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $categoryManager = new CategoryManager($this->getPdo());
                // l'objet $item hydraté est simplement envoyé en paramètre de insert()
                $category = new Category();
                $category->setTitle(trim($_POST['title']));
                $categoryManager->insert($category);
                // si tout se passe bien, redirection
                header('Location: /');
                exit();
            }
            // le formulaire HTML est affiché (vue à créer)
            return $this->pdo->render('category/add.html.twig');
        }
    }
}

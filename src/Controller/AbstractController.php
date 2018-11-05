<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 21/10/18
 * Time: 17:45
 */

namespace Controller;

use Twig_Loader_Filesystem;
use Twig_Environment;
use App\Connection;

abstract class AbstractController
{
    /**
     * @var Twig_Environment
     */
    protected $twig;
    /**
     * @var \PDO
     */
    protected $pdo;

    /**
     * AbstractController constructor.
     */
    public function __construct()
    {
        //instanciation de twig
        $loader = new Twig_Loader_Filesystem(APP_VIEW_PATH);
        $this->twig = new Twig_Environment(
            $loader,
            [
            'cache' => !APP_DEV,
            'debug' => APP_DEV,
                ]
        );
        $this->twig->addExtension(new \Twig_Extension_Debug());

        //instanciation de la connexion à la BDD
        $connection = new Connection();
        $this->pdo =$connection->getPdoConnection();
    }

    /**
     * @return \PDO
     */
    public function getPdo(): \PDO
    {
        return $this->pdo;
    }
}

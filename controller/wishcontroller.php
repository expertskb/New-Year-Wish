<?php

namespace Shakib\Controller;

class WishController
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function index()
    {
        $content = $this->render(__DIR__ . '/../views/wish.php', ['name' => $this->id]);
        echo ($content);
    }

    private function render($viewPath, $data = [])
    {
        if (file_exists($viewPath)) {
            extract($data); // Extract the variables from the associative array

            ob_start();
            include $viewPath;
            return ob_get_clean();
        } else {
            return 'View not found';
        }
    }
}

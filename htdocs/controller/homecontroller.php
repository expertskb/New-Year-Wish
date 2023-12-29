<?php

namespace Shakib\Controller;

class HomeController
{
    public function index()
    {
        $content = $this->render(__DIR__ . '/../views/welcome.php');
        echo ($content);
    }

    private function render($viewPath)
    {
        if (file_exists($viewPath)) {
            ob_start();
            include $viewPath;
            return ob_get_clean();
        } else {
            return 'View not found';
        }
    }
}

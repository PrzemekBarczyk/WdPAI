<?php

class AppController {

    private $request;

    public function __construct() {
        $this->reqest = $_SERVER['REQUEST_METHOD'];
    }

    protected function isGet(): bool {
        return $this->reqest === "GET";
    }

    protected function isPost(): bool {
        return $this->reqest === "POST";
    }

    protected function render(string $template=null, array $variables = []) {

        $templatePath = 'public/views/'.$template.'.php';
        $output = 'File not found';

        if (file_exists($templatePath)) {
            extract($variables);

            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }

        print $output;
    }
}
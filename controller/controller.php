<?php

class Controller {
    public function view(string $view, array $data = []) {
        extract($data);
        include_once "views/{$view}.php";
    }
}
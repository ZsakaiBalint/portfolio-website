<?php

require_once 'controller.php';

class HomeController extends Controller {

    public function index() {
        $this->view('home');
    }

    public function about() {
        $this->view('about');
    }

    public function blog() {
        $this->view('blog');
    }

    public function error() {
        $this->view('error');
    }

    public function maintenance() {
        $this->view('maintenance');
    }

}
?>

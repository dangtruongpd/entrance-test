<?php

namespace Core;

class Controller
{
    public function __construct()
    {
        $act = 'index';
        if (isset($_GET['act'])) {
            if (method_exists($this, $_GET['act'])) {
                $act = $_GET['act'];
            } else {
                $this->view('404'); // provide your own HTML for the error page
                exit();
            }
        }
        $this->$act();
    }
    public function getID()
    {
        if (!isset($_GET['id']) || $_GET['id'] === '') {
            $this->view('404'); // provide your own HTML for the error page
            exit();
        } else {
            return (int)$_GET['id'];
        }
    }
    public function getPost()
    {
        $postData = [];
        if (isset($_POST)) {
            foreach ($_POST as $key => $value) {
                $postData[htmlspecialchars($key)] = htmlspecialchars($value);
            }
        }
        return $postData;
    }
    public function view($file, $data = array())
    {
        $path = "./views/$file.php";
        require_once($path);
    }
}

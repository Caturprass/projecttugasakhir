<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message'); //parameter string tulisan welcome_message artinya CI akan memanggil sebuah file dengan nama welcome_message.php didalam folder view

    }
    public function coba()
    {
        echo "Hello World";
    }
}

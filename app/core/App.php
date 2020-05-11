<?php

class App {
    //controller default
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){

        //controller
        $url = $this->parseURL();
        
        if(file_exists('../app/controllers/' . $url[0]. '.php')){
            $this->controller = $url[0];
            //menghapus home
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        //class nya di instansiasi supaya kita bisa mengambil method nya nanti
        $this->controller = new $this->controller;


        //method
        if(isset($url[1])){
            //jika ada, kita cek apakah method nya ada dalam controller nya.
            if(method_exists($this->controller,$url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //params
        if(!empty($url)){
            //ambil data
            $this->params = array_values($url);
        }

        //jalankan controller &method, serta kirimkan params
        call_user_func_array([$this->controller,$this->method],$this->params);

    }

    //mengambil url
    //memecah sesuai keinginan kitaS
    public function parseURL(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            //ingin membersihkan url
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }
}




<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientModel extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function requestDataGet($url){
        $this->curl->create($url);
        //$this->curl->option(CURLOPT_HTTPHEADER, array('key:'.$key));
        $this->curl->get();
        $execute = json_decode($this->curl->execute());
        return $execute;
    }

    function requestDataPost($url, $data){
        $this->curl->create($url);
        //$this->curl->option(CURLOPT_HTTPHEADER, array('key:'.$key));
        $this->curl->post($data);
        $execute = json_decode($this->curl->execute());
        return $execute;
    }
}
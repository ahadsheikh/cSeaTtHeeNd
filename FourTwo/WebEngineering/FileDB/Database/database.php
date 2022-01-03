<?php

class Database{
    private $dbPath = '';

    public function __construct($dbPath){   
        $this->dbPath = $dbPath;
    }

    private function get_data(){
        $db = array();
        if(file_exists($this->dbPath)){
            $json = file_get_contents('db.json');
            $db = json_decode($json, true);
        }
        return $db;
    }
    private function write_data($data_arr){
        $json_sting = json_encode($data_arr);
        file_put_contents('db.json', $json_sting);
        return true;
    }

    private function validate($data){
        $schema = [
            'title' => 'string',
            'author' => 'string',
            'available' => 'boolean',
            'isbn' => 'string'
        ];
        foreach($schema as $key => $value){
            if( !isset($data[$key]) || ( gettype($data[$key]) != $schema[$key] ) ){
                return false;
            }
        }
        return true;
    }

    public function list(){
        return $this->get_data();
    }

    public function create($data){
        if($this->validate($data)){
            $db = $this->get_data();
            array_push($db, $data);
            $this->write_data($db);
            return count($db);
        }else{
            return 0;
        }        
    }

    public function get($id){
        $db = $this->get_data();
        if($id-1 <= count($db)){
            return $db[$id-1];
        }else{
            return array();
        }
    }
    public function delete($id){
        $db = $this->get_data();
        $out = array();
        if($id <= count($db)){
            $out = array_splice($db, $id-1, 1);
            $this->write_data($db);
            return $out;
        }
        return $out;
    }
}
<?php

//namespace Traits;

trait XML {

    public function readFile() {

    }

    public function getXML($path) {
        return simplexml_load_file($path);
    }

    public function XMLDOM($path) {
        return new domxml_open_file($path);
    }

    public function XMLtoArray($xml) {
        return json_decode(json_encode($xml));
    }
}
<?php

namespace Views;

abstract class View {

    private $landing = 'page';

    private function __construct() {
        global $settings;
        $settings->log['viewclass'] = __CLASS__;
    }

    private function quasiconstructor() {
        
    }

    private function render() {
        
    }

    private function includeTemplate() {

    }

}
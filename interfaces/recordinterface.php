<?php

namespace Scientometrics\Interfaces;

interface RecordInterface
{
    public function getData();
    public function save();
    public function getById($id);
}

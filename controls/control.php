<?php

namespace Scientometrics\Controls;

use Scientometrics\Models as Models;
use Scientometrics\Models\Records as Records;
use Scientometrics\Models\Service as Service;

class Control extends Controls\Controller
{

    public function control($request, $response, $parameters): void
    {

    }

    private function checkStatus()
    {
        if ($_SESSION['access'] != $this->access) {
            return $this->response->withRedirect('/', 403);
        }
    }

    protected function init()
    {

    }

}

<?php

namespace Scientometrics\Controls;

use Scientometrics\Models as Models;
use Scientometrics\Controls as Controls;
use Scientometrics\Models\Records as Records;
use Scientometrics\Models\Service as Service;
use Scientometrics\Models\Service\Page;

class Control extends Controls\Controller
{

    public function actionControl($request, $response, $parameters)
    {

        $this->view->render($response, 'controlpanel.twig.html', [
            'page' => Page::getPage(),
            'users' => (new Records\Authors($this->pdo, $this->fluent))->list()->getData(),
            'articles' => (new Records\Articles($this->pdo, $this->fluent))->list()->getData()
        ]);

    } // end action



    private function checkStatus()
    {

        if ($_SESSION['access'] != $this->access) {
            return $this->response->withRedirect('/', 403);
        }

    } // end function



    protected function init()
    {

        $this->access = ['administrator', 'supervisor'];

    } // end function

} // end class

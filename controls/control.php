<?php

namespace Scientometrics\Controls;

use Scientometrics\Models as Models;
use Scientometrics\Controls as Controls;
use Scientometrics\Models\Records as Records;
use Scientometrics\Models\Service as Service;

class Control extends Controls\Controller
{

    public function actionControl($request, $response, $parameters)
    {

        $data['page'] = (new Service\Page())->getData();
        //$data['users'] = (new Records\Users($this->pdo, null, $this->slimpdo))->findAll();
        $data['users'] = (new Records\Authors($this->pdo, $this->fluent))->list()->getData();
        $data['articles'] = (new Records\Articles($this->pdo, $this->fluent))->list()->getData();
        $this->view->render($response, 'controlpanel.twig.html', $data);

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

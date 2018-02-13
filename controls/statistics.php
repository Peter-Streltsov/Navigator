<?php

namespace Scientometrics\Controls;

use Scientometrics\Controls as Controls;
use Scientometrics\Models as Models;
use Scientometrics\Models\Service as Service;
use Scientometrics\Models\Records as Records;
use Scientometrics\Models\Subrecords as Subrecords;

class Statistics extends Controls\Controller
{

    public function setAccessParameters()
    {
        $this->access = ['user', 'administrator', 'supervisor'];
    }


    /**
     * renders public statistic and common data
     *
     * @return void
     */
    public function renderPublic($request, $response)
    {
        $this->checkAccess(['supervisor']);
        $data['page'] = (new Models\Page())->getData();
        $data['articles'] = (new Records\Articles($this->pdo, $this->fluent))->list()->getData();
        $data['countusers'] = count((new Records\Authors($this->pdo, $this->fluent))->list()->getData());
        $data['count'] = count($data['articles']);
        $this->view->render($response, 'stat.twig.html', $data);

    } // end function

    /**
     * Undocumented function
     *
     * @return void
     */
    public function renderControl($request, $response, $parameters): void
    {
        //return $this->view->render();
    }
}

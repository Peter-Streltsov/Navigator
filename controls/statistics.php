<?php

namespace Scientometrics\Controls;

use Scientometrics\Controls as Controls;
use Scientometrics\Models\Records as Records;
use Scientometrics\Models as Models;

class Statistics extends Controls\Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function renderPublic($request, $response)
    {
        $data['page'] = (new Models\Page())->getData();
        $data['users'] = (new Records\Authors($this->pdo, $this->fluent))->list()->getData();
        $data['articles'] = (new Records\Articles($this->pdo, $this->fluent))->list()->getData();
        $data['countusers'] = count($data['users']);
        $data['count'] = count($data['articles']);
        $this->view->render($response, 'stat.twig.html', $data);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function renderControl($request, $response, $parameters)
    {
        //return $this->view->render();
    }
}

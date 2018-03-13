<?php

namespace Scientometrics\Controls;

use Scientometrics\Controls as Controls;
use Scientometrics\Models\Service as Service;
use Scientometrics\Models\Records as Records;
use Scientometrics\Models\Records\Authors;
use Scientometrics\Models\Data as Data;
use Scientometrics\Models\Service\Page;


/**
 * Class PublicController
 * Providing information for registered users
 *
 * @package Scientometrics\Controls
 * @since 0.3.5x
 */
class PublicController extends Controls\Controller
{

    /**
     * Called in parent constructor
     * Setting class parameters for all class actions
     *
     * @since 0.3.55
     * @return void
     */
    protected function init()
    {

        $this->access = ['user', 'administrator', 'supervisor'];
        $this->checkAccess($this->access);

    } // end function



    /**
     * ACTION
     *
     * @param $request
     * @param $response
     */
    public function users($request, $response)
    {

        Page::message('info', 'Список пользователей');

        $this->view->render($response, 'userlist.twig.html', [
            'users' => (new Authors($this->pdo, $this->fluent))->list()->getData(),
            'page' => (new Page())->getData()
        ]);

    } // end action



    /**
     * ACTION
     * renders public statistic and common data
     *
     * @return void
     */
    public function publicStatistics($request, $response)
    {

        $articles = (new Records\Articles($this->pdo, $this->fluent))->list()->getData();
        $users = (new Records\Authors($this->pdo, $this->fluent))->list()->getData();
        
        $this->view->render($response, 'stat.twig.html', [
            'page' => Page::getPage(),
            'count' => count($articles),
            'countusers' => count($users)
        ]);

    } // end action

} // end class

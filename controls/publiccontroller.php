<?php

namespace Scientometrics\Controls;

use Scientometrics\Widgets as Widgets;
use Scientometrics\Controls as Controls;
use Scientometrics\Models\Service as Service;
use Scientometrics\Models\Records as Records;
use Scientometrics\Models\Data as Data;


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
    }

    /**
     *
     *
     * @param $request
     * @param $response
     */
    public function users($request, $response)
    {
        $data['page'] = $this->pagedata->getData();
        $users = new Records\Authors($this->pdo);
        $data['users'] = $users->list()->getData();
        $this->view->render($response, 'userlist.twig.html', $data);
    } // end function


    /**
     * renders public statistic and common data
     *
     * @return void
     */
    public function publicStatistics($request, $response)
    {

        $data = (new Data\Statistics($this->pdo, $this->fluent))->getPublicStatistics();
        $this->view->render($response, 'stat.twig.html', $data);

    } // end function

} // end class

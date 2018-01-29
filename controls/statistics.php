<?php

namespace Scientometrics\Controls;

use Scientometrics\Controls as Controls;

class Statistics extends Controls\Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function plotPublic()
    {
        return $this->view->render();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function plotControl()
    {
        return $this->view->render();
    }
}

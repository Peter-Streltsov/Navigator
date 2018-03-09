<?php

namespace Scientometrics\Controls;

use Scientometrics\Controls as Controls;
use Scientometrics\Models\Service as Service;

class personal extends Controls\Controller
{

    /**
     * controller access parameters
     */
    protected function init()
    {
        $this->access = ['user', 'administrator', 'supervisor'];
    }

    /**
     * personal 'cabinet' action
     * @since 0.3.59
     * @param $request
     * @param $response
     * @return mixed
     */
    public function personalPage($request, $response, $parameters)
    {
        //$data['page'] = (new Service\Page())->getData();
        $this->data['userid'] = $parameters['id'];

        return $this->view->render($response, 'personal.twig.html', $this->data);

    } // end action


    /**
     * GET action - message from user
     *
     * TODO: finish action
     *
     * @since 0.3.59
     * @param $request
     * @param $response
     * @param $parameters
     * @return mixed
     */
    public function issueMessage($request, $response, $parameters)
    {

        $data['page'] = (new Service\Page())->getData();
        $data['userid'] = $parameters['id'];

        return $this->view->render($response, 'message.twig.html', $data);

    } // end action


    /**
     * POST action
     * sending message
     * inserting message into database and sending e-mail to administrators
     */
    public function sendIssueMessage()
    {
        $query = "SELECT login FROM users WHERE users.access='supervisor' OR users.access='administrator'";

    } // end action

} // end class

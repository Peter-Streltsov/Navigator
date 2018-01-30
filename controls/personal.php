<?php

namespace Scientometrics\Controls;

class Personal extends Controller
{
    public function personal($request, $response, $parameters)
    {
        $this->views->render($response, 'cabinet.twig.html', $data);
    }

    /**
     * displays message dialog
     *
     * @param [type] $request
     * @param [type] $response
     * @param [type] $parameters
     * @return void
     */
    public function issueMessage($request, $response, $parameters): void
    {
        $data['page'] = (new Models\Page())->getData();
        $this->view->render($response, 'issuemessage.twig.html', $data);
    }

    /**
     * 
     *
     * @param [type] $request
     * @param [type] $response
     * @param [type] $parameters
     * @return void
     */
    public function sendMessage($request, $response): void
    {
        $data['page'] = (new Models\Page())->getData();
    }
}

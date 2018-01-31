<?php

namespace Scientometrics\Controls;

class Personal extends Controller
{

    /**
     * 
     * @since 0.3.xx
     * 
     */


    /**
     * Undocumented function
     *
     * @param [type] $request
     * @param [type] $response
     * @param [type] $parameters
     * @return void
     */
    public function personal($request, $response, $parameters): void
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
     * sending issue message
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

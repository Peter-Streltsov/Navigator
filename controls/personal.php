<?php

namespace Scientometrics\Controls;

use Scientometrics\Models as Models;
use Scientometrics\Models\Records as Records;

class Personal extends Controller
{

    /**
     * personal user/author pages controller
     * 
     * @since 0.3.xx
     * 
     */


    /**
     * Undocumented function
     *
     * @param Slim\Http\Request $request
     * @param Slim\Http\Response $response
     * @param array $parameters
     * @return void
     */
    public function personal($request, $response, $parameters): void
    {
        $response->getBody()->write('personal cabinet mockup for user with id='.$parameters['id']);
        //$this->views->render($response, 'personal.twig.html', $data);
    }

    /**
     * displays message dialog
     *
     * @param Slim\Http\Request $request
     * @param Slim\Htp\Response $response
     * @param array $parameters
     * @return void
     */
    public function issueMessage($request, $response, $parameters): void
    {
        $data['page'] = (new Models\Page())->getData();
        //var_dump($data);
        $response->getBody()->write('issue message dialog mockup');
        //$this->view->render($response, 'issuemessage.twig.html', $data);
    }

    /**
     * sending issue message
     *
     * @param Slim\Http\Request $request
     * @param Slim\Http\Response $response
     * @param array $parameters
     * @return Slim\Http\Response
     */
    public function sendMessage($request, $response)
    {
        $_POST['sender'];
        $_POST['name'];
        $_POST['messagebody'];
        return $response->withRedirect();
    }
}

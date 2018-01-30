<?php

namespace Scientometrics\Bin;

use Slim\App;
use Telegram\Bot\Api;
use Scientometrics\Models as Models;
use Scientometrics\Models\Records as Records;
use Scientometrics\Models\Service as Service;
use Scientometrics\Controls as Controls;
use Scientometrics\Config as Config;
use Scientometrics\Bot as Bot;

session_start();

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$application = new \Slim\App($configuration);

require_once CONTAINERS;

require_once CUSTOM_MIDDLEWARE;



/**
 * Routes
 */



// index page
$application->get('/', function($request, $response) {
    //var_dump($this->databaseconnection);
    $data['page'] = (new Models\Page())->common()->getData();
    $this->views->render($response, 'index.twig.html', $data);
});


// authorization
$application->get('/authorize', function($request, $response) {
    return $this->views->render($response, 'gate.twig.html');
});

// testing url
$application->get('/test', function($request, $response) {
    $response->getBody()->write($_SESSION['status']);
});



/**
 * public routes
 * user data - public access
 */
$application->group('/public', function() {

    // general statistics
    /*$this->get('/state', function($request, $response) {
        $data['page'] = (new Models\Page())->getData();
        $data['users'] = (new Records\Authors($this->pdo, $this->fluent))->list()->getData();
        $data['articles'] = (new Records\Articles($this->pdo, $this->fluent))->list()->getData();
        $data['countusers'] = count($data['users']);
        $data['count'] = count($data['articles']);
        $this->views->render($response, 'stat.twig.html', $data);
    }); */

    $this->get('/state', Controls\Statistics::class . ':renderPublic');

    $this->get('/contributions', function($request, $response) {
        $this->response->getBody()->write('public scientific results');
    });
    
    // personal public user data
    $this->group('/users', function() {

        /**
         * GET-routes
         */

        // public list of authors and basic author's data
        $this->get('', function($request, $response) {
            $data['page'] = (new Models\Page())->common()->getData();
            $users = new Records\Authors($this->pdo);
            $data['users'] = $users->list()->getData();
            $this->views->render($response, 'userlist.twig.html', $data);
        });
        
        // author personal page
        $this->get('/{id}', function($request, $response, $parameters) {
            $this->response->getBody()->write('author personal page - '.$parameters['id']);
        });
    });
});




/**
 * private routes
 * control panel routes - admin authentication only
 */
$application->group('/control', function() {
    
    $this->get('/schema', function($request, $response) {
        $database = new Models\Service\Schema($this->pdo, $response);
        $database->createScheme();
    });

    // control panel menu
    $this->get('', function($request, $response) {
        $data['page'] = (new Models\Page())->getData();
        $data['users'] = (new Records\Authors($this->pdo, $this->fluent))->list()->getData();
        $data['articles'] = (new Records\Articles($this->pdo, $this->fluent))->list()->getData();
        if (isset($_SESSION['messages'])) {
            $data['page']['messages'] = $_SESSION['messages'];
        }
        $this->views->render($response, 'controlpanel.twig.html', $data);
    });



    /**
     * User control group
     */
    $this->group('/users', function(){

        /**
         * GET-routes
         */

        $this->get('', function($request, $response) {
            return $response->getBody()->write('users list');
        });

        // exact user data
        $this->get('/get/{id}', function($request, $response, $id) {
            $users = new Records\Authors($this->pdo, $this->fluent);
            $data['user'] = $users->getById($id['id']);
            $this->views->render($response, 'userdata.twig.html', $data);
        });

        
        $this->get('/edit/{id}', function($request, $response, $id) {
            $data['page'] = (new Models\Page())->common()->getData();
            $data['user'] = (new Records\Authors($this->pdo, $this->fluent))->getById($id['id']);
            return $this->views->render($response, 'useredit.twig.html', $data);
        });

        // changing user status
        $this->get('/make/{status}/{id}', function($request, $response, $link) {
            $response->getBody()->write('setting status '.$link['status'].' for user '.$link['id']);
            switch ($link['status']) {
                case 'author':
                break;
                case 'admin':
                break;
            }
        });
        
        /**
         * POST-routes
         * 
         */
        $this->post('/add', function($request, $response) use($application) {
            header("Content-Type: text/html; charset=utf-8");
            $user = new Records\Authors($this->pdo, $this->fluent);
            $_POST['added'] = date('Y-m-d');
            $user->setName($_POST['name'])
            ->setSecondname($_POST['secondname'])
            ->setLastname($_POST['lastname'])
            ->setPosition($_POST['position'])
            ->setEdu($_POST['edu'])
            ->setExpirience($_POST['expirience'])
            ->setGrade($_POST['grade'])
            ->setAge($_POST['age'])
            ->setAdded()
            ->save();
            $messages = new Service\Messages();
            $messages->setSuccess("Пользователь ".$_POST['name']." ".$_POST['lastname']." успешно создан");
            $data['messages'] = $messages->getData();
            $_SESSION['messages'] = $data['messages'];
            return $response->withRedirect('/control');
        });

        /**
         * AUTHORS subgroup
         * users with 'author' status
         */

        $this->group('/authors', function() {

            // AUTHORS list
            $this->get('', function($request, $response) {
                $response->getBody()->write('authors list');
            });

            $this->get('/{id}', function($request, $response, $link) {
                $response->getBody()->write('information on author id '.$link['id']);
            });
        });
    });
});


/**
 * 
 */
$application->group('/personal', function() {

    $this->get('/{id}', function($request, $response, $link) {
        $response->getBody()->write('personal page for user id '. $link['id']);
    });

    $this->get('/{id}/message', function($request, $response, $id) {
        return $this->views->render($response, 'message.twig.html');
    });

});








// input page for adding new user
$application->get('/control/users/add', function($request, $response) {
    $data['page'] = (new Models\Page())->common()->getData();
    $data['positions'] = (new Records\Positions($this->pdo, $this->fluent))->getPositions();
    $data['grades'] = (new Records\Grades($this->pdo, $this->fluent))->getGrades();
    $this->views->render($response, 'adduser.twig.html', $data);
});

// personal user page
$application->get('/public/users/personal/{id}', function($request, $response, $id) {
    $data['page'] = (new Models\Page())->common()->getData();
    $this->views->render($response, 'personal.twig.html', $data);
});


// logging out
$application->get('/users/logout', function($request, $response) {
});

/**
 * /public/articles/
 */

// articles list
$application->get('/articles', function($request, $response){
    $articles = new Records\Articles($this->pdo, $this->fluent);
    $data['articles'] = $articles->articlesList();
    $this->views->render($response, 'articleslist.twig.html', $data);
});

// getting exact article by id
$application->get('/articles/get/{id}', function($request, $response, $id) {
    $article = new Records\Articles($this->pdo);
    $data['article'] = $article->getArticlesList();
    $this->views->render($response, 'articledata.twig.html', $data);
});

// adding article
$application->get('/articles/add', function($request, $response) {
    $this->views->render($response, 'addarticle.twig.html');
});

// monographies list
$application->get('/monographies', function($request, $response) {
    $monographies = new Records\Monographies($this->pdo, $this->fluent);
    $data['monographies'] = $monographies->monographiesList();
    var_dump($data['monographies']);
});

// monography by id
$application->get('/monographies/get/{id}', function($request, $response, $id) {
    $monographies = new Records\Monographies($this->pdo, $this->fluent);
    $data['monographies'] = $monographies->monographyById($id['id']);
});

// telegram bot
$application->get('/bot', function($request, $response) {
    $response->getBody()->write('telegram bot mockup');
});

$application->get('/control/indexes', function($request, $response) {
    $data['page'] = (new Models\Page())->getData();
    $data['indexes'] = (new Records\Indexes($this->pdo, $this->fluent))->getIndexes()->getData();
    return $this->views->render($response, 'indexes.twig.html', $data);
});

//


/**
 * POST contollers
 */

// adding article
$application->post('/articles/add', function($request, $response){
    $user = new Records\Authors($this->pdo); //???
    $article = new Records\Articles($this->fluent);
    $response->getBody()->write('adding another article');
});

// updatong indexes
$application->post('/control/indexes/update', function($request, $response) {
    $values = [$_POST['1'], $_POST['2'], $_POST['3'], $_POST['4'], $_POST['5'], $_POST['6'], $_POST['7']];
    $indexes = new Records\Indexes($this->pdo, $this->fluent);
    $indexes->setIndexes($values);
    return $response->withRedirect('/control');
});


// run
$application->run();

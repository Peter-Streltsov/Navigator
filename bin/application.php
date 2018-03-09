<?php

namespace Scientometrics\Bin;

use Slim\App;
use Scientometrics\Widgets as Widgets;
use Scientometrics\Models as Models;
use Scientometrics\Models\Records as Records;
use Scientometrics\Models\Service as Service;
use Scientometrics\Controls as Controls;
use Scientometrics\Config as Config;

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
$application->any('/', function($request, $response) {
    $data['page'] = (new Service\Page())->getData();
    $this->views->render($response, 'index.twig.html', $data);
});


/**
 * authorization routes
 */
$application->get('/login', function($request, $response) {
    $this->views->render($response, 'gate.twig.html');
})->setName('userlogin');

$application->get('/logout', function($request, $response) {
    unset($_SESSION);
    session_destroy();
    return $response->withRedirect('/');
});


/**
 * feature testing routes
 */
$application->group('/test', function() use ($application) {

});

// ???
$application->post('/auth', function($request, $response) {
    $_SESSION['login'] = $_POST['login'];
    return $response->withRedirect('');
});



/**
 * public routes
 * user data - public access
 */
$application->group('/public', function() {

    // public list of authors and basic author's data
    $this->get('/', Controls\PublicController::class . ':users');

    // public general statistics
    $this->get('/state', Controls\PublicController::class . ':publicStatistics');

    // public scientific results - publications, reports etc.
    $this->get('/contributions', Controls\PublicController::class . 'renderContributions');

}); // end group




/**
 * private routes
 * control panel routes - admin authentication only
 */
$application->group('/control', function() {

    // creating schema
    $this->get('/schema', function($request, $response) {
        $database = new Models\Service\Schema($this->pdo, $response);
        $database->createScheme();
    }); // end route

    // control panel menu
    $this->get('', Controls\Control::class . ':control'); // end route


    /**
     * User control group
     */
    $this->group('/users', function(){

        /**
         * GET-routes
         */

        $this->get('', function($request, $response) {
            return $response->getBody()->write('users list');
        }); // end route

        // exact user data
        $this->get('/get/{id}', function($request, $response, $id) {
            $users = new Records\Authors($this->pdo, $this->fluent);
            $data['user'] = $users->getById($id['id']);
            $this->views->render($response, 'userdata.twig.html', $data);
        }); // end route

        /**
         * TODO: change authors to users; create users
         * TODO: move to Controls\Control controller action
         * editing user (author) information
         */
        $this->get('/edit/{id}', function($request, $response, $id) {
            $data['page'] = (new Models\Page())->common()->getData();
            $data['user'] = (new Records\Authors($this->pdo, $this->fluent))->getById($id['id']);
            return $this->views->render($response, 'useredit.twig.html', $data);
        }); // end route

        // changing user status
        $this->get('/make/{status}/{id}', function($request, $response, $link) {
            $response->getBody()->write('setting status '.$link['status'].' for user '.$link['id']);
            switch ($link['status']) {
                case 'author':
                break;
                case 'admin':
                break;
            }
        }); // end route
        
        /**
         * POST-routes
         * 
         */
        $this->post('/add', function($request, $response) {
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
        }); // end route

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

    $this->get('/{id}', Controls\personal::class . ':personalPage');

    $this->get('/{id}/message', Controls\personal::class . ':issueMessage');

}); // end group






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

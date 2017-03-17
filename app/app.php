<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    session_start();
    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function () use($app) {
        return $app['twig']->render('index.html.twig');

    });

    $app->post("/create_contact", function () use($app) {
        $newContact = new Contact($_POST['name'], $_POST['phone'], $_POST['address']);
        $newContact->save();
        return $app['twig']->render('newContact.html.twig');

    });

    $app->post("/delete_contacts", function () use($app) {
        return $app['twig']->render('deleteContacts.html.twig');
    });






?>

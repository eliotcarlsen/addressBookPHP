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
        return $app['twig']->render('index.html.twig', array('contacts' => $_SESSION['list_of_contacts']));

    });

    $app->post("/create_contact", function () use($app) {
        $newContact = new Contact($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['street'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['image']);
        $newContact->save();
        sort($_SESSION['list_of_contacts']);
        return $app['twig']->render('newContact.html.twig', array('contact' => $newContact));
    });

    $app->get("/search", function () use($app) {
        $searchContact = $_GET["searchName"];
        foreach ($_SESSION['list_of_contacts'] as $contact) {
          if ($searchContact == $contact->getName()) {
            return $app['twig']->render('search.html.twig', array('contact' => $contact));
          }
        }
        return $app['twig']->render('noMatch.html.twig', array('contact' => $contact));
    });

    $app->get("/edit", function () use($app) {
      return $app['twig']->render('edit.html.twig', array('contacts' => $_SESSION['list_of_contacts']));
    });

    $app->post("/delete_contacts", function () use($app) {
        Contact::deleteAll();
        return $app['twig']->render('deleteContacts.html.twig');
    });


    return $app;



?>

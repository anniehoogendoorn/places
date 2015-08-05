<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Place.php";

    session_start();

    if (empty($_SESSION['list_of_places'])) {
        $_SESSION['list_of_places'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('places.html.twig', array('places' => Place::getAll()));
    });

    $app->post("/names", function() use ($app) {
        $task = new Place($_POST['names']);
        $task->save();
        return $app['twig']->render('create_place.html.twig', array('newplace' => $task));

    });

    $app->post("/delete_places", function() use ($app) {
        Place::deleteAll();
        return $app['twig']->render('delete_tasks.html.twig');
    });

    return $app;
?>

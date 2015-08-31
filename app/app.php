<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";

    $app = new Silex\Application();
    $app['debug'] = true;

    $server = 'mysql:host=localhost:3306;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
        Request::enableHttpMethodParameterOverride();

//////
//////// Landing Page
//////
    //////Route to landing page. Uses twig to render array of stylists.
    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    // //When the user submits a client name:
    // $app->post("/clients", function() use ($app){
    //     $client = $_POST['client'];
    //     $stylist_id = $_POST['stylist_id'];
    //
    //     //Creates a new Client object with the above mentioned client, and stylist_id. Sets the client id to null because it is assigned by the database
    //     $client = new Client($_POST['client'], $id = null, $stylist_id);
    //     //Saves new client to database and assigns a client id - see Client.php
    //     $client->save();
    //     //Defines the stylist variable by finding the stylist by using its id
    //     $stylist = Stylist::find($stylist_id);
    //     //Displays the stylist page with the list of existing clients
    //     return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    // });
    //
    // $app->post("/delete_clients", function() use ($app){
    //     Client::deleteAll();
    //     return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    // });
    //
    // $app->get("/stylists/{id}", function($id) use ($app) {
    //     $stylist = Stylist::find($id);
    //     //This takes the user to /stylists/* page, which has a form to add a new client, and  returns the array 'clients' with existing clients.
    //      return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients'=> $stylist->getClients()));
    // });
    //
    // $app->post("/stylists", function() use ($app) {
    //      $stylist = new Stylist($_POST['stylist']);
    //      $stylist->save();
    //      return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    // });
    //
    // $app->post("/delete_stylists", function() use ($app) {
    //     Stylist::deleteAll();
    //     return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    // });

return $app;
?>

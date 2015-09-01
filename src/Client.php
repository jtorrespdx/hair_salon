<?php
/////////Client class declared
    class Client
    {
        //////properties for Client
        private $client_name;
        private $id;
        private $stylist_id;

            //////constructs for the properties
        function __construct($client_name, $stylist_id, $id = null)
        {
            $this->client_name = $client_name;
            $this->stylist_id = $stylist_id;
            $this->id = $id;
        }

        //////getters and setters for properties
        function setClientName ($new_client_name)
        {
            $this->client_name = (string) $new_client_name;
        }

        function getClientName()
        {
            return $this->client_name;
        }

        function getId()
        {
            return $this->id;
        }

        // function getStylistId()
        // {
        //     return $this->stylist_id;
        // }

        // function save()
        // //connects us to the database and saves client_name and stylist_id into the table 'clients'
        // {
        //     $GLOBALS['DB']->exec("INSERT INTO clients (client, stylist_id) VALUES ('{$this->getClientName()}', {$this->getStylistId()});");
        //     $this->id = $GLOBALS['DB']->lastInsertId();
        // }

        // static function getAll()
        // {
        //     $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
        //     $clients = array();
        //     foreach($returned_clients as $client) {
        //         $client = ['client'];
        //         $id = ['id'];
        //         $stylist_id = ['stylist_id'];
        //         $new_client = new Client($client, $id, $stylist_id);
        //         array_push($clients, $new_client);
        //     }
        //     return $clients;
        // }
        //
        // static function deleteAll() {
        //     $GLOBALS['DB']->exec("DELETE FROM clients;");
        // }
        //
        // static function find($search_id)
        // {
        //     $found_client = null;
        //     $clients = Client::getAll();
        //     foreach($clients as $client) {
        //         $client_id = $client->getId();
        //         if ($client_id == $search_id) {
        //             $found_client = $client;
        //         }
        //     }
        //     return $found_client;
        // }
    }
?>

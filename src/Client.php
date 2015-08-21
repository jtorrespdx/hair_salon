<?php
    class Client
    {
        private $client;
        private $id;
        private $stylist_id;
        function __construct($client, $id = null, $stylist_id)
        {
            $this->client = $client;
            $this->id = $id;
            $this->stylist_id = $stylist_id;
        }

        function setClient ($new_client)
        {
            $this->client = (string) $new_client;
        }

        function getClient()
        {
            return $this->client;
        }

        function getId()
        {
            return $this->id;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function save()
        //connects us to the database and saves client and categoryID into the table 'clients'
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (client, stylist_id) VALUES ('{$this->getClient()}', {$this->getStylistId()})");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client) {
                $client = ['client'];
                $id = ['id'];
                $stylist_id = ['stylist_id'];
                $new_client = new Client($client, $id, $stylist_id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll() {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        static function find($search_id)
        {
            $found_client = null;
            $clients = Client::getAll();
            foreach($clients as $client) {
                $client_id = $client->getId();
                if ($client_id == $search_id) {
                    $found_client = $client;
                }
            }
            return $found_client;
        }
    }
?>

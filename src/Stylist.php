<?php
    //////Stylist class declared
    class Stylist
    {
        //////properties for Stylist
        private $stylist_name;
        private $id;

        //////constructs for the properties
        function __construct($stylist_name, $id = null)
        {
            $this->stylist_name = $stylist_name;
            $this->id = $id;
        }

        //////getters and setters for properties
        function setStylistName($new_stylist_name)
        {
            $this->stylist_name = (string) $new_stylist_name;
        }

        function getStylistName()
        {
            return $this->stylist_name;
        }

        function getId()
        {
            return $this->id;
        }

        ///////saves to stylists table (SQL)
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stylists (stylist) VALUES ('{$this->getStylistName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        //////updates stylists' names
        function update($new_stylist_name)
        {
            $GLOBALS['DB']->exec("UPDATE stylists SET stylist = '{$new_stylist_name}' WHERE id = {$this->getId()};");
          $this->setStylistName($new_stylist_name);
        }

        //////deletes individual stylists
        function deleteStylist()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->getId()};");
        }

        /////finds stylist by id and then returns them
        static function find($search_id)
        {
            $found_stylist = null;
            $stylists = Stylist::getAll();
            foreach($stylists as $stylist) {
                $stylist_id = $stylist->getId();
                if ($stylist_id == $search_id) {
                    $found_stylist = $stylist;
                }
            }
            return $found_stylist;
        }

        ///////returns array of all the stylists
        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $stylists = array();
            foreach($returned_stylists as $stylist) {
                $stylist_name = $stylist['stylist'];
                $id = $stylist['id'];
                $new_stylist = new Stylist($stylist_name, $id);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }

        //////deletes stylists from table
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }

        // function getClients()
        // {
        //     $clients = Array();
        //     $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = {$this->getId()};");
        //     foreach($returned_clients as $client) {
        //         $description = $client['client'];
        //         $id = $client['id'];
        //         $stylist_id = $client['stylist_id'];
        //         $new_Client = new Client($description, $id, $stylist_id);
        //         array_push($clients, $new_Client);
        //     }
        //     return $clients;
        // }
        //

        //
    }
?>

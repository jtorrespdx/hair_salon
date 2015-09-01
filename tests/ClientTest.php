<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Client.php";
    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:3306;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        //////clears data from tables after every test is performed
        protected function tearDown()
        {
            Client::deleteAll();
            // Stylist::deleteAll();
        }
        function test_setClientName()
        {
            //Arrange
            $client_name = "Ted";
            $test_client = new Client($client_name);

            //Act
            $test_client->setClientName("Ted");
            $result = $test_client->getClientName();

            //Assert
            $this->assertEquals("Ted", $result);
        }
        function test_getClientName()
        {
            //Arrange
            $client_name = "Ted";
            $test_client = new Client($client_name);
            //Act
            $result = $test_client->getClientName();
            //Assert
            $this->assertEquals($client_name, $result);
        }


        function test_getId()
        {
            //Arrange
            $client_name = "Ted";
            $id = 1;
            $test_client = new Client($client_name, $id);

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_save()
        {
            //Arrange
            $client_name = "Ted";
            $test_client = new Client($client_name);
            $test_client->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals($test_client, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $client_name = "Ted";
            $test_client = new Client($client_name);
            $test_client->save();
            $client_name2 = "Mae";
            $test_client2 = new Client($client_name2);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $client_name = "Ted";
            $test_client = new Client($client_name);
            $test_client->save();
            $client_name2 = "Mae";
            $test_client2 = new Client($client_name2);
            $test_client2->save();

            //Act
            Client::deleteAll();
            $result = Client::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $client_name = "Ted";
            $test_client = new Client($client_name);
            $test_client->save();
            $client_name2 = "Mae";
            $test_client2 = new Client($client_name2);
            $test_client2->save();

            //Act
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($test_client, $result);
        }

        function test_update()
        {
            //Arrange
            $client_name = "Ted";
            $test_client = new Client($client_name);
            $test_client->save();

            //Act
            $new_client_name = "Theodore";
            $test_client->update($new_client_name);

            //Assert
            $this->assertEquals("Theodore", $test_client->getClientName());

        }

        function test_deleteClient()
        {
            //Assert
            $client_name = "Ted";
            $test_client = new Client($client_name);
            $test_client->save();
            $client_name2 = "Mae";
            $test_client2 = new Client($client_name2);
            $test_client2->save();

            //Act
            $test_client->deleteClient();

            //Assert
            $this->assertEquals([$test_client2], Client::getAll());
        }
        //
        // function testGetStylists()
        // {
        //     //Arrange
        //     $client = "Ted";
        //     $id = null;
        //     $test_client = new Client($client, $id);
        //     $test_client->save();
        //     $test_client_id = $test_client->getId();
        //     $stylist = "Roy";
        //     $test_stylist = new Stylist($stylist, $id, $test_client_id);
        //     $test_stylist->save();
        //     $client2 = "Jeff";
        //     $test_stylist2 = new Stylist($stylist2, $id, $test_stylist_id);
        //     $test_stylist2->save();
        //
        //     //Act
        //     $result = $test_stylist->getStylists();
        //
        //     //Assert
        //     $this->assertEquals([$test_stylist, $test_stylist2], $result);
        // }
    }
?>

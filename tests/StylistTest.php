<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost:3306;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        //////clears data from tables after every test is performed
        protected function tearDown()
        {
            Stylist::deleteAll();
            // Client::deleteAll();
        }
        function test_setStylistName()
        {
            //Arrange
            $stylist_name = "Fred";
            $test_stylist_name = new Stylist($stylist_name);

            //Act
            $test_stylist_name->setStylistName("Fred");
            $result = $test_stylist_name->getStylistName();

            //Assert
            $this->assertEquals("Fred", $result);
        }
        function test_getStylistName()
        {
            //Arrange
            $stylist_name = "Fred";
            $test_stylist_name = new Stylist($stylist_name);
            //Act
            $result = $test_stylist_name->getStylistName();
            //Assert
            $this->assertEquals($stylist_name, $result);
        }


        function test_getId()
        {
            //Arrange
            $stylist_name = "Fred";
            $id = 1;
            $test_stylist_name = new Stylist($stylist_name, $id);

            //Act
            $result = $test_stylist_name->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_save()
        {
            //Arrange
            $stylist_name = "Fred";
            $test_stylist_name = new Stylist($stylist_name);
            $test_stylist_name->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals($test_stylist_name, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $stylist_name = "Fred";
            $stylist_name2 = "Sally";
            $test_stylist_name = new Stylist($stylist_name);
            $test_stylist_name->save();
            $test_stylist_name2 = new Stylist($stylist_name2);
            $test_stylist_name2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist_name, $test_stylist_name2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $stylist_name = "Fred";
            $stylist_name2 = "Sally";
            $test_stylist_name = new Stylist($stylist_name);
            $test_stylist_name->save();
            $test_stylist_name2 = new Stylist($stylist_name2);
            $test_stylist_name2->save();

            //Act
            Stylist::deleteAll();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([], $result);
        }
        //
        // function test_find()
        // {
        //
        // }
        //
        // function test_update()
        // {
        //
        // }
        //
        // function test_delete()
        // {
        //
        // }
        //
        // function testGetClients()
        // {
        //     //Arrange
        //     $stylist = "Fred";
        //     $id = null;
        //     $test_stylist = new Stylist($stylist, $id);
        //     $test_stylist->save();
        //     $test_stylist_id = $test_stylist->getId();
        //     $client = "Jess";
        //     $test_client = new Client($client, $id, $test_stylist_id);
        //     $test_client->save();
        //     $client2 = "Mary";
        //     $test_client2 = new Client($client2, $id, $test_stylist_id);
        //     $test_client2->save();
        //
        //     //Act
        //     $result = $test_stylist->getClients();
        //
        //     //Assert
        //     $this->assertEquals([$test_client, $test_client2], $result);
        // }
    }
?>

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
        // protected function tearDown()
        // {
        //     Stylist::deleteAll();
        //     Client::deleteAll();
        // }
        function test_setStylist()
        {
            //Arrange
            $stylist = "Fred";
            $test_stylist = new Stylist($stylist);

            //Act
            $test_stylist->setStylist("Fred");
            $result = $test_stylist->getStylist();

            //Assert
            $this->assertEquals("Fred", $result);
        }
        function test_getStylist()
        {
            //Arrange
            $stylist = "Fred";
            $test_stylist = new Stylist($stylist);
            //Act
            $result = $test_stylist->getStylist();
            //Assert
            $this->assertEquals($stylist, $result);
        }


        function test_getId()
        {
            //Arrange
            $stylist = "Fred";
            $id = 1;
            $test_stylist = new Stylist($stylist, $id);

            //Act
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        // function test_save()
        // {
        //     //Arrange
        //     $stylist = "Fred";
        //     $test_stylist = new Stylist($stylist);
        //     $test_stylist->save();
        //
        //     //Act
        //     $result = Stylist::getAll();
        //
        //     //Assert
        //     $this->assertEquals($test_stylist, $result[0]);
        // }
        //
        // function test_getAll()
        // {
        //     //Arrange
        //     $stylist = "Fred";
        //     $stylist2 = "Home stuff";
        //     $test_stylist = new Stylist($stylist);
        //     $test_stylist->save();
        //     $test_stylist2 = new Stylist($stylist2);
        //     $test_stylist2->save();
        //
        //     //Act
        //     $result = Stylist::getAll();
        //
        //     //Assert
        //     $this->assertEquals([$test_stylist, $test_stylist2], $result);
        // }
        // function test_deleteAll()
        // {
        //
        //
        // }
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

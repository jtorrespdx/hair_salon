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
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }
        function test_getStylist()
        {
            //Arrange
            $stylist = "Work stuff";
            $test_stylist = new Stylist($stylist);
            //Act
            $result = $test_stylist->getStylist();
            //Assert
            $this->assertEquals($stylist, $result);
        }

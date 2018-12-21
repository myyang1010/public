<?php
/**
 * Created by PhpStorm.
 * User: myyang
 * Date: 12/21/18
 * Time: 12:47 PM
 */

main::start();

class main {

    static public function start() {
        $records = csv::getrecords();
        $table = html::generatetable($records);
        $table = 'test';
        system::printpage($table);
    }

}

class csv {

    static public function getrecords() {

        $make = 'Ford';
        $model = 'Taurus';
        $car = AutomobileFactory::create($make, $model);
        $records[] = $car;
        print_r($records);

        return $records;
    }
}

class html {

    static public function generatetable() {

        $table = $records;
        return $table;
    }
}

class system {

    static public function printpage($page) {

        echo 'test';
    }
}

class Automobile
{
    private $vehicleMake;
    private $vehicleModel;

    public function __construct($make, $model)
    {
        $this->vehicleMake = $make;
        $this->vehicleModel = $model;
    }

    public function getMakeAndModel()
    {
        return $this->vehicleMake . ' ' . $this->vehicleModel;
    }
}

class AutomobileFactory
{
    public static function create($make, $model)
    {
        return new Automobile($make, $model);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: myyang
 * Date: 12/21/18
 * Time: 12:47 PM
 */

main::start( "FL_insurance_sample.csv");

class main
{

    static public function start($filename)
    {

        $records = csv::getrecords($filename);

        print_r($records);



        }

}

class csv {

    static public function getrecords($filename) {

        $file = fopen($filename,"r");

        while(! feof($file))
        {
            print_
        }

        fclose($file);
        return $records;

    }
}
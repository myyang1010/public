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
        foreach ($records as $record) {
            //print_r($record);


        }
    }
}

class csv {

    static public function getrecords($filename) {

        $file = fopen($filename,"r");

        $fieldname = array();

        $count = 0;

        while(! feof($file))
        {
           $record = fgetcsv($file);
           if($count == 0) {
               $fieldname = $record;
           } else {
               $record[] = recordfactory::create($fieldnames, $record);
           }
           $count++;
        }

        fclose($file);
        return $records;

    }
}

class record {

    public function __construct(array $fieldnames = null, $values = null)
    {

        $record = array_combine($fieldnames, $values);
        foreach ($record as $property => $values) {
            $this->createproperty($property, $values);
        }



    }

    public function createrow() {
        print_r($this);
    }

    public function createproperty($name = 'first', $value = '1') {

        $this->{$name} = $value;
    }
}


class recordfactory {

    public static function create(array $fieldnames = null, array $record = null) {


        $record = new record($fieldnames, $record);

        return $record;
    }
}
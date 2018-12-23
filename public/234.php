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

            print_r($record);
        }



    }

}

class csv {

    static public function getRecords($filename) {

        $file = fopen($filename,"r");

        $fieldNames = array();

        $count = 0;

        while(! feof($file))
        {
            $record = fgetcsv($file);
            if($count == 0) {
                $fieldNames = $record;
            } else {
                $record[] = recordFactory::create($fieldNames, $record);
            }
            $count++;
        }

        fclose($file);
        return $records;

    }
}

class record {

    public function __construct(array $fieldNames = null, $values= null)
    {


        $record = array_combine($fieldNames, $values);
        foreach ($record as $property => $value) {
            $this->createProperty($property, $value);

        }

        print_r($this);




    }

    public function createProperty($name = 'policyID', $value = '119736') {

        $this->{$name} = $value;
    }

}

class recordFactory
{

    public static function create(array $fieldNames = null, array $values = null)
    {


        $record = new record($fieldNames, $values);

        return $record;
    }
}
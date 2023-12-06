<?php

class Conn
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbName = "number_collect_db";

    protected function connect()
    {
        $conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbName);
        return $conn;
    }
}

class RecordsControllers extends Conn
{
    public function getRecords()
    {
        $sql = "SELECT * FROM `records` ORDER BY `record_id` DESC LIMIT 50";
        $res = $this->connect()->query($sql);

        $data = [];
        $numRow = $res->num_rows;
        if ($numRow > 0) {
            while ($row = $res->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function storeRecord($objRecordDetails)
    {
        // { "result": "90810", "original": [ "16409", "21250", "61678", "43951", "12870" ], "position": 5 }
        
        $sql = "INSERT INTO `records` (`luck_num`, `ary_pick_from`, `digit_position`) 
        VALUES (
        '" . $objRecordDetails['result'] . "',
        '" . json_encode($objRecordDetails['original']) . "',
        '" . $objRecordDetails['position'] . "'
            );";

        // return $sql;
        try {
            $this->connect()->query($sql);
            return "Success";
        } catch (mysqli_sql_exception) {
            return "Some thing went wrong.";
        }
    }
}

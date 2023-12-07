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

        try {
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
        } catch (mysqli_sql_exception) {
            return "Some thing went wrong.";
        }
    }

    public function storeRecord($objRecordDetails)
    {
        $sql = "INSERT INTO `records` (`transaction`, `ary_pick_from`, `digit_position`) 
        VALUES (
        '" . $objRecordDetails['result'] . "',
        '" . json_encode($objRecordDetails['original']) . "',
        '" . $objRecordDetails['position'] . "'
            );";

        try {
            $this->connect()->query($sql);
            return 1;
        } catch (mysqli_sql_exception) {
            return -1;
        }
    }
}

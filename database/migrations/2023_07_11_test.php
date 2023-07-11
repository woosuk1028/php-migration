<?php

class Migration_2023_07_11_test
{
   private $db;

    public function __construct()
    {
       $this->db = createDB();       
       $this->migrationSchema = new migrationSchema();       
    }

    public function up()
    {
        // TODO: Add migration logic here.
    }

    public function down()
    {
        // TODO: Add rollback logic here.
    }
}

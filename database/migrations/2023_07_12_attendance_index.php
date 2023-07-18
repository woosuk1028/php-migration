<?php

class Migration_2023_07_12_attendance_index
{
   private $db;

    public function __construct()
    {
       $this->db = createDB();       
       $this->migrationSchema = new migrationSchema();       
    }

    public function up()
    {
        $sql = $this->migrationSchema->addIndex("tb_attendance_history",[
            "app_key",
            "user_key"
        ])->compile();

        $this->db->query($sql);

        $sql = $this->migrationSchema->addIndex("tb_attendance_history",[
            "app_key",
            "login_key"
        ])->compile();

        $this->db->query($sql);
    }

    public function down()
    {
        // TODO: Add rollback logic here.
    }
}

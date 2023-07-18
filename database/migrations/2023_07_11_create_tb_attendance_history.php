<?php

class Migration_2023_07_11_create_tb_attendance_history
{
   private $db;

    public function __construct()
    {
       $this->db = createDB();       
       $this->migrationSchema = new migrationSchema();       
    }

    public function up()
    {
        $sql = $this->migrationSchema->create('tb_attendance_history')
            ->addColumn('app_key', 'VARCHAR(5)')
            ->addColumn('user_key', 'VARCHAR(10)')
            ->addColumn('login_key', 'VARCHAR(10)')
            ->addColumn('attendance_streak', 'int(11)')
            ->addColumn('attendance_fever_state', 'tinyint(4)')
            ->addColumn('attendance_point', 'int(11)')
            ->addColumn('attendance_date', 'date')
            ->addColumn('create_date', 'datetime')
            ->compile();
        $this->db->query($sql);
    }

    public function down()
    {
        $sql = $this->migrationSchema->drop('tb_attendance_history')
            ->compile();
        $this->db->query($sql);
    }
}

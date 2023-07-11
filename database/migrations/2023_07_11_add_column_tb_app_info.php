<?php

class Migration_2023_07_11_add_column_tb_app_info
{
   private $db;

    public function __construct()
    {
       $this->db = createDB();       
       $this->migrationSchema = new migrationSchema();       
    }

    public function up()
    {
        $sql = $this->migrationSchema->addMultipleColumns('tb_app_info', [
            'is_login' => 'tinyint(4)',
            'non_member_accum' => 'int(11)',
            'is_phone_certification' => 'tinyint(4)',
            'reward_rate' => 'int(11)',
        ])->compile();

        $this->db->query($sql);
    }

    public function down()
    {
        $sql = $this->migrationSchema->dropMultipleColumns('tb_app_info', [
            'is_login',
            'non_member_accum',
            'is_phone_certification',
            'reward_rate'
        ])->compile();

        $this->db->query($sql);
    }
}

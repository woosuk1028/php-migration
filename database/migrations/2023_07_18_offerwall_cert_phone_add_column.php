<?php

class Migration_2023_07_18_offerwall_cert_phone_add_column
{
   private $db;

    public function __construct()
    {
       $this->db = createDB();       
       $this->migrationSchema = new migrationSchema();       
    }

    public function up()
    {
        $sql = $this->migrationSchema->addSingleColumn('tb_offerwall_list', 'is_phone_certification','tinyint(4)', '휴대폰 skip 여부(1: on, 2: off)', 'score')
            ->compile();
        $this->db->query($sql);
    }

    public function down()
    {
        $sql = $this->migrationSchema->dropMultipleColumns('tb_offerwall_list', [
            'is_phone_certification'
        ])->compile();
        $this->db->query($sql);
    }
}

<?php

class Migration_2023_07_17_instant_index_create
{
   private $db;

    public function __construct()
    {
       $this->db = createDB();       
       $this->migrationSchema = new migrationSchema();       
    }

    public function up()
    {
        $sql = $this->migrationSchema->addIndex("tb_instant_bot_buy_user",[
            "app_key"
        ])->compile();

        $this->db->query($sql);

        $sql = $this->migrationSchema->addIndex("tb_instant_bot_buy_product",[
            "app_key"
        ])->compile();

        $this->db->query($sql);

        $sql = $this->migrationSchema->addIndex("tb_instant_bot_product_comment",[
            "app_key"
        ])->compile();

        $this->db->query($sql);

        $sql = $this->migrationSchema->addIndex("tb_instant_bot_universal_comment",[
            "app_key"
        ])->compile();

        $this->db->query($sql);

        $sql = $this->migrationSchema->addIndex("tb_instant_bot_planned_purchase",[
            "app_key"
        ])->compile();

        $this->db->query($sql);

        $sql = $this->migrationSchema->addIndex("tb_instant_buy_list",[
            "app_key"
        ])->compile();

        $this->db->query($sql);
    }

    public function down()
    {
        // TODO: Add rollback logic here.
    }
}

<?php

class Migration_2023_07_17_instant_app_key_add_column
{
   private $db;

    public function __construct()
    {
       $this->db = createDB();       
       $this->migrationSchema = new migrationSchema();       
    }

    public function up()
    {
        $sql = $this->migrationSchema->addSingleColumn('tb_instant_bot_buy_user', 'app_key','varchar(10)', '앱키', 'user_seq')
            ->compile();
        $this->db->query($sql);

        $sql = $this->migrationSchema->addSingleColumn('tb_instant_bot_buy_product', 'app_key','varchar(10)', '앱키', 'product_seq')
            ->compile();
        $this->db->query($sql);

        $sql = $this->migrationSchema->addSingleColumn('tb_instant_bot_product_comment', 'app_key','varchar(10)', '앱키', 'comment_seq')
            ->compile();
        $this->db->query($sql);

        $sql = $this->migrationSchema->addSingleColumn('tb_instant_bot_universal_comment', 'app_key','varchar(10)', '앱키', 'comment_seq')
            ->compile();
        $this->db->query($sql);

        $sql = $this->migrationSchema->addSingleColumn('tb_instant_bot_planned_purchase', 'app_key','varchar(10)', '앱키', 'purchase_seq')
            ->compile();
        $this->db->query($sql);

        $sql = $this->migrationSchema->addSingleColumn('tb_instant_buy_list', 'app_key','varchar(10)', '앱키', 'list_id')
            ->compile();
        $this->db->query($sql);
    }

    public function down()
    {
        $sql = $this->migrationSchema->dropMultipleColumns('tb_instant_bot_buy_user', [
            'app_key'
        ])->compile();
        $this->db->query($sql);

        $sql = $this->migrationSchema->dropMultipleColumns('tb_instant_bot_buy_product', [
            'app_key'
        ])->compile();
        $this->db->query($sql);

        $sql = $this->migrationSchema->dropMultipleColumns('tb_instant_bot_product_comment', [
            'app_key'
        ])->compile();
        $this->db->query($sql);

        $sql = $this->migrationSchema->dropMultipleColumns('tb_instant_bot_universal_comment', [
            'app_key'
        ])->compile();
        $this->db->query($sql);

        $sql = $this->migrationSchema->dropMultipleColumns('tb_instant_bot_planned_purchase', [
            'app_key'
        ])->compile();
        $this->db->query($sql);

        $sql = $this->migrationSchema->dropMultipleColumns('tb_instant_buy_list', [
            'app_key'
        ])->compile();
        $this->db->query($sql);
    }
}

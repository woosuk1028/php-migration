<?php
if (defined("__migration_php__")) return;
define("__migration_php__", true);

class Migration
{
    private $db;

    function __construct()
    {
        $this->db = createDB();
        $this->migrationSchema = new migrationSchema();
    }

    public function up()
    {
        $sql = $this->migrationSchema->addSingleColumn('test', 'add_column', 'varchar(50)')
            ->compile();

        $this->db->query($sql);
    }

    public function down()
    {
        $sql = $this->migrationSchema->dropColumn('test', 'add_column')
            ->compile();

        $this->db->query($sql);
    }
}
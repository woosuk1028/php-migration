<?php
if (defined("__migration_php__")) return;
define("__migration_php__", true);

class Migration
{
    private $db;

    function __construct()
    {
        $this->db = createDB();
    }

    public function up()
    {
        $migrationSchema = new migrationSchema();

        $sql = $migrationSchema->addSingleColumn('test', 'add_column', 'varchar(50)')
            ->compile();

        $this->db->query($sql);
    }

    public function down()
    {

    }
}
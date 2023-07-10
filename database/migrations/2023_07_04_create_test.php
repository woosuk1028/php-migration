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

            $sql = $migrationSchema->create('test')
                ->addPk('id', 'INT(11)', 1)
                ->addColumn('username', 'VARCHAR(50)')
                ->addColumn('password', 'VARCHAR(255)')
                ->compile();
            $this->db->query($sql);
        }

        public function down()
        {

        }
    }
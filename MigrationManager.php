<?php
    if (defined("__migrationmanager_php__")) return;
    define("__migrationmanager_php__", true);

    class MigrationManager
    {
        private $db;

        function __construct()
        {
            $this->db = createDB();
        }

        function __destruct()
        {
            $this->db->close();
            unset($this->db);
        }

        public function migrationList()
        {
            $data = array();
            $q = " SELECT * FROM migrations ";
            $res = $this->db->query($q);
            if($this->db->numRows($res)>0)
            {
                while ($row = $this->db->fetchArray($res))
                {
                    $data[] = array(
                        'id' => $row['id'],
                        'migration' => $row['migration'],
                        'batch' => $row['batch'],
                        'created_at' => $row['created_at'],
                    );
                }
            }

            return $data;
        }

        public function migrationSetting($migration)
        {
            // Check if the migrations table exists
            $q = "SHOW TABLES LIKE 'migrations'";
            $res = $this->db->query($q);
            $tableExists = ($this->db->numRows($res) > 0);

            // If the migrations table doesn't exist, create it
            if(!$tableExists) {
                $q = " CREATE TABLE migrations (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            migration VARCHAR(255) NOT NULL,
                            batch INT NOT NULL,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                        ); ";
                $this->db->execQuery($q);
            }

            $q = " SELECT max(batch) as max_batch FROM migrations WHERE migration='$migration' ";
            $row = $this->db->querySingleRow($q);

            $batch = $row['max_batch'] + 1;
            $h = new XwQueryHelper();
            $h->add("migration", $migration, true);
            $h->add("batch", $batch, false);
            $q = $h->getInsertQuery('migrations');
            $this->db->execQuery($q);
        }

        public function migrationStart()
        {

        }

        public function migrationRollback()
        {

        }

    }
<?php
    if (defined("__migrationschema_php__")) return;
    define("__migrationschema_php__", true);

    class MigrationSchema
    {
        protected $query;
        public function __construct()
        {
            $this->reset();
        }

        public function reset()
        {
            $this->query = new \stdClass;
        }


        public function create($table)
        {
            $this->reset();
            $this->query->base = "CREATE TABLE $table";
            $this->query->type = "create";

            return $this;
        }

        public function drop($table)
        {
            $this->reset();
            $this->query->base = "DROP TABLE $table";
            $this->query->type = 'drop';
            return $this;
        }

        public function addPk($column, $type, $auto=0)
        {
            if (!isset($this->query->columns)) {
                $this->query->columns = [];
            }

            $autoincrement = "";
            if($auto!=0)
                $autoincrement = "AUTO_INCREMENT";

            $this->query->columns[] = "$column $type PRIMARY KEY $autoincrement";
            return $this;
        }

        public function addColumn($column, $type)
        {
            if (!isset($this->query->columns)) {
                $this->query->columns = [];
            }
            $this->query->columns[] = "$column $type";
            return $this;
        }

        public function addSingleColumn($table, $column, $type)
        {
            $this->reset();
            $this->query->base = "ALTER TABLE $table ADD $column $type";
            $this->query->type = 'alter';
            return $this;
        }

        public function addMultipleColumns($table, $columns)
        {
            $this->reset();
            $this->query->base = "ALTER TABLE $table";
            $this->query->type = 'alter';

            $cols = [];
            foreach ($columns as $column => $type) {
                $cols[] = "ADD $column $type";
            }
            $this->query->base .= " " . implode(", ", $cols);

            return $this;
        }

        public function dropColumn($table, $column)
        {
            $this->reset();
            $this->query->base = "ALTER TABLE $table DROP COLUMN $column";
            $this->query->type = 'alter';
            return $this;
        }

        public function dropMultipleColumns($table, $columns)
        {
            $this->reset();
            $this->query->base = "ALTER TABLE $table";
            $this->query->type = 'alter';

            $cols = [];
            foreach ($columns as $column) {
                $cols[] = "DROP COLUMN $column";
            }
            $this->query->base .= " " . implode(", ", $cols);

            return $this;
        }

        public function addIndex($table, $column)
        {
            $this->reset();
            $this->query->base = "ALTER TABLE $table ADD INDEX ($column)";
            $this->query->type = 'alter';
            return $this;
        }

        public function compile()
        {
            if ($this->query->type === 'create') {
                $this->query->base .= " (" . implode(", ", $this->query->columns) . ")";
            }

            $sql = $this->query->base;
            $this->reset();

            return $sql;
        }

    }
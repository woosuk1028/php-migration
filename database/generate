#!/usr/bin/env php
<?php

    function generateMigrationFile($description)
    {
        $date = date('Y_m_d');
        $path = "migrations/";
        $filename = $path.$date . '_' . str_replace(' ', '_', $description) . '.php';
        $className = 'Migration_' . $date . '_' . str_replace(' ', '_', $description);

        $content = "<?php\n\n";
        $content .= "class $className\n";
        $content .= "{\n";
        $content .= '   private $db;';
        $content .= "\n\n";
        $content .= "    public function __construct()\n";
        $content .= "    {\n";
        $content .= '       $this->db = createDB();';
        $content .= "       \n";
        $content .= '       $this->migrationSchema = new migrationSchema();';
        $content .= "       \n";
        $content .= "    }\n\n";
        $content .= "    public function up()\n";
        $content .= "    {\n";
        $content .= "        // TODO: Add migration logic here.\n";
        $content .= "    }\n\n";
        $content .= "    public function down()\n";
        $content .= "    {\n";
        $content .= "        // TODO: Add rollback logic here.\n";
        $content .= "    }\n";
        $content .= "}\n";

        file_put_contents($filename, $content);

        echo "Created migration file: $filename\n";
    }

    if (!isset($argv[1])) {
        echo "Usage: php {$argv[0]} [description]\n";
        exit(1);
    }

    generateMigrationFile($argv[1]);
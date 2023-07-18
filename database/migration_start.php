<?php
    include_once(dirname(__FILE__)."/../wapi/lib/common.php");
    include_once _XWLIB_HOME.'/MigrationManager.php';
    include_once _XWLIB_HOME.'/MigrationSchema.php';

    $db = createDB();

    $today = date("Y-m-d H:i:s");
    $date = date('Y_m_d');
    
    $migrationManager = new MigrationManager();

    $migrationList = $migrationManager->migrationList();
    $maxMigrationBatch = $migrationManager->maxMigrationBatch();
    $batch = $maxMigrationBatch + 1;

    $dir = 'migrations/';
    $files = array_diff(scandir($dir), array('.', '..'));

    $files = array_map(function($file) use ($dir) {
        return [
            'name' => $file,
            'time' => filemtime($dir . $file)
        ];
    }, $files);

    usort($files, function($a, $b) {
        return $b['time'] - $a['time'];
    });

    foreach($files as $key => $val)
    {

        $alreadyMigrated = false;
        foreach($migrationList as $key2 => $val2)
        {
            if($val['name'] == $val2['migration'])
            {
                $alreadyMigrated = true;
                break;
            }
        }

        if(!$alreadyMigrated)
        {
            $migrationManager->migrationSetting($val['name'], $batch);

            $exp_name = explode(".", $val['name']);
            $class_name = "Migration_".$exp_name[0];

            include $dir . $val['name'];
            $migration = new $class_name();
            $migration->up();
            echo $class_name." Migration Success.\n";
            unset($migration);
        }
    }

?>
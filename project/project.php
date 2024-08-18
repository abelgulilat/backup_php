<?php
require "connect.php";




$backupFile = $database . '_backup_' . date("Y-m-d_H-i-s") . '.sql';

$backupPath = __DIR__ . '/' . $backupFile;

function backupDatabase($host, $username, $password, $database, $backupPath)
{
    $command = "mysqldump --host=$host --user=$username --password=$password $database > $backupPath";
    echo $command;
    system($command, $result);
    echo $result;
    return $result;
}

$backupResult = backupDatabase($host, $username, $password, $database, $backupPath);

if ($backupResult === 0) {
    echo "<h3>Backup completed successfully!</h3>";
    echo "<p>Backup file created: <a href='$backupFile' download>Download $backupFile</a></p>";
} else {
    echo "<h3>Backup failed!</h3>";
    echo "<p>There was a problem creating the backup. Please check your configuration.</p>";
}


?>

<?php

// Variables
$DB_HOST = "127.0.0.1";
$DB_PORT = "4306";
$DB_USER = "user";
$DB_PASS = "secret";
$DB_NAME = "docker-php";
$MIGRATIONS_DIR = "../../migrations";

try {
    // Create PDO connection
    $dsn = "mysql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME;charset=utf8mb4";
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the migrations directory exists
    if (!is_dir($MIGRATIONS_DIR)) {
        echo "Migrations directory $MIGRATIONS_DIR not found!" . PHP_EOL;
        exit(1);
    }

    // Iterate over each .sql file in the migrations directory
    $files = glob("$MIGRATIONS_DIR/*.sql");
    if (empty($files)) {
        echo "No migration files found in $MIGRATIONS_DIR." . PHP_EOL;
        exit(0);
    }

    foreach ($files as $file) {
        echo "Running migration: $file" . PHP_EOL;

        // Read the SQL file content
        $sql = file_get_contents($file);
        if ($sql === false) {
            echo "Error reading migration file $file!" . PHP_EOL;
            exit(1);
        }

        // Execute the SQL content
        try {
            $pdo->exec($sql);
            echo "Migration $file executed successfully." . PHP_EOL;
        } catch (PDOException $e) {
            echo "Error executing migration $file: " . $e->getMessage() . PHP_EOL;
            exit(1);
        }
    }

    echo "All migrations executed successfully." . PHP_EOL;
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage() . PHP_EOL;
    exit(1);
}
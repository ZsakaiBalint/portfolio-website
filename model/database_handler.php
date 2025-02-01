
<?php

class DatabaseHandler {

    private function __construct() {}
    
    protected static function connect() {
        $conf = require('database_credentials.php');
    
        $host = getenv('DB_HOST') ?: $conf['DB_HOST'];
        $port = getenv('DB_PORT') ?: ($conf['DB_PORT'] ?? null);
        $user = $conf['DB_USER'];
        $pass = $conf['DB_PASS'];
        $db_name = $conf['DB_NAME'];

        $dsn = "mysql:host=" . $host;

        if ($port) {
            $dsn .= ";port={$port}";
        }
        $dsn .= ";dbname={$db_name};charset=utf8mb4";

        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

    public static function runMigrations() {
        $MIGRATIONS_DIR = "migrations";

        try {
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
                    $pdo = self::connect();
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
    }
}
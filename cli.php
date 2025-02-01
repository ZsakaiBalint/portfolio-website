<?php

require_once 'model/database_seeder.php';
require_once 'model/database_handler.php';

class CommandLineApp {

    public static function run($args) {

        putenv('DB_HOST=127.0.0.1');
        putenv('DB_PORT=4306');

        array_shift($args);

        if (empty($args)) {
            echo "Usage: php cli.php <command> [arguments]\n";
            return;
        }

        $command = $args[0];

        switch ($command) {

            case 'runMigrations': 
                DatabaseHandler::runMigrations();
                echo "Database migrations ready.\n";
                break;

            case 'seedUsers':
                $dbSeeder = new DatabaseSeeder();
                $dbSeeder->seedUsers();
                echo "Users seeded successfully.\n";
                break;

            case 'seedProjects': 
                $dbSeeder = new DatabaseSeeder();
                $dbSeeder->seedProjects();
                echo "Projects seeded successfully.\n";
                break;

            case 'seedProjectImages': 
                $dbSeeder = new DatabaseSeeder();
                $dbSeeder->seedProjectImages();
                echo "Project images seeded successfully.\n";
                break;

            default:
                echo "Unknown command: $command\n";
                break;
        }
    }
}

CommandLineApp::run($argv);

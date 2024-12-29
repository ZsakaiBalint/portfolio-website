<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Faker\Factory;

// Create Faker instance
$faker = Factory::create();


// Variables
$DB_HOST = "127.0.0.1";
$DB_PORT = "4306";
$DB_USER = "user";
$DB_PASS = "secret";
$DB_NAME = "docker-php";
$MIGRATIONS_DIR = "../../migrations";


// Database connection
$dsn = "mysql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME;charset=utf8mb4";
$pdo = new PDO($dsn, $DB_USER, $DB_PASS);


// Check if 'users' table is empty
$query = $pdo->query("SELECT COUNT(*) FROM users");
$rowCount = $query->fetchColumn();

if ($rowCount == 0) {

    // Create 1 admin user
    $adminUser = "admin";
    $adminPass = password_hash("test-admin",PASSWORD_DEFAULT);
    $role = 'admin';
    $createdAt = $faker->dateTimeThisYear()->format('Y-m-d H:i:s');

    $stmt = $pdo->prepare(query: 'INSERT INTO users (username, password, role, created_at) VALUES (?, ?, ?, ?)');
    $stmt->execute([$adminUser, $adminPass, $role, $createdAt]);

    echo "Admin user generated successfully!\n";

    // Create 50 regular users
    $numUsers = 50;

    for ($i = 0; $i < $numUsers; $i++) {
        $username = $faker->userName;
        $password = password_hash($faker->password, PASSWORD_DEFAULT); // Use hashed passwords
        $role = 'user'; // Fixed role
        $createdAt = $faker->dateTimeThisYear()->format('Y-m-d H:i:s');

        $stmt = $pdo->prepare('INSERT INTO users (username, password, role, created_at) VALUES (?, ?, ?, ?)');
        $stmt->execute([$username, $password, $role, $createdAt]);
    }

    echo "$numUsers users generated successfully!\n";
} else {
    echo "The users table is not empty, skipping seeding.\n";
}




// Check if 'projects' table is empty
$query = $pdo->query("SELECT COUNT(*) FROM projects");
$rowCount = $query->fetchColumn();

if ($rowCount == 0) {

    // Create 10 projects
    for ($i = 0; $i < 10; $i++) {
        $title = $faker->sentence(3); // Generate a random title (3 words)
        $shortDesc = $faker->text(50); // Generate a short description (50 characters)
        $longDesc = $faker->paragraph(5); // Generate a long description (5 sentences)
        $link = $faker->url; // Generate a random URL
        $thumbnail = $faker->imageUrl(640, 480, 'business', true, 'Project'); // Generate a random thumbnail URL

        // Prepare SQL statement
        $stmt = $pdo->prepare("
            INSERT INTO projects (title, short_desc, long_desc, link)
            VALUES (:title, :short_desc, :long_desc, :link)
        ");

        // Bind values
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':short_desc', $shortDesc);
        $stmt->bindParam(':long_desc', $longDesc);
        $stmt->bindParam(':link', $link);

        // Execute statement
        $stmt->execute();
    }

    echo "10 projects have been inserted into the database.\n";
} else {
    echo "The projects table is not empty, skipping seeding.\n";
}



// Check if 'project_gallery' table is empty
$query = $pdo->query("SELECT COUNT(*) FROM project_gallery");
$rowCount = $query->fetchColumn();

if ($rowCount == 0) {

    // Get all project IDs from the 'projects' table
    $stmt = $pdo->query("SELECT id FROM projects");
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // For each project, create at least one image in the project_gallery
    foreach ($projects as $project) {
        $projectId = $project['id'];

        $imagePath = $faker->imageUrl(640, 480, 'business', true, 'Gallery');
        $caption = $faker->sentence(6);

        $stmt = $pdo->prepare("
            INSERT INTO project_gallery (project_id, image_path, caption)
            VALUES (:project_id, :image_path, :caption)
        ");

        $stmt->bindParam(':project_id', $projectId);
        $stmt->bindParam(':image_path', $imagePath);
        $stmt->bindParam(':caption', $caption);

        $stmt->execute();
    }


    // Create 10 more random entries for project_gallery
    for ($i = 0; $i < 10; $i++) {

        // Select a random project_id
        $randomProject = $projects[array_rand($projects)];
        $projectId = $randomProject['id'];

        $imagePath = $faker->imageUrl(640, 480, 'business', true, 'Gallery'); // Generate a random image URL
        $caption = $faker->sentence(6); // Generate a random caption

        // Prepare SQL statement
        $stmt = $pdo->prepare("
            INSERT INTO project_gallery (project_id, image_path, caption)
            VALUES (:project_id, :image_path, :caption)
        ");

        // Bind values
        $stmt->bindParam(':project_id', $projectId);
        $stmt->bindParam(':image_path', $imagePath);
        $stmt->bindParam(':caption', $caption);

        // Execute statement
        $stmt->execute();
    }

    echo "20 project gallery entries have been inserted into the database.\n";

} else {
    echo "The project_gallery table is not empty, skipping seeding.\n";
}
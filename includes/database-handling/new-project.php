<?php
try {
    // Connect to the database
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Project details
    $project = [
        'title' => 'My Awesome Project',
        'short_desc' => 'A short description of my project.',
        'long_desc' => 'A detailed, long description of the project goes here.',
        'link' => 'https://example.com/my-project',
        'thumbnail' => 'thumbnail.jpg',
    ];

    // Insert the project into the database
    $stmt = $db->prepare("
        INSERT INTO projects (title, short_desc, long_desc, link, thumbnail, created_at, updated_at)
        VALUES (:title, :short_desc, :long_desc, :link, :thumbnail, NOW(), NOW())
    ");
    $stmt->execute($project);

    echo "Project added successfully!";
} catch (PDOException $e) {
    echo "Error adding project: " . $e->getMessage();
}
?>
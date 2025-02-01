<?php

require_once "database_handler.php";
require_once "project.php";

class ProjectImage extends DatabaseHandler {

    public function __construct($project_id, $image_path, $caption, $is_thumbnail) {
    
        $project = Project::getProjectById($project_id);
        if (! $project) {
            throw new Exception('No project matches the given id in the database.');
        }

        $sql = "INSERT INTO project_images (project_id, image_path, caption, is_thumbnail) 
        VALUES (:project_id, :image_path, :caption, :is_thumbnail)";

        $stmt = $this->connect()->prepare($sql);

        $stmt->bindParam(':project_id',$project_id, PDO::PARAM_STR);
        $stmt->bindParam(':image_path',$image_path, PDO::PARAM_STR);
        $stmt->bindParam(':caption',$caption, PDO::PARAM_STR);
        $stmt->bindParam(':is_thumbnail',$is_thumbnail, PDO::PARAM_BOOL);

        return $stmt->execute();
    }

}
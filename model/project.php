<?php

require_once "database_handler.php";

class Project extends DatabaseHandler {

    public static function getProjectById($id) {

        $sql = "SELECT * from projects WHERE id= :projectId";

        $stmt = self::connect()->prepare($sql);
        $stmt->bindParam(':projectId',$id, PDO::PARAM_STR);
        return $stmt->execute();


    }

    public function __construct($title, $short_desc, $long_desc, $link, $created_at=null, $updated_at=null) {
    
        if ($created_at === null) {
            $created_at = date('Y-m-d H:i:s');
        }

        if ($updated_at === null) {
            $updated_at = date('Y-m-d H:i:s');
        }

        $sql = "INSERT INTO projects (title, short_desc, long_desc, link, created_at, updated_at) 
        VALUES (:title, :short_desc, :long_desc, :link, :created_at, :updated_at)";

        $stmt = $this->connect()->prepare($sql);

        $stmt->bindParam(':title',$title, PDO::PARAM_STR);
        $stmt->bindParam(':short_desc',$short_desc, PDO::PARAM_STR);
        $stmt->bindParam(':long_desc',$long_desc, PDO::PARAM_STR);
        $stmt->bindParam(':link',$link, PDO::PARAM_STR);
        $stmt->bindParam(':created_at',$created_at, PDO::PARAM_STR);
        $stmt->bindParam(':updated_at',$updated_at, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getAllProjects() {
        $sql = "SELECT * from projects";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }

    public function getProjectCardInfoPagination($offset) {

        $sql = "SELECT title, short_desc, image_path 
        FROM projects INNER JOIN projects_gallery ON projects.id = projects_gallery.project_id 
        LIMIT 3 OFFSET :offset";

        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':offset',$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
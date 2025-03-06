CREATE TABLE IF NOT EXISTS project_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    caption VARCHAR(255),
    is_thumbnail BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE
);

DROP TRIGGER IF EXISTS ensure_single_thumbnail;

CREATE TRIGGER ensure_single_thumbnail
BEFORE INSERT ON project_images
FOR EACH ROW
BEGIN
    IF NEW.is_thumbnail = TRUE THEN
        IF EXISTS (
            SELECT 1
            FROM project_images
            WHERE project_id = NEW.project_id
              AND is_thumbnail = TRUE
        ) THEN
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Only one thumbnail is allowed per project.';
        END IF;
    END IF;
END;
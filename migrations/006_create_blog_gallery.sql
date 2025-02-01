CREATE TABLE IF NOT EXISTS blog_gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    block_id INT NOT NULL, -- References a block in blog_content_blocks
    image_path VARCHAR(255) NOT NULL,
    caption VARCHAR(255),
    is_thumbnail BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (block_id) REFERENCES blog_content_blocks(id) ON DELETE CASCADE
);
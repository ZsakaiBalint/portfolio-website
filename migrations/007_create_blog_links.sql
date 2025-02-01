CREATE TABLE IF NOT EXISTS blog_links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    block_id INT NOT NULL, -- References a block in blog_content_blocks
    link_url VARCHAR(255) NOT NULL,
    link_text VARCHAR(255),
    FOREIGN KEY (block_id) REFERENCES blog_content_blocks(id) ON DELETE CASCADE
);
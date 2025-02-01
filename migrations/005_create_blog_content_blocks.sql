CREATE TABLE IF NOT EXISTS blog_content_blocks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    order_in_post INT NOT NULL,  -- Determines the order of blocks in a blog post
    block_type ENUM('text', 'heading', 'image', 'link') NOT NULL,
    content TEXT, -- Used for 'text' and 'heading' block types
    FOREIGN KEY (post_id) REFERENCES blog_posts(id) ON DELETE CASCADE
);
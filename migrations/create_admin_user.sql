-- Check if the admin user already exists
SELECT COUNT(*) FROM users WHERE username = 'admin';

-- If not, create one
INSERT INTO users (username, password, role)
SELECT 'admin', 'passw', 'admin'
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM users WHERE username = 'admin');

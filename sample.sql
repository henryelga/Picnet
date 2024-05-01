INSERT INTO users (username, name, email, password, pfp, bio, remember_token, created_at, updated_at) VALUES ('john_doe', 'John Doe', 'john@example.com', 'password123', 'john_pfp.jpg', 'Hello, I am John Doe!', NULL, '2024-05-01 22:00:00', '2024-05-01 22:00:00'), ('jane_smith', 'Jane Smith', 'jane@example.com', 'qwerty456', 'jane_pfp.jpg', 'Loving life!', NULL, '2024-05-01 22:01:00', '2024-05-01 22:01:00'), ('bob_johnson', 'Bob Johnson', 'bob@example.com', 'abc123xyz', 'bob_pfp.jpg', 'Exploring the world!', NULL, '2024-05-01 22:02:00', '2024-05-01 22:02:00'), ('emma_wilson', 'Emma Wilson', 'emma@example.com', 'password456', 'emma_pfp.jpg', 'Aspiring photographer', NULL, '2024-05-01 22:03:00', '2024-05-01 22:03:00'), ('michael_brown', 'Michael Brown', 'michael@example.com', 'qwerty789', 'michael_pfp.jpg', 'Fitness enthusiast', NULL, '2024-05-01 22:04:00', '2024-05-01 22:04:00');


INSERT INTO posts (caption, image_path, created_at, updated_at, user_id) VALUES ('Enjoying the sunset', 'sunset.jpg', '2024-04-30 19:15:00', '2024-04-30 19:15:00', (
SELECT  id
FROM users
WHERE email = 'john@example.com')), ('My new puppy', 'puppy.jpg', '2024-04-29 10:30:00', '2024-04-29 10:30:00', (
SELECT  id
FROM users
WHERE email = 'jane@example.com')), ('Hiking in the mountains', 'mountain.jpg', '2024-04-28 14:45:00', '2024-04-28 14:45:00', (
SELECT  id
FROM users
WHERE email = 'bob@example.com')), ('Delicious breakfast', 'breakfast.jpg', '2024-04-27 08:00:00', '2024-04-27 08:00:00', (
SELECT  id
FROM users
WHERE email = 'emma@example.com')), ('Fitness routine', 'workout.jpg', '2024-04-26 17:20:00', '2024-04-26 17:20:00', (
SELECT  id
FROM users
WHERE email = 'michael@example.com')), ('Weekend getaway', 'vacation.jpg', '2024-04-25 11:40:00', '2024-04-25 11:40:00', (
SELECT  id
FROM users
WHERE email = 'john@example.com')), ('New outfit', 'outfit.jpg', '2024-04-24 15:50:00', '2024-04-24 15:50:00', (
SELECT  id
FROM users
WHERE email = 'jane@example.com')), ('Exploring the city', 'city.jpg', '2024-04-23 20:10:00', '2024-04-23 20:10:00', (
SELECT  id
FROM users
WHERE email = 'bob@example.com')), ('Baking session', 'baking.jpg', '2024-04-22 13:25:00', '2024-04-22 13:25:00', (
SELECT  id
FROM users
WHERE email = 'emma@example.com')), ('Relaxing weekend', 'relax.jpg', '2024-04-21 18:35:00', '2024-04-21 18:35:00', (
SELECT  id
FROM users
WHERE email = 'michael@example.com')); 
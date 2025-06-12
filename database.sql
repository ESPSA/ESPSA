-- ESPSA Database Schema and Sample Data
-- Table: users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) DEFAULT 'member'
);

-- Table: events
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    event_date DATE,
    details_page VARCHAR(255),
    image_url VARCHAR(255)
);

-- Table: competitions
CREATE TABLE competitions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    event_date VARCHAR(50),
    details_page VARCHAR(255),
    image_url VARCHAR(255),
    archived BOOLEAN DEFAULT FALSE
);

-- Table: challenges
CREATE TABLE challenges (
    id INT AUTO_INCREMENT PRIMARY KEY,
    competition_id INT,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    image_url VARCHAR(255),
    FOREIGN KEY (competition_id) REFERENCES competitions(id)
);

-- Table: about
CREATE TABLE about (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT,
    mission TEXT,
    vision TEXT,
    academic_supervisor VARCHAR(255),
    supervisor_image VARCHAR(255)
);

-- Table: heads
CREATE TABLE heads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    role VARCHAR(100) NOT NULL,
    image_url VARCHAR(255)
);

-- Table: committees
CREATE TABLE committees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(50) UNIQUE NOT NULL,
    name VARCHAR(255) NOT NULL,
    mission VARCHAR(255),
    about TEXT,
    head_name VARCHAR(255),
    head_title VARCHAR(255),
    head_image VARCHAR(255),
    vice_head_name VARCHAR(255),
    vice_head_title VARCHAR(255),
    vice_head_image VARCHAR(255)
);

-- Table: team_members
CREATE TABLE team_members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    committee_id INT,
    name VARCHAR(255) NOT NULL,
    role VARCHAR(100),
    image_url VARCHAR(255),
    FOREIGN KEY (committee_id) REFERENCES committees(id)
);

-- Table: tasks
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT NOT NULL,
    due_date DATE,
    status VARCHAR(50) DEFAULT 'pending',
    assigned_user_id INT,
    FOREIGN KEY (assigned_user_id) REFERENCES users(id)
);

-- Table: podcasts
CREATE TABLE podcasts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    video_url VARCHAR(255),
    publish_date DATE
);

-- Table: news
CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    link VARCHAR(255),
    image_url VARCHAR(255),
    published_date DATE,
    is_latest BOOLEAN DEFAULT FALSE,
    is_new BOOLEAN DEFAULT FALSE
);

-- Table: contact_messages
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert Sample Users
INSERT INTO users (name, email, password, role) VALUES
('Remon Yasser', 'remon@example.com', '0b14d501a594442a01c6859541bcb3e8164d183d32937b851835442f69d5c94e', 'president'),
('Yasmeen Yasser', 'yasmeen@example.com', '6cf615d5bcaac778352a8f1f3360d23f02f34ec182e259897fd6ce485d7870d4', 'secretary'),
('Ahmed Maged', 'ahmed@example.com', '5906ac361a137e2d286465cd6588ebb5ac3f5ae955001100bc41577c3d751764', 'hr_head');

-- Insert Events
INSERT INTO events (title, description, event_date, details_page, image_url) VALUES
('Intertek Total Quality Assured Internship', 'A professional experience inside intertek company.', '2024-10-22', 'Intertek Total Quality Assured Internship.html', 'https://i.ibb.co/5gF0MsdT/Whats-App-Image-2025-02-03-at-16-39-20-9230e083.jpg'),
('ESPSA (Research Rally Competition) 2024', 'An exciting exhibition of innovative scientific projects by students.', '2024-10-22', 'ESPSA (Research Rally Competition) 2024.html', 'https://i.ibb.co/4WsLhjZ/ESPSA-Research-Rally-Competition-1-1.jpg'),
('Medical Conveny 2024', 'Hands-on workshop on the latest technological advancements.', '2024-06-10', 'medical-convency.html', 'https://i.ibb.co/9ccy1ch/science-fair5-1.jpg');

-- Insert Competitions
INSERT INTO competitions (name, description, event_date, details_page, image_url, archived) VALUES
('ESPSA (Research Rally Competition) 2025', 'An exciting exhibition of innovative scientific projects by students.', '2025', NULL, 'https://i.ibb.co/mcpjWCB/news1-1.jpg', FALSE),
('ESPSA (Research Rally Competition) 2024', 'An exciting exhibition of innovative scientific projects by students.', '2024-10-22', '2024.html', 'https://i.ibb.co/q9yvWNp/relay-1.jpg', TRUE);

-- Insert Challenges
INSERT INTO challenges (competition_id, title, content, image_url) VALUES
(2, 'Unveiling the Invisible Threat: Microplastics in Our Life Cycle', 'Did you know that our lives are facing a silent yet significant threat? Microplastics are increasingly infiltrating marine ecosystems, posing risks to marine life and human health.', 'microplastics.jpg'),
(2, 'Pharmacovigilance: The Guardian of Medicine Safety', 'Pharmacovigilance is the science behind monitoring the safety of all medicines in healthcare.', 'pharmacovigilance.jpg'),
(2, 'Unlocking the Power of Biomass Wastes: Transforming Nature\'s Discards into Sustainable Energy', 'Explore biomass waste and discover how these overlooked materials can be the key to a greener future.', 'biomass.jpg'),
(2, 'Tackling Vaccine Hesitancy: A Shot of Truth', 'Let\'s spread awareness, dispel myths, and champion vaccination as a cornerstone of public health.', 'vaccine-hesitancy.jpg');

-- Insert About Information
INSERT INTO about (description, mission, vision, academic_supervisor, supervisor_image) VALUES
('ESPSA Club empowers Pharm D students on their educational and professional journeys. We provide essential resources, host exciting events, and foster a vibrant community where future pharmacists can excel. Our mission goes beyond organizing activities—we aim to deliver real value. By joining us, you''ll gain practical skills in design, research, and scientific writing, and collaborate on impactful projects. We prioritize effective time management to ensure every moment spent with us is meaningful and rewarding. Connect with ESPSA to enhance your academic experience and innovate in the pharmaceutical field. Stay tuned for more exciting opportunities!',
'To empower students by providing resources, mentorship, and opportunities to excel in their respective scientific and engineering fields.',
'To be a leading scientific club that nurtures the next generation of innovators and problem-solvers, contributing to advancements in technology and science.',
'DR Mahmoud Soliman',
'https://i.ibb.co/1bWvb3T/DR-Mahmoud-Soliman-1.jpg');

-- Insert Heads
INSERT INTO heads (name, role, image_url) VALUES
('Remon Yasser', 'Founder and President', 'https://i.ibb.co/Qm626Qs/Remon-Yasser-1.jpg'),
('Yasmeen Yasser', 'General Secretary', 'https://i.ibb.co/7CZsbHj/Yasmeen-Yasser-1.jpg'),
('Ahmed Maged', 'Head of HR', 'https://i.ibb.co/wcdtMfY/Ahmed-Maged-1.jpg'),
('Mahmoud Meselhy', 'Head of OC', 'https://i.ibb.co/27DqyfP/Mahmoud-1.jpg'),
('Antonious Amgad', 'Vice OC', 'https://i.ibb.co/7Y3ggjw/Antonious-Amgad-1.jpg'),
('Islam Osama', 'Head of Scientific', 'https://i.ibb.co/6FrScbB/Islam-Osama-1.jpg'),
('Shahd Sherif', 'Vice Scientific', 'https://i.ibb.co/353cdkVc/image-1.png'),
('Reem Mohamed', 'Head of Media', 'https://i.ibb.co/sjk6FZj/reem-1.jpg'),
('Abdelhamed Fathy', 'Vice Media', 'https://i.ibb.co/0BhHTkL/Abdelhamed-Fathy-1.jpg'),
('Yousef Ehab', 'Head of Design', 'https://i.ibb.co/z8Ytq8K/Yousef-Ehab-1.jpg'),
('Menna Maher', 'Head of PR', 'https://i.ibb.co/fzPMc2sQ/image.png');

-- Insert Committees
INSERT INTO committees (slug, name, mission, about, head_name, head_title, head_image,
    vice_head_name, vice_head_title, vice_head_image) VALUES
('hr', 'HR Committee', 'Empowering our team with the best HR practices.',
 'The HR Committee is responsible for managing all aspects related to human resources, including recruitment, training, and employee welfare.',
 'Ahmed Maged', 'Head of HR', 'images/team/Ahmed Maged.jpg',
 NULL, NULL, NULL),
('oc', 'OC Committee', 'Organizing excellence in every event.',
 'The OC Committee oversees the organization and execution of all ESPSA events, ensuring they run smoothly and successfully.',
 'Mahmoud Meselhy', 'Head of OC', 'images/team/Mahmoud.jpg',
 'Antonious Amgad', 'Vice OC', 'images/team/Antonious Amgad.jpg'),
('scientific', 'Scientific Committee', 'Advancing knowledge through innovation.',
 'The Scientific Committee focuses on the development and implementation of scientific projects and research within ESPSA.',
 'Islam Osama', 'Head of Scientific', 'images/team/Islam Osama.jpg',
 'Shahd Sherif', 'Vice Scientific', 'https://i.ibb.co/353cdkVc/image-1.png'),
('media', 'Media Committee', 'Capturing moments, telling stories.',
 'The Media Committee manages all media-related activities, including photography, videography, and social media presence.',
 'Reem Mohamed', 'Head of Media', 'images/team/reem.jpg',
 'Abdelhamed Fathy', 'Vice Media', 'images/team/Abdelhamed Fathy.jpg'),
('design', 'Design Committee', 'Crafting visual identities that resonate.',
 'The Design Committee is responsible for all design-related projects, including branding, graphics, and visual content creation.',
 'Yousef Ehab', 'Head of Design', 'images/team/Yousef Ehab.jpg',
 NULL, NULL, NULL),
('pr', 'PR Committee', 'Promoting our vision to the world.',
 'The PR Committee handles all public relations activities, ensuring effective communication and positive representation of ESPSA.',
 'Menna Maher', 'Head of PR', 'https://i.ibb.co/fzPMc2sQ/image.png',
 NULL, NULL, NULL);
-- Insert Team Members
INSERT INTO team_members (committee_id, name, role, image_url) VALUES
(1, "Ali Hassan", "Member", NULL),
(2, "Sara Nabil", "Member", NULL);


-- Insert Sample Tasks
INSERT INTO tasks (description, due_date, status, assigned_user_id) VALUES
('Prepare promotional materials for Medical Convoy', '2024-05-30', 'pending', 1),
('Update event gallery with new images', '2024-06-15', 'in progress', 2);

-- Insert Podcasts
INSERT INTO podcasts (title, description, video_url, publish_date) VALUES
('ESPSA Podcast Introduction',
 'Overview of upcoming episodes with professors and industry experts.',
 'https://www.youtube.com/embed/V7lC5z_Lnps',
 '2024-04-01');

-- Insert News
INSERT INTO news (title, content, link, image_url, published_date, is_latest, is_new) VALUES
('Podcasts Announcement',
 'See our podcasts with pharmaceutical field professionals.',
 'podcast.php',
 'https://i.ibb.co/1JZnGgC/news2-1.jpg',
 '2024-02-01', TRUE, TRUE),
('Medical convoy 2024',
 'Bringing hope and healthcare to communities in need – one convoy at a time.',
 'events.html',
 'https://i.ibb.co/tzXbQq6/hero1-1.jpg',
 '2024-05-01', TRUE, FALSE),
('Upcoming Science Fair 2025',
 'Get ready for the biggest science fair of the year! Discover exciting projects and more.',
 'events.html',
 'https://i.ibb.co/q9yvWNp/relay-1.jpg',
 '2025-01-15', FALSE, TRUE);


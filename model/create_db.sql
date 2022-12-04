/*****************************************
* Create the e_commerce database
*****************************************/
-- create and select the database
DROP DATABASE IF EXISTS e_commerce;
CREATE DATABASE e_commerce;
USE e_commerce;


-- categories in our book store will be the genre of the book
-- For example, sci-fi, novel, horror
CREATE TABLE genres (
 genreID       INT(11)        NOT NULL   AUTO_INCREMENT,
 genreName     VARCHAR(255)   NOT NULL,
 PRIMARY KEY (genreID)
);



CREATE TABLE books (
 bookID         INT            NOT NULL   AUTO_INCREMENT,
 genreID        INT            NOT NULL,
 bookName       VARCHAR(255)   NOT NULL,
 bookDescription       TEXT           NOT NULL,
 listPrice         DECIMAL(10,2)  NOT NULL,
 discountPercent   DECIMAL(10,2)  NOT NULL   DEFAULT 0.00,
 isbn              VARCHAR(255)   NOT NULL,
 authors           VARCHAR(255)   NOT NULL,
 publisher         VARCHAR(255)   NOT NULL,
 pictureName       VARCHAR(255)   NOT NULL,
 PRIMARY KEY (bookID), 
 FOREIGN KEY (genreID) REFERENCES genres(genreID)
);

 /*
 1 is normal user, they can use shopping cart, view/search books, and checks out. When a new user try to register, they will be assigned as a normal user
 2 is administrator, we will have a few pre-define admin accounts, they can add/delete/update/select books
 */
CREATE TABLE users (
 userID        INT            NOT NULL   AUTO_INCREMENT,
 
 privileges        INT            NOT NULL,
 
 emailAddress      VARCHAR(255)   NOT NULL,
 userPassword          VARCHAR(60)    NOT NULL,
 userName         VARCHAR(60)    NOT NULL,
 shipAddressID     INT            DEFAULT NULL,
 PRIMARY KEY (userID),
 UNIQUE INDEX emailAddress (emailAddress),
 INDEX shipAddressID(shipAddressID)
);


CREATE TABLE addresses (
 addressID         INT            NOT NULL   AUTO_INCREMENT,
 userID            INT            NOT NULL,
 line1             VARCHAR(60)    NOT NULL,
 line2             VARCHAR(60)               DEFAULT NULL,
 city              VARCHAR(40)    NOT NULL,
 address_State             VARCHAR(2)     NOT NULL,
 zipCode           VARCHAR(10)    NOT NULL,
 phone             VARCHAR(12)    NOT NULL,
 address_Disabled          TINYINT(1)     NOT NULL   DEFAULT 0,
 PRIMARY KEY (addressID),
 INDEX userID(userID),
 FOREIGN KEY (userID) REFERENCES users(userID)
);

CREATE TABLE orders (
 orderID           INT            NOT NULL   AUTO_INCREMENT,
 bookID         INT            NOT NULL,
 userID            INT            NOT NULL,
 orderDate         DATE       NOT NULL,
 totalAmount        DECIMAL(10,2)  NOT NULL,
 taxAmount         DECIMAL(10,2)  NOT NULL,
 shipDate          DATE           DEFAULT NULL,
 shipAddressID     INT            NOT NULL,
 PRIMARY KEY (orderID), 
 INDEX userID (userID),
 FOREIGN KEY (userID) REFERENCES users(userID),
 FOREIGN KEY (bookID) REFERENCES books(bookID)
);


-- create the users
CREATE USER IF NOT EXISTS mgs_user@localhost 
IDENTIFIED BY 'pa55word';
CREATE USER IF NOT EXISTS mgs_tester@localhost 
IDENTIFIED BY 'pa55word';
-- grant privleges to the users
GRANT SELECT, INSERT, DELETE, UPDATE
ON * 
TO mgs_user@localhost;
GRANT SELECT 
ON books
TO mgs_tester@localhost;


INSERT INTO `genres`(`genreName`) VALUES
('Arts'),
('Sci-Fi'),
('Education'),
('Literature'),
('Science'),
('Comic'),
-- new
('Computer Science');

INSERT INTO `books`(`genreID`, `bookName`, `bookDescription`, `listPrice`, `discountPercent`, `isbn`, `authors`, `publisher`, `pictureName`) VALUES
('1','Picasso Sculpture',"The most in-depth account of the lives of Picasso's sculptures.",'82.55','0.00','0870709747','Ann Temkin','The Museum of Modern Art, New York','../view/pic/Picasso.jpg'),
('1','Origami Extravaganza! Folding Paper, a Book, and a Box',"Make dozens of fun and easy origami projects with this colossal origami kit.",'14.39','0.05','0804832420','Tuttle Publishing','Tuttle Publishing','../view/pic/Origami.jpg'),
('2', 'The Dark Forest', "In The Dark Forest, Earth is reeling from the revelation of a coming alien invasion-in just four centuries' time.", '28.34', '0.10', '9780765377081', 'Cixin Liu', 'Tor Books', '../view/pic/Dark_Forest.jpg'),
('2', 'Do Androids Dream of Electric Sheep', "A masterpiece ahead of its time, a prescient rendering of a dark future, and the inspiration for the blockbuster film Blade Runner.", '13.99', '0.05', '0345404475', 'Philip K. Dick', 'Random House Worlds', '../view/pic/Sheep.jpg'),
('3', 'My First Book of Baby Signs: 40 Essential Signs to Learn and Practice', "Learn sign language alongside your baby with this adorable storybook for ages 0 to 3.", '11.50', '0.00', '1648766595', 'Lane Rebelo', 'Rockridge Press', '../view/pic/Baby.jpg'),
('3', 'Princeton Review SAT Premium Prep, 2022', "Make sure you're studying with the most up-to-date prep materials! 9 Practice Tests + Review & Techniques + Online Tools and more.", '28.88', '0.08', '0525570446', 'The Princeton Review', 'Princeton Review', '../view/pic/Sat.jpg'),
('4', 'The Complete Fiction of H. P. Lovecraft', "The Complete Fiction of H. P. Lovecraft collects the great horror author's novel, four novellas, and fifty-three short stories.", '13.89', '0.00', '0785834206', 'Howard Phillips Lovecraft', 'Chartwell Books', '../view/pic/Lovecraft.jpg'),
('4', 'To Kill a Mockingbird', "Pulitzer Prize-winning masterwork of honor and injustice in the deep South—and the heroism of one man in the face of blind and violent hatred.", '22.99', '0.00', '0062420704', 'Harper Lee', 'Harper', '../view/pic/Bird.jpg'),
('5', 'Quantum Physics for Beginners', "Award-winner scientist, Carl J. Pratt, presents the most exhaustive and clear introduction to the topic.", '24.95', '0.00', '1802356584', 'Carl J. Pratt', 'Stefano Solimito', '../view/pic/Quantum.jpg'),
('5', 'Universe: The Definitive Visual Guide', "Marvel at the wonders of the Universe, from stars and planets to black holes and nebulae, in this exploration of our Solar System and beyond.", '49.99', '0.25', '0241412749', 'Martin Rees', 'DK', '../view/pic/Space.jpg'),
('6', 'Star Wars Vol. 1: Skywalker Strikes', "The greatest space adventure of all returns to Marvel! Luke Skywalker and the ragtag rebel band opposing the Galactic Empire are fresh off their biggest victory.", '11.99', '0.35', '0785192131', 'John Cassaday', 'Marvel', '../view/pic/Star_Wars.jpg'),
('6', 'Spider-Man', "Taking on both writing and art duties, McFarlane ushered Peter Parker into a gritty new era.", '43.99', '0.00', '1302923730', 'Todd McFarlane', 'Marvel', '../view/pic/Spider-Man.jpg'),

-- new
('1','Homebody',"A Guide to Creating Spaces You Never Want to Leave",'20.99','0.08','006280197X','Joanna Gaines','Harper Design','../view/pic/Home.jpg'),
('2','The Midnight Library',"Somewhere out beyond the edge of the universe there is a library that contains an infinite number of books, each one the story of another reality. One tells the story of your life as it is, along with another book for the other life you could have lived if you had made a different choice at any point in your life.",'26.00','0.00','0525559477','Matt Haig','Viking','../view/pic/Midnight.jpg'),

('7','Quantum Computing for Everyone',"n this book, Chris Bernhardt offers an introduction to quantum computing that is accessible to anyone who is comfortable with high school mathematics. He explains qubits, entanglement, quantum teleportation, quantum algorithms, and other quantum-related topics as clearly as possible for the general reader.",'17.95','0.00','0262539535','Chris Bernhardt','The MIT Press','../view/pic/QuantumComputing.jpg'),
('7','Artificial Intelligence: A Modern Approach',"It explores the full breadth and depth of the field of artificial intelligence (AI). And brings readers up to date on the latest technologies, presents concepts in a more unified manner, and offers new or expanded coverage of machine learning, deep learning, transfer learning, multiagent systems, robotics, natural language processing, causality, probabilistic programming, privacy, fairness, and safe AI.",'213.25','0.05','0134610997','Stuart Russell','Pearson','../view/pic/Ai.jpg'),
('7','Digital Design',"Like the previous editions, this edition of Digital Design supports a multimodal approach to learning, with a focus on digital design, regardless of language. Recognizing that three public-domain languages―Verilog, VHDL, and SystemVerilog",'158.99','0.10','9780134549897','Morris Mano','Pearson','../view/pic/Logic.jpg'),

('4','J.R.R. Tolkien 4-Book Boxed Set: The Hobbit and The Lord of the Rings',"When Thorin Oakenshield and his band of dwarves embark upon a dangerous quest to reclaim the hoard of gold stolen from them by the evil dragon Smaug, Gandalf the wizard suggests an unlikely accomplice: Bilbo Baggins, an unassuming Hobbit dwelling in peaceful Hobbiton.",'34.96','0.15','0345538374','John Ronald Reuel Tolkien', 'Del Rey', '../view/pic/Lords.jpg'),
('5','Oceanology: The Secrets of the Sea Revealed',"Astounding photography reveals an abundance of life, from microscopic plankton to great whales, seaweed to starfish. Published in association with the Smithsonian Institution, the book explores every corner of the oceans, from coral reefs and mangrove swamps to deep ocean trenches.",'50.00','0.00','0744020506','Maya Plass','DK','../view/pic/Ocean.jpg'),
('6','Pokemon Adventures',"All your favorite Pokémon game characters jump out of the screen into the pages of this action-packed manga! Contains Pokémon Adventures vols. 1-7 and a color poster!",'53.99','0.00','9781421550060','Hidenori Kusaka','VIZ Media','../view/pic/Pokemon.jpg'),

('3', 'Absolute C++', "A comprehensive introduction to the C++ programming language. The text is organized around the specific use of C++, providing programmers with an opportunity to master the language completely. Adaptable to a wide range of users, the text is appropriate for beginner to advanced programmers familiar with the C++ language.", '179.99', '0.05', '0133970787', 'Walter Savitch', 'Pearson', '../view/pic/C++.jpg');




ALTER TABLE `users` ADD CONSTRAINT `users_shipAddressID_fk` FOREIGN KEY (`shipAddressID`) REFERENCES `addresses`(`addressID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

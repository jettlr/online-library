

 CREATE TABLE `authors` (
   `author_id` int(11) NOT NULL,
   `first_name` varchar (50) NOT NULL,
   `last_name` varchar(50) NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 INSERT INTO `authors`(`author_id`,`first_name`,`last_name`) VALUES
 (3,'Gabriel','Marquez'),
 (4,'James','Joyce'),
 (5,'Marcel','Proust'),
 (6,'Lewis','Carroll'),
 (7,'Jane','Austen');

 CREATE TABLE `books` (
   `books_id` int(11) NOT NULL,
   `title` varchar (255) NOT NULL,
   `page` int(11)NOT NULL,
   `isbn` varchar (100) NOT NULL,
   `publication_date` datetime NOT NULL,
   `edition` int(10)NOT NULL,
   `publisher_id` int(11) NOT NULL,
   `is_reserved` int(11) NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 INSERT INTO `books`(`books_id`,`title`,`page`,`isbn`,`publication_date`,`edition`,`publisher_id`,`is_reserved`) VALUES
 (13,'One Hundred Years of Solitude','512','0161449596','1967-08-17', '2', '133',0),
 (14,'Ulysses','736','0841709587','1922-02-02', '6', '144',0),
 (15,'In Search of Lost Time','1300','0311459590','1913-07-12', '34', '155',0),
 (16,'Alices Adventures in Wonderland','96','0161437580','1865-11-26', '7', '166',0),
 (17,'Emma','512','0141439580','1815-12-23', '4', '177',0);


 CREATE TABLE `authors_books`(

 	`authors_books_id` int(11) NOT NULL,
 	`author_id` int(11) NOT NULL,
 	`books_id` int(11) NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 INSERT INTO `authors_books` (`authors_books_id`,`author_id`,`books_id`) VALUES
 (23, 3, 13),
 (24, 4, 14),
 (25, 5, 15),
 (26, 6, 16),
 (27, 7, 17);


 CREATE TABLE `publishers`(
 	`publisher_id` int(11) NOT NULL,
 	`name` varchar(255) NOT NULL,
 	`adress` varchar(255) NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;


 INSERT INTO `publishers` (`publisher_id`,`name`,`adress`) VALUES
 (33,'Leaf Press','Wiesenweg 41' ),
 (34,'Able Muse', 'Ebba Ramsäys Väg 80' ),
 (35,'Breakwater Books', 'Anna Väg 5' ),
 (36,'Wild Leaf Press', 'Munkgatan 40' ),
 (37,'Stillhouse Press', 'Klostergatan' );

 CREATE TABLE `user`(

 	`username` varchar(255) NOT NULL,
 	`password` varchar(42) NOT NULL

 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 INSERT INTO `user` (`username`,`password`) VALUES
 ('fireyukon', '477c76e602c8cd28ffe7613110a4ec7c'),
 ('cakepune', '0b4dbe904394456d0500f92a6db3b3ed'),
 ('crelas', 'ebacf61946ee81f386960ad2a09a147e'),
 ('olwen', 'e3afed0047b08059d0fada10f400c1e5');


Hund, Baum, Haus, Admin

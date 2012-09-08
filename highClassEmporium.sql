DROP DATABASE IF EXISTS jordangr_highClassData;
CREATE DATABASE IF NOT EXISTS jordangr_highClassData;
USE jordangr_highClassData;

CREATE TABLE ties_table(
id int PRIMARY KEY auto_increment,
name CHAR(50),
price DEC(5,2),
description TEXT,
thumbnail CHAR(50),
large CHAR(50),
style ENUM ('colored','striped','patterned','plaid'),
color ENUM ('red','blue','green','purple','brown','orange','silver','white','black','pink','gray','yellow')
);

INSERT INTO ties_table
	(name, price, description, thumbnail, large, style, color)
	VALUES
	('Lunar Front Black/White Stripe Tie',79.99,'This is a stylish hand made 100% silk necktie. Bring an outstanding sense of fashion and obvious confidence to your wardrobe with this excellent piece of men\'s fashion.','LunarBlackTn.jpg','LunarBlackL.jpg','striped','black'),
	('Murray Stripe Tie',29.99,'Does your wardrobe need a new stylish addition? Add our striking Murray Stripe Tie to your collection. Made with 100% silk and cotton and has durable microfiber construction.','MurrayTn.jpg','MurrayL.jpg','striped','blue'),
	('Breast Cancer Awareness Tie',14.99,'Spread the word and show your support for Breast Cancer by wearing this beautiful men\'s necktie.','CancerTn.jpg','CancerL.jpg','patterned','pink'),
	('Geoffrey Beene Tie',29.99,'Get a fine necktie from the Geoffrey Beene design group. Has a fine texture of silk and satin.','GeoffreyTn.jpg','GeoffreyL.jpg','striped','gray'),
	('Dockers Blue Stripe Tie',39.99,'A wonderful piece of the Dockers Necktie line. Altering tonal stripes in cobalt and light blue against a silk background.','DockerBlueTn.jpg','DockerBlueL.jpg','striped','blue'),
	('Dockers Stripe Tie',14.99,'A wonderful piece from the Dockers Necktie line. Featuring diagonal stripes in a charcoal gray, blue, and silver. Made of 100% silk and the texture of satin in the diagonal areas.','DockerTn.jpg','DockerL.jpg','striped','gray'),
	('Lunar Front Red Tie',24.99,'Like to express your individual style through your neckwear? Then this solid red necktie is the right choice for you. From the elite Brent Morgan, this tie features the lustrous shine of a satin and made of 100% silk.','LunarRedTn.jpg','LunarRedL.jpg','colored','red'),
	('Express White Stripe Tie',44.99,'A sophisticated men\'s necktie, needed by every man. From the Brent Morgan line, hand tailored in silk. A handmade piece featuring crisp stripes of silvery white and black.','ExpressTn.jpg','ExpressL.jpg','striped','black'),
	('Skybar Stripe Tie',34.99,'The Sky bar striped tie has satin stripes in hues of blue on a cotton black background. Woven in silk are the extra details from the white dot stitches to the shadowed check tipping.','SkybarTn.jpg','SkybarL.jpg','striped','blue'),
	('Napoli Plaid Tie',23.99,'Every man needs a necktie designed with a touch of Italian flair. A necktie with distinct detail from woven gold crown tipping to the hand made construction.','NapoliTn.jpg','NapoliL.jpg','plaid','blue');

SELECT * FROM ties_table;

CREATE TABLE user_table(
id int PRIMARY KEY auto_increment,
username CHAR(50),
password CHAR(50),
fName CHAR(50),
lName CHAR(50),
email CHAR(50),
privilege ENUM('customer','admin')
);

INSERT INTO user_table
(id, username, password, fName, lName, email, privilege)
VALUES
(NULL, 'admin', 'admin', 'Jordan', 'Grace', 'jordan.i.grace@gmail.com', 'admin');


SELECT * FROM user_table;


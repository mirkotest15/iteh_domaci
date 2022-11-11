/*
:register, :login, :Create_own_post, :Read_posts, :Update_own_post, :Delete_own_post, :like_posts, :comment, :reply_to_comment

User -> UserID
Post -> PostID, ..., UserID(author)
Like -> UserID, PostID (userID liked postID)
Comm -> CommID, UserID, PostID, Time, Content, ReplCommID(replied to)
*/

CREATE TABLE `User` 
(
	`userID` INT(16) NOT NULL UNIQUE AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    `admin` BIT DEFAULT 0,
    `email`	VARCHAR(50) NOT NULL
);

CREATE TABLE `Posts` 
(
	`postID` INT(16) NOT NULL UNIQUE AUTO_INCREMENT,
    `postTitle` VARCHAR(50) NOT NULL,
    `NumOfLikes` INT(16) NOT NULL,
    `postContents` VARCHAR(50) NOT NULL,
    `postAuthor` INT(16) FOREIGN KEY User(userID),
);
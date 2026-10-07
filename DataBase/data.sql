CREATE DATABASE progracode;

USE progracode;

CREATE TABLE Users(
    IdUser varchar(255) PRIMARY KEY NOT NULL,
    NameUser varchar(255) NOT NULL,
    PasswordUser varchar(255) NOT NULL,
    CodeUser varchar(255) NOT Null,
    ProfileSrcUser varchar(300),
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Courses(
    IdCour INT PRIMARY KEY AUTO_INCREMENT,
    NameCour varchar(255) NOT NULL,
    DescriptionCour varchar(400) NOT NULL
);

CREATE TABLE Levels(
    IdLevel INT PRIMARY KEY AUTO_INCREMENT,
    IdUser varchar(255) NOT NULL,
    NameCour varchar(255) NOT NULL,
    NumLev INT NOT NULL,
    TitleLev varchar(300) NOT NUll,
    DescriptionLev varchar(400),
    FOREIGN KEY(IdUser) REFERENCES Users(IdUser)
);


CREATE TABLE Completed(
    IdComp INT PRIMARY KEY AUTO_INCREMENT,
    IdUser varchar(255) NOT NULL,
    NameCour varchar(255) NOT NULL,
    CodeComp varchar(255) NOT NULL,
    TypeComp varchar(255) NOT NULL,
    Completed BOOLEAN DEFAULT FALSE,
    FOREIGN KEY(IdUser) REFERENCES Users(IdUser)
);

CREATE TABLE UpdateLevel(
    IdUp INT PRIMARY KEY AUTO_INCREMENT,
    IdUser varchar(255) NOT NULL,
    NameCour varchar(255) NOT NULL,
    UpExercices BOOLEAN DEFAULT FALSE,
    UpLessons BOOLEAN DEFAULT FALSE,
    UpQuiz BOOLEAN DEFAULT FALSE,
    FOREIGN KEY(IdUser) REFERENCES Users(IdUser)
);

CREATE TABLE Lessons(
    IdLess INT PRIMARY KEY AUTO_INCREMENT,
    NLess INT NOT NULL,
    NameCour varchar(255) NOT NULL,
    CodeLess varchar(255) NOT NULL,
    TitleLess varchar(255) NOT NUll,
    DescriptionLess varchar(400) NOT NULL
);




CREATE TABLE Lessonshow(
    IdLesShow INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NLesShow INT NOT NULL,
    NameCour varchar(255) NOT NULL,
    CodeLesShow varchar(255) NOT NULL,
    TitleLesShow varchar(255) NOT NUll,
    VideoSrcLesShow varchar(800) NOT NULL,
    PdfSrcLesShow varchar(800) NOT NULL,
    LinkLesA varchar(300) NOT NULL,
    LinkLesB varchar(300) NOT NULL
);

CREATE TABLE Exercices(
    IdEx INT PRIMARY KEY AUTO_INCREMENT,
    NEx INT NOT NULL,
    NameCour varchar(255) NOT NULL,
    CodeEx varchar(255) NOT NULL,
    TitleEx varchar(255) NOT NUll,
    DescriptionEx varchar(400) NOT NUll,
    VideoSrcEx varchar(800) NOT NULL,
    PdfSrcEx varchar(800) NOT NULL
);

CREATE TABLE Quizzes(
    IdQuiz INT PRIMARY KEY AUTO_INCREMENT,
    NameCour varchar(255) NOT NUll,
    FileQuiz varchar(600) NOT NUll,
    LastUpdate DATETIME NOT NUll
);

CREATE TABLE Certificate(
    IdCertificate INT PRIMARY KEY AUTO_INCREMENT,
    IdUser varchar(255) NOT NULL,
    NameCour INT NOT NULL,
    TitleCer varchar(255) NOT NULL,
    DateCer DATETIME NOT NULL,
    PdfCer varchar(600) NOT NUll,
    ImgCer varchar(600) NOT NUll,
    FOREIGN KEY(IdUser) REFERENCES Users(IdUser)
);





































CREATE TABLE Admin(
    IdAdmin INT PRIMARY KEY AUTO_INCREMENT,
    NameAdmin varchar(255) NOT NULL,
    PasswordAdmin varchar(255) NOT NULL,
    CodeAdmin varchar(255) NOT Null,
    ProfileSrcAdmin varchar(300),
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create database if not exists LESSON;
use LESSON;
create table LESSON_2023(LESSON_ID int auto_increment, LESSON_NAME text, ACCEPTED_GRADE int, PRIMARY KEY (LESSON_ID));
insert into LESSON_2023(LESSON_NAME,ACCEPTED_GRADE)VALUES("国語",1);

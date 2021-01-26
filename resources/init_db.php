<?php

/*
 * SETTINGS!
 */
$databaseName = 'news_db';
$databaseUser = 'root';
$databasePassword = '';

/*
 * CREATE THE DATABASE
 */
$pdoDatabase = new PDO('mysql:host=localhost', $databaseUser, $databasePassword);
$pdoDatabase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdoDatabase->exec('CREATE DATABASE IF NOT EXISTS news_db');

/*
 * CREATE THE TABLE
 */
$pdo = new PDO('mysql:host=localhost;dbname='.$databaseName, $databaseUser, $databasePassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// initialize the table
$pdo->exec('DROP TABLE IF EXISTS news_properties;');

$pdo->exec('CREATE TABLE `news_properties` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `headline` text COLLATE utf8mb4_unicode_ci NOT NULL,
 `createddate` datetime NOT NULL,
 `content` text NOT NULL,
 `activeflag` tinyint(1) NOT NULL,
 `lastupdateddate` datetime COLLATE utf8mb4_unicode_ci NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

$pdo->exec('CREATE TABLE `user` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `useremail` varchar(100) NOT NULL,
    `userpassword` varchar(100) NOT NULL,
    `userrole` int(10) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
   

echo "Ding!\n";

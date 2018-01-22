<?php

namespace Scientometrics\Models\Service;

/**
 * class contains several private methods creating database layout
 * 
 * @since 0.3.xx
 */

class Scheme

{

    private $pdo;

    /**
     * constructor
     *
     * @param [\PDO] $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * main method
     * 
     * @return void
     */
    public function createScheme(): void
    {
        $this->createPositions();
        $this->createAuthors();
        $this->createArticles();
        $this->createArticlesAuthors();
        $this->createMonographies();
        $this->createReports();
        $this->createConferencies();
        echo "структура базы данных создана;<br>";
        echo "перенаправление в течение 3 секунд;<br>";
    }
    

    /**
     * create table 'authors'
     * 
     * @return void
     */
    private function createAuthors(): void
    {
        if ($this->pdo->query("CREATE TABLE scientometrics.authors2 (
            id int(11) NOT NULL AUTO_INCREMENT,
            name varchar(50) NOT NULL,
            secondname varchar(100),
            lastname varchar(100) NOT NULL,
            position_key int(11) DEFAULT NULL,git 
            PRIMARY KEY (id),
            CONSTRAINT FK_authors2_position_key FOREIGN KEY (position_key)
            REFERENCES scientometrics.positions (id) ON DELETE NO ACTION ON UPDATE RESTRICT)
            ENGINE = INNODB
            AUTO_INCREMENT = 9
            AVG_ROW_LENGTH = 3276
            CHARACTER SET utf8
            COLLATE utf8_general_ci;")) 
            {
                echo "таблица 'authors' создана;<br>";
            } else {
                echo "не получилось создать таблицу 'authors';<br>";
        }
    } // end function


    /**
     * @return void
     */
    private function createPositions(): void
    {
        if ($this->pdo->query("CREATE TABLE scientometrics.positions2 (
            id int(11) NOT NULL AUTO_INCREMENT,
            `position` varchar(255) NOT NULL,
            `key` varchar(255) NOT NULL,
            PRIMARY KEY (id))
            ENGINE = INNODB
            AUTO_INCREMENT = 6
            AVG_ROW_LENGTH = 3276
            CHARACTER SET utf8
            COLLATE utf8_general_ci;
            "))
            {
                echo "таблица 'positions' создана;<br>";
            } else {
                echo "не получилось создать таблицу 'positions';<br>";
            }
    } // end function


    /**
     * @return void
     */
    private function createArticlesAuthors(): void
    {
        if ($this->pdo->query("CREATE TABLE scientometrics.articles_authors2 (
            id int(11) NOT NULL AUTO_INCREMENT,
            name varchar(50) DEFAULT NULL,
            lastname varchar(255) DEFAULT NULL,
            articles_key int(11) DEFAULT NULL,
            PRIMARY KEY (id),
            CONSTRAINT FK_articles_authors_articles2_k FOREIGN KEY (articles_key)
            REFERENCES scientometrics.articles (id) ON DELETE NO ACTION ON UPDATE RESTRICT)
            ENGINE = INNODB
            AUTO_INCREMENT = 1
            CHARACTER SET utf8
            COLLATE utf8_general_ci;")) 
            {
                echo "таблица 'articles_authors' создана;<br>";
            } else {
                echo "не получилось создать таблицу 'articles_authors';<br>";
            }
    } // end function


    /**
     * @return void
     */
    private function createArticles()
    {
        if ($this->pdo->query("CREATE TABLE IF NOT EXISTS `articles2` 
                            (`id` int(11) NOT NULL AUTO_INCREMENT,
                            `title` varchar(30) NOT NULL,
                            `subtitle` varchar(30),
                            `author` int(11) NOT NULL,
                            `year` int(11),
                            PRIMARY KEY (`id`)) Engine=InnoDB DEFAULT CHARSET=utf8;")) 
        {
            echo "таблица 'articles' создана;<br>";
        } else {
            echo "не получилось создать таблицу 'articles';<br>";
        }
    } // end function


    private function createMonographies(): void
    {
        if ($this->pdo->query("CREATE TABLE IF NOT EXISTS `monographies2` 
                            (`id` int(11) NOT NULL AUTO_INCREMENT,
                            `title` varchar(30) NOT NULL,
                            `subtitle` varchar(30),
                            `author` int(11) NOT NULL,
                            `year` int(11),
                            `publisher` varchar(100),
                            PRIMARY KEY (`id`)) Engine=InnoDB DEFAULT CHARSET=utf8;")) 
                            {
                                echo "таблица 'monographies' создана;<br>";
                            } else {
                                echo "не получилось создать таблицу 'monographies';<br>";
                            }
    } // end function

    private function createReports(): void
    {
        if ($this->pdo->query("CREATE TABLE IF NOT EXISTS `reports2` 
                            (`id` int(11) NOT NULL AUTO_INCREMENT,
                            `title` varchar(30) NOT NULL,
                            `subtitle` varchar(30),
                            `author` int(11) NOT NULL,
                            `year` int(11),
                            PRIMARY KEY (`id`)) Engine=InnoDB DEFAULT CHARSET=utf8;")) 
                            {
                                echo "таблица 'reports' создана;<br>";
                            } else {
                                echo "не получилось создать таблицу 'reports';<br>";
                    }
    } // end function

    private function createConferencies()
    {
        if ($this->pdo->query("CREATE TABLE IF NOT EXISTS `conferencies2` 
                            (`id` int(11) NOT NULL AUTO_INCREMENT,
                            `title` varchar(30) NOT NULL,
                            `subtitle` varchar(30),
                            `author` int(11) NOT NULL,
                            `year` int(11),
                            PRIMARY KEY (`id`)) Engine=InnoDB DEFAULT CHARSET=utf8;")) 
                            {
                                echo "таблица 'conferencies' создана;<br>";
                            } else {
                                echo "не получилось создать таблицу 'conferencies';<br>";
                            }
    } // end function
}
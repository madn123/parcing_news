CREATE DATABASE news
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE news;

CREATE TABLE `sources` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` char(50) DEFAULT NULL,
    `url` char(255) NOT NULL,
    `link_selector` char(50) DEFAULT NULL,
    `content_selector` char(50) DEFAULT NULL,
    `title_selector` char(50) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

CREATE TABLE `articles` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` mediumtext,
    `url` char(255) DEFAULT NULL,
    `parsing_date` date DEFAULT NULL,
    `art_id` char(128) DEFAULT NULL,
    `content` longtext,
    `source_id` int(11) DEFAULT NULL,
    `status` int(1) DEFAULT '0',
    `hidden` char(5) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `FK_articles_sources` (`source_id`),
    CONSTRAINT `FK_articles_sources` FOREIGN KEY (`source_id`) REFERENCES `sources` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

INSERT INTO sources
SET name = 'frio.ru', url = 'https://frio.ru/info/news/', link_selector = '.body-info a', content_selector = '.content', title_selector = '.content h2';
INSERT INTO sources
SET name = 'cafe-future.ru', url = 'https://www.cafe-future.ru/news/', link_selector = '.card-mini a', content_selector = '.content-container', title_selector = '.food-left h1';
INSERT INTO sources
SET name = 'restoranoved.ru', url = 'http://restoranoved.ru/articles/?rubric=286', link_selector = '.simple_list_container .img_wrap a', content_selector = '.cover_block', title_selector = '.container h1';
INSERT INTO sources
SET name = 'horeca.ru', url = 'http://www.horeca.ru/news/restaurant/', link_selector = '.clrScPrevBorder .title a', content_selector = '.lSpaceBig', title_selector = 'h1.newsTitle';
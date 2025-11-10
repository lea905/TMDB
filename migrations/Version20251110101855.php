<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251110101855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE creator (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE episode (id INT AUTO_INCREMENT NOT NULL, season_id_id INT NOT NULL, number INT NOT NULL, title VARCHAR(255) NOT NULL, release_date DATE NOT NULL, resume VARCHAR(255) NOT NULL, INDEX IDX_DDAA1CDA68756988 (season_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, resume VARCHAR(255) NOT NULL, release_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_production_companie (movie_id INT NOT NULL, production_companie_id INT NOT NULL, INDEX IDX_8A23E2228F93B6FC (movie_id), INDEX IDX_8A23E222FA7F2577 (production_companie_id), PRIMARY KEY(movie_id, production_companie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE production_companie (id INT AUTO_INCREMENT NOT NULL, logo VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, origin_country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, series_id_id INT NOT NULL, number INT NOT NULL, title VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, INDEX IDX_F0E45BA9ACB7A4A (series_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE series (id INT AUTO_INCREMENT NOT NULL, created_by INT NOT NULL, number_episodes INT NOT NULL, number_seasons INT NOT NULL, status VARCHAR(255) NOT NULL, tmdb_id INT NOT NULL, title VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, resume VARCHAR(255) NOT NULL, release_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE series_creator (series_id INT NOT NULL, creator_id INT NOT NULL, INDEX IDX_E40DD5915278319C (series_id), INDEX IDX_E40DD59161220EA6 (creator_id), PRIMARY KEY(series_id, creator_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE series_production_companie (series_id INT NOT NULL, production_companie_id INT NOT NULL, INDEX IDX_990DE72F5278319C (series_id), INDEX IDX_990DE72FFA7F2577 (production_companie_id), PRIMARY KEY(series_id, production_companie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE view (id INT AUTO_INCREMENT NOT NULL, see TINYINT(1) NOT NULL, rating DOUBLE PRECISION DEFAULT NULL, date_see DATE NOT NULL, emotion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE view_episode (view_id INT NOT NULL, episode_id INT NOT NULL, INDEX IDX_F4F7092031518C7 (view_id), INDEX IDX_F4F70920362B62A0 (episode_id), PRIMARY KEY(view_id, episode_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE view_movie (view_id INT NOT NULL, movie_id INT NOT NULL, INDEX IDX_7F7D557C31518C7 (view_id), INDEX IDX_7F7D557C8F93B6FC (movie_id), PRIMARY KEY(view_id, movie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE view_user (view_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_73291A1531518C7 (view_id), INDEX IDX_73291A15A76ED395 (user_id), PRIMARY KEY(view_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE watch_list (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_152B584B9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE watch_list_movie (watch_list_id INT NOT NULL, movie_id INT NOT NULL, INDEX IDX_974429F2C4508918 (watch_list_id), INDEX IDX_974429F28F93B6FC (movie_id), PRIMARY KEY(watch_list_id, movie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE watch_list_series (watch_list_id INT NOT NULL, series_id INT NOT NULL, INDEX IDX_B424F40FC4508918 (watch_list_id), INDEX IDX_B424F40F5278319C (series_id), PRIMARY KEY(watch_list_id, series_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA68756988 FOREIGN KEY (season_id_id) REFERENCES season (id)');
        $this->addSql('ALTER TABLE movie_production_companie ADD CONSTRAINT FK_8A23E2228F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_production_companie ADD CONSTRAINT FK_8A23E222FA7F2577 FOREIGN KEY (production_companie_id) REFERENCES production_companie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA9ACB7A4A FOREIGN KEY (series_id_id) REFERENCES series (id)');
        $this->addSql('ALTER TABLE series_creator ADD CONSTRAINT FK_E40DD5915278319C FOREIGN KEY (series_id) REFERENCES series (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE series_creator ADD CONSTRAINT FK_E40DD59161220EA6 FOREIGN KEY (creator_id) REFERENCES creator (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE series_production_companie ADD CONSTRAINT FK_990DE72F5278319C FOREIGN KEY (series_id) REFERENCES series (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE series_production_companie ADD CONSTRAINT FK_990DE72FFA7F2577 FOREIGN KEY (production_companie_id) REFERENCES production_companie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE view_episode ADD CONSTRAINT FK_F4F7092031518C7 FOREIGN KEY (view_id) REFERENCES view (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE view_episode ADD CONSTRAINT FK_F4F70920362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE view_movie ADD CONSTRAINT FK_7F7D557C31518C7 FOREIGN KEY (view_id) REFERENCES view (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE view_movie ADD CONSTRAINT FK_7F7D557C8F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE view_user ADD CONSTRAINT FK_73291A1531518C7 FOREIGN KEY (view_id) REFERENCES view (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE view_user ADD CONSTRAINT FK_73291A15A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE watch_list ADD CONSTRAINT FK_152B584B9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE watch_list_movie ADD CONSTRAINT FK_974429F2C4508918 FOREIGN KEY (watch_list_id) REFERENCES watch_list (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE watch_list_movie ADD CONSTRAINT FK_974429F28F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE watch_list_series ADD CONSTRAINT FK_B424F40FC4508918 FOREIGN KEY (watch_list_id) REFERENCES watch_list (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE watch_list_series ADD CONSTRAINT FK_B424F40F5278319C FOREIGN KEY (series_id) REFERENCES series (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_favorite_tracks DROP FOREIGN KEY FK_A042A5BA76ED395');
        $this->addSql('ALTER TABLE user_favorite_tracks DROP FOREIGN KEY FK_A042A5B5ED23C43');
        $this->addSql('ALTER TABLE steps DROP FOREIGN KEY FK_steps_recipes');
        $this->addSql('ALTER TABLE ingredients_recipes DROP FOREIGN KEY FK_recipes_ingerdients');
        $this->addSql('ALTER TABLE ingredients_recipes DROP FOREIGN KEY FK_ingerdients_recipes');
        $this->addSql('ALTER TABLE user_favorite_artists DROP FOREIGN KEY FK_48926CADA76ED395');
        $this->addSql('ALTER TABLE user_favorite_artists DROP FOREIGN KEY FK_48926CADB7970CF8');
        $this->addSql('DROP TABLE user_favorite_tracks');
        $this->addSql('DROP TABLE steps');
        $this->addSql('DROP TABLE track');
        $this->addSql('DROP TABLE phinxlog');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE ingredients_recipes');
        $this->addSql('DROP TABLE user_favorite_artists');
        $this->addSql('DROP TABLE ingredients');
        $this->addSql('DROP TABLE recipes');
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL ON user');
        $this->addSql('ALTER TABLE user ADD name VARCHAR(255) NOT NULL, ADD mail VARCHAR(255) NOT NULL, DROP email, DROP roles');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_favorite_tracks (user_id INT NOT NULL, track_id INT NOT NULL, INDEX IDX_A042A5B5ED23C43 (track_id), INDEX IDX_A042A5BA76ED395 (user_id), PRIMARY KEY(user_id, track_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE steps (id INT AUTO_INCREMENT NOT NULL, recipe_id INT DEFAULT NULL, instruction VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, modified DATETIME DEFAULT NULL, created DATETIME DEFAULT NULL, INDEX FK_steps_recipes (recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_bin` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE track (id INT AUTO_INCREMENT NOT NULL, disc_number INT DEFAULT NULL, duration_ms INT DEFAULT NULL, explicit TINYINT(1) DEFAULT NULL, isrc LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, spotify_url LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, href LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, spotify_id LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, is_local TINYINT(1) DEFAULT NULL, name LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, popularity INT DEFAULT NULL, preview_url LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, track_number INT DEFAULT NULL, type LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, uri LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, picture_link LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE phinxlog (version BIGINT NOT NULL, migration_name VARCHAR(100) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, start_time DATETIME DEFAULT NULL, end_time DATETIME DEFAULT NULL, breakpoint TINYINT(1) DEFAULT 0 NOT NULL, PRIMARY KEY(version)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_bin` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, lastname VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, email VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, modified DATETIME DEFAULT NULL, created DATETIME DEFAULT NULL, password VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_bin` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ingredients_recipes (id INT AUTO_INCREMENT NOT NULL, recipe_id INT DEFAULT NULL, ingredient_id INT DEFAULT NULL, quantity VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, modified DATETIME DEFAULT NULL, created DATETIME DEFAULT NULL, INDEX FK_ingerdients_recipes (recipe_id), INDEX FK_recipes_ingerdients (ingredient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_bin` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_favorite_artists (user_id INT NOT NULL, artist_id INT NOT NULL, INDEX IDX_48926CADA76ED395 (user_id), INDEX IDX_48926CADB7970CF8 (artist_id), PRIMARY KEY(user_id, artist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ingredients (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, modified DATETIME DEFAULT NULL, created DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_bin` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE recipes (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, time_preparation TIME DEFAULT NULL, time_cooking TIME DEFAULT NULL, modified DATETIME DEFAULT NULL, created DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_bin` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, spotify_id VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, genres LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', popularity INT DEFAULT NULL, followers INT DEFAULT NULL, image_url VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_favorite_tracks ADD CONSTRAINT FK_A042A5BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_favorite_tracks ADD CONSTRAINT FK_A042A5B5ED23C43 FOREIGN KEY (track_id) REFERENCES track (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE steps ADD CONSTRAINT FK_steps_recipes FOREIGN KEY (recipe_id) REFERENCES recipes (id)');
        $this->addSql('ALTER TABLE ingredients_recipes ADD CONSTRAINT FK_recipes_ingerdients FOREIGN KEY (ingredient_id) REFERENCES ingredients (id)');
        $this->addSql('ALTER TABLE ingredients_recipes ADD CONSTRAINT FK_ingerdients_recipes FOREIGN KEY (recipe_id) REFERENCES recipes (id)');
        $this->addSql('ALTER TABLE user_favorite_artists ADD CONSTRAINT FK_48926CADA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_favorite_artists ADD CONSTRAINT FK_48926CADB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA68756988');
        $this->addSql('ALTER TABLE movie_production_companie DROP FOREIGN KEY FK_8A23E2228F93B6FC');
        $this->addSql('ALTER TABLE movie_production_companie DROP FOREIGN KEY FK_8A23E222FA7F2577');
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA9ACB7A4A');
        $this->addSql('ALTER TABLE series_creator DROP FOREIGN KEY FK_E40DD5915278319C');
        $this->addSql('ALTER TABLE series_creator DROP FOREIGN KEY FK_E40DD59161220EA6');
        $this->addSql('ALTER TABLE series_production_companie DROP FOREIGN KEY FK_990DE72F5278319C');
        $this->addSql('ALTER TABLE series_production_companie DROP FOREIGN KEY FK_990DE72FFA7F2577');
        $this->addSql('ALTER TABLE view_episode DROP FOREIGN KEY FK_F4F7092031518C7');
        $this->addSql('ALTER TABLE view_episode DROP FOREIGN KEY FK_F4F70920362B62A0');
        $this->addSql('ALTER TABLE view_movie DROP FOREIGN KEY FK_7F7D557C31518C7');
        $this->addSql('ALTER TABLE view_movie DROP FOREIGN KEY FK_7F7D557C8F93B6FC');
        $this->addSql('ALTER TABLE view_user DROP FOREIGN KEY FK_73291A1531518C7');
        $this->addSql('ALTER TABLE view_user DROP FOREIGN KEY FK_73291A15A76ED395');
        $this->addSql('ALTER TABLE watch_list DROP FOREIGN KEY FK_152B584B9D86650F');
        $this->addSql('ALTER TABLE watch_list_movie DROP FOREIGN KEY FK_974429F2C4508918');
        $this->addSql('ALTER TABLE watch_list_movie DROP FOREIGN KEY FK_974429F28F93B6FC');
        $this->addSql('ALTER TABLE watch_list_series DROP FOREIGN KEY FK_B424F40FC4508918');
        $this->addSql('ALTER TABLE watch_list_series DROP FOREIGN KEY FK_B424F40F5278319C');
        $this->addSql('DROP TABLE creator');
        $this->addSql('DROP TABLE episode');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE movie_production_companie');
        $this->addSql('DROP TABLE production_companie');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE series');
        $this->addSql('DROP TABLE series_creator');
        $this->addSql('DROP TABLE series_production_companie');
        $this->addSql('DROP TABLE view');
        $this->addSql('DROP TABLE view_episode');
        $this->addSql('DROP TABLE view_movie');
        $this->addSql('DROP TABLE view_user');
        $this->addSql('DROP TABLE watch_list');
        $this->addSql('DROP TABLE watch_list_movie');
        $this->addSql('DROP TABLE watch_list_series');
        $this->addSql('ALTER TABLE `user` ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL COMMENT \'(DC2Type:json)\', DROP name, DROP mail');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON `user` (email)');
    }
}

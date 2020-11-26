<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201126104948 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE create_recette (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, titre_recette VARCHAR(255) NOT NULL, presentation VARCHAR(255) NOT NULL, nb_personnes INT NOT NULL, difficulte INT NOT NULL, ingredients VARCHAR(255) NOT NULL, instruments VARCHAR(255) NOT NULL, recette VARCHAR(255) NOT NULL, temps_cuisson TIME NOT NULL, temps_preparation TIME NOT NULL, created_at DATE NOT NULL, photo_filename VARCHAR(255) NOT NULL, INDEX IDX_6B83F497A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rating (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, recette_id INT DEFAULT NULL, note DOUBLE PRECISION DEFAULT NULL, INDEX IDX_D8892622A76ED395 (user_id), INDEX IDX_D889262289312FE9 (recette_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, gender VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE create_recette ADD CONSTRAINT FK_6B83F497A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D8892622A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D889262289312FE9 FOREIGN KEY (recette_id) REFERENCES create_recette (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY FK_D889262289312FE9');
        $this->addSql('ALTER TABLE create_recette DROP FOREIGN KEY FK_6B83F497A76ED395');
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY FK_D8892622A76ED395');
        $this->addSql('DROP TABLE create_recette');
        $this->addSql('DROP TABLE rating');
        $this->addSql('DROP TABLE user');
    }
}

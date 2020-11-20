<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201120105148 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE create_recette ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE create_recette ADD CONSTRAINT FK_6B83F497A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6B83F497A76ED395 ON create_recette (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE create_recette DROP FOREIGN KEY FK_6B83F497A76ED395');
        $this->addSql('DROP INDEX IDX_6B83F497A76ED395 ON create_recette');
        $this->addSql('ALTER TABLE create_recette DROP user_id');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230531135354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE discipline (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agents ADD discipline_id INT DEFAULT NULL, DROP specialite');
        $this->addSql('ALTER TABLE agents ADD CONSTRAINT FK_9596AB6EA5522701 FOREIGN KEY (discipline_id) REFERENCES discipline (id)');
        $this->addSql('CREATE INDEX IDX_9596AB6EA5522701 ON agents (discipline_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agents DROP FOREIGN KEY FK_9596AB6EA5522701');
        $this->addSql('DROP TABLE discipline');
        $this->addSql('DROP INDEX IDX_9596AB6EA5522701 ON agents');
        $this->addSql('ALTER TABLE agents ADD specialite VARCHAR(100) NOT NULL, DROP discipline_id');
    }
}

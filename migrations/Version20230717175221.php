<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230717175221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ratio (id INT AUTO_INCREMENT NOT NULL, libele VARCHAR(25) NOT NULL, caracteristique_ratio DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE discipline ADD ratio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE discipline ADD CONSTRAINT FK_75BEEE3F5842AF49 FOREIGN KEY (ratio_id) REFERENCES ratio (id)');
        $this->addSql('CREATE INDEX IDX_75BEEE3F5842AF49 ON discipline (ratio_id)');
        $this->addSql('ALTER TABLE emploi ADD parent_discipline_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE emploi ADD CONSTRAINT FK_74A0B0FA79D44493 FOREIGN KEY (parent_discipline_id) REFERENCES ratio (id)');
        $this->addSql('CREATE INDEX IDX_74A0B0FA79D44493 ON emploi (parent_discipline_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE discipline DROP FOREIGN KEY FK_75BEEE3F5842AF49');
        $this->addSql('ALTER TABLE emploi DROP FOREIGN KEY FK_74A0B0FA79D44493');
        $this->addSql('DROP TABLE ratio');
        $this->addSql('DROP INDEX IDX_75BEEE3F5842AF49 ON discipline');
        $this->addSql('ALTER TABLE discipline DROP ratio_id');
        $this->addSql('DROP INDEX IDX_74A0B0FA79D44493 ON emploi');
        $this->addSql('ALTER TABLE emploi DROP parent_discipline_id');
    }
}

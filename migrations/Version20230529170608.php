<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230529170608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agents (id INT AUTO_INCREMENT NOT NULL, partent_emploi_id INT DEFAULT NULL, parent_structure_ratachee_id INT DEFAULT NULL, anne_scolaire VARCHAR(10) NOT NULL, matricule VARCHAR(10) NOT NULL, civilite VARCHAR(5) NOT NULL, sexe VARCHAR(10) NOT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, nom_jeune_fille VARCHAR(100) NOT NULL, volume_horaie VARCHAR(10) NOT NULL, email VARCHAR(100) NOT NULL, specialite VARCHAR(100) NOT NULL, premiere_prise_de_service DATE NOT NULL, date_entre_structure DATE NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_9596AB6EB93874E8 (partent_emploi_id), INDEX IDX_9596AB6E1A709DC7 (parent_structure_ratachee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_structure (id INT AUTO_INCREMENT NOT NULL, parent_type_de_structure_id INT NOT NULL, code_categorie VARCHAR(255) NOT NULL, libelle_categorie VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_C25E38ED34D32B05 (parent_type_de_structure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emploi (id INT AUTO_INCREMENT NOT NULL, parent_grade_id INT NOT NULL, libelle_emploi VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_74A0B0FA61D40D79 (parent_grade_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grade (id INT AUTO_INCREMENT NOT NULL, libelle_grade VARCHAR(5) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE structure_ratache (id INT AUTO_INCREMENT NOT NULL, parent_categorie_structure_id INT DEFAULT NULL, code_structure_ratachee VARCHAR(100) NOT NULL, libelle_structure_ratachee VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_AB3465DA680A8875 (parent_categorie_structure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE structures (id INT AUTO_INCREMENT NOT NULL, parent_type_de_structure_id INT NOT NULL, code VARCHAR(255) NOT NULL, libelle_structure VARCHAR(100) NOT NULL, anne_de_creation VARCHAR(5) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_5BBEC55A34D32B05 (parent_type_de_structure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_de_structure (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(100) NOT NULL, nom VARCHAR(100) NOT NULL, address VARCHAR(255) NOT NULL, ville VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agents ADD CONSTRAINT FK_9596AB6EB93874E8 FOREIGN KEY (partent_emploi_id) REFERENCES emploi (id)');
        $this->addSql('ALTER TABLE agents ADD CONSTRAINT FK_9596AB6E1A709DC7 FOREIGN KEY (parent_structure_ratachee_id) REFERENCES structure_ratache (id)');
        $this->addSql('ALTER TABLE categorie_structure ADD CONSTRAINT FK_C25E38ED34D32B05 FOREIGN KEY (parent_type_de_structure_id) REFERENCES type_de_structure (id)');
        $this->addSql('ALTER TABLE emploi ADD CONSTRAINT FK_74A0B0FA61D40D79 FOREIGN KEY (parent_grade_id) REFERENCES grade (id)');
        $this->addSql('ALTER TABLE structure_ratache ADD CONSTRAINT FK_AB3465DA680A8875 FOREIGN KEY (parent_categorie_structure_id) REFERENCES categorie_structure (id)');
        $this->addSql('ALTER TABLE structures ADD CONSTRAINT FK_5BBEC55A34D32B05 FOREIGN KEY (parent_type_de_structure_id) REFERENCES type_de_structure (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agents DROP FOREIGN KEY FK_9596AB6EB93874E8');
        $this->addSql('ALTER TABLE agents DROP FOREIGN KEY FK_9596AB6E1A709DC7');
        $this->addSql('ALTER TABLE categorie_structure DROP FOREIGN KEY FK_C25E38ED34D32B05');
        $this->addSql('ALTER TABLE emploi DROP FOREIGN KEY FK_74A0B0FA61D40D79');
        $this->addSql('ALTER TABLE structure_ratache DROP FOREIGN KEY FK_AB3465DA680A8875');
        $this->addSql('ALTER TABLE structures DROP FOREIGN KEY FK_5BBEC55A34D32B05');
        $this->addSql('DROP TABLE agents');
        $this->addSql('DROP TABLE categorie_structure');
        $this->addSql('DROP TABLE emploi');
        $this->addSql('DROP TABLE grade');
        $this->addSql('DROP TABLE structure_ratache');
        $this->addSql('DROP TABLE structures');
        $this->addSql('DROP TABLE type_de_structure');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210127004758 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE afdelingen (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(100) NOT NULL, locatie VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artsen (id SMALLINT AUTO_INCREMENT NOT NULL, naam VARCHAR(50) NOT NULL, tussenvoegsel VARCHAR(50) DEFAULT NULL, achternaam VARCHAR(50) NOT NULL, soort_arts VARCHAR(100) NOT NULL, straat VARCHAR(255) NOT NULL, huis_nr INT NOT NULL, postcode VARCHAR(6) NOT NULL, plaats VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, telefoon_nummer INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicijnen (id SMALLINT AUTO_INCREMENT NOT NULL, medicijn_naam VARCHAR(255) NOT NULL, medicijn_werking VARCHAR(255) NOT NULL, medicijn_bijwerking VARCHAR(255) NOT NULL, verzekerd TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patienten (id INT AUTO_INCREMENT NOT NULL, arts_id SMALLINT DEFAULT NULL, naam VARCHAR(255) NOT NULL, tussenvoegsel VARCHAR(255) DEFAULT NULL, achternaam VARCHAR(255) NOT NULL, zk_nummer VARCHAR(255) NOT NULL, straat VARCHAR(255) NOT NULL, huis_nr INT NOT NULL, postcode VARCHAR(6) NOT NULL, plaats VARCHAR(50) NOT NULL, email VARCHAR(255) NOT NULL, telefoon_nummer INT NOT NULL, INDEX IDX_5664B6C81A9F61BA (arts_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recepten (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, arts_id SMALLINT DEFAULT NULL, dosis INT NOT NULL, duur INT NOT NULL, herhalingen VARCHAR(50) DEFAULT NULL, afgifte_datum DATE NOT NULL, gebruiken_tot DATE NOT NULL, INDEX IDX_72C1CA26B899279 (patient_id), INDEX IDX_72C1CA21A9F61BA (arts_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE patienten ADD CONSTRAINT FK_5664B6C81A9F61BA FOREIGN KEY (arts_id) REFERENCES artsen (id)');
        $this->addSql('ALTER TABLE recepten ADD CONSTRAINT FK_72C1CA26B899279 FOREIGN KEY (patient_id) REFERENCES patienten (id)');
        $this->addSql('ALTER TABLE recepten ADD CONSTRAINT FK_72C1CA21A9F61BA FOREIGN KEY (arts_id) REFERENCES artsen (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patienten DROP FOREIGN KEY FK_5664B6C81A9F61BA');
        $this->addSql('ALTER TABLE recepten DROP FOREIGN KEY FK_72C1CA21A9F61BA');
        $this->addSql('ALTER TABLE recepten DROP FOREIGN KEY FK_72C1CA26B899279');
        $this->addSql('DROP TABLE afdelingen');
        $this->addSql('DROP TABLE artsen');
        $this->addSql('DROP TABLE medicijnen');
        $this->addSql('DROP TABLE patienten');
        $this->addSql('DROP TABLE recepten');
        $this->addSql('DROP TABLE user');
    }
}

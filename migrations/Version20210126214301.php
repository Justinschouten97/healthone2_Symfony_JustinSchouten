<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210126214301 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recepten (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, arts_id SMALLINT DEFAULT NULL, dosis INT NOT NULL, duur INT NOT NULL, herhalingen VARCHAR(50) DEFAULT NULL, afgifte_datum DATE NOT NULL, gebruiken_tot DATE NOT NULL, INDEX IDX_72C1CA26B899279 (patient_id), INDEX IDX_72C1CA21A9F61BA (arts_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recepten ADD CONSTRAINT FK_72C1CA26B899279 FOREIGN KEY (patient_id) REFERENCES patienten (id)');
        $this->addSql('ALTER TABLE recepten ADD CONSTRAINT FK_72C1CA21A9F61BA FOREIGN KEY (arts_id) REFERENCES artsen (id)');
        $this->addSql('ALTER TABLE artsen CHANGE id id SMALLINT AUTO_INCREMENT NOT NULL, CHANGE naam naam VARCHAR(50) NOT NULL, CHANGE achternaam achternaam VARCHAR(50) NOT NULL, CHANGE huis_nr huis_nr INT NOT NULL');
        $this->addSql('ALTER TABLE medicijnen CHANGE id id SMALLINT AUTO_INCREMENT NOT NULL, CHANGE medicijn_naam medicijn_naam VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE patienten CHANGE arts_id arts_id SMALLINT DEFAULT NULL, CHANGE naam naam VARCHAR(255) NOT NULL, CHANGE tussenvoegsel tussenvoegsel VARCHAR(255) DEFAULT NULL, CHANGE achternaam achternaam VARCHAR(255) NOT NULL, CHANGE zk_nummer zk_nummer VARCHAR(255) NOT NULL, CHANGE huis_nr huis_nr INT NOT NULL, CHANGE postcode postcode VARCHAR(6) NOT NULL, CHANGE plaats plaats VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE recepten');
        $this->addSql('ALTER TABLE artsen CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE naam naam VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE achternaam achternaam VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE huis_nr huis_nr SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE medicijnen CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE medicijn_naam medicijn_naam VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE patienten CHANGE arts_id arts_id INT DEFAULT NULL, CHANGE naam naam VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tussenvoegsel tussenvoegsel VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE achternaam achternaam VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE zk_nummer zk_nummer VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE huis_nr huis_nr SMALLINT NOT NULL, CHANGE postcode postcode VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE plaats plaats VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260311231816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP CONSTRAINT fk_6aab231f4acc9a20');
        $this->addSql('DROP INDEX uniq_6aab231f4acc9a20');
        $this->addSql('ALTER TABLE animal ADD nom_usage VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE animal DROP card_id');
        $this->addSql('ALTER TABLE animal ALTER sexe TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE animal ALTER status TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE animal ALTER identification_number TYPE VARCHAR(15)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AAB231F347639A5 ON animal (identification_number)');
        $this->addSql('ALTER TABLE identification_card ADD animal_id INT NOT NULL');
        $this->addSql('ALTER TABLE identification_card ADD CONSTRAINT FK_FF8176078E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) NOT DEFERRABLE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FF8176078E962C16 ON identification_card (animal_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_6AAB231F347639A5');
        $this->addSql('ALTER TABLE animal ADD card_id INT NOT NULL');
        $this->addSql('ALTER TABLE animal DROP nom_usage');
        $this->addSql('ALTER TABLE animal ALTER sexe TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE animal ALTER status TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE animal ALTER identification_number TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT fk_6aab231f4acc9a20 FOREIGN KEY (card_id) REFERENCES identification_card (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_6aab231f4acc9a20 ON animal (card_id)');
        $this->addSql('ALTER TABLE identification_card DROP CONSTRAINT FK_FF8176078E962C16');
        $this->addSql('DROP INDEX UNIQ_FF8176078E962C16');
        $this->addSql('ALTER TABLE identification_card DROP animal_id');
    }
}

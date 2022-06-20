<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220428054900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE techniquemachine (id INT AUTO_INCREMENT NOT NULL, nommachine_id INT DEFAULT NULL, fichemachine VARCHAR(255) NOT NULL, INDEX IDX_6B3E3DD02FDA8B7A (nommachine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE techniquemachine ADD CONSTRAINT FK_6B3E3DD02FDA8B7A FOREIGN KEY (nommachine_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE fournisseur CHANGE fichefournisseur fichefournisseur VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE techniquemachine');
        $this->addSql('ALTER TABLE fournisseur CHANGE fichefournisseur fichefournisseur VARCHAR(255) DEFAULT NULL');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220430014649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE maintenancemachine (id INT AUTO_INCREMENT NOT NULL, idclient_id INT DEFAULT NULL, idproduit_id INT DEFAULT NULL, date DATE NOT NULL, action VARCHAR(255) NOT NULL, INDEX IDX_C6CB0E0E67F0C0D4 (idclient_id), INDEX IDX_C6CB0E0EC29D63C1 (idproduit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE maintenancemachine ADD CONSTRAINT FK_C6CB0E0E67F0C0D4 FOREIGN KEY (idclient_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE maintenancemachine ADD CONSTRAINT FK_C6CB0E0EC29D63C1 FOREIGN KEY (idproduit_id) REFERENCES produit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE maintenancemachine');
    }
}

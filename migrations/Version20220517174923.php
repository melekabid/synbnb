<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220517174923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE backup_produit (id INT AUTO_INCREMENT NOT NULL, id_facture_id INT DEFAULT NULL, id_client_id INT DEFAULT NULL, id_produit_id INT DEFAULT NULL, quantity INT NOT NULL, prix_total_ht DOUBLE PRECISION NOT NULL, prix_total DOUBLE PRECISION NOT NULL, INDEX IDX_9B58C126DAA76EDF (id_facture_id), INDEX IDX_9B58C12699DED506 (id_client_id), INDEX IDX_9B58C126AABEFE2C (id_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE backup_produit ADD CONSTRAINT FK_9B58C126DAA76EDF FOREIGN KEY (id_facture_id) REFERENCES proforma (id)');
        $this->addSql('ALTER TABLE backup_produit ADD CONSTRAINT FK_9B58C12699DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE backup_produit ADD CONSTRAINT FK_9B58C126AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE backup_produit');
    }
}

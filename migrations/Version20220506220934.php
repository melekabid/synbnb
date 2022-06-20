<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220506220934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, NomCategorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, societe VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, GSM TEXT NOT NULL, mail TEXT NOT NULL, PourcentageBenifice DOUBLE PRECISION NOT NULL, codematricule VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, nomfornisseur VARCHAR(255) NOT NULL, fichefournisseur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maintenancemachine (id INT AUTO_INCREMENT NOT NULL, idclient_id INT DEFAULT NULL, idproduit_id INT DEFAULT NULL, date DATE NOT NULL, action VARCHAR(255) NOT NULL, nominterventaire VARCHAR(255) NOT NULL, INDEX IDX_C6CB0E0E67F0C0D4 (idclient_id), INDEX IDX_C6CB0E0EC29D63C1 (idproduit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, idcategorie INT DEFAULT NULL, reference VARCHAR(255) NOT NULL, description TEXT NOT NULL, tva DOUBLE PRECISION NOT NULL, PrixDinar DOUBLE PRECISION NOT NULL, PrixDollar DOUBLE PRECISION NOT NULL, img VARCHAR(255) NOT NULL, tauxdechange DOUBLE PRECISION DEFAULT NULL, prixttc DOUBLE PRECISION NOT NULL, prixabeneficetnd DOUBLE PRECISION NOT NULL, prixbenefice_ht DOUBLE PRECISION NOT NULL, INDEX idcategorie (idcategorie), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proforma (id INT AUTO_INCREMENT NOT NULL, idclient_id INT NOT NULL, date DATETIME NOT NULL, prix_total DOUBLE PRECISION DEFAULT NULL, prixtotalht DOUBLE PRECISION NOT NULL, choix INT NOT NULL, delaidelivraison INT NOT NULL, garantie VARCHAR(255) DEFAULT NULL, modalite VARCHAR(255) NOT NULL, validite INT NOT NULL, titre VARCHAR(255) NOT NULL, INDEX IDX_8383AFD667F0C0D4 (idclient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proforma_produit (proforma_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_421E7D72B26BFE8D (proforma_id), INDEX IDX_421E7D72F347EFB (produit_id), PRIMARY KEY(proforma_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE techniquemachine (id INT AUTO_INCREMENT NOT NULL, nommachine_id INT DEFAULT NULL, fichemachine VARCHAR(255) NOT NULL, INDEX IDX_6B3E3DD02FDA8B7A (nommachine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE maintenancemachine ADD CONSTRAINT FK_C6CB0E0E67F0C0D4 FOREIGN KEY (idclient_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE maintenancemachine ADD CONSTRAINT FK_C6CB0E0EC29D63C1 FOREIGN KEY (idproduit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2737667FC1 FOREIGN KEY (idcategorie) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE proforma ADD CONSTRAINT FK_8383AFD667F0C0D4 FOREIGN KEY (idclient_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE proforma_produit ADD CONSTRAINT FK_421E7D72B26BFE8D FOREIGN KEY (proforma_id) REFERENCES proforma (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proforma_produit ADD CONSTRAINT FK_421E7D72F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE techniquemachine ADD CONSTRAINT FK_6B3E3DD02FDA8B7A FOREIGN KEY (nommachine_id) REFERENCES produit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2737667FC1');
        $this->addSql('ALTER TABLE maintenancemachine DROP FOREIGN KEY FK_C6CB0E0E67F0C0D4');
        $this->addSql('ALTER TABLE proforma DROP FOREIGN KEY FK_8383AFD667F0C0D4');
        $this->addSql('ALTER TABLE maintenancemachine DROP FOREIGN KEY FK_C6CB0E0EC29D63C1');
        $this->addSql('ALTER TABLE proforma_produit DROP FOREIGN KEY FK_421E7D72F347EFB');
        $this->addSql('ALTER TABLE techniquemachine DROP FOREIGN KEY FK_6B3E3DD02FDA8B7A');
        $this->addSql('ALTER TABLE proforma_produit DROP FOREIGN KEY FK_421E7D72B26BFE8D');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE maintenancemachine');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE proforma');
        $this->addSql('DROP TABLE proforma_produit');
        $this->addSql('DROP TABLE techniquemachine');
        $this->addSql('DROP TABLE user');
    }
}

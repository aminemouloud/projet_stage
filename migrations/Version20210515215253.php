<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210515215253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, prix VARCHAR(255) NOT NULL, frais_livraison VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, renvoi_lien VARCHAR(255) NOT NULL, date DATE NOT NULL)');
        $this->addSql('CREATE TABLE categorie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL, info_categorie VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE commentaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, commentaire VARCHAR(255) NOT NULL, date DATE NOT NULL)');
        $this->addSql('CREATE TABLE compte (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, ddn DATE DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, mdp VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE discussion (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, sujet VARCHAR(255) NOT NULL, contenu VARCHAR(255) NOT NULL, date DATE NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE discussion');
    }
}

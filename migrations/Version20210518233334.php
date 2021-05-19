<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210518233334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, ddn DATE NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64986CC499D ON user (pseudo)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__annonce AS SELECT id, titre, prix, frais_livraison, photo, renvoi_lien, date FROM annonce');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('CREATE TABLE annonce (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie_id INTEGER NOT NULL, pseudo_id INTEGER NOT NULL, titre VARCHAR(255) NOT NULL COLLATE BINARY, prix VARCHAR(255) NOT NULL COLLATE BINARY, frais_livraison VARCHAR(255) NOT NULL COLLATE BINARY, photo VARCHAR(255) NOT NULL COLLATE BINARY, renvoi_lien VARCHAR(255) NOT NULL COLLATE BINARY, date DATE NOT NULL, remise INTEGER NOT NULL, marchand VARCHAR(255) NOT NULL, CONSTRAINT FK_F65593E5BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_F65593E520E394C2 FOREIGN KEY (pseudo_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO annonce (id, titre, prix, frais_livraison, photo, renvoi_lien, date) SELECT id, titre, prix, frais_livraison, photo, renvoi_lien, date FROM __temp__annonce');
        $this->addSql('DROP TABLE __temp__annonce');
        $this->addSql('CREATE INDEX IDX_F65593E5BCF5E72D ON annonce (categorie_id)');
        $this->addSql('CREATE INDEX IDX_F65593E520E394C2 ON annonce (pseudo_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__categorie AS SELECT id, categorie, info_categorie FROM categorie');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('CREATE TABLE categorie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL COLLATE BINARY, info_categorie VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO categorie (id, categorie, info_categorie) SELECT id, categorie, info_categorie FROM __temp__categorie');
        $this->addSql('DROP TABLE __temp__categorie');
        $this->addSql('CREATE TEMPORARY TABLE __temp__commentaire AS SELECT id, commentaire, date FROM commentaire');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('CREATE TABLE commentaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, annonce_id INTEGER DEFAULT NULL, discussion_id INTEGER NOT NULL, pseudo_id INTEGER DEFAULT NULL, commentaire VARCHAR(255) NOT NULL COLLATE BINARY, date DATE NOT NULL, likes INTEGER NOT NULL, CONSTRAINT FK_67F068BC8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_67F068BC1ADED311 FOREIGN KEY (discussion_id) REFERENCES discussion (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_67F068BC20E394C2 FOREIGN KEY (pseudo_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO commentaire (id, commentaire, date) SELECT id, commentaire, date FROM __temp__commentaire');
        $this->addSql('DROP TABLE __temp__commentaire');
        $this->addSql('CREATE INDEX IDX_67F068BC8805AB2F ON commentaire (annonce_id)');
        $this->addSql('CREATE INDEX IDX_67F068BC1ADED311 ON commentaire (discussion_id)');
        $this->addSql('CREATE INDEX IDX_67F068BC20E394C2 ON commentaire (pseudo_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__discussion AS SELECT id, sujet, contenu, date FROM discussion');
        $this->addSql('DROP TABLE discussion');
        $this->addSql('CREATE TABLE discussion (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, pseudo_id INTEGER NOT NULL, sujet VARCHAR(255) NOT NULL COLLATE BINARY, contenu VARCHAR(255) NOT NULL COLLATE BINARY, date DATE NOT NULL, CONSTRAINT FK_C0B9F90F20E394C2 FOREIGN KEY (pseudo_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO discussion (id, sujet, contenu, date) SELECT id, sujet, contenu, date FROM __temp__discussion');
        $this->addSql('DROP TABLE __temp__discussion');
        $this->addSql('CREATE INDEX IDX_C0B9F90F20E394C2 ON discussion (pseudo_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX IDX_F65593E5BCF5E72D');
        $this->addSql('DROP INDEX IDX_F65593E520E394C2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__annonce AS SELECT id, titre, prix, frais_livraison, photo, renvoi_lien, date FROM annonce');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('CREATE TABLE annonce (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, prix VARCHAR(255) NOT NULL, frais_livraison VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, renvoi_lien VARCHAR(255) NOT NULL, date DATE NOT NULL)');
        $this->addSql('INSERT INTO annonce (id, titre, prix, frais_livraison, photo, renvoi_lien, date) SELECT id, titre, prix, frais_livraison, photo, renvoi_lien, date FROM __temp__annonce');
        $this->addSql('DROP TABLE __temp__annonce');
        $this->addSql('ALTER TABLE categorie ADD COLUMN photo VARCHAR(255) NOT NULL COLLATE BINARY');
        $this->addSql('DROP INDEX IDX_67F068BC8805AB2F');
        $this->addSql('DROP INDEX IDX_67F068BC1ADED311');
        $this->addSql('DROP INDEX IDX_67F068BC20E394C2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__commentaire AS SELECT id, commentaire, date FROM commentaire');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('CREATE TABLE commentaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, commentaire VARCHAR(255) NOT NULL, date DATE NOT NULL)');
        $this->addSql('INSERT INTO commentaire (id, commentaire, date) SELECT id, commentaire, date FROM __temp__commentaire');
        $this->addSql('DROP TABLE __temp__commentaire');
        $this->addSql('DROP INDEX IDX_C0B9F90F20E394C2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__discussion AS SELECT id, sujet, contenu, date FROM discussion');
        $this->addSql('DROP TABLE discussion');
        $this->addSql('CREATE TABLE discussion (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, sujet VARCHAR(255) NOT NULL, contenu VARCHAR(255) NOT NULL, date DATE NOT NULL)');
        $this->addSql('INSERT INTO discussion (id, sujet, contenu, date) SELECT id, sujet, contenu, date FROM __temp__discussion');
        $this->addSql('DROP TABLE __temp__discussion');
    }
}

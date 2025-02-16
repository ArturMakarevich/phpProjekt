<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241211104601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE coin_flip (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, result VARCHAR(255) NOT NULL, INDEX IDX_A7051F9767B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE random_number (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, numresult INT NOT NULL, INDEX IDX_867E6AA867B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roll_dice (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, roll INT NOT NULL, INDEX IDX_38BEC10867B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, username VARCHAR(255) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE coin_flip ADD CONSTRAINT FK_A7051F9767B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE random_number ADD CONSTRAINT FK_867E6AA867B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE roll_dice ADD CONSTRAINT FK_38BEC10867B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coin_flip DROP FOREIGN KEY FK_A7051F9767B3B43D');
        $this->addSql('ALTER TABLE random_number DROP FOREIGN KEY FK_867E6AA867B3B43D');
        $this->addSql('ALTER TABLE roll_dice DROP FOREIGN KEY FK_38BEC10867B3B43D');
        $this->addSql('DROP TABLE coin_flip');
        $this->addSql('DROP TABLE random_number');
        $this->addSql('DROP TABLE roll_dice');
        $this->addSql('DROP TABLE user');
    }
}

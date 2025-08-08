<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250807102411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE avis
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE car ADD license_plate_number VARCHAR(255) NOT NULL, ADD first_registration VARCHAR(255) NOT NULL, ADD model VARCHAR(255) NOT NULL, ADD colors VARCHAR(255) NOT NULL, ADD places_available VARCHAR(255) NOT NULL, ADD preferences VARCHAR(255) NOT NULL, DROP color, DROP modele, DROP electric
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, comment VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, note VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE car ADD color VARCHAR(255) NOT NULL, ADD modele VARCHAR(255) NOT NULL, ADD electric TINYINT(1) NOT NULL, DROP license_plate_number, DROP first_registration, DROP model, DROP colors, DROP places_available, DROP preferences
        SQL);
    }
}

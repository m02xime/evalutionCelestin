<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211029115246 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123F35592D86');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123F6EC1D6E1');
        $this->addSql('DROP INDEX IDX_EB95123F35592D86 ON restaurant');
        $this->addSql('DROP INDEX UNIQ_EB95123F6EC1D6E1 ON restaurant');
        $this->addSql('ALTER TABLE restaurant ADD restaurant_id INT DEFAULT NULL, ADD proprietaire_id INT DEFAULT NULL, DROP restaurant_id_id, DROP proprietaire_id_id');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FB1E7706E FOREIGN KEY (restaurant_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123F76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('CREATE INDEX IDX_EB95123FB1E7706E ON restaurant (restaurant_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EB95123F76C50E4A ON restaurant (proprietaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FB1E7706E');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123F76C50E4A');
        $this->addSql('DROP INDEX IDX_EB95123FB1E7706E ON restaurant');
        $this->addSql('DROP INDEX UNIQ_EB95123F76C50E4A ON restaurant');
        $this->addSql('ALTER TABLE restaurant ADD restaurant_id_id INT DEFAULT NULL, ADD proprietaire_id_id INT DEFAULT NULL, DROP restaurant_id, DROP proprietaire_id');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123F35592D86 FOREIGN KEY (restaurant_id_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123F6EC1D6E1 FOREIGN KEY (proprietaire_id_id) REFERENCES proprietaire (id)');
        $this->addSql('CREATE INDEX IDX_EB95123F35592D86 ON restaurant (restaurant_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EB95123F6EC1D6E1 ON restaurant (proprietaire_id_id)');
    }
}

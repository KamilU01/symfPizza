<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200503120743 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ddd_menu_dodatki CHANGE price price DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE ddd_menu_inne CHANGE price price DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE ddd_menu_lasagne CHANGE price price DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE ddd_menu_pieczywo CHANGE price price DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('DROP INDEX groupid ON ddd_menu_pizza');
        $this->addSql('ALTER TABLE ddd_menu_pizza ADD groupid_id INT NOT NULL, DROP groupid, CHANGE sprice sprice DOUBLE PRECISION DEFAULT \'NULL\', CHANGE mprice mprice DOUBLE PRECISION DEFAULT \'NULL\', CHANGE lprice lprice DOUBLE PRECISION DEFAULT \'NULL\', CHANGE papryczki papryczki INT NOT NULL');
        $this->addSql('CREATE INDEX IDX_F7697ED6B3BB53C ON ddd_menu_pizza (groupid_id)');
        $this->addSql('ALTER TABLE ddd_menu_pizza_groups CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE seqbycolor seqbycolor TINYINT(1) DEFAULT \'NULL\', CHANGE kol kol INT NOT NULL');
        $this->addSql('ALTER TABLE ddd_menu_promocje CHANGE price price DOUBLE PRECISION DEFAULT \'NULL\', CHANGE data data INT NOT NULL');
        $this->addSql('ALTER TABLE ddd_menu_salads CHANGE price price DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE ddd_menu_tortilla CHANGE price price DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ddd_menu_dodatki CHANGE price price DOUBLE PRECISION UNSIGNED DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE ddd_menu_inne CHANGE price price DOUBLE PRECISION UNSIGNED DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE ddd_menu_lasagne CHANGE price price DOUBLE PRECISION DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE ddd_menu_pieczywo CHANGE price price DOUBLE PRECISION UNSIGNED DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE ddd_menu_pizza DROP FOREIGN KEY FK_F7697ED6B3BB53C');
        $this->addSql('DROP INDEX IDX_F7697ED6B3BB53C ON ddd_menu_pizza');
        $this->addSql('ALTER TABLE ddd_menu_pizza ADD groupid INT DEFAULT NULL, DROP groupid_id, CHANGE sprice sprice DOUBLE PRECISION UNSIGNED DEFAULT \'NULL\', CHANGE mprice mprice DOUBLE PRECISION UNSIGNED DEFAULT \'NULL\', CHANGE lprice lprice DOUBLE PRECISION UNSIGNED DEFAULT \'NULL\', CHANGE papryczki papryczki TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('CREATE INDEX groupid ON ddd_menu_pizza (groupid)');
        $this->addSql('ALTER TABLE ddd_menu_pizza_groups CHANGE id id TINYINT(1) NOT NULL, CHANGE seqbycolor seqbycolor TINYINT(1) DEFAULT \'NULL\', CHANGE kol kol INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE ddd_menu_promocje CHANGE price price DOUBLE PRECISION UNSIGNED DEFAULT \'NULL\', CHANGE data data INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE ddd_menu_salads CHANGE price price DOUBLE PRECISION DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE ddd_menu_tortilla CHANGE price price DOUBLE PRECISION DEFAULT \'0\' NOT NULL');
    }
}

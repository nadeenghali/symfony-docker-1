<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210928185531 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

	public function up(Schema $schema) : void
	{
		// this up() migration is auto-generated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

		$this->addSql('INSERT INTO country (name, vat) VALUES ("Germany", 19);');
		$this->addSql('INSERT INTO country (name, vat) VALUES ("Austria", 20);');
		$this->addSql('INSERT INTO country (name, vat) VALUES ("USA", 0);');
	}

	public function down(Schema $schema) : void
	{
		// this down() migration is auto-generated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

		$this->addSql('DELETE FROM country;');
	}
}

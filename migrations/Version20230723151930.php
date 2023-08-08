<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230723151930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, tacgia_id INT DEFAULT NULL, theloai_id INT DEFAULT NULL, tieude VARCHAR(255) NOT NULL, gia VARCHAR(255) NOT NULL, soluong VARCHAR(255) NOT NULL, hinhanh VARCHAR(255) NOT NULL, INDEX IDX_CBE5A3317610D6B0 (tacgia_id), INDEX IDX_CBE5A331AD50A1BF (theloai_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE donhang (id INT AUTO_INCREMENT NOT NULL, tongluong VARCHAR(255) NOT NULL, ngaymua VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE khahchhang (id INT AUTO_INCREMENT NOT NULL, tenkhachhang VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, matkhau VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tacgia (id INT AUTO_INCREMENT NOT NULL, tentacgia VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theloai (id INT AUTO_INCREMENT NOT NULL, tentheloai VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3317610D6B0 FOREIGN KEY (tacgia_id) REFERENCES tacgia (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331AD50A1BF FOREIGN KEY (theloai_id) REFERENCES theloai (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3317610D6B0');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331AD50A1BF');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE donhang');
        $this->addSql('DROP TABLE khahchhang');
        $this->addSql('DROP TABLE tacgia');
        $this->addSql('DROP TABLE theloai');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

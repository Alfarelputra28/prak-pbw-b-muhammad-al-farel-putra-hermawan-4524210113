CREATE DATABASE IF NOT EXISTS db_mahasiswa
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;

USE db_mahasiswa;

CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    program_studi VARCHAR(100) NOT NULL,
    angkatan SMALLINT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY mahasiswa_nim_unique (nim),
    UNIQUE KEY mahasiswa_email_unique (email)
) ENGINE=InnoDB
  DEFAULT CHARACTER SET=utf8mb4
  COLLATE=utf8mb4_general_ci;

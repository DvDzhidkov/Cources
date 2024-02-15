CREATE TABLE `Employees`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` CHAR(255) NOT NULL,
    `experience` BIGINT NULL,
    `sex` CHAR(255) NULL
);
CREATE TABLE `Animals`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `animal_type` CHAR(255) NOT NULL,
    `animal_name` CHAR(255) NULL,
    `animal_age` BIGINT NOT NULL,
    `id_employee` BIGINT NOT NULL,
    `id_feed` BIGINT NOT NULL
);
CREATE TABLE `Feeds`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` CHAR(255) NOT NULL,
    `expiration_date` DATE NOT NULL,
    `price` BIGINT NULL
);
ALTER TABLE
    `Animals` ADD CONSTRAINT `animals_id_feed_foreign` FOREIGN KEY(`id_feed`) REFERENCES `Feeds`(`id`);
ALTER TABLE
    `Animals` ADD CONSTRAINT `animals_id_employee_foreign` FOREIGN KEY(`id_employee`) REFERENCES `Employees`(`id`);
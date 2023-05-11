CREATE TABLE user
(
    `user_id`     INT NOT NULL AUTO_INCREMENT,
    `first_name`  VARCHAR(255) NOT NULL,
    `last_name`   VARCHAR(255) NOT NULL,
    `middle_name` VARCHAR(255),
    `gender`      VARCHAR(255) NOT NULL,
    `birth_date`  DATE NOT NULL,
    `email`       VARCHAR(320) NOT NULL,
    `phone`       VARCHAR(20),
    `avatar_path` VARCHAR(255),
    CONSTRAINT UC_Person UNIQUE (`email`,`phone`),
    PRIMARY KEY (`user_id`)
) ENGINE = InnoDB
  CHARACTER SET = utf8mb4
  COLLATE utf8mb4_unicode_ci
;
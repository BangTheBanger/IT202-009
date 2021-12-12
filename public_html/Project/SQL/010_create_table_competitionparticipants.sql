CREATE TABLE IF NOT EXISTS competitionparticipants (
    id INT UNIQUE AUTO_INCREMENT,
    `comp_id` INT NOT NULL,
    `user_id` INT NOT NULL,
    CREATED TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (comp_id) REFERENCES competitions(id),
    UNIQUE KEY `unique_id`(`comp_id`, `user_id`)
)
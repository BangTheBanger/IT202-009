CREATE TABLE IF NOT EXISTS competitions (
    id INT UNIQUE AUTO_INCREMENT,
    `name` varchar(30) NOT NULL,
    CREATED TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    duration INT NOT NULL DEFAULT 1,
    expiration TIMESTAMP NOT NULL DEFAULT (DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 1 DAY)),
    current_reward INT DEFAULT 1,
    starting_reward INT DEFAULT 1,
    join_fee INT DEFAULT 0,
    current_participants INT DEFAULT 1,
    min_participants INT DEFAULT 3,
    paid_out BOOLEAN DEFAULT false,
    min_score INT DEFAULT 0,
    first_place_per FLOAT DEFAULT 0.70,
    second_place_per FLOAT DEFAULT 0.25,
    third_place_per FLOAT DEFAULT 0.05,
    cost_to_create INT DEFAULT 2,
    MODIFIED TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
)
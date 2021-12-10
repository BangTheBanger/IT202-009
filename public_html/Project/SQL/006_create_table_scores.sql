CREATE TABLE IF NOT EXISTS scores (
    id INT UNIQUE AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    score INT,
    CREATED TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (username) REFERENCES users(username)
)
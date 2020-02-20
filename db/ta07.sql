# Create new DATABASE
CREATE DATABASE login_test;
\c login_test

CREATE TABLE ta07User (
    id SERIAL NOT NULL PRIMARY KEY,
    username VARCHAR(80) UNIQUE NOT NULL,
    pwd VARCHAR(255) NOT NULL
);

# Create a user for this activity and grant it permission to this table
CREATE USER ta_user WITH PASSWORD 'ta_pass';

GRANT SELECT, INSERT, UPDATE ON login TO ta_user;
GRANT USAGE, SELECT ON login_id_seq TO ta_user;
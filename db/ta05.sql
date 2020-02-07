-- Create table
CREATE TABLE scriptures (
    id      SERIAL NOT NULL PRIMARY KEY,
    book    varchar(80),
    chapter integer,
    verse   integer,
    content text
);


-- Insert scriptures
INSERT INTO scriptures VALUES (
    'John',
    1,
    5,
    'And the light shineth in darkness; and the darkness comprehended it not.'
)
INSERT INTO scriptures VALUES (
    'D&C',
    88,
    49,
    'The alight shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'
)
INSERT INTO scriptures VALUES (
    'D&C',
    93,
    28,
    'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'
)
INSERT INTO scriptures VALUES (
    'Mosiah',
    16,
    9,
    'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.'
)
-- Create table
CREATE TABLE topic (
    id      SERIAL NOT NULL PRIMARY KEY,
    name    varchar(80)   
);

CREATE TABLE scripture_topic (
    id      SERIAL NOT NULL PRIMARY KEY,
    topicId    int  NOT NULL REFERENCES topic(id),
    scriptureId int NOT NULL REFERENCES scriptures(id)
);

-- Insert scriptures
INSERT INTO topic (name) VALUES (
    'Faith'
);
INSERT INTO topic (name) VALUES (
    'Sacrafice'
);
INSERT INTO topic (name) VALUES (
    'Charity'
);

INSERT INTO scriptures (book, chapter, verse, content) VALUES (
    'D&C',
    88,
    49,
    'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'
);
INSERT INTO scriptures (book, chapter, verse, content) VALUES (
    'D&C',
    93,
    28,
    'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'
);
INSERT INTO scriptures (book, chapter, verse, content) VALUES (
    'Mosiah',
    16,
    9,
    'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.'
);

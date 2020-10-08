CREATE DATABASE waw;

USE waw;

CREATE TABLE source_types
(
    id   varchar(255) NOT NULL,
    type varchar(16)  NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE authors
(
    id   varchar(255) NOT NULL,
    name varchar(100) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE publishers
(
    id   varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE sources
(
    id        varchar(255) NOT NULL,
    type      varchar(255) NOT NULL,
    author    varchar(255),
    title     varchar(255) NOT NULL,
    publisher varchar(255) NOT NULL,
    date      date,
    PRIMARY KEY (id),
    FOREIGN KEY (type) REFERENCES source_types (id),
    FOREIGN KEY (author) REFERENCES authors (id),
    FOREIGN KEY (publisher) REFERENCES publishers (id)
);

CREATE TABLE countries
(
    id                 varchar(255) NOT NULL,
    name               varchar(255) NOT NULL,
    status             varchar(255) NOT NULL,
    government         varchar(150) NOT NULL,
    party              varchar(150) NOT NULL,
    head_of_government varchar(100) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE conflicts
(
    id   varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE markers
(
    id   varchar(255) NOT NULL,
    name varchar(30)  NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE map_events
(
    id        varchar(255) NOT NULL,
    date      date         NOT NULL,
    marker    varchar(255) NOT NULL,
    location  varchar(30)  NOT NULL,
    text      text         NOT NULL,
    css_class varchar(30)  NOT NULL,
    conflict  varchar(255) NOT NULL,
    country   varchar(255) NOT NULL,
    source    varchar(255) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (marker) REFERENCES markers (id),
    FOREIGN KEY (conflict) REFERENCES conflicts (id),
    FOREIGN KEY (country) REFERENCES countries (id),
    FOREIGN KEY (source) REFERENCES sources (id)
);

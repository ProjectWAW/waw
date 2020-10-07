CREATE DATABASE waw;

USE waw;

CREATE TABLE countries(
    id varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    status varchar(255) NOT NULL,
    government varchar(150) NOT NULL,
    party varchar(150) NOT NULL,
    head_of_government varchar(100) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE conflicts(
    id varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE markers(
    id varchar(255) NOT NULL,
    name varchar(30) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE map_events(
    id varchar(255) NOT NULL,
    date date NOT NULL,
    marker varchar(255) NOT NULL,
    location varchar(30) NOT NULL,
    text text NOT NULL,
    css_class varchar(30) NOT NULL,
    conflict varchar(255) NOT NULL,
    country varchar(255) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (marker) REFERENCES markers(id),
    FOREIGN KEY (conflict) REFERENCES conflicts(id),
    FOREIGN KEY (country) REFERENCES countries(id)
);

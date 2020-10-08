USE waw;

START TRANSACTION;

INSERT INTO source_types (id, type)
VALUES ('1', 'book'),
       ('2', 'web');

INSERT INTO authors (id, name)
VALUES ('1', 'Bob Merkal'),
       ('2', 'Harriet Jones');

INSERT INTO publishers (id, name)
VALUES ('1', 'Gold Leaf Publishing'),
       ('2', 'Little House');

INSERT INTO sources (id, type, author, title, publisher, date)
VALUES ('1', '2', '2', 'Secret Bob Ross: 2020', '1', '2012-6-28'),
       ('2', '1', '1', 'War in the East', '2', '1980-01-01');

INSERT INTO countries (id, name, status, government, party, head_of_government)
VALUES ('1', 'Boblandia', 'Benevolent Dictatorship?', 'Hippie Commune', 'Pollenators United Front', 'Bob Ross'),
       ('2', 'Spanish State', 'Nationalist faction in the Spanish civil war', 'Unitary personalist dictatorship',
        'National Movement (Movimiento Nacional)', 'Francisco Franco');

INSERT INTO conflicts (id, name)
VALUES ('1', 'Pollenist Rebellion'),
       ('2', 'Spanish Civil War');

INSERT INTO markers (id, name)
VALUES ('1', 'green_bullhorn'),
       ('2', 'green-gun-right');

INSERT INTO map_events (id, date, marker, location, text, css_class, conflict, country, source)
VALUES ('1', DATE('1936_10_2'), '1', '14.495184,39.393883', 'BEEEEEEEEEEESSSS', 'icon-gun-right', '1', '1', '1'),
       ('2', DATE('1936_10_2'), '2', '5.190791,45.079651', 'Bang bang, boom boom', 'icon-gun-right', '2', '2', '2');

COMMIT;

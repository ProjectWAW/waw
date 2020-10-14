USE waw;

START TRANSACTION;

INSERT INTO source_types (id, type)
VALUES ('0397fd09-ebeb-46b1-9ff9-04589c8e4df8', 'book'),
       ('099526e6-1a2c-4f4e-b8d3-6306cce25140', 'web');

INSERT INTO authors (id, name)
VALUES ('10f0bea5-6fb8-492a-a0a5-1cfda571f78f', 'Bob Merkal'),
       ('2595197f-76f4-4078-acae-cd4ce68d4e5a', 'Harriet Jones');

INSERT INTO publishers (id, name)
VALUES ('2f8cb15e-2c8d-4d8c-b09d-2963dc84562d', 'Gold Leaf Publishing'),
       ('5f586c64-c45c-44d1-9779-96109087dd3d', 'Little House');

INSERT INTO sources (id, type, author, title, publisher, date)
VALUES ('88fdb0a9-f81f-42d6-ad49-fdb8df0cfa74', '099526e6-1a2c-4f4e-b8d3-6306cce25140',
        '2595197f-76f4-4078-acae-cd4ce68d4e5a', 'Secret Bob Ross: 2020', '2f8cb15e-2c8d-4d8c-b09d-2963dc84562d',
        '2012-6-28'),
       ('892de04a-2dbf-4cc3-bb07-e4ca08834b8c', '0397fd09-ebeb-46b1-9ff9-04589c8e4df8',
        '10f0bea5-6fb8-492a-a0a5-1cfda571f78f', 'War in the East', '5f586c64-c45c-44d1-9779-96109087dd3d',
        '1980-01-01');

INSERT INTO countries (id, name, status, government, party, head_of_government)
VALUES ('8eb1c021-4151-44e3-9cda-553683297a0f', 'Boblandia', 'Benevolent Dictatorship?', 'Hippie Commune',
        'Pollenators United Front', 'Bob Ross'),
       ('a5b853f7-88b1-4974-9ef0-eda4216dd4d9', 'Spanish State', 'Nationalist faction in the Spanish civil war',
        'Unitary personalist dictatorship',
        'National Movement (Movimiento Nacional)', 'Francisco Franco');

INSERT INTO conflicts (id, name)
VALUES ('ad56fd89-b1e4-46d0-8d93-8092b83b6240', 'Pollenist Rebellion'),
       ('bcbdc9c0-5954-4076-9398-f133f06ddb9f', 'Spanish Civil War');

INSERT INTO markers (id, name)
VALUES ('cb867ccc-d8ee-42ac-8937-77f67018c458', 'green_bullhorn'),
       ('ce4d7026-1b66-4f6a-a76d-db5585cc48a1', 'green-gun-right');

INSERT INTO map_events (id, date, marker, location, text, css_class, conflict, country, source)
VALUES ('d3d94ed6-973d-4ba6-bccc-a73fe5410a00', DATE('1936_10_2'), 'cb867ccc-d8ee-42ac-8937-77f67018c458',
        '14.495184,39.393883', 'BEEEEEEEEEEESSSS', 'icon-gun-right', 'ad56fd89-b1e4-46d0-8d93-8092b83b6240',
        '8eb1c021-4151-44e3-9cda-553683297a0f', '88fdb0a9-f81f-42d6-ad49-fdb8df0cfa74'),
       ('d61790e8-f171-4002-a455-1da9cda6c787', DATE('1936_10_2'), 'ce4d7026-1b66-4f6a-a76d-db5585cc48a1',
        '5.190791,45.079651', 'Bang bang, boom boom', 'icon-gun-right', 'bcbdc9c0-5954-4076-9398-f133f06ddb9f',
        'a5b853f7-88b1-4974-9ef0-eda4216dd4d9', '892de04a-2dbf-4cc3-bb07-e4ca08834b8c');

COMMIT;

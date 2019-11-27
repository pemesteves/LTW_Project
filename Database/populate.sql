/*******************/
/**     USERS     **/
/*******************/

INSERT INTO User
    (username, full_name, birthdate, phone, email, password_hash)
    VALUES
    ('miguel_pinto_69',
    'Miguel Delgado Pinto',
    '1999-10-06',
    917146432,
    'pt.miguel99@hotmail.com',
    12345  /* TEMPORARY */
    );

INSERT INTO User
    (username, full_name, birthdate, phone, email, password_hash)
    VALUES
    ('pedrito_pirolito',
    'Pedro Miguel Rodrigues Ferraz Esteves',
    '1999-10-10',
    912345678,
    'pemesteves@hotmail.com',
    12345  /* TEMPORARY */
    );

INSERT INTO User
    (username, full_name, birthdate, phone, email, password_hash)
    VALUES
    ('nuno_iron_man',
    'Nuno Miguel Teixeira Cardoso',
    '1999-03-01',
    925409230,
    'nmtc01@gmail.com',
    12345  /* TEMPORARY */
    );

INSERT INTO User
    (username, full_name, birthdate, phone, email, password_hash)
    VALUES
    ('jacinto_leite_no_rego',
    'Jacinto Leite Capelo Rego',
    '1969-06-09',
    916969696,
    'jacintoleitinho@gmail.com',
    12345  /* TEMPORARY */
    );


/*******************/
/**   PROPERTIES  **/
/*******************/

INSERT INTO Property
    (owner_username, title, price_per_day, location, description, sleeps)
    VALUES
    ('miguel_pinto_69',
    'Jaw-dropping beach house',
    169,
    'Hawaii, USA',
    'Take full advantage of the amazing beaches of Hawai with this modern yet cozy beach house. Just meteres away from the ocean and minutes away from the mountains.',
    4);
INSERT INTO PropertyImage
    (property_id, image_name)
    VALUES
    (1,
    'p_house1.jpg');

INSERT INTO Property
    (owner_username, title, price_per_day, location, description, sleeps)
    VALUES
    ('pedrito_pirolito',
    'Rustic NYC Apartment',
    213,
    'New York City, USA',
    'This downtown studio is perfect for rainy nights and relaxing after a hectic day in NYC.',
    3);
INSERT INTO PropertyImage
    (property_id, image_name)
    VALUES
    (2,
    'p_house4.jpeg');

INSERT INTO Property
    (owner_username, title, price_per_day, location, description, sleeps)
    VALUES
    ('nuno_iron_man',
    'Himalayan Bungalow',
    150,
    'Kathmandu, Nepal',
    'A warm and comfortable bungalow, ideal for adventurous mountain-climbers.',
    8);
INSERT INTO PropertyImage
    (property_id, image_name)
    VALUES
    (3,
    'p_house2.jpeg');    


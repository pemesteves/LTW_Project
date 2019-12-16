PRAGMA foreign_keys = ON;

/*******************/
/**     USERS     **/
/*******************/

INSERT INTO User
    (username, full_name, birthdate, phone, email, password_hash, image_name)
    VALUES
    ('miguel_pinto_69',
    'Miguel Delgado Pinto',
    '1999-10-06',
    917146432,
    'pt.miguel99@hotmail.com',
    '8cb2237d0679ca88db6464eac60da96345513964',
    'user_placeholder.jpg'
    );

INSERT INTO User
    (username, full_name, birthdate, phone, email, password_hash, image_name)
    VALUES
    ('pedrito_pirolito',
    'Pedro Miguel Rodrigues Ferraz Esteves',
    '1999-10-10',
    912345678,
    'pemesteves@hotmail.com',
    '8cb2237d0679ca88db6464eac60da96345513964',
    'user_placeholder.jpg'
    );

INSERT INTO User
    (username, full_name, birthdate, phone, email, password_hash, image_name)
    VALUES
    ('nuno_iron_man',
    'Nuno Miguel Teixeira Cardoso',
    '1999-03-01',
    925409230,
    'nmtc01@gmail.com',
    '8cb2237d0679ca88db6464eac60da96345513964',
    'user_placeholder.jpg'
    );

INSERT INTO User
    (username, full_name, birthdate, phone, email, password_hash, image_name)
    VALUES
    ('jacinto_leite_no_rego',
    'Jacinto Leite Capelo Rego',
    '1969-06-09',
    916969696,
    'jacintoleitinho@gmail.com',
    '8cb2237d0679ca88db6464eac60da96345513964',
    'user_placeholder.jpg'
    );


/*******************/
/**   COMMODITY   **/
/*******************/

INSERT INTO Commodity  /* ID 1 */
    (description)
    VALUES
    ('Wi-Fi');

INSERT INTO Commodity  /* ID 2 */
    (description)
    VALUES
    ('Washer & Dryer');

INSERT INTO Commodity  /* ID 3 */
    (description)
    VALUES
    ('TV');

INSERT INTO Commodity  /* ID 4 */
    (description)
    VALUES
    ('Parking');

INSERT INTO Commodity  /* ID 5 */
    (description)
    VALUES
    ('Heater');
    
INSERT INTO Commodity  /* ID 6 */
    (description)
    VALUES
    ('Swimming Pool');

INSERT INTO Commodity  /* ID 7 */
    (description)
    VALUES
    ('Barbecue');

INSERT INTO Commodity  /* ID 8 */
    (description)
    VALUES
    ('Fireplace');    



/*******************/
/**   PROPERTIES  **/
/*******************/

/* ID 1 */
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
INSERT INTO PropertyCommodity   /* Wi-Fi */
    (property_id, commodity_id)
    VALUES
    (1, 1);
INSERT INTO PropertyCommodity   /* Washer & Dryer */
    (property_id, commodity_id)
    VALUES
    (1, 2);


/* ID 2 */
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
INSERT INTO PropertyCommodity   /* TV */
    (property_id, commodity_id)
    VALUES
    (2, 3);
INSERT INTO PropertyCommodity   /* Parking */
    (property_id, commodity_id)
    VALUES
    (2, 4);
INSERT INTO PropertyCommodity   /* Heater */
    (property_id, commodity_id)
    VALUES
    (2, 5);         

/* ID 3 */
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
INSERT INTO PropertyCommodity   /* Swimming Pool */
    (property_id, commodity_id)
    VALUES
    (3, 6);
INSERT INTO PropertyCommodity   /* Barbecue */
    (property_id, commodity_id)
    VALUES
    (3, 7);
INSERT INTO PropertyCommodity   /* Fireplace */
    (property_id, commodity_id)
    VALUES
    (3, 8);         


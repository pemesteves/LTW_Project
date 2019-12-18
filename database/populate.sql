PRAGMA foreign_keys = ON;

/*******************/
/**     USERS     **/
/*******************/

INSERT INTO User
    (username, full_name, birthdate, phone, email, password_hash, image_name)
    VALUES
    ('miguel_pinto',
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
    ('pemesteves',
    'Pedro Miguel Rodrigues Ferraz Esteves',
    '1999-10-10',
    912345678,
    'pedromiguel.1999.ada@gmail.com',
    '8cb2237d0679ca88db6464eac60da96345513964',
    'user_placeholder.jpg'
    );

INSERT INTO User
    (username, full_name, birthdate, phone, email, password_hash, image_name)
    VALUES
    ('nmtc01',
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
    ('arestivo',
    'André Monteiro de Oliveira Restivo',
    '1976-01-01',
    225081772,
    'arestivo@fe.up.pt',
    '8cb2237d0679ca88db6464eac60da96345513964',
    'user_placeholder.jpg'
    );

INSERT INTO User
    (username, full_name, birthdate, phone, email, password_hash, image_name)
    VALUES
    ('sou_eu',
    'Anonimo',
    '1969-06-09',
    912345678,
    'anonimo@sem.email',
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
    ('miguel_pinto',
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
    ('pemesteves',
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
    ('nmtc01',
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

/* ID 4 */
INSERT INTO Property    
    (owner_username, title, price_per_day, location, description, sleeps)
    VALUES
    ('arestivo',
    'Primrose Cottage',
    150,
    'Georgia, USA',
    'The first permanent private home in Roswell, Georgia and is on the National Register of Historic Places. Built by Barrington King in 1839 for his daughter. The property is currently privately owned and since 2006, has been used for events such as weddings and other private functions. ',
    15);

INSERT INTO PropertyImage
    (property_id, image_name)
    VALUES
    (4,
    'cottage.jpg');

INSERT INTO PropertyCommodity   /* Wi-Fi */
    (property_id, commodity_id)
    VALUES
    (4, 1);

INSERT INTO PropertyCommodity   /* Washer & Dryer */
    (property_id, commodity_id)
    VALUES
    (4, 2);

INSERT INTO PropertyCommodity   /* TV */
    (property_id, commodity_id)
    VALUES
    (4, 3);

INSERT INTO PropertyCommodity   /* Parking */
    (property_id, commodity_id)
    VALUES
    (4, 4);

INSERT INTO PropertyCommodity   /* Swimming Pool */
    (property_id, commodity_id)
    VALUES
    (4, 6);
INSERT INTO PropertyCommodity   /* Barbecue */
    (property_id, commodity_id)
    VALUES
    (4, 7);
INSERT INTO PropertyCommodity   /* Fireplace */
    (property_id, commodity_id)
    VALUES
    (4, 8);         

/** RESERVATIONS **/
INSERT INTO Reservation
    (id_property, tourist_username, sleeps, date_start, date_end)
    VALUES
    (4, 'pemesteves', 10, '2019-12-23', '2020-01-02');

INSERT INTO Reservation
    (id_property, tourist_username, sleeps, date_start, date_end)
    VALUES
    (3, 'arestivo', 2, '2019-12-20', '2020-12-21');

INSERT INTO Reservation
    (id_property, tourist_username, sleeps, date_start, date_end)
    VALUES
    (2, 'miguel_pinto', 1, '2019-12-25', '2020-12-27');

INSERT INTO Reservation
    (id_property, tourist_username, sleeps, date_start, date_end)
    VALUES
    (1, 'nmtc01', 2, '2019-12-29', '2020-02-01');
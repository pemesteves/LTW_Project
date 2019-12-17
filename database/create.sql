CREATE TABLE User(
    username TEXT UNIQUE PRIMARY KEY,
    full_name TEXT NOT NULL,
    birthdate DATE NOT NULL,
    phone INTEGER NOT NULL,
    email TEXT NOT NULL,
    password_hash INTEGER NOT NULL,
    image_name TEXT NOT NULL DEFAULT 'user_placeholder.jpg'
);

CREATE TABLE Property(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    owner_username TEXT REFERENCES User(username) ON DELETE CASCADE ON UPDATE CASCADE,
    title TEXT NOT NULL,
    price_per_day REAL NOT NULL,
    location TEXT NOT NULL,
    description TEXT NOT NULL,
    sleeps INTEGER NOT NULL,

    CONSTRAINT minimum_sleeps CHECK (sleeps > 0)
);

CREATE TABLE PropertyImage(
    property_id INTEGER REFERENCES Property(id),
    image_name TEXT NOT NULL,
    PRIMARY KEY(property_id, image_name)
);

CREATE TABLE Reservation(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_property INTEGER REFERENCES Property(id) ON DELETE CASCADE ON UPDATE CASCADE,
    tourist_username TEXT REFERENCES User(username) ON DELETE CASCADE ON UPDATE CASCADE,
    sleeps INTEGER NOT NULL,
    date_start DATE NOT NULL,
    date_end DATE NOT NULL,
    rating REAL,
    comment TEXT,

    CONSTRAINT valid_dates CHECK (date_end > date_start)
);

CREATE TABLE Commodity(
    id INTEGER PRIMARY KEY AUTOINCREMENT, 
    description TEXT NOT NULL
);

CREATE TABLE PropertyCommodity(
    property_id INTEGER REFERENCES Property(id),
    commodity_id INTEGER REFERENCES Commodity(id),
    PRIMARY KEY(property_id, commodity_id)
);

CREATE TABLE Notification(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    property_id INTEGER REFERENCES Property(id),
    description TEXT NOT NULL,
    active INTEGER NOT NULL
);
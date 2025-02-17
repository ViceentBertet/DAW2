CREATE TABLE users (
id INTEGER PRIMARY KEY AUTOINCREMENT,
name TEXT NOT NULL,
email TEXT NOT NULL UNIQUE
);
INSERT INTO users (name, email) VALUES ('Juan Pérez', 'juan@example.com');
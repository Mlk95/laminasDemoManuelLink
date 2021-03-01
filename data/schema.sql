/*
Permissions Tabelle falls Unterschiedliche Rollen die den Usern zugeteilt sind unterschiedliche Rechte haben sollen.
Beispielsweise: Student darf bestimmte Infos über Profs oder Mitarbeiter einsehen während Verwaltung Infos über Studenten Profs und Mitarbeiter einsehen kann.
*/
CREATE TABLE permissions (id INT AUTO_INCREMENT PRIMARY KEY ,permissiontype varchar(11) NOT NULL);
INSERT INTO permissions (permissiontype) VALUES ('Student');
INSERT INTO permissions (permissiontype) VALUES ('Auszubildender');
INSERT INTO permissions (permissiontype) VALUES ('Wissenschaft');
INSERT INTO permissions (permissiontype) VALUES ('Mitarbeiter');
INSERT INTO permissions (permissiontype) VALUES ('Verwaltung');
INSERT INTO permissions (permissiontype) VALUES ('Admin');

/*
Status bzw. Role innerhalb des KITs verknüpft mit Permission die je nach Fall auch individuell sein kann | permissions_id = fremdschlüssel
 */
CREATE TABLE role (id INT AUTO_INCREMENT PRIMARY KEY, rolename varchar (30) NOT NULL, permission INTEGER, FOREIGN KEY(permission) REFERENCES permissions(id));
INSERT INTO role (rolename, permission) VALUES ('Student', '1');
INSERT INTO role (rolename, permission) VALUES ('Auszubildender', '2');
INSERT INTO role (rolename, permission) VALUES ('Professor', '3');
INSERT INTO role (rolename, permission) VALUES ('Mitarbeiter', '4');
INSERT INTO role (rolename, permission) VALUES ('Wissenschaftler', '3');


/*
User Tabelle mit Vorname, Nachname, Adresse, Land und Rolle | role_id = Fremdschlüssel.
 */
CREATE TABLE `user` (id INT AUTO_INCREMENT PRIMARY KEY, lastname  varchar(50) NOT NULL, firstname varchar(50) NOT NULL, address varchar(50) NOT NULL, country varchar(50) NOT NULL, role INTEGER, FOREIGN KEY(role) REFERENCES role (id));
INSERT INTO user (lastname, firstname, address, country, role) VALUES ('Müller', 'Hans', 'Musterstraße 1 12345 Musterhausen', 'DE', '3');
INSERT INTO user (lastname, firstname, address, country, role) VALUES ('Martin', 'Louis', 'Musterstraße 1 12345 Musterhausen', 'FR', '1');
INSERT INTO user (lastname, firstname, address, country, role) VALUES ('Garcia', 'Carlos', ' 2341 Entenhausen', 'ESP', '3');
INSERT INTO user (lastname, firstname, address, country, role) VALUES ('Weber', 'Renate', 'Herrenstraße 30 76131 Karlsruhe', 'DE', '4');
INSERT INTO user (lastname, firstname, address, country, role) VALUES ('Wagner', 'Hannah', 'KIT 76131 Karlsruhe', 'DE', '2');
INSERT INTO user (lastname, firstname, address, country, role) VALUES ('Bernard', 'Louisa', 'Karl-Wilhelm Straße 5 76133 Karlsruhe', 'FR', '2');
INSERT INTO user (lastname, firstname, address, country, role) VALUES ('Wagner', 'Hannah', 'Rüppurrer Straße 14 76137 Karlsruhe', 'DE', '1');
INSERT INTO user (lastname, firstname, address, country, role) VALUES ('Smith', 'John', 'Winterstraße 20 76137 Karlsruhe', 'US', '5');

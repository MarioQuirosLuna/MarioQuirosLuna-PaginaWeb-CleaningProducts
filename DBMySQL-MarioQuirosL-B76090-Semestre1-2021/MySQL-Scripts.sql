USE if4001_proyecto2_b76090;

CREATE TABLE IF NOT EXISTS privilege
(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    privilege_type VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS users
(
	user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50) NOT NULL UNIQUE,
    user_password VARCHAR(200) NOT NULL,
    fk_id_privilege INT NOT NULL,
    FOREIGN KEY(fk_id_privilege) REFERENCES privilege(id)
);

CREATE TABLE IF NOT EXISTS user_client
(
	fk_user_client_id INT NOT NULL,
    user_lastname VARCHAR(100) NOT NULL,
    user_client_age INT(3) NOT NULL,
    user_client_gender CHAR(1) NOT NULL,
    user_client_address VARCHAR(200) NOT NULL,
    FOREIGN KEY(fk_user_client_id) REFERENCES users(user_id)
);

CREATE TABLE IF NOT EXISTS product_category
(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nameCategory VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS product
(
	id_product INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_product VARCHAR(50) NOT NULL,
    price_product DECIMAL(7,2) NOT NULL,
    description_product VARCHAR(200) NOT NULL,
    img_product VARCHAR(50) NOT NULL DEFAULT 'default.jpg',
    fk_id_category INT NOT NULL,
    stock_product INT UNSIGNED NOT NULL, 
    fav_product INT NOT NULL DEFAULT 0,
    FOREIGN KEY(fk_id_category) REFERENCES product_category(id)
);

CREATE TABLE IF NOT EXISTS temporal_car
(
	fk_user_client_id INT NOT NULL,
    fk_id_product INT NOT NULL,
    FOREIGN KEY(fk_user_client_id) REFERENCES users(user_id),
    FOREIGN KEY(fk_id_product) REFERENCES product(id_product)
);

CREATE TABLE IF NOT EXISTS product_fav
(
	fk_user_client_id INT NOT NULL,
    fk_id_product INT NOT NULL,
    FOREIGN KEY(fk_user_client_id) REFERENCES users(user_id),
    FOREIGN KEY(fk_id_product) REFERENCES product(id_product)
);


CREATE TABLE IF NOT EXISTS purchase_made
(
	fk_user_client_id INT NOT NULL,
    fk_id_product INT NOT NULL,
    date_purchase DATE NOT NULL,
    FOREIGN KEY(fk_user_client_id) REFERENCES users(user_id),
    FOREIGN KEY(fk_id_product) REFERENCES product(id_product)
);

CREATE TABLE IF NOT EXISTS promotions
(
	fk_id_product INT UNIQUE NOT NULL,
    discount TINYINT UNSIGNED,
    dateStart DATE NOT NULL,
	dateEnd DATE NOT NULL,
    FOREIGN KEY(fk_id_product) REFERENCES product(id_product)
);










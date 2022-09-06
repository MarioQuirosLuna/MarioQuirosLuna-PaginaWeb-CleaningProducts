USE if4001_proyecto2_b76090;

DROP procedure IF EXISTS `addPrivilege`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `addPrivilege` (IN _privilege_type VARCHAR(50))
BEGIN
	INSERT INTO `if4001_proyecto2_b76090`.`privilege`
	(`privilege_type`)
	VALUES
	(_privilege_type);
END$$
DELIMITER ;

CALL addPrivilege('Admin');
CALL addPrivilege('Client');

DROP procedure IF EXISTS `getPrivileges`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getPrivileges` ()
BEGIN
	SELECT `privilege`.`id`,
		`privilege`.`privilege_type`
	FROM `if4001_proyecto2_b76090`.`privilege`;
END$$
DELIMITER ;

CALL getPrivileges();

DROP procedure IF EXISTS `addUser`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `addUser` (IN _name VARCHAR(50), IN _password VARCHAR(200), IN _privilege INT)
BEGIN
	INSERT INTO `if4001_proyecto2_b76090`.`users`
	(`user_name`,
	`user_password`,
	`fk_id_privilege`)
	VALUES
	(_name, _password, _privilege);
END$$
DELIMITER ;

DROP procedure IF EXISTS `getUsers`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE DEFINER=`laboratorios`@`%` PROCEDURE `getUsers`()
BEGIN
	SELECT 
		`users`.`user_id`,
		`users`.`user_name`,
		`users`.`user_password`,
		`users`.`fk_id_privilege`,
        `privilege`.`privilege_type`
	FROM `if4001_proyecto2_b76090`.`users`
		JOIN `if4001_proyecto2_b76090`.`privilege`
		ON `privilege`.`id` = `users`.`fk_id_privilege`;
END$$

DELIMITER ;


CALL addUser('admin','admin',1);


DROP procedure IF EXISTS `getAdmins`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getAdmins` ()
BEGIN
	SELECT 
		`users`.`user_id`,
		`users`.`user_name`,
		`users`.`fk_id_privilege`,
        `privilege`.`privilege_type`
	FROM `if4001_proyecto2_b76090`.`users`
		JOIN `if4001_proyecto2_b76090`.`privilege`
		ON `privilege`.`id` = `users`.`fk_id_privilege`
	WHERE `users`.`fk_id_privilege` = 1;
END$$
DELIMITER ;

CALL getAdmins();

DROP procedure IF EXISTS `deleteAdmin`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `deleteAdmin` (IN _idAdmin INT)
BEGIN
	DELETE FROM `if4001_proyecto2_b76090`.`users`
	WHERE `users`.`user_id` = _idAdmin;
END$$
DELIMITER ;

CALL deleteAdmin(13);

DROP procedure IF EXISTS `addUserClient`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `addUserClient` (IN _name VARCHAR(50), IN _lastname VARCHAR(100), IN _privilege INT, IN _password VARCHAR(200), IN _age INT(3), IN _gender CHAR(1), IN _address VARCHAR(200))
BEGIN 
	DECLARE `_rollback` BOOL DEFAULT 0;
    DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET `_rollback` = 1;
    START TRANSACTION;
	CALL addUser(_name,_password, _privilege);
    
	INSERT INTO `if4001_proyecto2_b76090`.`user_client`
	(`fk_user_client_id`,
	`user_lastname`,
	`user_client_age`,
	`user_client_gender`,
	`user_client_address`)
	VALUES
	((SELECT `users`.`user_id` FROM `if4001_proyecto2_b76090`.`users` WHERE _name = `users`.`user_name` AND _password = `users`.`user_password`),
		_lastname,
        _age,
        _gender,
        _address);
	IF `_rollback` THEN
        ROLLBACK;
    ELSE
        COMMIT;
    END IF;
END$$
DELIMITER ;


CALL addUserClient('client','lastnameClient', 2,'client',20,'M','AddressClient');
CALL getUsers();

DROP procedure IF EXISTS `deleteUserClient`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `deleteUserAccount` (IN _username VARCHAR(50))
BEGIN
	DELETE FROM `if4001_proyecto2_b76090`.`user_client`
	WHERE `user_client`.`fk_user_client_id` = (SELECT `user_id` FROM `if4001_proyecto2_b76090`.`users` WHERE `user_name` = _username);

	DELETE FROM `if4001_proyecto2_b76090`.`users`
	WHERE `user_name` = _username;

END$$
DELIMITER ;

CALL deleteUserAccount('admin');



DROP procedure IF EXISTS `getUser`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getUser` (IN _name VARCHAR(50), IN _password VARCHAR(200))
BEGIN
	SELECT 
		`users`.`user_id`,
		`users`.`user_name`,
		`users`.`fk_id_privilege`,
        `privilege`.`privilege_type`
	FROM `if4001_proyecto2_b76090`.`users`
		JOIN `if4001_proyecto2_b76090`.`privilege`
		ON `privilege`.`id` = `users`.`fk_id_privilege`
	WHERE `users`.`user_name` = _name AND `users`.`user_password` = _password;
END$$
DELIMITER ;

CALL getUser('client','ZTuuyAn81kVlgHsJsYmayQ==');



DROP procedure IF EXISTS `addCategory`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `addCategory` (IN _name VARCHAR(50))
BEGIN
	INSERT INTO `if4001_proyecto2_b76090`.`product_category`
	(`nameCategory`)
	VALUES
	(_name);
END$$
DELIMITER ;

CALL addCategory('Limpieza');
CALL getCategories();

DROP procedure IF EXISTS `deleteCategory`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `deleteCategory` (IN _id INT)
BEGIN
	DELETE FROM `if4001_proyecto2_b76090`.`product_category`
	WHERE `id` = _id;
END$$
DELIMITER ;
CALL deleteCategory(13);

DROP procedure IF EXISTS `addProduct`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `addProduct` (IN _name VARCHAR(50), IN _price DECIMAL(7,2), IN _stock INT,IN _description VARCHAR(200), IN _img LONGBLOB, IN _category VARCHAR(50))
BEGIN
	INSERT INTO `if4001_proyecto2_b76090`.`product`
	(`name_product`,
	`price_product`,
    `stock_product`,
	`description_product`,
	`img_product`,
	`fk_id_category`)
	VALUES
	(_name,_price,_description,_img,(SELECT `id` FROM product_category WHERE `nameCategory` = _category));
END$$
DELIMITER ;

CALL addProduct('name2',100,1,'description','default.jpg','Limpieza');


DROP procedure IF EXISTS `getProducts`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getProducts` ()
BEGIN
	SELECT 
		`product`.`id_product`,
		`product`.`name_product`,
		`product`.`price_product`,
		`product`.`description_product`,
		`product`.`img_product`,
		`product`.`fk_id_category`,
        `product_category`.`nameCategory`,
        `product`.`stock_product`,
        (
			SELECT 
				COUNT(`fk_id_product`) 
            FROM `product_fav` 
			WHERE  `product_fav`.`fk_id_product` = `product`.`id_product`
		) AS countfav,
        (
			SELECT 
				`discount` 
			FROM `if4001_proyecto2_b76090`.`promotions` 
            WHERE `fk_id_product` = `product`.`id_product`
            AND (SELECT CURDATE() >= `dateStart`)
            AND (SELECT CURDATE() <= `dateEnd`)
		) AS discountActive
	FROM `if4001_proyecto2_b76090`.`product`
		JOIN `if4001_proyecto2_b76090`.`product_category`
		ON `product_category`.`id` = `product`.`fk_id_category`
	ORDER BY countfav DESC;
END$$
DELIMITER ;

CALL getProducts();



DROP procedure IF EXISTS `getProductsAscendant`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getProductsAscendant` ()
BEGIN
	SELECT 
		`product`.`id_product`,
		`product`.`name_product`,
		`product`.`price_product`,
		`product`.`description_product`,
		`product`.`img_product`,
		`product`.`fk_id_category`,
        `product_category`.`nameCategory`,
        `product`.`stock_product`,
        (
			SELECT 
				COUNT(`fk_id_product`) 
            FROM `product_fav` 
			WHERE  `product_fav`.`fk_id_product` = `product`.`id_product`
		) AS countfav,
        (
			SELECT 
				`discount` 
			FROM `if4001_proyecto2_b76090`.`promotions` 
            WHERE `fk_id_product` = `product`.`id_product`
            AND (SELECT CURDATE() >= `dateStart`)
            AND (SELECT CURDATE() <= `dateEnd`)
		) AS discountActive
	FROM `if4001_proyecto2_b76090`.`product`
		JOIN `if4001_proyecto2_b76090`.`product_category`
		ON `product_category`.`id` = `product`.`fk_id_category`
	ORDER BY `price_product` ASC;
END$$
DELIMITER ;

CALL getProductsAscendant();

DROP procedure IF EXISTS `getProductsDescendant`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getProductsDescendant` ()
BEGIN
	SELECT 
		`product`.`id_product`,
		`product`.`name_product`,
		`product`.`price_product`,
		`product`.`description_product`,
		`product`.`img_product`,
		`product`.`fk_id_category`,
        `product_category`.`nameCategory`,
        `product`.`stock_product`,
        (
			SELECT 
				COUNT(`fk_id_product`) 
            FROM `product_fav` 
			WHERE  `product_fav`.`fk_id_product` = `product`.`id_product`
		) AS countfav,
        (
			SELECT 
				`discount` 
			FROM `if4001_proyecto2_b76090`.`promotions` 
            WHERE `fk_id_product` = `product`.`id_product`
            AND (SELECT CURDATE() >= `dateStart`)
            AND (SELECT CURDATE() <= `dateEnd`)
		) AS discountActive
	FROM `if4001_proyecto2_b76090`.`product`
		JOIN `if4001_proyecto2_b76090`.`product_category`
		ON `product_category`.`id` = `product`.`fk_id_category`
	ORDER BY `price_product` DESC;
END$$
DELIMITER ;

CALL getProductsDescendant();

DROP procedure IF EXISTS `getCantProductoStock`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getCantProductoStock` (IN _nameProduct VARCHAR(50))
BEGIN
	SELECT 
		`product`.`id_product`,
		`product`.`name_product`,
		`product`.`stock_product`
	FROM `if4001_proyecto2_b76090`.`product`
    WHERE `product`.`name_product` = _nameProduct;
END$$
DELIMITER ;

CALL getCantProductoStock('Alcohol-Mascarilla');


DROP procedure IF EXISTS `deleteProduct`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `deleteProduct` (IN _idProduct INT)
BEGIN
	DELETE FROM `if4001_proyecto2_b76090`.`product`
	WHERE id_product = _idProduct;
END$$
DELIMITER ;
CALL deleteProduct(23);

DROP procedure IF EXISTS `updateProduct`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `updateProduct` (IN _idProduct INT, IN _name VARCHAR(50), IN _price DECIMAL(7,2), IN _stock INT)
BEGIN
	UPDATE `if4001_proyecto2_b76090`.`product`
	SET
	`name_product` = _name,
	`price_product` = _price,
	`stock_product` = _stock
	WHERE `id_product` = _idProduct;
END$$
DELIMITER ;

CALL updateProduct(21,'Mascarillas',15,2);

DROP procedure IF EXISTS `addItemTemporalCar`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `addItemTemporalCar` (IN _nameclient VARCHAR(50), IN _nameProduct VARCHAR(50))
BEGIN
	INSERT INTO `if4001_proyecto2_b76090`.`temporal_car`
		(`fk_user_client_id`,
		`fk_id_product`)
	VALUES
		((SELECT `user_id` FROM `users` WHERE `user_name` = _nameclient), (SELECT `id_product` FROM `product` WHERE `name_product` = _nameProduct));
END$$
DELIMITER ;

CALL addItemTemporalCar('client','Desinfectante');
CALL addItemTemporalCar('client','Desinfectante');
CALL addItemTemporalCar('client','Guantes');


DROP procedure IF EXISTS `addItemFav`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `addItemFav` (IN _nameclient VARCHAR(50), IN _nameProduct VARCHAR(50))
BEGIN
	INSERT INTO `if4001_proyecto2_b76090`.`product_fav`
		(`fk_user_client_id`,
		`fk_id_product`)
	VALUES
		((SELECT `user_id` FROM `users` WHERE `user_name` = _nameclient), (SELECT `id_product` FROM `product` WHERE `name_product` = _nameProduct));
END$$
DELIMITER ;

CALL addItemFav('client','Jabón antibacterial');

DROP procedure IF EXISTS `getItemFav`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getItemFav` (IN _nameclient VARCHAR(50), IN _nameproduct VARCHAR(50))
BEGIN
	SELECT `product_fav`.`fk_user_client_id`,
		`product_fav`.`fk_id_product`
	FROM `if4001_proyecto2_b76090`.`product_fav`
    WHERE `fk_user_client_id` = (SELECT `user_id` FROM `users` WHERE `user_name` = _nameclient) AND `fk_id_product` = (SELECT `id_product` FROM `product` WHERE `name_product` = _nameproduct);
END$$
DELIMITER ;

CALL getItemFav('client','Jabón antibacterial');



DROP procedure IF EXISTS `getTemporalCar`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getTemporalCar`(IN _nameclient VARCHAR(50))
BEGIN
	SELECT 
		`temporal_car`.`fk_user_client_id`,
        `users`.`user_name`,
		`temporal_car`.`fk_id_product`,
		`product`.`name_product`,
		`product`.`price_product`,
        (
			SELECT 
				`discount` 
			FROM `if4001_proyecto2_b76090`.`promotions` 
            WHERE `fk_id_product` = `product`.`id_product`
            AND (SELECT CURDATE() >= `dateStart`)
            AND (SELECT CURDATE() <= `dateEnd`)
		) AS discountActive
	FROM `if4001_proyecto2_b76090`.`temporal_car`
		JOIN `if4001_proyecto2_b76090`.`product`
        ON `temporal_car`.`fk_id_product` = `product`.`id_product`
			JOIN `if4001_proyecto2_b76090`.`users`
            ON `users`.`user_id` = `temporal_car`.`fk_user_client_id`
    WHERE `users`.`user_name` = _nameclient;
END$$
DELIMITER ;

CALL getTemporalCar('client');


DROP procedure IF EXISTS `getDataTotalPricePurchase`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getDataTotalPricePurchase` (IN _nameclient VARCHAR(50))
BEGIN
	SELECT 
		sum(`product`.`price_product`) AS 'Total'
	FROM `if4001_proyecto2_b76090`.`temporal_car`
		JOIN `if4001_proyecto2_b76090`.`product`
        ON `temporal_car`.`fk_id_product` = `product`.`id_product`
			JOIN `if4001_proyecto2_b76090`.`users`
            ON `users`.`user_id` = `temporal_car`.`fk_user_client_id`
    WHERE `users`.`user_name` = _nameclient;
END$$
DELIMITER ;

CALL getDataTotalPricePurchase('client');

DROP procedure IF EXISTS `if4001_proyecto2_b76090`.`getCantCartShop`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE DEFINER=`laboratorios`@`%` PROCEDURE `getCantCartShop`(IN _nameclient VARCHAR(50))
BEGIN
	SELECT 
		count(`temporal_car`.`fk_user_client_id`) AS 'count'
	FROM `if4001_proyecto2_b76090`.`temporal_car`
		JOIN `if4001_proyecto2_b76090`.`product`
        ON `temporal_car`.`fk_id_product` = `product`.`id_product`
			JOIN `if4001_proyecto2_b76090`.`users`
            ON `users`.`user_id` = `temporal_car`.`fk_user_client_id` 
    WHERE `users`.`user_name` = _nameclient;
END$$
DELIMITER ;

CALL getCantCartShop('client');

DROP procedure IF EXISTS `if4001_proyecto2_b76090`.`deleteItemCartShop`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `deleteItemCartShop`(IN _nameclient VARCHAR(50), IN _nameproduct VARCHAR(50))
BEGIN
	DELETE FROM `if4001_proyecto2_b76090`.`temporal_car`
    WHERE `temporal_car`.`fk_user_client_id` = (SELECT `user_id` FROM `users` WHERE `user_name` = _nameclient) 
      AND `temporal_car`.`fk_id_product` = (SELECT `id_product` FROM `product` WHERE `name_product` = _nameproduct)
	LIMIT 1;
END$$
DELIMITER ;

CALL deleteItemCartShop('client','Cloro');


DROP procedure IF EXISTS `deleteItemFav`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `deleteItemFav` (IN _nameclient VARCHAR(50), IN _nameproduct VARCHAR(50))
BEGIN
	DELETE FROM `if4001_proyecto2_b76090`.`product_fav`
    WHERE `product_fav`.`fk_user_client_id` = (SELECT `user_id` FROM `users` WHERE `user_name` = _nameclient) 
      AND `product_fav`.`fk_id_product` = (SELECT `id_product` FROM `product` WHERE `name_product` = _nameproduct);
END$$
DELIMITER ;

CALL deleteItemFav('client','Mascarillas');

	INSERT INTO `if4001_proyecto2_b76090`.`purchase_made`
		(
			`purchase_made`.`fk_user_client_id`,
			`purchase_made`.`fk_id_product`,
			`purchase_made`.`date_purchase`
        )
		SELECT 
			`temporal_car`.`fk_user_client_id`, 
            `temporal_car`.`fk_id_product`,
            (SELECT CURDATE())
		FROM `if4001_proyecto2_b76090`.`temporal_car`
		WHERE `fk_user_client_id` = (SELECT `user_id` FROM `users` WHERE `user_name` = 'client');

SELECT * FROM purchase_made;
SELECT * FROM temporal_car;

DELETE FROM `if4001_proyecto2_b76090`.`purchase_made`
WHERE `fk_user_client_id` = 40;


DROP procedure IF EXISTS `addPurchaseMade`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `addPurchaseMade` (IN _nameclient VARCHAR(50))
BEGIN

	DECLARE `_rollback` BOOL DEFAULT 0;
    DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET `_rollback` = 1;
    START TRANSACTION;
	
    -- Insertar datos de la tabla carrito al la de compras realizadas
	INSERT INTO `if4001_proyecto2_b76090`.`purchase_made`
		(
			`purchase_made`.`fk_user_client_id`,
			`purchase_made`.`fk_id_product`,
			`purchase_made`.`date_purchase`
        )
		SELECT 
			`temporal_car`.`fk_user_client_id`, 
            `temporal_car`.`fk_id_product`,
            (SELECT CURDATE())
		FROM `if4001_proyecto2_b76090`.`temporal_car`
		WHERE `fk_user_client_id` = (SELECT `user_id` FROM `users` WHERE `user_name` = _nameclient);
    
    -- Actualiza el stock del producto
    
    UPDATE `if4001_proyecto2_b76090`.`product` 
		JOIN `if4001_proyecto2_b76090`.`temporal_car`
		ON `product`.`id_product` = `temporal_car`.`fk_id_product`
	SET `product`.`stock_product` = `product`.`stock_product` - (
																SELECT count(`temporal_car`.`fk_id_product`) 
																FROM `temporal_car` 
																	WHERE `temporal_car`.`fk_id_product` = `product`.`id_product` 
																	AND `temporal_car`.`fk_user_client_id` = (SELECT `user_id` FROM `users` WHERE `user_name` = _nameclient)
																) 
	WHERE `temporal_car`.`fk_user_client_id` = (SELECT `user_id` FROM `users` WHERE `user_name` = _nameclient);
    
    -- Elimina el carrito del usuario
    
	DELETE FROM `if4001_proyecto2_b76090`.`temporal_car`
	WHERE `fk_user_client_id` = (SELECT `user_id` FROM `users` WHERE `user_name` = _nameclient);
    
    IF `_rollback` THEN
        ROLLBACK;
        SELECT 0 AS `PROBLEM`;
    ELSE
        COMMIT;
    END IF;
END$$
DELIMITER ;


DROP procedure IF EXISTS `getPurchaseHistory`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getPurchaseHistory` ()
BEGIN
	SELECT 
		`purchase_made`.`fk_user_client_id`,
        `users`.`user_name`,
		`purchase_made`.`fk_id_product`,
        `product`.`name_product`,
        `product`.`price_product`,
		`purchase_made`.`date_purchase`
	FROM `if4001_proyecto2_b76090`.`purchase_made`
		JOIN `if4001_proyecto2_b76090`.`users`
        ON `purchase_made`.`fk_user_client_id` = `users`.`user_id`
			JOIN `if4001_proyecto2_b76090`.`product`
            ON `product`.`id_product` = `purchase_made`.`fk_id_product`;
END$$
DELIMITER ;

CALL getPurchaseHistory();

DROP procedure IF EXISTS `getPurchaseHistoryAscendant`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getPurchaseHistoryAscendant` ()
BEGIN
	SELECT 
		`purchase_made`.`fk_user_client_id`,
        `users`.`user_name`,
		`purchase_made`.`fk_id_product`,
        `product`.`name_product`,
        `product`.`price_product`,
		`purchase_made`.`date_purchase`
	FROM `if4001_proyecto2_b76090`.`purchase_made`
		JOIN `if4001_proyecto2_b76090`.`users`
        ON `purchase_made`.`fk_user_client_id` = `users`.`user_id`
			JOIN `if4001_proyecto2_b76090`.`product`
            ON `product`.`id_product` = `purchase_made`.`fk_id_product`
	ORDER BY `purchase_made`.`date_purchase` ASC;
END$$
DELIMITER ;

CALL getPurchaseHistoryAscendant();

DROP procedure IF EXISTS `getPurchaseHistoryDescendant`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getPurchaseHistoryDescendant` ()
BEGIN
	SELECT 
		`purchase_made`.`fk_user_client_id`,
        `users`.`user_name`,
		`purchase_made`.`fk_id_product`,
        `product`.`name_product`,
        `product`.`price_product`,
		`purchase_made`.`date_purchase`
	FROM `if4001_proyecto2_b76090`.`purchase_made`
		JOIN `if4001_proyecto2_b76090`.`users`
        ON `purchase_made`.`fk_user_client_id` = `users`.`user_id`
			JOIN `if4001_proyecto2_b76090`.`product`
            ON `product`.`id_product` = `purchase_made`.`fk_id_product`
	ORDER BY `purchase_made`.`date_purchase` DESC;
END$$
DELIMITER ;

CALL getPurchaseHistoryDescendant();

DROP procedure IF EXISTS `getPurchaseHistoryClient`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getPurchaseHistoryClient` (IN _name VARCHAR(50))
BEGIN
	SELECT 
		`purchase_made`.`fk_user_client_id`,
        `users`.`user_name`,
		`purchase_made`.`fk_id_product`,
        `product`.`name_product`,
        `product`.`price_product`,
		`purchase_made`.`date_purchase`
	FROM `if4001_proyecto2_b76090`.`purchase_made`
		JOIN `if4001_proyecto2_b76090`.`users`
        ON `purchase_made`.`fk_user_client_id` = `users`.`user_id`
			JOIN `if4001_proyecto2_b76090`.`product`
            ON `product`.`id_product` = `purchase_made`.`fk_id_product`
	WHERE `users`.`user_name` = _name;
END$$
DELIMITER ;

CALL getPurchaseHistoryClient('client');

DROP procedure IF EXISTS `getCantUsers`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getCantUsers` ()
BEGIN
	SELECT 
		count(`users`.`user_id`) cantUsers
	FROM `if4001_proyecto2_b76090`.`users`;
END$$
DELIMITER ;

CALL getCantUsers();

DROP procedure IF EXISTS `getCountCantPurchases`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getCountCantPurchases` ()
BEGIN
	SELECT 
		count(`purchase_made`.`fk_user_client_id`) cantPurchases
	FROM `if4001_proyecto2_b76090`.`purchase_made`;

END$$
DELIMITER ;

CALL getCountCantPurchases();

DROP procedure IF EXISTS `getProfitsSales`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getProfitsSales` ()
BEGIN
	SELECT
		SUM(`product`.`price_product`) AS ProfitSales
	FROM `if4001_proyecto2_b76090`.`purchase_made`
		JOIN `if4001_proyecto2_b76090`.`product`
		ON `purchase_made`.`fk_id_product` = `product`.`id_product`;
END$$
DELIMITER ;

CALL getProfitsSales();

DROP procedure IF EXISTS `getMonthsPurchases`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getMonthsPurchases` ()
BEGIN
	SELECT 
		DISTINCT EXTRACT(MONTH FROM `purchase_made`.`date_purchase`) AS month
	FROM `if4001_proyecto2_b76090`.`purchase_made`;
END$$
DELIMITER ;

CALL getMonthsPurchases();

DROP procedure IF EXISTS `getDaysPurchases`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getDaysPurchases` ()
BEGIN
	SELECT 
		DISTINCT EXTRACT(DAY FROM `purchase_made`.`date_purchase`) AS day
	FROM `if4001_proyecto2_b76090`.`purchase_made`;
END$$
DELIMITER ;

CALL getDaysPurchases();

DROP procedure IF EXISTS `getPurchaseHistoryMonth`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getPurchaseHistoryMonth` (IN _month INT)
BEGIN
	SELECT 
		`purchase_made`.`fk_user_client_id`,
        `users`.`user_name`,
		`purchase_made`.`fk_id_product`,
        `product`.`name_product`,
        `product`.`price_product`,
		`purchase_made`.`date_purchase`
	FROM `if4001_proyecto2_b76090`.`purchase_made`
		JOIN `if4001_proyecto2_b76090`.`users`
        ON `purchase_made`.`fk_user_client_id` = `users`.`user_id`
			JOIN `if4001_proyecto2_b76090`.`product`
            ON `product`.`id_product` = `purchase_made`.`fk_id_product`
	WHERE (SELECT EXTRACT(MONTH FROM `purchase_made`.`date_purchase`)) = _month;
END$$
DELIMITER ;

CALL getPurchaseHistoryMonth("6");

DROP procedure IF EXISTS `getPurchaseHistoryDay`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getPurchaseHistoryDay` (IN _day INT)
BEGIN
	SELECT 
		`purchase_made`.`fk_user_client_id`,
        `users`.`user_name`,
		`purchase_made`.`fk_id_product`,
        `product`.`name_product`,
        `product`.`price_product`,
		`purchase_made`.`date_purchase`
	FROM `if4001_proyecto2_b76090`.`purchase_made`
		JOIN `if4001_proyecto2_b76090`.`users`
        ON `purchase_made`.`fk_user_client_id` = `users`.`user_id`
			JOIN `if4001_proyecto2_b76090`.`product`
            ON `product`.`id_product` = `purchase_made`.`fk_id_product`
	WHERE (SELECT EXTRACT(DAY FROM `purchase_made`.`date_purchase`)) = _day;
END$$
DELIMITER ;

CALL getPurchaseHistoryDay('25');


DROP procedure IF EXISTS `addPromotion`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `addPromotion` (IN _nameproduct VARCHAR(50), IN _discount INT, IN _dateStart DATE, IN _dateEnd DATE)
BEGIN
	INSERT INTO `if4001_proyecto2_b76090`.`promotions`
	(`fk_id_product`,
	`discount`,
	`dateStart`,
	`dateEnd`)
	VALUES
	((SELECT `id_product` FROM `product` WHERE `name_product` = _nameproduct),_discount,_dateStart,_dateEnd);

END$$
DELIMITER ;

CALL addPromotion('Kid de limpieza',10,'2021-06-30','2021-07-25');

DROP procedure IF EXISTS `getDiscountClient`;
DELIMITER $$
USE `if4001_proyecto2_b76090`$$
CREATE PROCEDURE `getDiscountClient` (IN _nameClient VARCHAR(50))
BEGIN
	SELECT 
		SUM(`product`.`price_product`/ (
										SELECT 
											`discount` 
										FROM `if4001_proyecto2_b76090`.`promotions` 
										WHERE `fk_id_product` = `product`.`id_product`
										AND (SELECT CURDATE() >= `dateStart`)
										AND (SELECT CURDATE() <= `dateEnd`)
									)) AS Discount
	FROM `if4001_proyecto2_b76090`.`temporal_car`
		JOIN `if4001_proyecto2_b76090`.`product`
        ON `temporal_car`.`fk_id_product` = `product`.`id_product`
			JOIN `if4001_proyecto2_b76090`.`users`
            ON `users`.`user_id` = `temporal_car`.`fk_user_client_id`
    WHERE `users`.`user_name` = _nameClient AND (
												SELECT 
													`discount` 
												FROM `if4001_proyecto2_b76090`.`promotions` 
												WHERE `fk_id_product` = `product`.`id_product`
												AND (SELECT CURDATE() >= `dateStart`)
												AND (SELECT CURDATE() <= `dateEnd`)
											) ;
END$$
DELIMITER ;

CALL getDiscountClient('MarioCliente');


SELECT `promotions`.`fk_id_product`,
    `promotions`.`discount`,
    `promotions`.`dateStart`,
    `promotions`.`dateEnd`
FROM `if4001_proyecto2_b76090`.`promotions`;




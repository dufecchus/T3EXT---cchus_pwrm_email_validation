CREATE TABLE tx_powermail_domain_model_field (
	validate_twice tinyint(4) unsigned DEFAULT '0' NOT NULL,
	validate_twice_label varchar(255) DEFAULT '' NOT NULL,
	validate_twice_error varchar(255) DEFAULT '' NOT NULL,
	validate_placeholder varchar(255) DEFAULT '' NOT NULL
);
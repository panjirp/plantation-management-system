DROP TABLE IF EXISTS `master_afdeling`;
CREATE TABLE IF NOT EXISTS `master_afdeling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` varchar(11) NULL,
  `created_by` int(11) NOT NULL,
  `date_time_created` DATETIME NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_time_modified` DATETIME NOT NULL DEFAULT '2000-01-01 00:00:00',
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `master_planting_year`;
CREATE TABLE IF NOT EXISTS `master_planting_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `afdeling_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(11) NULL,
  `created_by` int(11) NOT NULL,
  `date_time_created` DATETIME NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_time_modified` DATETIME NOT NULL DEFAULT '2000-01-01 00:00:00',
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `master_block`;
CREATE TABLE IF NOT EXISTS `master_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `planting_year_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(11) NULL,
  `created_by` int(11) NOT NULL,
  `date_time_created` DATETIME NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_time_modified` DATETIME NOT NULL DEFAULT '2000-01-01 00:00:00',
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `master_tph`;
CREATE TABLE IF NOT EXISTS `master_tph` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `block_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(11) NULL,
  `created_by` int(11) NOT NULL,
  `date_time_created` DATETIME NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_time_modified` DATETIME NOT NULL DEFAULT '2000-01-01 00:00:00',
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `master_worker_group`;
CREATE TABLE IF NOT EXISTS `master_worker_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `afdeling_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(11) NULL,
  `created_by` int(11) NOT NULL,
  `date_time_created` DATETIME NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_time_modified` DATETIME NOT NULL DEFAULT '2000-01-01 00:00:00',
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `master_worker_role`;
CREATE TABLE IF NOT EXISTS `master_worker_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` varchar(11) NULL,
  `created_by` int(11) NOT NULL,
  `date_time_created` DATETIME NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_time_modified` DATETIME NOT NULL DEFAULT '2000-01-01 00:00:00',
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `master_worker`;
CREATE TABLE IF NOT EXISTS `master_worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` varchar(11) NULL,
  `created_by` int(11) NOT NULL,
  `date_time_created` DATETIME NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_time_modified` DATETIME NOT NULL DEFAULT '2000-01-01 00:00:00',
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `master_worker_in_group`;
CREATE TABLE IF NOT EXISTS `master_worker_in_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_worker_group_id` int(11) NOT NULL,
  `master_worker_id` int(11) NOT NULL,
  `master_worker_role_id` int(11) NOT NULL,
  `status` varchar(11) NULL,
  `created_by` int(11) NOT NULL,
  `date_time_created` DATETIME NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_time_modified` DATETIME NOT NULL DEFAULT '2000-01-01 00:00:00',
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `harvesting_history`;
CREATE TABLE IF NOT EXISTS `harvesting_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `harvesting_date` DATE NOT NULL,
  `afdeling_id` int(11) NOT NULL,
  `planting_year_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `tph_id` int(11) NOT NULL,
  `worker_group_id` int(11) NOT NULL,
  `mandor_id` int(11) NOT NULL,
  `pemanen_id` int(11) NOT NULL,
  `pembrondol_id` int(11) NOT NULL,
  `tbs_dipanen` int(11) NOT NULL,
  `mentah` int(11) NOT NULL,
  `kurang_matang` int(11) NOT NULL,
  `terlalu_matang` int(11) NOT NULL,
  `kosong` int(11) NOT NULL,
  `busuk` int(11) NOT NULL,
  `brondolan` int(11) NOT NULL,
  `catatan` TEXT NOT NULL,
  `coordinate` point NOT NULL,
  `status` varchar(11) NULL,
  `created_by` int(11) NOT NULL,
  `date_time_created` DATETIME NOT NULL,
  `modified_by` int(11) NOT NULL,
  `date_time_modified` DATETIME NOT NULL DEFAULT '2000-01-01 00:00:00',
  PRIMARY KEY (`id`)
);
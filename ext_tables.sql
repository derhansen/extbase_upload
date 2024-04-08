#
# Table structure for table 'tx_extbaseupload_domain_model_singlefile'
#
CREATE TABLE tx_extbaseupload_domain_model_singlefile (
	title varchar(255) DEFAULT '' NOT NULL,
	file int(11) DEFAULT '0' NOT NULL,
	inlinetest int(11) DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_extbaseupload_domain_model_multifile'
#
CREATE TABLE tx_extbaseupload_domain_model_multifile (
	title varchar(255) DEFAULT '' NOT NULL,
	files int(11) DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_extbaseupload_domain_model_multiplefiles'
#
CREATE TABLE tx_extbaseupload_domain_model_multiplefiles (
	title varchar(255) DEFAULT '' NOT NULL,
	file1 int(11) DEFAULT '0' NOT NULL,
	file2 int(11) DEFAULT '0' NOT NULL,
	file3 int(11) DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_extbaseupload_domain_model_inlinetest'
#
CREATE TABLE tx_extbaseupload_domain_model_inlinetest (
	title varchar(255) DEFAULT '' NOT NULL,
	singlefiles int(11) DEFAULT '0' NOT NULL,
	singlefile int(11) DEFAULT '0' NOT NULL,
);

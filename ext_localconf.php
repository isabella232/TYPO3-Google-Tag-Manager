<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Tracking',
	array(
		'Tracking' => 'index',
		'Tracking' => 'values'
	),
	array(
		'Tracking' => ''
	)
);
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'DataLayer',
	array(
		'DataLayer' => 'index'
	)
);


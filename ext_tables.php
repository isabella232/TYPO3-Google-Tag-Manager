<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Google Tag Manager');
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Tracking',
	'Google Tag Manager'
);
?>
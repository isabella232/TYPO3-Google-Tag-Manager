<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Aoe.' . $_EXTKEY,
    'Tracking',
    array(
        'Tracking' => 'index,values'
    ),
    array(
        'Tracking' => ''
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Aoe.' . $_EXTKEY,
    'DataLayer',
    array(
        'DataLayer' => 'index'
    )
);

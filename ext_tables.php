<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Google Tag Manager');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Aoe.' . $_EXTKEY,
    'DataLayer',
    'Google Tag Manager DataLayer'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['googletagmanager_datalayer'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['googletagmanager_datalayer'] = 'pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'googletagmanager_datalayer',
    'FILE:EXT:google_tag_manager/Configuration/FlexForms/datalayer.xml'
);

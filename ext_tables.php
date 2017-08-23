<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$iconRegistry = null;
if (class_exists(\TYPO3\CMS\Core\Imaging\IconRegistry::class)) {
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
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

if ($iconRegistry) {
    $iconRegistry->registerIcon(
        'tx-google-tag-manager',
        \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        ['source' => 'EXT:' . $_EXTKEY . '/Resources/Public/Images/Backend/GoogleTagManager.gif']
    );
}

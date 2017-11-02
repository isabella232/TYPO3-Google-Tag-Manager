<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

if (class_exists(\TYPO3\CMS\Core\Imaging\IconRegistry::class)) {
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'tx-google-tag-manager',
        \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        ['source' => 'EXT:google_tag_manager/Resources/Public/Images/Backend/GoogleTagManager.gif']
    );
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Aoe.google_tag_manager',
    'DataLayer',
    'Google Tag Manager DataLayer'
);

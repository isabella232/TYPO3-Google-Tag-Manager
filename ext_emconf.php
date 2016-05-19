<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "google_tag_manager".
 *
 * Auto generated 28-02-2013 11:05
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Google Tag Manager',
    'description' => 'Create a interface for Google Tag Manager',
    'category' => 'plugin',
    'author' => 'Axel Jung',
    'author_email' => 'axel.jung@aoe.com',
    'author_company' => 'AOE GmbH',
    'shy' => '',
    'dependencies' => 'cms,extbase,fluid',
    'conflicts' => '',
    'priority' => '',
    'module' => '',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => 0,
    'createDirs' => '',
    'modify_tables' => '',
    'clearCacheOnLoad' => 0,
    'lockType' => '',
    'version' => '1.0.7',
    'constraints' => array(
        'depends' => array(
            'cms' => '',
            'typo3' => '6.2.0-6.2.99',
            'php' => '5.5.0-0.0.0',
            'extbase' => '1.3.0',
            'fluid' => '1.3.0',
        ),
        'conflicts' => array(),
        'suggests' => array(),
    ),
    '_md5_values_when_last_written' => 'a:10:{s:12:"ext_icon.gif";s:4:"4461";s:17:"ext_localconf.php";s:4:"3236";s:14:"ext_tables.php";s:4:"7404";s:41:"Classes/Controller/TrackingController.php";s:4:"2884";s:43:"Classes/ViewHelpers/DataLayerViewHelper.php";s:4:"050a";s:38:"Configuration/TypoScript/constants.txt";s:4:"8dd3";s:34:"Configuration/TypoScript/setup.txt";s:4:"c5db";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"fb79";s:47:"Resources/Private/Templates/Tracking/Index.html";s:4:"7666";s:14:"doc/manual.sxw";s:4:"e645";}',
    'suggests' => array(),
);

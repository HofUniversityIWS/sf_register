<?php

/** @noinspection PhpUndefinedVariableInspection */
$EM_CONF[$_EXTKEY] = array(
    'title' => 'Frontend User Registration',
    'description' => 'Offers the possibility to maintain the fe_user data in frontend by the user self.',
    'category' => 'plugin',
    'shy' => 0,
    'version' => '7.6.0',
    'dependencies' => 'extbase,fluid',
    'conflicts' => '',
    'priority' => 'bottom',
    'loadOrder' => '',
    'module' => '',
    'state' => 'beta',
    'uploadfolder' => 0,
    'createDirs' => 'typo3temp/sf_register',
    'modify_tables' => 'fe_users',
    'clearcacheonload' => 1,
    'lockType' => '',
    'author' => 'Sebastian Fischer',
    'author_email' => 'typo3@evoweb.de',
    'author_company' => 'evoweb',
    'CGLcompliance' => '',
    'CGLcompliance_note' => '',
    'constraints' => array(
        'depends' => array(
            'typo3' => '7.6.0-8.7.99',
        ),
        'conflicts' => array(),
        'suggests' => array(),
    ),
    'suggests' => array(),
);

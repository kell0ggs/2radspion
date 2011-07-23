<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Zweiradspion',
	array(
		'Fahrrad' => 'list, show, new, create, edit, update, delete, contact',
		
	),
	array(
		'Fahrrad' => 'create, update, delete',
		
	)
);

?>
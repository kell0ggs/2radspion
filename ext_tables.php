<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Zweiradspion',
	'2radspion'
);

//$pluginSignature = str_replace('_','',$_EXTKEY) . '_' . zweiradspion;
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' .zweiradspion. '.xml');






t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', '2radspion');


t3lib_extMgm::addLLrefForTCAdescr('tx_zweiradspion_domain_model_fahrrad', 'EXT:zweiradspion/Resources/Private/Language/locallang_csh_tx_zweiradspion_domain_model_fahrrad.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_zweiradspion_domain_model_fahrrad');
$TCA['tx_zweiradspion_domain_model_fahrrad'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:zweiradspion/Resources/Private/Language/locallang_db.xml:tx_zweiradspion_domain_model_fahrrad',
		'label' => 'hersteller',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'dividers2tabs' => true,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Fahrrad.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_zweiradspion_domain_model_fahrrad.gif'
	),
);

?>
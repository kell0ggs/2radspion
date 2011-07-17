<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 3 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/


/**
 * Controller for the Fahrrad object
 */
class Tx_Zweiradspion_Controller_FahrradController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * fahrradRepository
	 *
	 * @var Tx_Zweiradspion_Domain_Repository_FahrradRepository
	 */
	protected $fahrradRepository;

	/**
	 * fahrradRepository
	 *
	 * @var Tx_Zweiradspion_Service_AccessControlService
	 */
	protected $accessControllService;

	/**
	 * injectFahrradRepository
	 *
	 * @param Tx_Zweiradspion_Domain_Repository_FahrradRepository $fahrradRepository
	 * @return void
	 */
	public function injectFahrradRepository(Tx_Zweiradspion_Domain_Repository_FahrradRepository $fahrradRepository) {
		$this->fahrradRepository = $fahrradRepository;
	}

	/**
	 * injectAccessControlService
	 *
	 * @param Tx_Zweiradspion_Service_AccessControlService $accessControllService
	 * @return void
	 */
	public function injectAccessControlService(Tx_Zweiradspion_Service_AccessControlService $accessControllService) {
		$this->accessControllService = $accessControllService;
	}

	/**
	 * Displays all Fahrrads
	 *
	 * @return void
	 */
	public function listAction() {
		$configuration = $this->configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		if(empty($configuration['persistence']['storagePid'])){
			$this->flashMessageContainer->add('No storagePid! You have to include the static template of this extension and set the constant plugin.tx_' . t3lib_div::lcfirst($this->extensionName) . '.persistence.storagePid in the constant editor');
		}
		$fahrrads = $this->fahrradRepository->findAll();
		$this->view->assign('fahrrads', $fahrrads);
	}

	/**
	 * Displays a single Fahrrad
	 *
	 * @param Tx_Zweiradspion_Domain_Model_Fahrrad $fahrrad the Fahrrad to display
	 * @return string The rendered view
	 */
	public function showAction(Tx_Zweiradspion_Domain_Model_Fahrrad $fahrrad) {
		$this->view->assign('fahrrad', $fahrrad);
	}

	/**
	 * Displays a form for creating a new  Fahrrad
	 *
	 * @param Tx_Zweiradspion_Domain_Model_Fahrrad $newFahrrad a fresh Fahrrad object which has not yet been added to the repository
	 * @return void
	 * @dontvalidate $newFahrrad
	 */
	public function newAction(Tx_Zweiradspion_Domain_Model_Fahrrad $newFahrrad = NULL) {
		
		$this->view->assign('newFahrrad', $newFahrrad);
	}

	/**
	 * Creates a new Fahrrad and forwards to the list action.
	 *
	 * @param Tx_Zweiradspion_Domain_Model_Fahrrad $newFahrrad a fresh Fahrrad object which has not yet been added to the repository
	 * @return void
	 */
	public function createAction(Tx_Zweiradspion_Domain_Model_Fahrrad $newFahrrad) {
                $newFahrrad->setAdministrator($this->accessControllService->getFrontendUserUid());
		
		#if(!empty($_FILES)){
		#	$this->flashMessageContainer->add('File upload is not yet supported by the Persistence Manager. You have to implement it yourself.');
		#}
		if ($_FILES['tx_zweiradspion_zweiradspion']) {
			$basicFileFunctions = t3lib_div::makeInstance('t3lib_basicFileFunctions');
			$fileName = $basicFileFunctions->getUniqueName(
				$_FILES['tx_zweiradspion_zweiradspion']['name']['newFahrrad']['bild'],
				t3lib_div::getFileAbsFileName('uploads/tx_zweiradspion/'));
 
			t3lib_div::upload_copy_move(
                                $_FILES['tx_zweiradspion_zweiradspion']['tmp_name']['newFahrrad']['bild'],
                                $fileName);
 			

			$newFahrrad->setBild(basename($fileName));
			 
		}		
		
		$this->fahrradRepository->add($newFahrrad);
		$this->flashMessageContainer->add('Your new Fahrrad was created.');
		$this->redirect('list');
	}

	/**
	 * Displays a form for editing an existing Fahrrad
	 *
	 * @param Tx_Zweiradspion_Domain_Model_Fahrrad $fahrrad the Fahrrad to display
	 * @return string A form to edit a Fahrrad
	 */
	public function editAction(Tx_Zweiradspion_Domain_Model_Fahrrad $fahrrad) {
		$this->view->assign('fahrrad', $fahrrad);
	}

	/**
	 * Updates an existing Fahrrad and forwards to the list action afterwards.
	 *
	 * @param Tx_Zweiradspion_Domain_Model_Fahrrad $fahrrad the Fahrrad to display
	 * @return
	 */
	public function updateAction(Tx_Zweiradspion_Domain_Model_Fahrrad $fahrrad) {
            $bildTemp = $fahrrad->getBild();
            #return '<pre>'.print_r($_FILES['tx_zweiradspion_zweiradspion']['name']['fahrrad']['bild']).'</pre>';
		if ($_FILES['tx_zweiradspion_zweiradspion']['name']['fahrrad']['bild']) {
			$basicFileFunctions = t3lib_div::makeInstance('t3lib_basicFileFunctions');
			$fileName = $basicFileFunctions->getUniqueName(
				$_FILES['tx_zweiradspion_zweiradspion']['name']['fahrrad']['bild'],
				t3lib_div::getFileAbsFileName('uploads/tx_zweiradspion/'));
			t3lib_div::upload_copy_move(
                                $_FILES['tx_zweiradspion_zweiradspion']['tmp_name']['fahrrad']['bild'],
                                $fileName);


			$fahrrad->setBild(basename($fileName));

		}  else {
                    $fahrrad->setBild($bildTemp);
                }
		$this->fahrradRepository->update($fahrrad);
		$this->flashMessageContainer->add('Your Fahrrad was updated.');
		$this->redirect('list');
	}

	/**
	 * Deletes an existing Fahrrad
	 *
	 * @param Tx_Zweiradspion_Domain_Model_Fahrrad $fahrrad the Fahrrad to be deleted
	 * @return void
	 */
	public function deleteAction(Tx_Zweiradspion_Domain_Model_Fahrrad $fahrrad) {
		$this->fahrradRepository->remove($fahrrad);
		$this->flashMessageContainer->add('Your Fahrrad was removed.');
		$this->redirect('list');
	}

}
?>
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
 * Fahrrad
 */
 class Tx_Zweiradspion_Domain_Model_Fahrrad extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * hersteller
	 *
	 * @var string $hersteller
	 * @validate NotEmpty
	 */
	protected $hersteller;

	/**
	 * name
	 *
	 * @var string $name
	 * @validate NotEmpty
	 */
	protected $name;

	/**
	 * preis
	 *
	 * @var float $preis
	 * @validate NotEmpty
	 */
	protected $preis;

	/**
	 * bild
	 *
	 * @var string $bild
	 */
	protected $bild;

	/**
	 * administratorId
	 *
	 * @var integer $administratorId
	 */
	protected $administratorId;

	/**
	 * @var Tx_Zweiradspion_Domain_Model_Administrator The administrator of the organization.
	 * @lazy
	 **/
	protected $administrator;

	/**
	 * Sets the hersteller
	 *
	 * @param string $hersteller
	 * @return void
	 */
	public function setHersteller($hersteller) {
		$this->hersteller = $hersteller;
	}

	/**
	 * Returns the hersteller
	 *
	 * @return string
	 */
	public function getHersteller() {
		return $this->hersteller;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the preis
	 *
	 * @param float $preis
	 * @return void
	 */
	public function setPreis($preis) {
		$this->preis = $preis;
	}

	/**
	 * Returns the preis
	 *
	 * @return float
	 */
	public function getPreis() {
		return $this->preis;
	}

	/**
	 * Sets the bild
	 *
	 * @param string $bild
	 * @return void
	 */
	public function setBild($bild) {
		$this->bild = $bild;
	}

	/**
	 * Returns the bild
	 *
	 * @return string
	 */
	public function getBild() {
		return $this->bild;
	}

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

	}

	/**
	 * Returns the administratorId
	 *
	 * @return integer $administratorIdId
	 */
	public function getAdministratorId() {
		return $this->administratorId;
	}

	/**
	 * Sets the administratorId
	 *
	 * @param integer $administratorIdId
	 * @return void
	 */
	public function setAdministratorId($administratorId) {
		$this->administratorId = $administratorId;
	}

}
?>
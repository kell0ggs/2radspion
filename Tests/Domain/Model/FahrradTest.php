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
*  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_Zweiradspion_Domain_Model_Fahrrad.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage 2radspion
 *
 */
class Tx_Zweiradspion_Domain_Model_FahrradTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Zweiradspion_Domain_Model_Fahrrad
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Zweiradspion_Domain_Model_Fahrrad();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getHerstellerReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setHerstellerForStringSetsHersteller() { 
		$this->fixture->setHersteller('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getHersteller()
		);
	}
	
	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNameForStringSetsName() { 
		$this->fixture->setName('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getName()
		);
	}
	
	/**
	 * @test
	 */
	public function getPreisReturnsInitialValueForFloat() { 
		$this->assertSame(
			0.0,
			$this->fixture->getPreis()
		);
	}

	/**
	 * @test
	 */
	public function setPreisForFloatSetsPreis() { 
		$this->fixture->setPreis(3.14159265);

		$this->assertSame(
			3.14159265,
			$this->fixture->getPreis()
		);
	}
	
	/**
	 * @test
	 */
	public function getBildReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setBildForStringSetsBild() { 
		$this->fixture->setBild('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getBild()
		);
	}
	
	/**
	 * @test
	 */
	public function getAdministratorReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getAdministrator()
		);
	}

	/**
	 * @test
	 */
	public function setAdministratorForIntegerSetsAdministrator() { 
		$this->fixture->setAdministrator(12);

		$this->assertSame(
			12,
			$this->fixture->getAdministrator()
		);
	}
	
}
?>
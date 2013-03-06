<?php

require_once dirname(__FILE__).'/../../../Classes/Domain/Model/DataLayerRegistry.php';
require_once dirname(__FILE__).'/../../../Tests/AbstractTestcase.php';
/**
 * Tx_GoogleTagManager_Domain_Model_DataLayerRegistry test case.
 */
class Tx_GoogleTagManager_Domain_Model_DataLayerRegistryTest extends Tx_GoogleTagManager_Tests_AbstractTestcase {
	
	/**
	 * @var Tx_GoogleTagManager_Domain_Model_DataLayerRegistry
	 */
	private $dataLayerRegistry;
	/**
	 * (non-PHPdoc)
	 * @see PHPUnit_Framework_TestCase::setUp()
	 */
	protected function setUp() {
		$this->dataLayerRegistry = new Tx_GoogleTagManager_Domain_Model_DataLayerRegistry();
	
	}
	/**
	 * (non-PHPdoc)
	 * @see PHPUnit_Framework_TestCase::tearDown()
	 */
	protected function tearDown() {
		$this->dataLayerRegistry = null;
		
	}
	/**
	 * Tests Tx_GoogleTagManager_Domain_Model_DataLayerRegistry->addVar()
	 * @test
	 */
	public function addVar() {
		$this->dataLayerRegistry->addVar('test','abc');
	
	}
	/**
	 * Tests Tx_GoogleTagManager_Domain_Model_DataLayerRegistry->getJSVariables()
	 * @test
	 */
	public function getJSVariables() {
		$this->dataLayerRegistry->addVar('test','abc');
		$js = $this->dataLayerRegistry->getJSVariables();
		$this->assertContains('dataLayer',$js);
		$this->assertContains('test',$js);
		$this->assertContains('abc',$js);
	}

}


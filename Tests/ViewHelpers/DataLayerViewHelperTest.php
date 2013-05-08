<?php

require_once dirname(__FILE__) . '/../../Tests/AbstractTestcase.php';

/**
 * Tx_GoogleTagManager_ViewHelpers_DataLayerViewHelper test case.
 */
class Tx_GoogleTagManager_ViewHelpers_DataLayerViewHelperTest extends Tx_GoogleTagManager_Tests_AbstractTestcase {

	/**
	 * @var Tx_GoogleTagManager_ViewHelpers_DataLayerViewHelper
	 */
	private $viewHelper;

	/**
	 * @var string
	 */
	private $varName = 'varName';

	/**
	 * (non-PHPdoc)
	 * @see PHPUnit_Framework_TestCase::setUp()
	 */
	protected function setUp() {
		$this->viewHelper = new Tx_GoogleTagManager_ViewHelpers_DataLayerViewHelper();

	}
	/**
	 * (non-PHPdoc)
	 * @see PHPUnit_Framework_TestCase::tearDown()
	 */
	protected function tearDown() {
		$this->viewHelper = NULL;

	}

	/**
	 * @return array
	 */
	public function allDataProvider() {
		$sampleObject = new stdClass();
		$sampleObject->foo = 1;
		$sampleObject->bar = 'baz';
		return array(
			array(TRUE, $this->createJsCode('true')), // boolean
			array(FALSE, $this->createJsCode('false')), // boolean
			array(1, $this->createJsCode(1)), // integer
			array(0.995, $this->createJsCode(0.995)), // float
			array('foo', $this->createJsCode('\'foo\'')), // string
			array(array('foo','bar'), $this->createJsCode('["foo","bar"]')), // array
			array($sampleObject, $this->createJsCode('{"foo":1,"bar":"baz"}')) // object
		);
	}

	/**
	 * @test
	 * @dataProvider allDataProvider
	 */
	public function render($value, $expected) {
		$this->assertEquals($expected, $this->viewHelper->render($this->varName, $value));
	}

	/**
	 * @param string $name
	 * @param mixed $value
	 * @return string
	 */
	private function createJsCode($value) {
		return 'dataLayer.push({\'' . $this->varName . '\': ' . $value . '});' . PHP_EOL;
	}
}

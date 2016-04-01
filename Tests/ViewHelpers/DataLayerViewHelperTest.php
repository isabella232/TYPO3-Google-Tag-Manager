<?php
namespace Aoe\GoogleTagManager\ViewHelpers;

use TYPO3\CMS\Core\Tests\BaseTestCase;

class Tx_GoogleTagManager_ViewHelpers_DataLayerViewHelperTest extends BaseTestCase
{

    /**
     * @var DataLayerViewHelper
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
    protected function setUp()
    {
        $this->viewHelper = new DataLayerViewHelper();
    }

    /**
     * (non-PHPdoc)
     * @see PHPUnit_Framework_TestCase::tearDown()
     */
    protected function tearDown()
    {
        $this->viewHelper = null;
    }

    /**
     * @return array
     */
    public function allDataProvider()
    {
        $sampleObject = new \stdClass();
        $sampleObject->foo = 1;
        $sampleObject->bar = 'baz';
        return array(
            array(true, $this->createJsCode('true')), // boolean
            array(false, $this->createJsCode('false')), // boolean
            array(1, $this->createJsCode(1)), // integer
            array(0.995, $this->createJsCode(0.995)), // float
            array('foo', $this->createJsCode('\'foo\'')), // string
            array(array('foo', 'bar'), $this->createJsCode('["foo","bar"]')), // array
            array($sampleObject, $this->createJsCode('{"foo":1,"bar":"baz"}')) // object
        );
    }

    /**
     * @test
     * @dataProvider allDataProvider
     * @param mixed $value
     * @param mixed $expected
     */
    public function render($value, $expected)
    {
        $this->assertEquals($expected, $this->viewHelper->render($this->varName, $value));
    }

    /**
     * @test
     */
    public function renderWithNullValue()
    {
        $this->assertEquals('', $this->viewHelper->render('foo', null));
    }

    /**
     * @param mixed $value
     * @return string
     */
    private function createJsCode($value)
    {
        return 'dataLayer.push({\'' . $this->varName . '\': ' . $value . '});' . PHP_EOL;
    }
}

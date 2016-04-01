<?php
namespace Aoe\GoogleTagManager\Model;

use Aoe\GoogleTagManager\Service\VariableProviderInterface;
use Aoe\GoogleTagManager\ViewHelpers\DataLayerViewHelper;
use TYPO3\CMS\Core\Tests\BaseTestCase;
use TYPO3\CMS\Extbase\Object\ObjectManager;

class DataLayerRegistryTest extends BaseTestCase implements VariableProviderInterface
{
    /**
     * @var DataLayerRegistry
     */
    private $dataLayerRegistry;

    /**
     * (non-PHPdoc)
     * @see PHPUnit_Framework_TestCase::setUp()
     */
    protected function setUp()
    {
        $this->dataLayerRegistry = new DataLayerRegistry(new ObjectManager());
    }

    /**
     * (non-PHPdoc)
     * @see PHPUnit_Framework_TestCase::tearDown()
     */
    protected function tearDown()
    {
        $this->dataLayerRegistry = null;
    }

    /**
     * @test
     */
    public function shouldAddVar()
    {
        $this->dataLayerRegistry->addVar('test', 'abc');
        $vars = $this->dataLayerRegistry->getVars();
        $this->assertArrayHasKey('test', $vars);
        $this->assertEquals('abc', $vars['test']);
    }

    /**
     * @test
     */
    public function getJSVariables()
    {
        $this->dataLayerRegistry->addVar('test', 'abc');
        $js = $this->dataLayerRegistry->getJSVariables();
        $this->assertContains('dataLayer', $js);
        $this->assertContains('test', $js);
        $this->assertContains('abc', $js);
    }

    /**
     * @test
     */
    public function shouldAddVarsFromHooks()
    {
        $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['google_tag_manager']['variableProviders']['test'] = self::class;
        $vars = $this->dataLayerRegistry->getVars();
        $this->assertArrayHasKey('foo', $vars);
        $this->assertEquals('bar', $vars['foo']);
        unset($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['google_tag_manager']['variableProviders']['test']);
    }

    /**
     * @test
     * @expectedException \RuntimeException
     * @expectedExceptionCode 1459503274
     */
    public function shouldThrowExceptionIfHookClassNotExists()
    {
        $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['google_tag_manager']['variableProviders']['test'] = 'foo';
        $this->dataLayerRegistry->getVars();
    }

    /**
     * @test
     * @expectedException \RuntimeException
     * @expectedExceptionCode 1459503275
     */
    public function shouldThrowExceptionIfHookClassDoesNotImplementInterface()
    {
        $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['google_tag_manager']['variableProviders']['test'] = DataLayerViewHelper::class;
        $this->dataLayerRegistry->getVars();
    }

    /**
     * @return array
     */
    public function getVariables()
    {
        return array('foo' => 'bar');
    }
}

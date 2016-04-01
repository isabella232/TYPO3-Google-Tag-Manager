<?php
namespace Aoe\GoogleTagManager\Model;

use Aoe\GoogleTagManager\Service\VariableProviderInterface;
use Aoe\GoogleTagManager\ViewHelpers\DataLayerViewHelper;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;

class DataLayerRegistry implements SingletonInterface
{
    /**
     * @var array
     */
    private $vars = array();

    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * @param ObjectManagerInterface $objectManager
     */
    public function __construct(ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function addVar($name, $value)
    {
        $this->vars[$name] = $value;
    }

    /**
     * @return array
     */
    public function getVars()
    {
        return array_merge($this->vars, $this->getVarsFromHooks());
    }

    /**
     * clear values
     */
    public function clear()
    {
        $this->vars = array();
    }

    /**
     * @return string
     */
    public function getJSVariables()
    {
        $dataLayerViewHelper = new DataLayerViewHelper();
        $js = '';
        foreach ($this->vars as $name => $value) {
            $js .= $dataLayerViewHelper->render($name, $value);
        }
        return $js;
    }

    /**
     * @return array
     */
    private function getVarsFromHooks()
    {
        $vars = array();
        if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['google_tag_manager']['variableProviders'])) {
            foreach ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['google_tag_manager']['variableProviders'] as $class) {
                if (!class_exists($class)) {
                    throw new \RuntimeException(
                        'Registered hook class "' . $class . '" for Google Tag Manager variable provider does not exist.',
                        1459503274
                    );
                }
                /** @var VariableProviderInterface $variableProvider */
                $variableProvider = $this->objectManager->get($class);
                if (!$variableProvider instanceof VariableProviderInterface) {
                    throw new \RuntimeException(
                        'Hook "' . $class . '" for Google Tag Manager variable provider does not implement VariableProviderInterface.',
                        1459503275
                    );
                }
                $vars = array_merge($vars, $variableProvider->getVariables());
            }
        }
        return $vars;
    }
}
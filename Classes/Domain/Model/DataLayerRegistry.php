<?php
require_once dirname(__FILE__).'/../../ViewHelpers/DataLayerViewHelper.php';
require_once PATH_t3lib . 'interfaces/interface.t3lib_singleton.php';
/**
 * Data Layer Container
 * @package GoogleTagManager
 */
class Tx_GoogleTagManager_Domain_Model_DataLayerRegistry implements t3lib_Singleton {
	/**
	 * @var array
	 */
	private $vars = array();
	/**
	 * @param string $name
	 * @param string $value
	 */
	public function addVar($name,$value){
		$this->vars[$name] = $value;
	}
	/**
	 * @return string
	 */
	public function getJSVariables(){
		$dataLayerViewHelper = new Tx_GoogleTagManager_ViewHelpers_DataLayerViewHelper();
		$js = '';
		foreach ($this->vars as $name => $value){
			$js .= $dataLayerViewHelper->render($name,$value);
		}
		return $js;
	}
}
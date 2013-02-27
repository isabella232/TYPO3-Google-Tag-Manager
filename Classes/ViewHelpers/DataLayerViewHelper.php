<?php
/**
 * Render a datelayer push js Code
 * @package GoogleTagManager
 */
class Tx_GoogleTagManager_ViewHelpers_DataLayerViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
	 * @param string $name
	 * @param string $value
	 * @return string
	 */
	public function render($name,$value) {
		return 'dataLayer.push({\''.$name.'\': \''.$value.'\'});'.PHP_EOL;
	}
}
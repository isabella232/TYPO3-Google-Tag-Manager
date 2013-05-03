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
		if (is_array($value)){
			return 'dataLayer.push({\''.$name.'\': '.json_encode($value).'});'.PHP_EOL;
		} else {
			return 'dataLayer.push({\''.$name.'\': \''.$value.'\'});'.PHP_EOL;
		}
	}
}
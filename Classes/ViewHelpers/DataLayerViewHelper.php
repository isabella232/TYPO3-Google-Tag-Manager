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
		if ($value === NULL) {
			return '';
		}
		if (is_array($value) || is_object($value)){
			return 'dataLayer.push({\''.$name.'\': '.json_encode($value).'});'.PHP_EOL;
		}
		if (is_string($value)) {
			return 'dataLayer.push({\'' . $name . '\': \'' . $value . '\'});' . PHP_EOL;
		}
		if (is_bool($value)) {
			$val = 'false';
			if ($value) {
				$val = 'true';
			}
			return 'dataLayer.push({\'' . $name . '\': ' . $val . '});' . PHP_EOL;
		}
		return 'dataLayer.push({\'' . $name . '\': ' . $value . '});' . PHP_EOL;
	}
}
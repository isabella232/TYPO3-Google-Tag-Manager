<?php
/**
 * Render Tracking Code for Google Tag Manager
 *
 */
class Tx_GoogleTagManager_Controller_DataLayerController extends Tx_Extbase_MVC_Controller_ActionController {
	/**
	 * index action add the datalayer vars
	 */
	public function indexAction() {
		$vars = array();
		if(isset($this->settings['datalayervars']) && is_array($this->settings['datalayervars'])){
			$vars = $this->settings['datalayervars'];
		}
		$this->view->assign('vars', $vars);
	}
}
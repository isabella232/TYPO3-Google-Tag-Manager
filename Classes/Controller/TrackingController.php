<?php
/**
 * Render Tracking Code for Google Tag Manager
 *
 */
class Tx_GoogleTagManager_Controller_TrackingController extends Tx_Extbase_MVC_Controller_ActionController {
	/**
	 * index action generate the base tag code
	 */
	public function indexAction() {
		if(!$this->settings['enable']){
			throw new Tx_Extbase_MVC_Exception_StopAction ();
		}
		$this->view->assign('tagManagerID', $this->settings['tagId']);
		$this->view->assign('dataLayerVersion', $this->settings['dataLayerVersion']);
	}
}
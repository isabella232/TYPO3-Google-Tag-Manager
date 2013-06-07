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
	/**
	 * generate the data layer values code
	 */
	public function valuesAction() {
		if(!$this->settings['enable']){
			throw new Tx_Extbase_MVC_Exception_StopAction ();
		}
		/** @var Tx_GoogleTagManager_Domain_Model_DataLayerRegistry $registry */
		$registry = t3lib_div::makeInstance('Tx_GoogleTagManager_Domain_Model_DataLayerRegistry');
		$this->view->assign('vars', $registry->getVars());
		$registry->clear();
	}
}
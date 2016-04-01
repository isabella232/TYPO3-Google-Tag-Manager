<?php
namespace Aoe\GoogleTagManager\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class DataLayerController extends ActionController
{
    /**
     * index action add the datalayer vars
     */
    public function indexAction()
    {
        $vars = array();
        if (isset($this->settings['datalayervars']) && is_array($this->settings['datalayervars'])) {
            $vars = $this->settings['datalayervars'];
        }
        $this->view->assign('vars', $vars);
    }
}

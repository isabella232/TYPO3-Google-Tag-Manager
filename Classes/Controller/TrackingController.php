<?php
namespace Aoe\GoogleTagManager\Controller;

use Aoe\GoogleTagManager\Model\DataLayerRegistry;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\Exception\StopActionException;

class TrackingController extends ActionController
{
    /**
     * index action generate the base tag code
     */
    public function indexAction()
    {
        if (!$this->settings['enable']) {
            throw new StopActionException();
        }
        $this->view->assign('tagManagerID', $this->settings['tagId']);
        $this->view->assign('dataLayerVersion', $this->settings['dataLayerVersion']);
    }

    /**
     * generate the data layer values code
     */
    public function valuesAction()
    {
        if (!$this->settings['enable']) {
            throw new StopActionException();
        }
        /** @var DataLayerRegistry $registry */
        $registry = $this->objectManager->get(DataLayerRegistry::class);
        $this->view->assign('vars', $registry->getVars());
        $registry->clear();
    }
}

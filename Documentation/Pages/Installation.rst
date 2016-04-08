.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


Installation
============

1. You can download the extension from the TYPO3 Extension Repository (TER).

2. Add the static template (Google Tag Manager) to your page tree template.

.. image:: /Images/UserManual/IncludeStaticTemplate.png

3. Configure the GTM (Google Tag Manager) ID with a TypoScript constant.

::

    const.tx_googletagmanager.settings.tagId = GTM-XXX

4. Optional: Define Data Layer Version with TypoScript

::

    const.tx_googletagmanager.settings.dataLayerVersion = 1

5. Include GTM in your page template:

Example::

    page{
        1 < plugin.tx_googletagmanagerdatalayer_init
        … main template
        999 < plugin.tx_googletagmanagerdatalayer
        3000 < plugin.tx_googletagmanager
    }


6. Test if GTM was loaded

You can check in the generated page source if the GTM works. You should see the dataLayer defined, the variables pushed
to the dataLayer and towards the end of the page the GTM code:

.. image:: /Images/UserManual/GTMCodeBottom.png

You can also check if GTM works as expected using the Google Chrome extension "Tag Assistant (by Google)".



Pushing variables in the Data Layer
-----------------------------------

There is a Fluid View Helper to push Data Layer Variables

Example::

    {namespace googletagmanager=Tx_GoogleTagManager_ViewHelpers}
    <googletagmanager:dataLayer name="tx_googletagmanager_dataLayerVersion" value="{dataLayerVersion}" /></script>


Disable Tag Manager
-------------------

You can disable the Tag Manager with TypoScript

::

    const.tx_googletagmanager.settings.enable = 0

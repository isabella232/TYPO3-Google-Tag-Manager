# add GTM plugin to the content wizard
mod.wizards.newContentElement.wizardItems.plugins.elements.googletagmanager_datalayer {
    iconIdentifier = tx-google-tag-manager
    title = Plugins : Google Tag Manager
    description = Google Tag Manager Data Layer
    tt_content_defValues {
        CType = list
        list_type = googletagmanager_datalayer
    }
}

# TODO: Remove 6.2 configuration after upgrade to TYPO3 7.6
[compatVersion = 7.6.0]
[else]
    mod.wizards.newContentElement.wizardItems.plugins.elements.googletagmanager_datalayer {
        icon = ../../../../typo3conf/ext/google_tag_manager/Resources/Public/Images/Backend/GoogleTagManager.gif
    }
[end]

mod.wizards.newContentElement.wizardItems.plugins.show := addToList( googletagmanager_datalayer )
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

mod.wizards.newContentElement.wizardItems.plugins.show := addToList( googletagmanager_datalayer )
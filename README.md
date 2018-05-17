cookie-notification
===================

A module that adds a notice to a page when first loaded.

- create a cookie notice to be displayed under settings
- paste any third-party scripts that you would like to place in the page head that requires user consent into the "Third Party Scripts" field under settings

Notice will be displayed on first load each session. Third-party script are injected after acceptance.

When including third-party scripts in the page head, surround it with an if statement checking for $cookiesAccepted

    <% if $cookiesAccepted %>
        $SiteConfig.ThridPartyScripts.RAW    
    <% end_if %>
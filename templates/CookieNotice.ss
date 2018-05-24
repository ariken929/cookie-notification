<section id="cookie-notification" class="compact" data-accept="$Link('acceptAll')" data-essential="$Link('acceptEssential')">
    <div class="close">x</div>
    <div class="cookie-notice">$CookieNotice</div>
    <div class="cookie-options">
        <div class="cookie-policy">
            $PrivacyPolicy
        </div>
        <div class="essential">
            <table>
                <% loop $EssentialCookies %>
                    <tr>
                        <th>$Title</th>
                        <th>$Description</th>
                    </tr>
                <% end_loop %>
            </table>
        </div>
        <% if $OptionalCookies %>
            <div class="optional">
                <table>
                    <% loop $OptionalCookies %>
                        <tr>
                            <th>$Title</th>
                            <th>$Description</th>
                        </tr>
                    <% end_loop %>
                </table>
            </div>
        <% end_if %>
    </div>
    <div class="actions">
        <div class="button options"><a href="#">Options</a></div>
        <div class="button accept-essential"><a href="#">Accept essential cookies only</a></div>
        <div class="button accept-all"><a href="#">Accept all cookies</a></div>
    </div>
</section>
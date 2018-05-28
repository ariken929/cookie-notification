<section id="cookie-notification" class="compact" data-accept="$Link('acceptAll')"
         data-essential="$Link('acceptEssential')">
    <div class="close"><i class="far fa-times-circle"></i></div>
    <div class="cookie-notice">$CookieNotice</div>
    <div class="cookie-options">
        <div class="options-nav">
            <div class="nav-item selected" data-toggle="privacy"><i class="fas fa-user-secret"></i>Your Privacy</div>
            <div class="nav-item" data-toggle="essential"><i class="fas fa-globe"></i>Essential Cookies</div>
            <div class="nav-item" data-toggle="optional"><i class="fas fa-chart-pie"></i>Optional Cookies</div>
        </div>
        <div class="options-content">
            <div class="content-item privacy selected">
                <div class="option-notice">
                    $PrivacyPolicy
                </div>
            </div>
            <% if $EssentialCookies %>
                <div class="content-item essential">
                    <div class="option-notice">
                        $EssentialNotice
                    </div>
                    <h3>Cookies Used</h3>
                    <ul class="cookie-list">
                        <% loop $EssentialCookies %>
                            <% if $Link %>
                                <li><a href="$Link" target="_blank">$Title</a></li>
                            <% else %>
                                <li <% if $Description %>class="tooltip"<% end_if %>>
                                    $Title
                                    <% if $Description %><span class="tooltiptext">$Description</span><% end_if %>
                                </li>
                            <% end_if %>
                        <% end_loop %>
                    </ul>
                </div>
            <% end_if %>
            <% if $OptionalCookies %>
                <div class="content-item optional">
                    <div class="option-notice">
                        $OptionalNotice
                    </div>
                    <h3>Cookies Used</h3>
                    <ul class="cookie-list">
                    <% loop $OptionalCookies %>
                        <% if $Link %>
                            <li><a href="$Link" target="_blank">$Title</a></li>
                        <% else %>
                            <li <% if $Description %>class="tooltip"<% end_if %>>
                                $Title
                                <% if $Description %><span class="tooltiptext">$Description</span><% end_if %>
                            </li>
                        <% end_if %>
                    <% end_loop %>
                    </ul>
                </div>
            <% end_if %>
        </div>
    </div>
    <div class="actions">
        <% if $OptionalCookies %>
            <div class="button options"><a href="#">Options</a></div>
        <% end_if %>
        <div class="button accept-essential"><a href="#">Accept essential cookies only</a></div>
        <div class="button accept-all"><a href="#">Accept all cookies</a></div>
    </div>
</section>
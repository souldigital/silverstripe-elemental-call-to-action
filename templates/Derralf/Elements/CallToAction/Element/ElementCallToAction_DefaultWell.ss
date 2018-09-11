
    <div class="well">
            <% if $ShowTitle %>
                <% include Derralf\\Elements\\CallToAction\\Title %>
            <% end_if %>

            <% if $HTML %>
                <div class="element__content">$HTML</div>
            <% end_if %>

            <% if $ReadMoreLink.LinkURL %>
                <div class="element__cta-btn-container">
                    <p><a href="$ReadMoreLink.LinkURL" class="{$ReadmoreLinkClass}" {$ReadMoreLink.TargetAttr} ><% if $ReadMoreLink.Title %>$ReadMoreLink.Title<% else %> mehr<% end_if %></a></p>
                </div>
            <% end_if %>
    </div>

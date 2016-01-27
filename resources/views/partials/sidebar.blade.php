<!-- Fixed navbar -->

<div class="navigation-sidebar navigation" style="display: none;">
    <ul id = "sidebar" class="col-md-2">
        <li @if (isset($log_drug)) class='active' @endif><a href="#" class="btn_subpage sidebarlink " parent-nav="logging" data-url="inventory/log-drug"><i class="glyphicon glyphicon-level-up"> </i> LOG A PRESCRIPTION    </a></li>
        <li @if (isset($log_broken)) class='active' @endif><a href="#" class="btn_subpage sidebarlink" parent-nav="logging" data-url="inventory/broken"><i class="glyphicon glyphicon-wrench"> </i> LOG BROKEN/EXPIRED PILL </a></li>
        <li @if (isset($check_script)) class='active' @endif><a href="#" class="btn_subpage sidebarlink" parent-nav="logging" data-url="inventory/check-script"><i class="glyphicon glyphicon-search"> </i> CHECK SCRIPT </a></li>
    <!--    <li><a href="#"> Support </a></li>-->
    </ul>
</div>

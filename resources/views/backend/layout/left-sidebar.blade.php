<?php $rut = request()->route();?>
<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li>
                    <a href="{{ route('admin.home') }}" title="Dashboard">
                        <i data-feather="airplay"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                @if (is_admin() || is_subadmin())
                <?php
                    $class_show = '';
                    $class_menuitem = '';
                    if($rut->named('admin.users.search') || $rut->named('admin.users.create') || $rut->named('admin.users.edit'))
                    {
                        $class_show = 'show';
                        $class_menuitem = 'menuitem-active';
                    }
                ;?>
                <li class="{{ $class_menuitem }}">
                    <a href="{{ route('admin.users.index') }}" title="Users">
                        <i data-feather="users"></i>
                        <span> Users </span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
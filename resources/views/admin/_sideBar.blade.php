<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
{{--            <li><a href={{route('menu')}}><i class="fa fa-clone"></i> Menu </a></li>--}}
            <li><a><i class="fa fa-clone"></i>Menu <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href={{route('menu')}}>View Menu</a></li>
                    <li><a href={{route('menuAdd')}}>Add Menu</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-clone"></i>Content <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href={{route('content')}}>View Content</a></li>
                    <li><a href={{route('contentAdd')}}>Add Content</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-clone"></i>Settings <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href={{route('settingEdit')}}>Edit Settings</a></li>
                </ul>
            </li>
        </ul>
    </div>


</div>

<!--begin::Sidebar Wrapper-->
<div class="sidebar-wrapper">
    <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
            class="nav sidebar-menu flex-column"
            data-lte-toggle="treeview"
            role="navigation"
            aria-label="Main navigation"
            data-accordion="false"
            id="navigation">
            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-person"></i>
                    <p>Пользователи</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-list"></i>
                    <p>Категории</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.tag.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-tags"></i>
                    <p>Теги</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.post.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-clipboard"></i>
                    <p>Посты</p>
                </a>
            </li>
        </ul>
        <!--end::Sidebar Menu-->
    </nav>
</div>
<!--end::Sidebar Wrapper-->
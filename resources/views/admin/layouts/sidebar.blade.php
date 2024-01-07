<nav
    id="sidebarMenu"
    class="collapse d-lg-block sidebar collapse"
>
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            <a
                href="{{ route('category.index') }}"
                class="list-group-item list-group-item-action py-2 ripple  {{(request()->segment(2) == 'category') ? 'active' : ''}}"
                aria-current="true"
            >
                <i class="fas fa-tachometer-alt fa-fw me-3"></i
                ><span>Category</span>
            </a>
            <a
                href="{{ route('blogs.index') }}"
                class="list-group-item list-group-item-action py-2 ripple  {{(request()->segment(2) == 'blog') ? 'active' : ''}}"
            >
                <i class="fas fa-chart-area fa-fw me-3"></i
                ><span>Blogs</span>
            </a>
        </div>
    </div>
</nav>



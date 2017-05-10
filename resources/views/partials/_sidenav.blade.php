<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand" style="color: silver;">Dashboard</li>
        <li>
            <a href="{{ route('admin.profile') }}">My Profile</a>
        </li>
        <li>
            <a href="{{ route('posts.index') }}">All Posts</a>
        </li>
        <li>
            <a href="{{ route('posts.create') }}">Compose New Post</a>
        </li>
        <li>
            <a href="{{ route('categories.index') }}">Categories</a>
        </li>
        <li>
            <a href="{{ route('tags.index') }}">Tags</a>
        </li>   
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>
        </li>
        
    </ul>
</div>
<!-- /#sidebar-wrapper -->
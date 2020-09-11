<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('images/admin/sidebar-1.jpg')}}">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a href="{{route('admin.index')}}" class="simple-text logo-normal">
        Admin Manager
    </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.index')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item " data-active="user">
                <a class="nav-link" href="{{route('admin.user.index')}}">
                    <i class="material-icons">person</i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item " data-active="campaign">
                <a class="nav-link" href="{{route('admin.campaign.index')}}">
                <i class="material-icons">payments</i>
                    <p>Campaigns</p>
                </a>
            </li>
            <li class="nav-item " data-active="difficult">
                <a class="nav-link" href="{{route('admin.difficult.index')}}">
                <i class="material-icons">person_pin</i>
                    <p>Difficult Situaltion</p>
                </a>
            </li>
            <li class="nav-item " data-active="post">
                <a class="nav-link" href="{{route('admin.post.index')}}">
                <i class="material-icons">pageview</i>
                    <p>Posts</p>
                </a>
            </li>
            <li class="nav-item " data-active="donate">
                <a class="nav-link" href="{{route('admin.donate')}}">
                <i class="material-icons">local_atm</i>
                    <p>Donate</p>
                </a>
            </li>
            <li class="nav-item " data-active="comment">
                <a class="nav-link" href="{{route('admin.comment')}}">
                    <i class="material-icons">speaker_notes</i>
                    <p>Comments</p>
                </a>
            </li>
            <li class="nav-item " data-active="category">
                <a class="nav-link" href="{{route('admin.category.index')}}">
                    <i class="material-icons">local_offer</i>
                    <p>Categories</p>
                </a>
            </li>
        </ul>
    </div>
</div>
    <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a class="link" href="{{ route('admin') }}">
                    <span class="brand">{{ _setting('site_title') }}
                    </span>
                    <span class="brand-mini">{{ _setting('site_title_sort_name') }}</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <!-- <li class="dropdown dropdown-inbox">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i>
                            <span class="badge badge-primary envelope-badge">9</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <li class="dropdown-menu-header">
                                <div>
                                    <span><strong>9 New</strong> Messages</span>
                                    <a class="pull-right" href="#">view all</a>
                                </div>
                            </li>
                            <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                                <div>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="{{ asset('backend/img/users/u1.jpg') }}" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"> </div>Jeanne Gonzalez<small class="text-muted float-right">Just now</small>
                                                <div class="font-13">Your proposal interested me.</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="{{ asset('backend/img/users/u2.jpg') }}" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"></div>Becky Brooks<small class="text-muted float-right">18 mins</small>
                                                <div class="font-13">Lorem Ipsum is simply.</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="{{ asset('backend/img/users/u3.jpg') }}" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"></div>Frank Cruz<small class="text-muted float-right">18 mins</small>
                                                <div class="font-13">Lorem Ipsum is simply.</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="{{ asset('backend/img/users/u4.jpg') }}" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"></div>Rose Pearson<small class="text-muted float-right">3 hrs</small>
                                                <div class="font-13">Lorem Ipsum is simply.</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li> -->
                    @php
                        $ary = _notificaiton();
                        $notifications = $ary['notifications'];
                        $count = 0;
                        if(!empty($ary['notifications_count'])){
                            $count = count($ary['notifications_count']);
                        }
                    @endphp
                    <li class="dropdown dropdown-notification">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o rel">
                                @if($count != 0)
                                    <span class="notify-signal"></span>
                                @endif
                            </i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <li class="dropdown-menu-header">
                                <div>
                                    <span>Notifications</span>
                                    <a class="pull-right" href="{{ route('admin.notification.list') }}">view all</a>
                                </div>
                            </li>
                            <li class="list-group list-group-divider scroller" data-height="240px" style="height: auto;" data-color="#71808f">
                                <div>
                                    @if(!empty($notifications) && $notifications != null)
                                        @foreach($notifications as $row)
                                            <a class="list-group-item clear_one_notification" data-id="{{ $row->id }}" data-url="{{ $row->link }}">
                                                <div class="media">
                                                    <div class="media-img">
                                                        <span class="badge badge-success badge-big">
                                                            <i class="fa fa-bell"></i>
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="font-13">{{ $row->notification }}</div>
                                                        <small class="text-muted">{{ $row->ago }} ago</small>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    @else
                                        <a class="list-group-item" href="javascript:void(0);">
                                            <div class="media">
                                                <div class="media-body">
                                                    <div class="font-13">No Notification</div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="{{ asset('backend/img/admin-avatar.png') }}" />
                            <span></span>{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}<i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="fa fa-user"></i>Profile</a>
                            <a class="dropdown-item" href="{{ route('admin.setting') }}"><i class="fa fa-cog"></i>Settings</a>
                            <!-- <a class="dropdown-item" href="javascript:;"><i class="fa fa-support"></i>Support</a> -->
                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
    <!-- END HEADER-->
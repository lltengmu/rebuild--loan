<div class="quixnav">
    <div class="quixnav-scroll">
        @switch($user_type)
            @case('individual')
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                                                                                    </li> -->
                    <li><a class="" href="{{ url('individual/case') }}" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">貸款申請</span></a>
                    </li>

                    <li><a class="" href="{{ url('individual/approval') }}" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">審批管理</span></a>
                    </li>
                    <li><a class="" href="{{ url('individual/list') }}" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">儀表板</span></a>
                    </li>
                    <li><a class="" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">報告</span></a>
                    </li>
                    <li><a class="" href="{{ url('individual/loan_template') }}" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">貸款模板管理</span></a>
                    </li>
                    <li><a class="" href="{{ url('individual/clientlist') }}" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">客戶管理</span></a>
                    </li>
                    <li><a class="" href="{{ url('individual/splist') }}" aria-expanded=" false"><i
                                class="icon icon-single-04"></i><span class="nav-text">服務提供商管理</span></a>
                    </li>
                    <li><a class="" href="{{ url('individual/userlist') }}" aria-expanded=" false"><i
                                class="icon icon-single-04"></i><span class="nav-text">用戶管理</span></a>
                    </li>
                </ul>
            @break

            @case('sp')
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                                                                                </li> -->
                    <li><a class="" href="{{ url('sp/caseapply') }}" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">貸款申請</span></a>
                    </li>

                    <li><a class="" href="{{ url('sp/approval') }}" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">審批管理</span></a>
                    </li>
                    <li><a class="" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">報告</span></a>
                    </li>
                    {{-- <li><a class="" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">客戶管理</span></a>
                    </li> --}}
                </ul>
            @break

            @case('client')
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                                                                            </li> -->
                    <li><a class="" href="{{ url('clients/case') }}" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">貸款申請</span></a>
                    </li>

                    <li><a class="" href="{{ url('clients/details') }}" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">贷款详情</span></a>
                    </li>
                    <li><a class="" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">報告</span></a>
                    </li>
                    {{-- <li><a class="" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-single-04"></i><span class="nav-text">客戶管理</span></a>
                </li> --}}
                </ul>
            @break

            @default
                <ul>
                    <li class="label">Main</li>
                </ul>
        @endswitch
    </div>
</div>

<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

@role(\App\Models\Role::ADMIN)
<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> {{ __('Аутентификация') }}</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>{{ __('Пользователи') }}</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>{{ __('Роли') }}</span></a></li>
{{--        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>--}}
    </ul>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('region') }}'><i class='nav-icon la la-area-chart'></i> {{ __('Регионы') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('tag') }}'><i class='nav-icon la la-question'></i> Tags</a></li>

<hr class="w-100">
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('log') }}'><i class='nav-icon la la-terminal'></i> Logs</a></li>

<hr class="w-100">

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('tour-group-type') }}'><i class='nav-icon la la-question'></i> Tour group types</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('ad-type') }}'><i class='nav-icon la la-question'></i> Ad types</a></li>

<hr class="w-100">
@endrole

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('tour') }}'><i class='nav-icon la la-plane'></i> {{ __('Туры') }}</a></li>

{{--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>--}}
{{--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('country') }}'><i class='nav-icon la la-question'></i> Countries</a></li>--}}

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('appeal') }}'><i class='nav-icon la la-file'></i> Appeals</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('comment') }}'><i class='nav-icon la la-comment'></i> Comments</a></li>

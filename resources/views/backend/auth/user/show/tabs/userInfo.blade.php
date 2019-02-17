
<style>
    .admin-user-info li{
        list-style-type: none;
    }
    .table-info {
        position: absolute;
    }
</style>


<table class="table table-light" id="table-info">
    <tbody>

        @if (!$user->status)
            <tr>
                <th id="statusLabel">Approval Status : <span class="badge badge-danger">Pending</span></th>
                <td>
                    <label class="switch switch-label switch-pill switch-primary" style="position:absolute;  ">
                        {{ html()->checkbox('active',false, '1')->class('switch-input')->id('isActive') }}
                        <span class="switch-slider" data-checked="Yes" data-unchecked="No" style="border:1px solid lightgray"></span>
                    </label>
                </td>
            </tr>
        @endif
       
        <tr>
            <th>User Code</th>
            <td><strong clas="text-info">{{ $user->id_code }}</strong></td>
        </tr>
        <tr>
            <th>@lang('labels.backend.access.users.tabs.content.overview.name')</th>
            <td>{{ ucwords($user->name ) }}</td>
        </tr>
        <tr>
            <th>@lang('labels.backend.access.users.tabs.content.overview.email')</th>
            <td><a href="javascript:;">{{ $user->email }} </td>
        </tr>
        <tr>
            <th>User Role</th>
            <td>
                @foreach ($user->roles as $role)
                    {{ ucwords($role->name) }}
                @endforeach
            </td>
        </tr>
        <tr>
            <th>@lang('labels.backend.access.users.tabs.content.overview.status')</th>
            <td> {!! $user->status_label !!} </td>
        </tr>
        <tr>
            <th>@lang('labels.backend.access.users.tabs.content.overview.confirmed')</th>
            <td>{!! $user->confirmed_label !!}</td>
        </tr>
        <tr>
            <th>@lang('labels.backend.access.users.tabs.content.overview.last_login_at')</th>
            <td>
                @if($user->last_login_at)
                    {{ timezone()->convertToLocal($user->last_login_at) }}
                @else
                    N/A
                @endif
            </td>
        </tr>
        <tr>
            <th>@lang('labels.backend.access.users.tabs.content.overview.last_login_ip')</th>
            <td>{{ $user->last_login_ip ?? 'N/A' }}</td>
        </tr>
    </tbody>
</table>



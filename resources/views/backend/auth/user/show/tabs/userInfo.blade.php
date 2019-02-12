
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
        <tr>
            <th>User Code</th>
            <td><strong clas="text-info">{{ $user->id_code }}</strong></td>
        </tr>
        <tr>
            <th>@lang('labels.backend.access.users.tabs.content.overview.name')</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>@lang('labels.backend.access.users.tabs.content.overview.email')</th>
            <td><a href="javascript:;">{{ $user->email }} </td>
        </tr>
        <tr>
            <th>@lang('labels.backend.access.users.tabs.content.overview.status')</th>
            <td >
                 <ul class="list-inline" >
                    <li class="list-inline-item" id="statusLabel">
                       {!! $user->status_label !!} 
                    </li>
                    <li class="list-inline-item" >
                        <label class="switch switch-label switch-pill switch-primary" style="position:absolute; margin-top:-18px;">
                            {{ html()->checkbox('active', ($user->active) ? true : false, '1')->class('switch-input')->id('isActive') }}
                            <span class="switch-slider" data-checked="Yes" data-unchecked="No"></span>
                        </label>
                    </li>
                </ul> 
            </td>
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



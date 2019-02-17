@extends('backend.mail.layout.mail-app') 
@section('mail-content')
    @switch($data->title)
        @case('register')
            <div style="margin: 20 0 80 0">
                <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                    {{$data->message}}
                </p>
                <ul style="margin-left:-25px;">
                    <li style="margin-left:-25px; list-style-type: none;font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                        <small>Email / Username : <u style="color: #20a8d8">{{$data->email}}</u></small>
                    </li>
                    <li style="margin-left:-25px; list-style-type: none; font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                        <small> Password : <u style="color: #20a8d8; ">{{$data->password}}</u></small>
                    </li>
                </ul>
                <br><br>
                <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                    Click here
                    <a href="http://staging.med4care.online/login" target="_blank" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#3869d4">
                        Staging.Med4Care.Online
                    </a> to login
                </p>
                <br>
            </div>
            @break
        @case('activate')
            <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                {!! $data->message !!}
            </p>
            <br>
            @break
        @default
    @endswitch
@endsection
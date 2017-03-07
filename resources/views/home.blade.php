@extends('layouts.master')

@section('title', 'Server List')

@section('navigation')
    @parent
@endsection

@section('content')
    <div class="alert alert-info" role="alert">Sorry, no servers have been added to the database yet. Why don't you add one?</div>
    @foreach ($servers as $server)
    <table class="server">
        <tr>
            <td class="ranknum" width="90px">{{ $server['id'] }}</td>
            <td class="stitle" width="208px">{{ $server['sname'] }}</td>
            <td class="pcount" width="170px"><span class="minPlayers">{{ $server['players']['online'] }}</span>/<span class="small maxPlayers">{{ $server['players']['max'] }}</span> players</td>
        </tr>
        <tr>
            <td colspan="3">
                <ul class="push">
                    <li>
                        <label style="background: url( {{ asset('storage/'.$server['sbanner']) }})">  
                            <input type="checkbox" />
                            &nbsp;
                            <div class="actions">
                                <a :href="'/server/'.{{ $server['id'] }}" class="in"><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i> Info</a>
                                <a href="#" class="ed"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{ $server['likes'] }}</a>
                                <a href="#" data-clipboard-action="copy" data-clipboard-text="{{ $server['sip'] }}:{{ $server['sport'] }}" class="rm"><i class="fa fa-clipboard" aria-hidden="true"></i> COPY</a>
                            </div>
                        </label>
                    </li>
                </ul>
            </td>
        </tr>
    </table>
    @endforeach
@endsection
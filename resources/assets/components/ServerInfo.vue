<template>
    <table id="server-info" class="table table-striped table-condensed">
        <thead>
            <tr>
                <td>{{ $server->sname }}</td>
                <td><a class="likebtn" href="#"><i class="fa fa-heart-o"></i></a></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Status</td>
                <td class="{{ ($info) ? "online" : "offline" }}">{{ ($info) ? "Online" : "Offline" }}</td>
            </tr>
            <tr>
                <td>IP</td>
                <td>{{ $server->sip }}</td>
            </tr>
            <tr>
                <td>Port</td>
                <td>{{ $server->sport }}</td>
            </tr>
            <tr>
                <td>Players</td>
                <td class="{{ ($info) ? "" : "faded" }}">{{ ($info) ? $info['players']['online']."/".$info['players']['max'] : "No Connection" }}</td>
            </tr>
            <tr>
                <td>Version</td>
                <td class="{{ ($info) ? "" : "faded" }}">{{ ($info) ? $info['version']['name'] : "No Connection" }}</td>
            </tr>
            <tr>
                <td>Country</td>
                <td>{{ $server->scountry }}</td>
            </tr>
            <tr>
                <td>Votes</td>
                <td>{{ $server->votes }}</td>
            </tr>
            <tr>
                <td>Likes</td>
                <td>{{ $server->likes }}</td>
            </tr>
            <tr>
                <td>Website</td>
                <td><a href="{{ $server->website }}">Visit Site <i class="fa fa-external-link" aria-hidden="true"></i></a></td>
            </tr>
            <tr>
                <td>Owner</td>
                <td>{{ $user->username }}</td>
            </tr>
            <tr>
                <td>Tags</td>
                <td>
                @foreach($tags as $tag)
                    <span class="tag">{{ $tag }}</span>
                @endforeach
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
		props: ['serverIndex', 'serverName','serverIp','serverPort','serverBanner','serverLikes'],
    }
</script>


<style scoped>

</style>
<template>
    <table id="server-list" class="server">
        <tr>
            <td class="ranknum" width="90px">{{ serverIndex }}</td>
            <td class="stitle" width="208px">{{ serverName }}</td>
            <td class="pcount" width="170px"><span class="minPlayers">0</span>/<span class="small maxPlayers">250</span> players</td>
        </tr>
        <tr>
            <td colspan="3">
                <ul class="push">
                    <li>
                        <label :style="{ background: 'url(storage/' + serverBanner + ')' }">  
                            <input type="checkbox" />
                            &nbsp;
                            <div class="actions">
                                <a :href="'/server/' + serverIndex" class="in"><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i> Info</a>
                                <a href="#" class="ed"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{ serverLikes }}</a>
                                <a href="#" data-clipboard-action="copy" :data-clipboard-text="serverIp + ':' + serverPort" class="rm"><i class="fa fa-clipboard" aria-hidden="true"></i> COPY</a>
                            </div>
                        </label>
                    </li>
                </ul>
            </td>
        </tr>
    </table>
</template>

<script>
    export default {
		props: ['serverIndex', 'serverName','serverIp','serverPort','serverBanner','serverLikes'],
    }
</script>


<style scoped>
.push {
	overflow: hidden;
	list-style-type: none;
	font-weight: 300;
}
.push {
	margin-bottom: 0;
	padding-left: 0;
}

.push li {
	height: 60px;
	line-height: 60px;
	color: #555;
	position: relative;
}

.push li label {
	background: url(http://placehold.it/468x60);
	width: 468px;
	height: 60px;
	display: inline-block;
	padding: 0;
}

.push li label:hover {
	background-color: rgba(0, 0, 0, 0.36);
}

.push li input[type=checkbox] {
	display: none;
}

.push li .actions {
	position: absolute;
	right: 0;
	top: 0;
	transform: translatex(100%);
	transition: all .5s ease;
	font-size: 0;
}

.push li .actions a {
	height: 100%;
	display: inline-block;
	padding: 0 20px;
	color: #eee;
	text-decoration: none;
	font-size: 14px;
}
a.in {
	background: #ed981a;
}

a.in:hover {
	background: #bc7914;
}

a.ed {
	background: #3498db;
}

a.ed:hover {
	background: #2980b9;
}

a.rm {
	background: #189747;
}

a.rm:hover {
	background: #14873e;
}

.push li:hover {
	color: #fff;
}

.push li:hover .actions,
.push li input:checked ~ .actions {
	transform: translatex(0);
	transition: all .4s ease;
}

.server {
	width: 468px;
	height: 90px;
	font-size: 18px;
	margin: 25px auto 100px auto;
}

.server tr:first-of-type td {
	background: #000;
	border: 1px solid #fff;
	color: #fff;
	vertical-align: middle;
	height: 30px;
}
.server tr:last-of-type td {
	border: 1px solid #fff;
	height: 60px;
}

.server tr:first-of-type .ranknum {
	text-align: center;
	background: #333;
}

.stitle {
	text-indent: 10px;
}

.pcount {
	text-align: right;
	padding-right: 5px;
}

.small {
	color: #e0e0e0;
	font-size: smaller;
}
</style>
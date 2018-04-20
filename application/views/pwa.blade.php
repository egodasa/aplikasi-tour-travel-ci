<!DOCTYPE html>
<html lang=en>

<head>
	<meta charset=utf-8>
	<meta http-equiv=X-UA-Compatible content="IE=edge">
	<meta name=viewport content="width=device-width,initial-scale=1">
	<title>pwa_vue</title>
	<link rel=icon type=image/png sizes=32x32 href={{ base_url() }}assets/static/img/icons/favicon-32x32.png>
	<link rel=icon type=image/png sizes=16x16 href={{ base_url() }}assets/static/img/icons/favicon-16x16.png>
	<!--[if IE]><link rel="shortcut icon" href="/static/img/icons/favicon.ico"><![endif]-->
	<link rel=manifest href={{ base_url() }}assets/static/manifest.json>
	<meta name=theme-color content=#4DBA87>
	<meta name=apple-mobile-web-app-capable content=yes>
	<meta name=apple-mobile-web-app-status-bar-style content=black>
	<meta name=apple-mobile-web-app-title content=pwa_vue>
	<link rel=apple-touch-icon href={{ base_url() }}assets/static/img/icons/apple-touch-icon-152x152.png>
	<link rel=mask-icon href={{ base_url() }}assets/static/img/icons/safari-pinned-tab.svg color=#4DBA87>
	<meta name=msapplication-TileImage content={{ base_url() }}assets/static/img/icons/msapplication-icon-144x144.png>
	<meta name=msapplication-TileColor content=#000000>
	<link rel=preload href={{ base_url() }}assets/static/js/vendor.ca2a073eb45795f8c678.js as=script>
	<link rel=preload href={{ base_url() }}assets/static/js/app.aac6be72e3e8838ae838.js as=script>
	<link rel=preload href={{ base_url() }}assets/static/css/app.b8e908dd1983cadb5682ced0bf5a9f82.css as=style>
	<link rel=preload href={{ base_url() }}assets/static/js/manifest.2ae2e69a05c33dfc65f8.js as=script>
	<link href={{ base_url() }}assets/static/css/app.b8e908dd1983cadb5682ced0bf5a9f82.css rel=stylesheet>
</head>

<body><noscript>This is your fallback content in case JavaScript fails to load.</noscript>
	<center><b>You can find this file at views/pwa.blade.php (controller pwa.php) <br/>this page located at components/hello.vue (at root/frontend/src/components/hello.vue)</b><br/>
	Data fetch from api/dosen (controller/api/dosen)
	</center>
	<div id=app></div>
	<script>
		! function() {
			"use strict";
			var o = Boolean("localhost/ci318" === window.location.hostname || "[::1]" === window.location.hostname || window.location.hostname.match(/^127(?:\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$/));
			window.addEventListener("load", function() {
				"serviceWorker" in navigator && ("https:" === window.location.protocol || o) && navigator.serviceWorker.register("service-worker.js").then(function(o) {
					o.onupdatefound = function() {
						if (navigator.serviceWorker.controller) {
							var n = o.installing;
							n.onstatechange = function() {
								switch (n.state) {
									case "installed":
										break;
									case "redundant":
										throw new Error("The installing service worker became redundant.")
								}
							}
						}
					}
				}).catch(function(o) {
					console.error("Error during service worker registration:", o)
				})
			})
		}();
	</script>
	<script type=text/javascript src={{ base_url() }}assets/static/js/manifest.2ae2e69a05c33dfc65f8.js></script>
	<script type=text/javascript src={{ base_url() }}assets/static/js/vendor.ca2a073eb45795f8c678.js></script>
	<script type=text/javascript src={{ base_url() }}assets/static/js/app.aac6be72e3e8838ae838.js></script>
</body>

</html>

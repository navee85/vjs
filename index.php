<head>
	<link href="node_modules/video.js/dist/video-js.css" rel="stylesheet">
	<link href="node_modules/videojs-brand/dist/videojs-brand.css" rel="stylesheet">
	<link href="node_modules/videojs-playlist-ui/dist/videojs-playlist-ui.css" rel="stylesheet">

	<script src="node_modules/video.js/dist/video.js"></script>
	<script src="node_modules/videojs-brand/dist/videojs-brand.js"></script>
	<script src="node_modules/videojs-playlist/dist/videojs-playlist.js"></script>
	<script src="node_modules/videojs-playlist-ui/dist/videojs-playlist-ui.js"></script>

	<style>
		body {
			font-family: Arial, sans-serif;
			padding: 30px 50px;
		}
		.info {
			background-color: #eee;
			border: thin solid #333;
			border-radius: 3px;
			margin: 0 0 20px;
			padding: 0 5px;
		}
		/*
		We include some minimal custom CSS to make the playlist UI look good
		in this context.
		*/
		.player-container {
			background: #1a1a1a;
			overflow: auto;
			width: 800px;
		}
		.video-js {
			float: left;
		}
		.vjs-playlist {
			float: left;
			width: 300px;
			max-height: 300px;
			overflow-x: hidden;
		}
		.vjs-playlist-thumbnail
		{
			max-height: 120px;
		}
	</style>

</head>

<body>

	<div style="display: block; float: left; margin-bottom: 60px; width:100%;">
		<h2>Példa</h2>

		<p>Az alábbi funkciókat mutatja be ez a videó:</p>
		<ul>
			<li>Sebesség módosítása</li>
			<li>Playlist használata</li>
			<li>Thumbnail használata a playlist-hez</li>
			<li>Autoplay, ha vége az egyiknek indul a másik</li>
			<li>Automatikus videó indítás</li>
			<li>Ugrás megjelölt chapter-re</li>
			<li>Nyelvesített feliratok (2. videó)</li>
			<li>Brand ikon használata</li>
		</ul>

		<div class="player-container" style="margin-bottom: 120px; overflow-x: hidden; overflow-y: hidden;">
			<video id="example" class="video-js"></video>
			<div class="vjs-playlist"></div>
		</div>

		<script>
			document.addEventListener("DOMContentLoaded", function(event) { 
			// Player 
				var player = videojs(
					'example', 
					{
						width: 500,
						height: 300,
						preload: "auto", 
						techOrder: ["html5"],
						controls: true,
						preload: "auto",
						playbackRates: [0.5, 1, 1.5, 2, 4] // nem kell plugin, tamogatja alapbol
					}
				);

			    player.playlist([{
			      name: 'Video 1',
			      description: 'Video 1 description',
			      duration: 5, //video hosszat lehet megadni, 
			      sources: [
			        { src: 'http://www.sample-videos.com/video/mp4/720/big_buck_bunny_720p_1mb.mp4', type: 'video/mp4' },
			      ],
			      // you can use <picture> syntax to display responsive images
			      thumbnail: [
			        {
			          srcset: 'misc/video-1.png',
			          type: 'image/png',
			          media: '(min-width: 400px;)'
			        },
			        {
			          src: 'misc/video-1.png'
			        }
			      ]
			    },
			    {
			      name: 'Video 2',
			      description: 'Video 1 description',
			      duration: 45, //video hosszat lehet megadni, 
			      sources: [
			        { src: 'http://vjs.zencdn.net/v/oceans.mp4?2', type: 'video/mp4' },
			        { src: 'http://vjs.zencdn.net/v/oceans.webm?2', type: 'video/webm' },
			      ],
				textTracks: [{ 
					"kind": "captions", 
					"label": "English", 
					"src": "subtitle/oceans_eng.vtt", 
					"default": true,
					"srclang": "en"
				},{
					"kind": "captions", 
					"label": "French", 
					"src": "subtitle/oceans_fr.vtt", 
					"default": false,
					"srclang": "fr"
				},{
					"kind": "captions", 
					"label": "Spanish", 
					"src": "subtitle/oceans_spa.vtt", 
					"default": false,
					"srclang": "es"
				},{
					"kind": "chapters", 
					"src": "subtitle/oceans_eng_nav.vtt", 
					"srclang": "en"
				}],
			      // you can use <picture> syntax to display responsive images
			      thumbnail: [
			        {
			          srcset: 'misc/video-12png',
			          type: 'image/png',
			          media: '(min-width: 400px;)'
			        },
			        {
			          src: 'misc/video-2.png'
			        }
			      ]
			    }, {
			      name: 'Sintel (No Thumbnail)',
			      description: 'The film follows a girl named Sintel who is searching for a baby dragon she calls Scales.',
			      sources: [
			        { src: 'http://media.w3.org/2010/05/sintel/trailer.mp4', type: 'video/mp4' },
			        { src: 'http://media.w3.org/2010/05/sintel/trailer.webm', type: 'video/webm' },
			        { src: 'http://media.w3.org/2010/05/sintel/trailer.ogv', type: 'video/ogg' }
			      ],
			      thumbnail: false
			    }]);
			    // Initialize the playlist-ui plugin with no option (i.e. the defaults).
			    player.playlistUi();
			    player.playlist.autoadvance(1); // autoplay

				// Brand plugin
		 		player.brand({
					image: "/misc/logo-brand.png",
					title: "Brand",
					destination: "http://www.google.com",
					destinationTarget: "_blank"
		 		});
			});


	 	</script>
	 </div>
</body>

<?php

/*
Remote source
=============
sources: [{"type": "video/youtube", "src": "https://www.youtube.com/watch?v=HswIHVN5D4o"}]
view-source:https://sunnyli.github.io/videojs-ass/example.html

WebVTT

Chapters: http://html5videoguide.net/demos/google_io/3_navigation/


Videojs plugin-ok: 

[1. Brand]: https://www.npmjs.com/package/videojs-brand



Maga a dokumentáció:
http://docs.videojs.com/

Piszok nagy plugin gyűjtemény:
https://github.com/videojs/video.js/wiki/Plugins


További maybe hasznos plugin-ek:



Quality selector:

Egy descriptor alapján lehet változtatni a különböző minőségű videók között:

	player.qualityselector({
		sources: [
		{ format: 'highres', src: 'http://www.sample-videos.com/video/mp4/720/big_buck_bunny_720p_1mb.mp4', type: 'video/mp4'},
		{ format: 'hd1080', src: 'http://www.sample-videos.com/video/mp4/720/big_buck_bunny_720p_1mb.mp4', type: 'video/mp4'},
		{ format: 'hd720', src: 'http://www.sample-videos.com/video/mp4/480/big_buck_bunny_480p_1mb.mp4', type: 'video/mp4'},
		{ format: 'large', src: '//vjs.zencdn.net/v/oceans.mp4', type: 'video/mp4'},
		{ format: 'medium', src: 'http://www.sample-videos.com/video/mp4/480/big_buck_bunny_480p_1mb.mp4', type: 'video/mp4'},
		{ format: 'small', src: 'http://www.sample-videos.com/video/mp4/480/big_buck_bunny_480p_1mb.mp4', type: 'video/mp4'},
		{ format: 'auto', src: 'http://www.sample-videos.com/video/mp4/720/big_buck_bunny_720p_1mb.mp4', type: 'video/mp4'}
	],
	formats: [
		{ code: 'highres', name: 'High' },
		{ code: 'hd1080', name: '1080p' },
		{ code: 'hd720', name: '720p' },
		{ code: 'large', name: '480p' },
		{ code: 'medium', name: '360p' },
		{ code: 'small', name: '240p' },
		{ code: 'auto', name: 'Auto' }
	],

	onFormatSelected: function(format) {
		console.log(format);
	}
	});

https://www.npmjs.com/package/videojs-qualityselector


*/
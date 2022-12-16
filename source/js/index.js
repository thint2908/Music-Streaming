let isPlaying = true;
let playBtn = $("#play-btn");
let pauseBtn = $("#pause-btn");
let songNameFooter = $(".song-name");
let songNameAuthorFooter = $(".song-author");
let rangeBar = document.getElementById("musicTimer");
let songCurrTime = $(".song-currTime");
let songTotalTime = $(".song-totalTime");
const music = new Audio();

// load mucsic and render music into singer list song
//  Load and show song list from database to page

// =================================================================
// Load and show song list from database to page
function loadMusic(link) {
	$.ajax({
		url: link,
		dataType: "json",
		success: function (data) {
			show_data(data);
		},
		error: function (error) {
			// alert("Load fail");
		},
	});
}

//load singer from database
function load_singer(link) {
	$.ajax({
		url: link,
		dataType: "json",
		success: function (data) {
			show_singer(data);
		},
		error: function (error) {
			// alert("Load fail");
		},
	});
}

function show_singer(response) {
	let singer_list = $("#singerlist");
	for (let i = 0; i < response.length; i++) {
		let r = response[i];
		let singer = `
			<div class="singer">
				<div class="singer-name">${r.name}</div>
				<div class="singer-image" style="display:none">${r.image}</div>
			</div>
		`;
		singer_list.append(singer);
	}
}

//load song top 20 song from data base
function loadTopMusic(url) {
	$.ajax({
		url: url,
		dataType: "json",
		success: function (response) {
			show_top_music(response);
		},
		error: function (error) {},
	});
}
//get and handle response
function show_top_music(response) {
	let count = 0;
	for (let i = 1; i < 4; i++) {
		let list_top_song = $(".carousel-item" + i);

		let item = `
											<div class="list-body">
												<div class="list-item">
													<div class="img-song">
														<img src="./img/an-huynh.jpg" alt="" />
													</div>
													<div class="song-name">${response[count].name}</div>
												</div>
												<div class="list-item">
													<div class="img-song">
														<img src="./img/an-huynh.jpg" alt="" />
													</div>
													<div class="song-name">${response[count++].name}</div>
												</div>
												<div class="list-item">
													<div class="img-song">
														<img src="./img/an-huynh.jpg" alt="" />
													</div>
													<div class="song-name">${response[count++].name}</div>
												</div>
												<div class="list-item">
													<div class="img-song">
														<img src="./img/an-huynh.jpg" alt="" />
													</div>
													<div class="song-name">${response[count++].name}</div>
												</div>
											</div>
											
										
			`;
		count++;
		list_top_song.append(item);
	}
}

function show_data(data) {
	let list_body = $("#music-container");
	let singer_curr_list = $("#singer-curr-list");
	singer_curr_list.text(data[0].singer_name);
	//Handling add song to playlist

	//Handling remove song from playlist

	for (let i = 0; i < data.length; i++) {
		let row = data[i];
		$.post(
			"api/checkPlaylist.php",
			{
				songName: `${row.name}`,
			},
			function (res) {
				if (res == "true") {
					console.log(
						$(".song-heart" + i)
							.children(".bi-heart-fill")
							.show()
					);
					console.log(
						$(".song-heart" + i)
							.children(".bi-heart")
							.hide()
					);
				} else {
					console.log(
						$(".song-heart" + i)
							.children(".bi-heart-fill")
							.hide()
					);
					console.log(
						$(".song-heart" + i)
							.children(".bi-heart")
							.show()
					);
				}
			}
		);
		let _list = ` 	
				<div id="${row.url}" class="song-list">
					<div onclick='playMusic(${row.id})' class="song-info">
						<div class="song-name">${row.name}</div>
						<div class="song-author">${row.singer_name}</div>
					</div>
	  				<div class="song-download">
					  <i class="bi bi-download download-btn"></i>
					</div>
					<div class="song-heart${i}">
						<i class="bi bi-heart"></i>
						<i class="bi bi-heart-fill" style="color: red; display: none"></i>
					</div>
					<audio id='${row.id}' src="${row.url}" type='audio/mp3'>
					</audio>
				</div>
					`;
		list_body.append(_list);
	}

	$(".bi-heart").click(function () {
		let songName = $(this).parent().parent().children("div").children()[0].innerText;
		$(this).parent().children().show();
		$(this).hide();
		$.post(
			"api/addPlaylist.php",
			{
				songName: songName,
			},
			function (res) {
				alert(res);
			}
		);
	});

	$(".bi-heart-fill").click(function () {
		let songName = $(this).parent().parent().children("div").children()[0].innerText;
		$(this).parent().children().show();
		$(this).hide();
		$.post(
			"api/deletePlaylist.php",
			{
				songName: songName,
			},
			function (res) {
				alert(res);
			}
		);
	});
}

$(function () {
	load_singer("./api/loadSinger.php");
	loadMusic("./api/loadMusic.php");
	// end load mucsic and render music into singer list song
	//Load music into top song list
	loadTopMusic("./api/loadTopMuisc.php");
	// begin change button play
	let playBtn = document.getElementById("play-btn");
	let pauseBtn = document.getElementById("pause-btn");

	playBtn.addEventListener("click", function () {
		pauseBtn.style.display = "inline-block";
		playBtn.style.display = "none";
	});
	pauseBtn.addEventListener("click", function () {
		pauseBtn.style.display = "none";
		playBtn.style.display = "inline-block";
	});
	// end change button play

	// begin change text in play bar when click in singer list song

	// $(".song-list").css("border", "3px solid red");
	// console.log(songList);
});

function playMusic(audio) {
	//handle click on music in list song singer
	let url = document.getElementById(audio);
	music.src = url.src;
	console.log(audio);
	// if (!isPlaying) {
	// 	isPlaying = false;
	// }
	isPlaying = true;
	// music.load();
	if (isPlaying) {
		// playBtn.click();
		music.play();
		isPlaying = false;
	} else {
		// pauseBtn.click();
		music.pause();
		isPlaying = true;
	}
	// Array.from(document.getElementsByClassName("song-list")).forEach((element) => {
	// 	element.addEventListener("click", (e) => {
	// 		url = e.target.getAttribute("id");
	// 		console.log(url);
	// 		music.src = "./musics/ducphuc/traidatdepnhatkhicoem.mp3";
	// 		music.play();
	// 	});
	// });
	// handle click button play/pause
	playBtn.click(function (e) {
		if (isPlaying) {
			music.play();
			isPlaying = false;
		} else {
			music.pause();
			isPlaying = true;
		}
	});
	pauseBtn.click(function (e) {
		if (isPlaying) {
			music.play();
			isPlaying = false;
		} else {
			music.pause();
			isPlaying = true;
		}
	});
	// handle audio time range change
	rangeBar.max = music.duration;
	rangeBar.value = music.currentTime;
	// console.log(rangeBar);
	rangeBar.addEventListener("onchange", handleChangeBar);
	function handleChangeBar() {}
	function displayTimer() {
		rangeBar.value = music.currentTime;
		let { duration, currentTime } = music;
		songTotalTime.text(formatTimer(duration));
		songCurrTime.text(formatTimer(currentTime));
	}

	setInterval(() => {
		displayTimer();
	}, 500);
}
function formatTimer(number) {
	const minutes = Math.floor(number / 60);
	const seconds = Math.floor(number - minutes * 60);
	return `${minutes}:${seconds}`;
}
function changeStatusFooter(name, singerName, url) {
	songNameAuthorFooter.text(singerName);
	songNameFooter.text(name);
}

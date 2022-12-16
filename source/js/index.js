let isPlaying = true;
let playBtn = $("#play-btn");
let pauseBtn = $("#pause-btn");
let songNameFooter = $(".song-name");
let songNameAuthorFooter = $(".song-author");
let rangeBar = document.getElementById("musicTimer");
let songCurrTime = $(".song-currTime");
let songTotalTime = $(".song-totalTime");
let volume = $("#volume");
let nextBtn = $("#next-btn");
let prevBtn = $("#prev-btn");
let urlList = [];
let nameList;
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
	$("#volume").value = 1;

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
				<div id="./musics/${row.url}" class="song-list">
					<div onclick='playMusic(${row.id})' class="song-info">
						<div id='${row.name}|${row.singer_name}' class="song-name ">${row.name}</div>
						<div id='${row.singer_name}' class="song-author ">${row.singer_name}</div>
					</div>
	  				<div class="song-download">
					<a href="./musics/${row.url}" download> 
						<i class="bi bi-download download-btn"></i>
					</a>
					  
					</div>
					<div class="song-heart${i}">
						<i class="bi bi-heart"></i>
						<i class="bi bi-heart-fill" style="color: red; display: none"></i>
					</div>
					<audio class='${row.name} | ${row.singer_name}'  id='${row.id}' src="./musics/${row.url}" type='audio/mp3'>
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

	// handle name footer
	let nameTmp = url.classList;
	let nameFooter = "";
	nameTmp.forEach((element) => {
		nameFooter += element + " ";
		// console.log(nameFooter);
	});
	// ./ handle name footer
	$(".footer  .song-name").text(nameFooter);
	isPlaying = true;
	// music.load();
	if (isPlaying) {
		$("#play-btn").css("display", "none");
		$("#pause-btn").css("display", "inline-block");
		music.play();
		isPlaying = false;
	} else {
		$("#pause-btn").css("display", "none");
		$("#play-btn").css("display", "inline-block");

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

	// handle audio time range change
	rangeBar.addEventListener("onchange", handleChangeBar);
	function handleChangeBar() {}
	function displayTimer() {
		let { duration, currentTime } = music;
		rangeBar.value = currentTime;
		rangeBar.max = duration;
		songTotalTime.text(formatTimer(duration));
		songCurrTime.text(formatTimer(currentTime));
	}

	setInterval(() => {
		displayTimer();
	}, 500);
	let index;
	function getCurrentSongList() {
		urlList = [];
		let songList = $(".song-list");
		nameList = $("#music-container .song-name");
		console.log(nameList[0].id);
		for (let element of songList) {
			urlList.push(element.id);
		}
		var result = Object.keys(urlList).map((key) => [Number(key), urlList[key]]);
		currIndex = "." + url.src.slice(33);
		// currIndex = urlList
		// 	.map(function (e) {
		// 		return e;
		// 	})
		// 	.indexOf(url.src);
		// console.log(result.indexOf(currIndex));
		console.log(typeof currIndex);
		console.log(currIndex);
		console.log(urlList);
		console.log(typeof urlList);
		for (let i = 0; i < urlList.length; i++) {
			if (urlList[i] == currIndex) {
				index = i;
			}
		}
	}
	getCurrentSongList();
	nextBtn.click(function (e) {
		if ($("#play-btn").css("display") === "inline-block") {
			$("#play-btn").css("display", "none");
		}
		$("#pause-btn").css("display", "inline-block");
		index++;
		if (index >= urlList.length) {
			index = 0;
		}
		music.src = urlList[index];
		music.play();
		isPlaying = false;
		$(".footer  .song-name").text(nameList[index].id);
	});
	prevBtn.click(function (e) {
		if ($("#play-btn").css("display") === "inline-block") {
			$("#play-btn").css("display", "none");
		}
		$("#pause-btn").css("display", "inline-block");
		index--;
		if (index < 0) {
			index = urlList.length - 1;
		}
		music.src = urlList[index];
		music.play();
		isPlaying = false;
		$(".footer  .song-name").text(nameList[index].id);
	});
}
document.addEventListener("keydown", function (event) {
	console.log(event);
	if (event.keyCode == 80) {
		pauseBtn.click();
	}
	if (event.keyCode == 82) {
		playBtn.click();
	}
});
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
function formatTimer(number) {
	const minutes = Math.floor(number / 60);
	const seconds = Math.floor(number - minutes * 60);
	if (minutes < 10 && seconds < 10) {
		return `0${minutes}:0${seconds}`;
	}
	return `0${minutes}:${seconds}`;
}
function changeStatusFooter(name, singerName, url) {
	songNameAuthorFooter.text(singerName);
	songNameFooter.text(name);
}
function changeVolume(amount) {
	music.volume = amount;
	console.log(music.volume);
	if (music.volume === 0) {
		$(".volume-bar").addClass("bi bi-volume-mute-fill");
		$(".volume-bar").removeClass("bi bi-volume-up-fill");
	} else {
		$(".volume-bar").removeClass("bi bi-volume-mute-fill");
		$(".volume-bar").addClass("bi bi-volume-up-fill");
	}
}
function changeCurrentTime(amount) {
	music.currentTime = amount;
}

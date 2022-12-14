// load mucsic and render music into singer list song
//  Load and show song list from database to page
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
function show_data(data) {
	let list_body = $("#music-container");
	$("#singer-curr-list").text(data[1].singer_name);
	for (let i = 0; i < data.length; i++) {
		let row = data[i];
		let _list = ` 	<div class="song-list">
								<div onclick='playMusic(${row.id})' class="song-info">
									<div class="song-name">${row.name}</div>
									<div class="song-author">${row.singer_name}</div>
								</div>
								<div class="song-heart">
									<i class="bi bi-download download-btn"></i>
									<i class="bi bi-heart"></i>
									<i class="bi bi-heart-fill" style="color: red; display: none"></i>
								</div>
								<audio id='${row.id}' src="${row.url}" type='audio/mp3'>
								</audio>
						</div>
								`;
		list_body.append(_list);
	}
	// $(".bi-heart").click(function () {
	// 	$(this).hide();
	// 	$(this)(".bi-heart-fill").show();
	// });
	// $(".bi-heart-fill").click(function () {
	// 	$(this).hide();
	// 	$(this)(".bi-heart").show();
	// });
	$(".bi-heart").click(function () {
		$(this).parent().children().show();
		$(this).hide();
	});
	$(".bi-heart-fill").click(function () {
		$(this).parent().children().show();
		$(this).hide();
	});
}
// end change text in play bar when click in singer list song

$(function () {
	loadMusic("./api/loadMusic.php");
	// end load mucsic and render music into singer list song

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
// play audio

function playMusic(audio) {
	let music = document.getElementById(audio);
	music.play();
}
function pauseMusic() {
	let music = document.getElementById("myAudio-6");

	music.pause();
}

// ./play audio

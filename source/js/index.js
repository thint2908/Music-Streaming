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
          console.log($(".song-heart"+i).children(".bi-heart").show());
          console.log($(".song-heart"+i).children(".bi-heart-fill").hide());
        } else {
			console.log($(".song-heart"+i).children(".bi-heart").hide());
			console.log($(".song-heart"+i).children(".bi-heart-fill").show());
        }
      }
    );
    let _list = ` 	
				<div class="song-list">
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
    let songName = $(this)
      .parent()
      .parent()
      .children("div")
      .children()[0].innerText;
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
    let songName = $(this)
      .parent()
      .parent()
      .children("div")
      .children()[0].innerText;
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
  let music = document.getElementById(audio);
  music.play();
}
function pauseMusic() {
  let music = document.getElementById("myAudio-6");

  music.pause();
}

let playBtn = document.getElementById("play-btn");
let pauseBtn = document.getElementById("pause-btn");

// do heart check
// let heartCheck = document.getElementById("heart-check");
// let heartUnCheck = document.getElementById("heart-uncheck");

playBtn.addEventListener("click", function () {
	pauseBtn.style.display = "inline-block";
	playBtn.style.display = "none";
});
pauseBtn.addEventListener("click", function () {
	pauseBtn.style.display = "none";
	playBtn.style.display = "inline-block";
});

// heartCheck.addEventListener("click", function () {
// 	heartCheck.style.display = "none";
// 	heartUnCheck.style.display = "block";
// });
// heartUnCheck.addEventListener("click", function () {
// 	heartCheck.style.display = "block";
// 	heartUnCheck.style.display = "none";
// });

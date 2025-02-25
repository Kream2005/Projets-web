const startEl = document.getElementById("start");
const resetEl = document.getElementById("reset");
const stopEl = document.getElementById("stop");
const timerEl = document.getElementById("timer");
const popup = document.getElementById("popup");
const confirmYes = document.getElementById("confirm-yes");
const confirmNo = document.getElementById("confirm-no");

let interval;
let timeleft = 1500;
let isBreak = false;

function updateTimer() {
    let minutes = Math.floor(timeleft / 60);
    let seconds = timeleft % 60;
    timerEl.innerHTML = `${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
}

function startTimer() {
    if (interval) return;
    interval = setInterval(() => {
        if (timeleft > 0) {
            timeleft--;
            updateTimer();
        } else {
            clearInterval(interval);
            interval = null;
            if (!isBreak) {
                alert("Time's up! Take a 5 min break.");
                timeleft = 300; 
                isBreak = true;
            } else {
                alert("Break over! Back to work.");
                timeleft = 1500; 
                isBreak = false;
            }
            updateTimer();
            startTimer(); 
        }
    }, 1000);
}

startEl.addEventListener("click", () => {
    popup.style.display = "block";
});

confirmYes.addEventListener("click", () => {
    popup.style.display = "none";
    startTimer();
});

confirmNo.addEventListener("click", () => {
    popup.style.display = "none";
});

function resetTimer() {
    clearInterval(interval);
    interval = null;
    timeleft = 1500;
    isBreak = false;
    updateTimer();
}

function stopTimer() {
    clearInterval(interval);
    interval = null;
}

resetEl.addEventListener("click", resetTimer);
stopEl.addEventListener("click", stopTimer);

updateTimer();

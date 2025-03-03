const timerEl = document.getElementById("timer");
const startEl = document.getElementById("start");
const stopEl = document.getElementById("stop");
const resetEl = document.getElementById("reset");
const workTimeEl = document.getElementById("work-time");
const breakTimeEl = document.getElementById("break-time");
const setTimeEl = document.getElementById("set-time");
const taskInput = document.getElementById("task-input");
const addTaskBtn = document.getElementById("add-task");
const taskList = document.getElementById("task-list");
const confirmation = document.getElementById("confirmation");
const yesBtn = document.getElementById("yes");
const noBtn = document.getElementById("no");

let interval = null;
let timeleft = 1500;
let isBreak = false;

function updateTimer() {
    let minutes = Math.floor(timeleft / 60);
    let seconds = timeleft % 60;
    timerEl.innerHTML = `${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
}

// 🎯 Show confirmation when Start is clicked
startEl.addEventListener("click", () => {
    confirmation.classList.remove("hidden");
});

// ✅ If Yes is clicked, start timer
yesBtn.addEventListener("click", () => {
    confirmation.classList.add("hidden");

    if (interval) return; // Avoid multiple intervals

    interval = setInterval(() => {
        if (timeleft > 0) {
            timeleft--;
            updateTimer();
        } else {
            clearInterval(interval);
            interval = null;
            isBreak = !isBreak;
            timeleft = (isBreak ? parseInt(breakTimeEl.value) : parseInt(workTimeEl.value)) * 60;
            alert(isBreak ? "Break Time! Relax." : "Work Time! Stay Focused.");
            updateTimer();
            startEl.click(); // Show confirmation again
        }
    }, 1000);
});

// ❌ If No is clicked, close confirmation
noBtn.addEventListener("click", () => {
    confirmation.classList.add("hidden");
});

// 🛑 Stop Timer
stopEl.addEventListener("click", () => {
    clearInterval(interval);
    interval = null;
});

// 🔄 Reset Timer
resetEl.addEventListener("click", () => {
    clearInterval(interval);
    interval = null;
    timeleft = 1500;
    isBreak = false;
    updateTimer();
});

// ⏳ Set Custom Time
setTimeEl.addEventListener("click", () => {
    timeleft = parseInt(workTimeEl.value) * 60;
    updateTimer();
});

// ✅ Add Task
addTaskBtn.addEventListener("click", () => {
    if (taskInput.value.trim() === "") return;

    let li = document.createElement("li");
    li.textContent = taskInput.value;
    let deleteBtn = document.createElement("button");
    deleteBtn.textContent = "❌";
    
    deleteBtn.addEventListener("click", () => {
        li.remove();
    });

    li.appendChild(deleteBtn);
    taskList.appendChild(li);
    taskInput.value = "";
});

updateTimer();

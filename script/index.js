function refreshTime() {
    const timeDisplay = document.getElementById("time")
    const dateString = new Date().toString();
    const formattedString = dateString.replace(", ", " - ");
    timeDisplay.textContent = formattedString;
}

setInterval(refreshTime, 1000)
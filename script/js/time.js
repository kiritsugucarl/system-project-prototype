function refreshTime() {
    const timeDisplay = document.getElementById("time")
    const dateString = new Date().toString().split("GMT")[0];
    const formattedString = dateString.replace(", ", " - ");
    timeDisplay.textContent = formattedString;
}

setInterval(refreshTime, 1000)
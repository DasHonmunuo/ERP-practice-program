// to make a div appear/disappear when clicking a button
function toggleDiv(divId) {
    var div = document.getElementById(divId);
    if (div.style.display === "none") {
        div.style.display = "block";
    } else {
        div.style.display = "none";
    }
}

function toggleDivOff(divId) {
    var div = document.getElementById(divId);
    div.style.display = "none";
}
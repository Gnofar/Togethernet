var dateInfo = {
    year: 2016,
    month: 10,
    day: 28,
    hour: 9
};

var theImportantDate = new Date(dateInfo.year, dateInfo.month, dateInfo.day, dateInfo.hour);
var theImportantCountdownDisplay = document.getElementById('PAYATTENTION');

function updateCounter(text){
    theImportantCountdownDisplay.innerHTML = text;
}
function multiplyArray(arr) {
    var x = 1;
    for (var i = 0; i < arr.length; i++) {
        x = x * arr[i];
    }
    return x;
}
function pad(num, toLength) {
    num = num.toString()
    while (num.length < toLength) {
        num = '0' + num;
    }
    return num;
}
function padArray(arr, toLength) {
    toLength = typeof toLength !== 'undefined' ? toLength : 2;
    for (var i = 0; i < arr.length; i++) {
        curNum = pad(arr[i], toLength);
        arr[i] = curNum;
    }
    return arr;
}
function tick() {
    var now = new Date();
    var millisecondsLeft = theImportantDate - now;
    millisecondsLeft = millisecondsLeft === Math.abs(millisecondsLeft) ? millisecondsLeft : 0;
    
    if (millisecondsLeft === 0) {
        location.reload()
    }
    
    var msFactors = [24, 60, 60, 100, 10];
    var timesLeft = [];
    for (var i = 0; i < msFactors.length; i++) {
        var curMultiplier = multiplyArray(msFactors.slice(i));
        var curTimeLeft = Math.floor(millisecondsLeft / curMultiplier);
        millisecondsLeft = millisecondsLeft - (curTimeLeft * curMultiplier);
        timesLeft.push(curTimeLeft);
    }
    
    var counterString = padArray(timesLeft).join(':');
    updateCounter(counterString);
}

setInterval(tick, 51);
 
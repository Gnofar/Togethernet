//For input verifier//
/*
var author = document.getElementById('author');
var title = document.getElementById('title');
var article = document.getElementById('article');
var warningMsg = '';

function updateValue() {
    document.getElementById('text').innerHTML = checkValue("author");
}

function authorCheck() {
    var lengthInt = document.getElementById('author');
    console.log("hej");
    if (lengthInt.value.length < 20) {
        document.getElementById('authorWrapper').style['background-color'] = "red";
        warningMsg = 'This name needs to be longer';
    } else {
        document.getElementById('authorWrapper').style['background-color'] = "green";
    }
}

function titleCheck() {
    var lengthInt = document.getElementById('title');
    console.log("hej");
    if (document.getElementById('title').value.length < 20) {
        document.getElementById('titleWrapper').style['background-color'] = "red";
        warningMsg = 'This name needs to be longer';
    } else {
        document.getElementById('titleWrapper').style['background-color'] = "green";
    }
}

function articleCheck() {
    var lengthInt = document.getElementById('author');
    console.log("hej");
    if (document.getElementById('article').value.length < 30) {
        document.getElementById('articleWrapper').style['background-color'] = "red";
        warningMsg = 'This article needs to be longer';
    } else {
        document.getElementById('articleWrapper').style['background-color'] = "green";
    }
}
author.addEventListener('blur', authorCheck, 'false');
title.addEventListener('blur', titleCheck, 'false');
article.addEventListener('blur', articleCheck, 'false');
function checkValue(inValue) {
    var returnValue = document.getElementById(inValue).value.length;
    return returnValue;
}
*/
//End of section//

//Countdown timer
/*
function countdown()
{
   var nextLan = Date.parse('December 2, 2016');
   console.log(nextLan);
}
*/
//End of countdown section//

//Scrolltop verifier

//End of Scrolltop section// 

$(document).ready(function () {
    $('#infoButton').click(function () {
        $('html, body').animate({
            scrollTop: $("#section1").offset().top
        }, 1000);
    });
    $('#aboutButton').click(function () {
        $('html, body').animate({
            scrollTop: $("#section2").offset().top
        }, 1000);
    });

    $('#signButton').click(function () {
        $('html, body').animate({
            scrollTop: $("#section3").offset().top
        }, 1000);
    });

    function scrollToSign() {
        $('html, body').animate({
            scrollTop: $("#section3").offset().top
        }, 1000);
    };

    $('#tooltip1').on('click', function () {
        $('#tooltipbox1').show("slow", function () {}).delay(3000);
        $('#tooltipbox1').hide("slow", function () {});

    });
    $('#tooltip2').on('click', function () {
        $('#tooltipbox2').show("slow", function () {}).delay(3000);
        $('#tooltipbox2').hide("slow", function () {});

    });
    $('#tooltip3').on('click', function () {
        $('#tooltipbox3').show("slow", function () {}).delay(3000);
        $('#tooltipbox3').hide("slow", function () {});

    });
});

var scrollTop

$(function () {
    $("#subBreadText").typed({
        strings: ["Togethernet är....", "Togethernet är elever", "Togethernet är sammhörighet", "Togethernet är vi..."],
        typeSpeed: 30
    });
});

$(document).on('scroll', function () {
})

console.log('Javascripts loads');
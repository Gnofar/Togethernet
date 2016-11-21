//For input verifier//

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
    //For input verifier//
    var name = document.getElementById('inputField1');
    var email = document.getElementById('inputField2');
    var payment = document.getElementById('inputField3');

    function nameCheck() {
        if (document.getElementById('inputField1').value.length < 30 && document.getElementById('inputField1').value.length > 5) {
         document.getElementById('inputField1').style['background-color'] = "#A5D6A7";
            
        } else {
            document.getElementById('inputField1').style['background-color'] = "#EF5350";
            window.alert('Detta fält måste vara 5-30 karaktärer långt, använd inte några specialla tecken eller siffror.');
        }
    }

    function emailCheck() {
        if (document.getElementById('inputField2').value.length < 30 && document.getElementById('inputField2').value.length > 10) {
            document.getElementById('inputField2').style['background-color'] = "#A5D6A7";
        } else {
            document.getElementById('inputField2').style['background-color'] = "#EF5350";
            window.alert('Detta fält måste vara 10-20 karaktärer långt, använd endast din SSIS email');
        }
    }

    function paymentCheck() {
        document.getElementById('inputField3').style['background-color'] = "#A5D6A7";
    }
    
    name.addEventListener('blur', nameCheck, 'false');
    email.addEventListener('blur', emailCheck, 'false');
    payment.addEventListener('blur', paymentCheck, 'false');
    //End of section//
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

    $('body').on('scroll', function () {
        console.log(Math.floor($('body').scrollTop()));
    })
})

$(function () {
    $("#subBreadText").typed({
        strings: ["Togethernet är....", "Togethernet är elever", "Togethernet är sammhörighet", "Togethernet är vi..."],
        typeSpeed: 30
    });
});
console.log('Javascripts loads');
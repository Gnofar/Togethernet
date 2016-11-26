//Countdown timer
/*
function countdown()
{
   var nextLan = Date.parse('December 2, 2016');
   console.log(nextLan);
}
*/
//End of countdown section//



$(document).ready(function () {
    //For input verifier//
    if (window.location.pathname != "/shop.html") {
        var name = document.getElementById('inputField1');
        var email = document.getElementById('inputField2');
        var payment = document.getElementById('inputField3');

        function nameCheck() {
            if (document.getElementById('inputField1').value.length < 30 && document.getElementById('inputField1').value.length > 5) {
                document.getElementById('inputField1').style['background-color'] = "#A5D6A7";

            } else {
                document.getElementById('inputField1').style['background-color'] = "#EF5350";
            }
        }

        function emailCheck() {
            if (document.getElementById('inputField2').value.length < 30 && document.getElementById('inputField2').value.length > 14) {
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
        $('#aboutButton').click(function () {
            $('html, body').animate({
                scrollTop: $("#section1").offset().top
            }, 1000);
        });
        $('#infoButton').click(function () {
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
        });
                    
        var current = "Låt spelandet börja!";
        var year = 2016;
        var month = 12;
        var day = 02;
        var hour = 19;
        var minute = 00;
        var tz = +1;
        
        var montharray = new Array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");

        function countdown(yr, m, d, hr, min) {

            theyear = yr;
            themonth = m;
            theday = d;
            thehour = hr;
            theminute = min;
            var today = new Date();
            var todayy = today.getYear();
            if (todayy < 1000) {
                todayy += 1900;
            }
            var todaym = today.getMonth();
            var todayd = today.getDate();
            var todayh = today.getHours();
            var todaymin = today.getMinutes();
            var todaysec = today.getSeconds();
            var todaystring1 = montharray[todaym] + " " + todayd + ", " + todayy + " " + todayh + ":" + todaymin + ":" + todaysec;
            var todaystring = Date.parse(todaystring1) + (tz * 1000 * 60 * 60);
            var futurestring1 = (montharray[m - 1] + " " + d + ", " + yr + " " + hr + ":" + min);
            var futurestring = Date.parse(futurestring1) - (today.getTimezoneOffset() * (1000 * 60));
            var dd = futurestring - todaystring;
            var dday = Math.floor(dd / (60 * 60 * 1000 * 24) * 1);
            var dhour = Math.floor((dd % (60 * 60 * 1000 * 24)) / (60 * 60 * 1000) * 1);
            var dmin = Math.floor(((dd % (60 * 60 * 1000 * 24)) % (60 * 60 * 1000)) / (60 * 1000) * 1);
            var dsec = Math.floor((((dd % (60 * 60 * 1000 * 24)) % (60 * 60 * 1000)) % (60 * 1000)) / 1000 * 1);
            if (dday <= 0 && dhour <= 0 && dmin <= 0 && dsec <= 0) {
                document.getElementById('count2').innerHTML = current;
                document.getElementById('count2').style.display = "inline";
                document.getElementById('count2').style.width = "390px";
                document.getElementById('dday').style.display = "none";
                document.getElementById('dhour').style.display = "none";
                document.getElementById('dmin').style.display = "none";
                document.getElementById('dsec').style.display = "none";
                document.getElementById('days').style.display = "none";
                document.getElementById('hours').style.display = "none";
                document.getElementById('minutes').style.display = "none";
                document.getElementById('seconds').style.display = "none";
                document.getElementById('spacer1').style.display = "none";
                document.getElementById('spacer2').style.display = "none";
                return;
            } else {
                document.getElementById('count2').style.display = "none";
                document.getElementById('dday').innerHTML = dday;
                document.getElementById('dhour').innerHTML = dhour;
                document.getElementById('dmin').innerHTML = dmin;
                document.getElementById('dsec').innerHTML = dsec;
                setTimeout("countdown(theyear,themonth,theday,thehour,theminute)", 1000);
            }
        }
    }
    //Cookie oven //

    //No more cookies for you!// 

    //Price checker//
    if (window.location.pathname == "/shop.html") {
        var firstData;
        var lastData;
        var totalPrice = 0;
        $('.priceClass20').focus(function () {
            firstData = ($(this).val());
            if (firstData == '') {
                firstData = 0;
            }
            console.log(firstData);
            //function priceCheck ('priceClass20', lastData);
        })
        $('.priceClass20').blur(function () {
            lastData = ($(this).val());
            if (lastData > firstData) {
                priceAdd(lastData - firstData, "20");
                console.log(Math.abs(lastData - firstData));
            } else {
                priceDecrease(firstData - lastData, "20");
                console.log(Math.abs(firstData - lastData));
            }
        })
        $('.priceClass10').focus(function () {
            firstData = ($(this).val());
            if (firstData == '') {
                firstData = 0;
            }
            console.log(firstData);
            //function priceCheck ('priceClass20', lastData);
        })
        $('.priceClass10').blur(function () {
            lastData = ($(this).val());
            if (lastData > firstData) {
                priceAdd(lastData - firstData, "");
                console.log(Math.abs(lastData - firstData));
            } else {
                priceDecrease(firstData - lastData, "");
                console.log(Math.abs(firstData - lastData));
            }
        })

        function priceAdd(valueIn, priceClass) {
            if (priceClass == "20") {
                totalPrice += valueIn * 20;
                $('#shopCost').text(totalPrice + "kr");
            } else {
                totalPrice += valueIn * 10;
                $('#shopCost').text(totalPrice + "kr");
            }
        }

        function priceDecrease(valueIn, priceClass) {
            if (priceClass == "20") {
                totalPrice -= valueIn * 20;
                $('#shopCost').text(totalPrice + "kr");
            } else {
                totalPrice -= valueIn * 10;
                $('#shopCost').text(totalPrice + "kr");
            }
        }
    }

    console.log('Javascripts loads');
});
//Ed of pricechecker//
$(function () {
    $("#subBreadText").typed({
        strings: ["Togethernet är....", "Togethernet är elever", "Togethernet är sammhörighet", "Togethernet är vi..."],
        typeSpeed: 30
    });
});
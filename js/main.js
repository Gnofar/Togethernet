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
        }$('input[name="totprice"]');

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
        strings: ["Togethernet är....", "Togethernet är intensivt", "Togethernet är en passion","Togethernet är sammhörighet", "Togethernet är vi..."],
        typeSpeed: 30
    });
});
$(document).ready(function () {
    (genClips = function () {
        $t = $('.item1');
        var amount = 10;
        var width = $t.width() / amount;
        var height = $t.height() / amount;
        var totalSquares = Math.pow(amount, 2);
        var y = 0;
        var index = 1;
        for (var z = 0; z <= (amount * width) ; z = z + width) {
            $('<img class="clipped" src="/public/img/jb' + index + '.png" />').appendTo($('.item1 .clipped-box'));
            if (z === (amount * width) - width) {
                y = y + height;
                z = -width;
            }
            if (index >= 5) {
                index = 1;
            }
            index++;
            if (y === (amount * height)) {
                z = 9999999;
            }
        }
    })();
    function rand(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    var first = false,
        clicked = false;
    // On click
    $('.item1 div.kodai').on('click', function () {

        if (clicked === false) {
            $('.full').css({
                'display': 'none'
            });
            $('.empty').css({
                'display': 'block'
            });
            clicked = true;

            $('.item1 .clipped-box').css({
                'display': 'block'
            });
            // Apply to each clipped-box div.
            $('.clipped-box img').each(function () {
                var v = rand(120, 90),
                    angle = rand(80, 89), 
                    theta = (angle * Math.PI) / 180, 
                    g = -9.8; 

                // $(this) as self
                var self = $(this);
                var t = 0,
                    z, r, nx, ny,
                    totalt =10;
                var negate = [1, -1, 0],
                    direction = negate[Math.floor(Math.random() * negate.length)];

                var randDeg = rand(-5, 10),
                    randScale = rand(0.9, 1.1),
                    randDeg2 = rand(30, 5);

                // And apply those
                $(this).css({
                    'transform': 'scale(' + randScale + ') skew(' + randDeg + 'deg) rotateZ(' + randDeg2 + 'deg)'
                });

                // Set an interval
                z = setInterval(function () {
                    var ux = (Math.cos(theta) * v) * direction;
                    var uy = (Math.sin(theta) * v) - ((-g) * t);
                    nx = (ux * t);
                    ny = (uy * t) + (0.25 * (g) * Math.pow(t, 2));
                    if (ny < -40) {
                        ny = -40;
                    }
                    //$("#html").html("g:" + g + "bottom:" + ny + "left:" + nx + "direction:" + direction);
                    $(self).css({
                        'bottom': (ny) + 'px',
                        'left': (nx) + 'px'
                    });
                    // Increase the time by 0.10
                    t = t + 0.10;

                    //����ѭ��
                    if (t > totalt) {
                        clicked = false;
                        first = true;
                        clearInterval(z);
                    }
                }, 20);
            });
        }
    });
    r = setInterval(function () {
        if (first === true) {
            $('.empty').addClass("Shake");//�ζ��մ���
            //TODO:�մ��ӻζ����� �͵��� �����
            first = false;
			//$('#front').animate({width:"100%",height:"100%",marginLeft:"0px", marginTop:"0px"},1000);  
			//$('#gua1').animate({width:"300px",height:"160px", marginTop:"0px"},1000);  
			bodys(140,300);
			$('.main').fadeOut(2000);
			$('#gua1').show();
			$('#front').fadeIn(1000);
        }
    }, 300);
});
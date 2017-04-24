$(function () {

    function communistAreaSquares() {
        var squareHeight = 0,
            currentSquareHeight = 0,
            squares = $(".areaSquare"),
            squaresPerRow = 4;

        if (window.innerWidth <= 600) {
            squaresPerRow = 1;
        }
        else if (window.innerWidth <= 1100) {
            squaresPerRow = 2;
        }


        squares.each(function () {
            currentSquareHeight = $(".areaSquareTitle", $(this)).outerHeight(true);
            currentSquareHeight += $(".areaSquareBody", $(this)).outerHeight(true);
            currentSquareHeight += $(".areaSquareLink", $(this)).outerHeight(true);
            currentSquareHeight += 40;
            squareHeight = (currentSquareHeight > squareHeight ? currentSquareHeight : squareHeight);
            //squareHeight = ($(this).height() > squareHeight ? $(this).height() : squareHeight);
        });


        squares.each(function () {
            $(this).height(squareHeight);
        });
        $(".areaSquareContent").each(function () {
            $(this).height(squareHeight - 40);
        });

        $("#areasInnerContainer").width(window.innerWidth * (Math.floor(squares.length / 4) + (squares.length % 4 > 0 ? 1 : 0)));
        squares.width((window.innerWidth / squaresPerRow) - 2);
    }
    function communistBlogSquares() {
        var squareHeight = 0,
            currentSquareHeight = 0,
            squares = $(".blogSquare"),
            squaresPerRow = 4;

        if (window.innerWidth <= 600) {
            squaresPerRow = 1;
        }
        else if (window.innerWidth <= 1100) {
            squaresPerRow = 2;
        }


        squares.each(function () {
            currentSquareHeight = $(".blogSquareTitle", $(this)).outerHeight(true);
            currentSquareHeight += $(".blogSquareBody", $(this)).outerHeight(true);
            currentSquareHeight += $(".blogSquareLink", $(this)).outerHeight(true);
            currentSquareHeight += 40;
            squareHeight = (currentSquareHeight > squareHeight ? currentSquareHeight : squareHeight);
            //squareHeight = ($(this).height() > squareHeight ? $(this).height() : squareHeight);
        });


        squares.each(function () {
            $(this).height(squareHeight);
        });
        $(".blogSquareContent").each(function () {
            $(this).height(squareHeight - 40);
        });

        $("#blogInnerContainer").width(window.innerWidth * (Math.floor(squares.length / 4) + (squares.length % 4 > 0 ? 1 : 0)));
        squares.width((window.innerWidth / squaresPerRow) - 2);
    }

    $(".hamburger").click(function(){
        $('body').toggleClass("hamburgerOn");
    });

    if($("#slider").length) {
        $("#slider").slidesjs({
            height: '17em',
            navigation: {
                active: false,
                effect: "slide"
            },
            pagination: {
                active: false
            },
            play: {
                active: false,
                // [boolean] Generate the play and stop buttons.
                // You cannot use your own buttons. Sorry.
                effect: "slide",
                // [string] Can be either "slide" or "fade".
                interval: 5000,
                // [number] Time spent on each slide in milliseconds.
                auto: true,
                // [boolean] Start playing the slideshow on load.
                swap: true,
                // [boolean] show/hide stop and play buttons
                pauseOnHover: false,
                // [boolean] pause a playing slideshow on hover
                restartDelay: 2500
                // [number] restart delay on inactive slideshow
            }
        });
        communistAreaSquares();
        communistBlogSquares();
        $(window).resize(function () {
            communistAreaSquares();
            communistBlogSquares();
        });
    }
    addToHomescreen({modal: true, lifespan: 0, maxDisplayCount: 1});

    $(".areasMenu").click(function (ev) {
        var areaId = ev.target.closest("li").getAttribute("data-area-id");
        $(".active").removeClass("active");
        $("[data-area-id='"+areaId+"']").addClass("active");
    });

    $(".areasMobileMenu").click(function (ev) {
        var areaId = ev.target.closest("li").getAttribute("data-area-id");
        $(".active").removeClass("active");
        $("[data-area-id='"+areaId+"']").addClass("active");
        $('.areasMobileMenu').removeClass("areasBurgerOn");
    });

    if (window.location.search && !isNaN(parseInt(window.location.search.split('=')[1].split("&")[0]))) {
        var areaId = window.location.search.split('=')[1].split("&")[0];
        $(".active").removeClass("active");
        $("[data-area-id='"+areaId+"']").addClass("active");
    }

    $(".areaBurger").click(function(){
        $('.areasMobileMenu').toggleClass("areasBurgerOn");
    });

    /*
    *
    * $(".areaSquare").animate({ "left": "-="+($(".areaSquare").width()+2)+"px" }, "slow" )
    * */

});
$(function () {

    var currentMousePos = {x: 0, y: 0};
    var shouldScroll = false;
    var moving = false;

    window.onmousemove = function (e) {
        currentMousePos.x = e.clientX;
        currentMousePos.y = e.clientY
    };

    function communistAreaSquares() {
        $("#areasInnerContainer")[0].style.left = "0px";
        var squareHeight = 0,
            currentSquareHeight = 0,
            squares = $(".areaSquare"),
            squaresPerRow = 4,
            rowsOfSquares = 1;

        if (window.innerWidth <= 600) {
            squaresPerRow = 1;
            rowsOfSquares = 4;
        }
        else if (window.innerWidth <= 1100) {
            squaresPerRow = 2;
            rowsOfSquares = 2;
        }

        $("#areasInnerContainer").width(((window.innerWidth / squaresPerRow * squares.length) / rowsOfSquares) + (squares.length % 4 > 0 ? (window.innerWidth / squaresPerRow) : 0));
        squares.width((window.innerWidth / squaresPerRow) - 2);
        $("#areasInnerContainer").show();

        squares.each(function () {
            currentSquareHeight = $(".areaSquareTitle", $(this)).outerHeight(true);
            currentSquareHeight += $(".areaSquareBody", $(this)).outerHeight(true);
            currentSquareHeight += $(".areaSquareLink", $(this)).outerHeight(true);
            currentSquareHeight += 40;
            squareHeight = (currentSquareHeight > squareHeight ? currentSquareHeight : squareHeight);
        });


        squares.each(function () {
            $(this).height(squareHeight);
        });
        $(".areaSquareContent").each(function () {
            $(this).height(squareHeight - 40);
        });

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

    $(".hamburger").click(function () {
        $('body').toggleClass("hamburgerOn");
    });

    if ($("#slider").length) {
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
        $("[data-area-id='" + areaId + "']").addClass("active");
    });

    $(".areasMobileMenu").click(function (ev) {
        var areaId = ev.target.closest("li").getAttribute("data-area-id");
        $(".active").removeClass("active");
        $("[data-area-id='" + areaId + "']").addClass("active");
        $('.areasMobileMenu').removeClass("areasBurgerOn");
    });

    if (window.location.search && !isNaN(parseInt(window.location.search.split('=')[1].split("&")[0]))) {
        var areaId = window.location.search.split('=')[1].split("&")[0];
        $(".active").removeClass("active");
        $("[data-area-id='" + areaId + "']").addClass("active");
    }

    $(".areaBurger").click(function () {
        $('.areasMobileMenu').toggleClass("areasBurgerOn");
    });

    $("#areasOuterContainer").bind(
        "mouseenter",
        function () {
            if (!moving) {
                moving = true;
                shouldScroll = true;
                scrollAreas();
            }
        }
    ).bind(
        "mouseleave",
        function (ev) {
            shouldScroll = false;
        }
    );

    $(".areaSquareLink").bind(
        "mouseenter",
        function () {
            shouldScroll = false;
        }
    ).bind(
        "mouseleave",
        function () {
            if (!moving) {
                moving = true;
                shouldScroll = true;
                scrollAreas();
            }
        }
    );

    function scrollAreas() {
        if (shouldScroll) {

            var operation = "-=";
            if (currentMousePos.x < window.innerWidth / 2) {
                if ($(".areaSquare:first")[0].isVisible()) {
                    operation = "=";
                }
                else {
                    operation = "+=";
                }
            }
            else {
                if ($(".areaSquare:last")[0].isVisible()) {
                    operation = "=";
                }
                else {
                    operation = "-=";
                }
            }

            if (window.innerWidth <= 1024) {
                operation = "=";
            }
            $("#areasInnerContainer").animate({
                    "left": operation + ($(".areaSquare").width() + 2) + "px"
                },
                {
                    duration: 2000,
                    easing: "linear",
                    complete: function () {
                        if (shouldScroll) {
                            scrollAreas();
                        }
                        else {
                            moving = false;
                        }
                    }
                }
            );

        }
        else {
            return;
        }
    }

    if (!("inViewPort" in Element.prototype)) {
        Element.prototype.inViewPort = function (opts) {
            if (!opts) {
                opts = {partial: false, margin: 0}
            }
            var element = this.getBoundingClientRect(),
                viewport = {
                    width: window.innerWidth,
                    height: window.innerHeight
                };
            return opts.partial ? element.bottom + opts.margin > 0 && element.left - opts.margin < viewport.width && element.top - opts.margin < viewport.height && element.right + opts.margin > 0 : element.top + opts.margin > 0 && element.right - opts.margin < viewport.width && element.bottom - opts.margin < viewport.height && element.left + opts.margin > 0;
        }
    }

    if (!("isVisible" in Element.prototype)) {
        Element.prototype.isVisible = function () {
            return this.inViewPort({
                    partial: true,
                    margin: 0
                }) && window.getComputedStyle(this).display !== "none" && window.getComputedStyle(this).visibility !== "hidden";
        }
    }

    $("#teamSearch").on("keyup", function (ev) {

        var searchString = this.value;
        if (searchString.length >= 1 && searchString != " ") {

            $(".teamList").empty();
            members.forEach(function (elm) {

                if (elm.name.toUpperCase().indexOf(searchString.toUpperCase()) >= 0) {
                    var section = document.createElement("DIV");
                    section.setAttribute("class", "section");

                    var sectionTitle = document.createElement("SPAN");
                    sectionTitle.setAttribute("class", "sectionTitle");
                    sectionTitle.innerHTML = elm.name;
                    section.appendChild(sectionTitle);

                    var sectionBody = document.createElement("DIV");
                    sectionBody.setAttribute("class", "sectionBody");
                    sectionBody.innerHTML = elm.position;
                    section.appendChild(sectionBody);

                    var sectionLink = document.createElement("SPAN");
                    sectionLink.setAttribute("class", "sectionLink");
                    var sectionLinkA = document.createElement("A");
                    sectionLinkA.setAttribute("href", "/equipa/" + elm.id);
                    sectionLinkA.innerHTML = "Saiba Mais";
                    sectionLink.appendChild(sectionLinkA);
                    section.appendChild(sectionLink);

                    $(".teamList").append(section);

                }
            });

        }
        else{
            $(".teamList").empty();
        }
    });

    /*
     *
     * $(".areaSquare").animate({ "left": "-="+($(".areaSquare").width()+2)+"px" }, "slow" )
     * */

});
<!-- This Javascript component is for aesthetic purposes only -->

$("#bg").mousemove(function(e) {
    parallaxIt(e, "#text01", -30);
    parallaxIt(e, "#vrms02", -100);
    parallaxIt(e, "#car03", -10);
    parallaxIt(e, "#bg04", -10);
});

$("#zealText").mousemove(function(e) {
    parallaxIt2(e, "#logintext01", -100);
    parallaxIt2(e, "#shapes02", -30);
});

function parallaxIt(e, target, movement) {
    var $this = $("#bg");
    var relX = e.pageX - $this.offset().left;
    var relY = e.pageY - $this.offset().top;

    TweenMax.to(target, 1, {
        x: (relX - $this.width() / 2) / $this.width() * movement,
        y: (relY - $this.height() / 2) / $this.height() * movement
    });
}

function parallaxIt2(e, target, movement) {
    var $this = $("#zealText");
    var relX = e.pageX - $this.offset().left;
    var relY = e.pageY - $this.offset().top;

    TweenMax.to(target, 1, {
        x: (relX - $this.width() / 2) / $this.width() * movement,
        y: (relY - $this.height() / 2) / $this.height() * movement
    });
}

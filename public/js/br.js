document.addEventListener("DOMContentLoaded", function(event) {
    var gg1 = new JustGage({
        id: "bigfella",
        value: 217,
        min: 0,
        max: 288,
        gaugeWidthScale: 0.6,
        counter: true,
        formatNumber: true,
        levelColorsGradient: false
    });

    document.getElementById('bigfella_refresh').addEventListener('click', function() {
        gg1.refresh(getRandomInt(0, 288));
    });
});

document.addEventListener("DOMContentLoaded", function(event) {
    var gg1 = new JustGage({
        id: "smallbuddy",
        value: 37,
        min: 0,
        max: 129,
        gaugeWidthScale: 0.6,
        counter: true,
        formatNumber: true,
        levelColorsGradient: false
    });

    document.getElementById('smallbuddy_refresh').addEventListener('click', function() {
        gg1.refresh(getRandomInt(0, 129));
    });
});
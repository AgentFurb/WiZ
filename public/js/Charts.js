// Bar chart
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["In", "Uit"],
      datasets: [
        {
          label: "Producten",
          backgroundColor: ['#f28e0b' , '#2f2e87'],
          data: [Math.floor(Math.random() * 50) + 25, Math.floor(Math.random() * 100) + 25]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Producten'
      }
    }
});

// Pie chart

new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: ["Katwijk", "Helmond", "Amsterdam", "Echt", "Tilburg"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#062670", "#92B4F4","#14439B","#C5D5E4","#5073E5"],
          data: [2278,1967,3734,1784,3133]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Totaal aantal overige producten per vestiging'
      }
    }
});

// Barro meter chart

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


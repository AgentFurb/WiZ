// Bar chart
countproducts = document.getElementById("countproducts").value;
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["In"],
      datasets: [
        {
          label: "Producten",
          backgroundColor: ['#f28e0b'],

          data: [countproducts]
          
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: false,
        text: 'Producten'
      },
      scales: {
        yAxes: [{
            ticks: {
                suggestedMin: 0,
                suggestedMax: 50
            }
        }]
    }
    }
});

// Pie chart
L0 = document.getElementById("Locatie0").value;
L1 = document.getElementById("Locatie1").value;
L2 = document.getElementById("Locatie2").value;
L3 = document.getElementById("Locatie3").value;
L4 = document.getElementById("Locatie4").value;
PL0 = document.getElementById("prodperlocatie0").value;
PL1 = document.getElementById("prodperlocatie1").value;
PL2 = document.getElementById("prodperlocatie2").value;
PL3 = document.getElementById("prodperlocatie3").value;
PL4 = document.getElementById("prodperlocatie4").value;

new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: [L0, L1, L2, L3, L4],
      datasets: [
        {
          label: "Population (millions)",

          backgroundColor: [ "#14439B", "#92B4F4","#5073E5","#C5D5E4","#062670" ],
          data: [PL0, PL1, PL2, PL3, PL4],
        }
      ]
    },
    options: {
      title: {
        display: false,
        text: 'Totaal aantal overige producten per vestiging'
      }
    }
});


// Barro meter chart
    countusers = document.getElementById("smallbuddyusers").value;
    var gg1 = new JustGage({
        id: "smallbuddy",
        value: countusers,
        min: 0,
        max: 25,
        gaugeWidthScale: 0.6,
        counter: true,
        formatNumber: true,
        // levelColorsGradient: false,
        noGradient: true,
        options: {
          legend: {
              labels: {
                  // This more specific font property overrides the global property
                  fontColor: "#000000",
              }
          }
      }
      
    });



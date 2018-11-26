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
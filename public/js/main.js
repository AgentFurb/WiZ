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





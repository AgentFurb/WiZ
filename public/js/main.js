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

function previewFile() {
  var preview = document.getElementById("img");
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}



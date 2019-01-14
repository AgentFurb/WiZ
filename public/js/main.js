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

function previewFileShop() {
  var preview = document.getElementById("imgShop");
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = file;
  }
}

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
// // assume the feature isn't supported
// var supportsPassive = false;
// // create options object with a getter to see if its passive property is accessed
// var opts = Object.defineProperty && Object.defineProperty({}, 'passive', { get: function(){ supportsPassive = true }});
// // create a throwaway element & event and (synchronously) test out our options
// document.addEventListener('test', function() {}, opts);

// // Use our detect's results. passive applied if supported, capture will be false either way.
// elem.addEventListener('touchstart', fn, supportsPassive ? { passive: true } : false); 


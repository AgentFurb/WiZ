window.addEventListener('beforeinstallprompt', (e) => {
  // Prevent Chrome 67 and earlier from automatically showing the prompt
  e.preventDefault();
  // Stash the event so it can be triggered later.
  deferredPrompt = e;
  // Update UI notify the user they can add to home screen
  btnAdd.style.display = 'block';
});

btnAdd.addEventListener('click', (e) => {
  // hide our user interface that shows our A2HS button
  btnAdd.style.display = 'none';
  // Show the prompt
  deferredPrompt.prompt();
  // Wait for the user to respond to the prompt
  deferredPrompt.userChoice
    .then((choiceResult) => {
      if (choiceResult.outcome === 'accepted') {
        console.log('User accepted the A2HS prompt');
      } else {
        console.log('User dismissed the A2HS prompt');
      }
      deferredPrompt = null;
    });
});

// //Listen for ability to show SW install prompt
// window.addEventListener('beforeinstallprompt', function(event){
// 	event.preventDefault(); //Prevent Chrome <= 67 from automatically showing the prompt
// 	installPromptEvent = event; //Stash the event so it can be triggered later.
// 	jQuery('.nebula-sw-install-button').removeClass('inactive').addClass('ready');
// });

// //Trigger the SW install prompt and handle user choice
// jQuery('.nebula-sw-install-button').on('click', function(){
// 	if ( typeof installPromptEvent !== 'undefined' ){
// 		jQuery('.nebula-sw-install-button').removeClass('ready').addClass('prompted');

// 		installPromptEvent.prompt(); //Show the modal add to home screen dialog
// 		ga('send', 'event', 'Progressive Web App', 'Install Prompt Shown', event.platforms.join(', '));

// 		//Wait for the user to respond to the prompt
// 		installPromptEvent.userChoice.then(function(result){
// 			jQuery('.nebula-sw-install-button').removeClass('prompted').addClass('ready');
// 			ga('send', 'event', 'Progressive Web App', 'Install Prompt User Choice', result.outcome);
// 			nv('event', 'Install Prompt ' + result.outcome);
// 		});
// 	} else {
// 		jQuery('.nebula-sw-install-button').removeClass('ready').addClass('inactive');
// 	}

// 	return false;
// });

// //PWA Installed
// window.addEventListener('appinstalled', function(){
// 	jQuery('.nebula-sw-install-button').removeClass('ready').addClass('success');
// 	ga('send', 'event', 'Progressive Web App', 'App Installed', 'The app has been installed');
// });

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


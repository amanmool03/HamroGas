//This div will display Google map
const mapArea = document.getElementById("map");

//This button will set everything into motion when clicked
const actionBtn = document.getElementById("showMe");

//This will display all the available addresses returned by Google's Geocode Api
const locationsAvailable = document.getElementById("locationList");

//Let's bring in our API_KEY
const __KEY = "AIzaSyA3ovAd7G1vbAbnK40sYZid-zhBFmaf5rY";

//Let's declare our Gmap and Gmarker variables that will hold the Map and Marker Objects later on
let Gmap;
let Gmarker;

//Now we listen for a click event on our button
actionBtn.addEventListener("click", (e) => {
  // hide the button
  actionBtn.style.display = "none";
  // call Materialize toast to update user
  M.toast({ html: "fetching your current location", classes: "rounded" });
  // get the user's position
  getLocation();
});
// Displays the different error messages
showError = (error) => {
  mapArea.style.display = "block";
  switch (error.code) {
    case error.PERMISSION_DENIED:
      mapArea.innerHTML = "You denied the request for your location.";
      break;
    case error.POSITION_UNAVAILABLE:
      mapArea.innerHTML = "Your Location information is unavailable.";
      break;
    case error.TIMEOUT:
      mapArea.innerHTML = "Your request timed out. Please try again";
      break;
    case error.UNKNOWN_ERROR:
      mapArea.innerHTML =
        "An unknown error occurred please try again after some time.";
      break;
  }
};
//Makes sure location accuracy is high
const options = {
  enableHighAccuracy: true,
};

displayLocation = (position) => {
  const lat = position.coords.latitude;
  const lng = position.coords.longitude;
  const latlng = { lat, lng };
  showMap(latlng);
  createMarker(latlng);
  mapArea.style.display = "block";
  getGeolocation(lat, lng); // our new function call
};
console.log(`Current Latitude is ${lat} and your longitude is ${lng}`);
showMap = (latlng) => {
  let mapOptions = {
    center: latlng,
    zoom: 17,
  };
  Gmap = new google.maps.Map(mapArea, mapOptions);
};
createMarker = (latlng) => {
  let markerOptions = {
    position: latlng,
    map: Gmap,
    animation: google.maps.Animation.BOUNCE,
    clickable: true,
  };
  Gmarker = new google.maps.Marker(markerOptions);
};

getGeolocation = (lat, lng) => {
  const latlng = lat + "," + lng;
  fetch(
    `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latlng}&key=${
      __AIzaSyA3ovAd7G1vbAbnK40sYZid - zhBFmaf5rY
    }`
  )
    .then((res) => res.json())
    .then((data) => populateCard(data.results));
};
populateCard = (geoResults) => {
  geoResults.map((geoResult) => {
    // first create the input div container
    const addressCard = document.createElement("div");
    // then create the input and label elements
    const input = document.createElement("input");
    const label = document.createElement("label");
    // then add materialize classes to the div and input
    addressCard.classList.add("card");
    input.classList.add("with-gap");
    // add attributes to them
    label.setAttribute("for", geoResult.place_id);
    label.innerHTML = geoResult.formatted_address;
    input.setAttribute("name", "address");
    input.setAttribute("type", "radio");
    input.setAttribute("value", geoResult.formatted_address);
    input.setAttribute("id", geoResult.place_id);
    addressCard.appendChild(input);
    addressCard.appendChild(label);
    return (
      // append the created div to the locationsAvailable div
      locationsAvailable.appendChild(addressCard)
    );
  });
};

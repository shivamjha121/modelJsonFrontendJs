<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/pages/dashboard-ecommerce.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
     <link rel="stylesheet" type="text/css" href="style.css">
     <link
      rel="stylesheet"
      href="https://unpkg.com/maplibre-gl@4.7.1/dist/maplibre-gl.css"
    />
    <script src="https://unpkg.com/maplibre-gl@4.7.1/dist/maplibre-gl.js"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    

    <!-- ////////////////////////////////////////////////////////////////////////////-->



    <div class="app-content content">
        <h1>Upload Models</h1>
        <div style="display: block">
              <div id="mapContainer"></div>
              <div id="searchContainer"></div>

              <div
                id="dataDisplay"
                style="
                  width: 400px;
                  position: absolute;
                  top: 50px;
                  right: 10px;
                  z-index: 1;
                  background-color: white;
                  word-break: break-word;
                "
              ></div>

              <div
                style="
                  position: absolute;
                  top: 5px;
                  z-index: 1;
                  background-color: white;
                  word-break: break-word;
                  padding: 10px;
                  border-radius: 10px;
                  max-height: 500px;
                  overflow: auto;
                "
              >
                <label class="label" for="locationInput"
                  >Location (Latitude, Longitude)<span class="required"
                    >*</span
                  ></label
                >
                <input
                  type="text"
                  id="locationInput"
                  class="inputField"
                  placeholder="Latitude, Longitude"
                  required
                  spellcheck="false"
                  onblur="checkRequired(this, 'locationError')"
                />
                <p id="locationError" class="errorMessage">
                  This field is required!
                </p>

                <label class="label" for="developerInput"
                  >Developer Name<span class="required">*</span></label
                >
                <select
                  id="developerInput"
                  name="developer"
                  placeholder="Enter Developer Name"
                  class="inputField"
                  onblur="checkRequired(this, 'developerError')"
                >
                <option value="" disabled selected>Select Developer</option>
              </select>
                <p id="developerError" class="errorMessage">
                  This field is required!
                </p>

                <label class="label"
                  >Select GLB File<span class="required">*</span></label
                >
                <input
                  id="fileUpload"
                  type="file"
                  class="inputField"
                  required
                />
                <p id="fileError" class="errorMessage">
                  This field is required!
                </p>

                <label class="label" for="projectInput">
                  Name<span class="required">*</span></label
                >
                <input
                  id="projectInput"
                  type="text"
                  name="project"
                  placeholder="Enter Project Name"
                  class="inputField"
                  onblur="checkRequired(this, 'projectError')"
                />
                <p id="projectError" class="errorMessage">
                  This field is required!
                </p>

                <label class="label" for="categorySelect"
                  >Select Categories</label
                >
                <select class="inputField" id="categorySelect">
                  <option value="" disabled selected>Select Category</option>
                </select>

                <label class="label" for="subcategorySelect"
                  >Select Subcategories</label
                >
                <select class="inputField" id="subcategorySelect">
                  <option value="" disabled selected>Select Subcategory</option>
                </select>

                <label class="label" for="stateSelect"
                  >Select State<span class="required">*</span></label
                >
                <select
                  class="inputField"
                  id="stateSelect"
                  onchange="updateCities(this.value)"
                  onblur="checkRequired(this, 'stateError')"
                >
                  <option value="" disabled selected>Select State</option>
              </select>
                <p id="stateError" class="errorMessage">
                  This field is required!
                </p>

                <label class="label" for="citySelect1">Select City</label>
                <select class="inputField" id="citySelect1">
                  <option value="" disabled selected>Select City</option>
                </select>

                <label class="label" for="areaInput">Area</label>
                <input
                  id="areaInput"
                  type="text"
                  name="area"
                  placeholder="Enter Area"
                  class="inputField"
                />

                <label class="label" for="sectorInput1">Sector</label>
                <input
                  id="sectorInput1"
                  type="text"
                  name="sector"
                  placeholder="Enter Sector"
                  class="inputField"
                />

                <button id="submitLocation" class="submitButton">
                  Preview Data
                </button>
                <button id="dbButton" class="dbButton">Add to DB</button>
              </div>
            </div>
    </div>
    
    <script>

const categories = {
Residential: {
show: "#sectorInput,#developerInput,#areaInput,#projectInput",
hide: "",
values: [
  "Residential Apartment",
  "Residential Land / Plot",
  "Serviced Apartments",
  "Independent / Builder Floor",
  "1RK / Studio Apartment",
  "Independent House / Villa",
  "Others",
],
},
Commercial: {
show: "#sectorInput,#developerInput,#areaInput,#projectInput",
hide: "",
values: [
  "Malls",
  "Markets, Shops / Showroom",
  "IT Parks",
  "Commercial Buildings",
  "Office Space",
  "Warehouse / Godown",
  "Commercial Land",
  "Factory / Manufacturing Unit",
  "SEZ",
  "Others",
],
},
Connectivity: {
show: "#projectInput,#areaInput",
hide: "#sectorInput",
values: [
  "Metro Station",
  "Railway Station",
  "Airport",
  "Bus Station",
  "Bus Stand",
  "Taxi Stand",
  "Ports",
],
},
"Points of Interest": {
show: "#projectInput,#sectorInput,#areaInput",
hide: "",
values: [
  "School",
  "College",
  "University",
  "Hospital",
  "Hotel",
  "Resort",
  "Eateries",
  "Crossings",
  "Flyover",
  "Stadium / Sports",
  "Police Station",
  "Fire Station",
  "Post Office",
  "Statues",
  "Temple",
  "Mosque",
  "Church",
  "Gurudwara",
  "Heritage Buildings",
  "Monuments",
  "Government Offices",
  "Parks",
  "Museum",
  "Exhibition Hall",
  "Auditorium",
  "Fuel Pump",
  "CNG Station",
  "EV Charging Station",
  "Banquet Halls",
  "Water Park",
  "Theme Park",
  "Others",
],
},
};

const statesAndCities = {
  Goa: ["Vasco da Gama", "Margao", "Panaji", "Mapusa", "Ponda"],
  Gujarat: ["Ahmedabad", "Gandhinagar", "Surat", "Junagadh", "Mundra"],
  Haryana: ["Gurugram", "Faridabad", "Kurukshetra"],
  Karnataka: [
    "Bengaluru",
    "Bellari",
    "Hampi",
    "Mangaluru",
    "Narsimhavana",
    "Shravanabelagola",
    "Udupi",
    "Aihole",
    "Sringeri",
    "Kollur",
    "Kolar",
    "Mysuru",
    "Bagalkote",
    "Subramanya",
    "Nanjangud",
    "Kumbhashi",
    "Mulbagal",
  ],
  Maharashtra: ["Mumbai", "Pune"],
  Punjab: ["Mohali", "Jalandhar"],
  Rajasthan: ["Jaipur", "Pilani"],
  "Tamil Nadu": [
    "Chennai",
    "Mahabalipuram",
    "Madurai",
    "Thanjavur",
    "Srirangam",
    "Kanchipuram",
    "Rameswaram",
    "Tiruchirapalli",
    "Nanganallur",
    "Madurai",
    "Thiruvannamalai",
    "Vaitheeswarankoil",
    "Palani",
    "Swamimalai",
    "Madurai",
    "Coimbatore",
    "Sikkal",
    "Venlankanni",
    "Kumbakonam",
    "Tirunelveli",
    "Ariyalur",
    "Nagapattam",
    "Samayapuram",
    "Kumbakonam",
    "Pillayarpatti",
    "Kanyakumari",
    "Thiruparankundram",
    "Vellore",
    "Nagapattinam",
    "Mannargudi",
    "Mayiladuthurai",
    "Srivilliputhur",
  ],
  Telangana: [
    "Hyderabad",
    "Yadagirigutta",
    "Bhadrachalam",
    "Nandi Kotkur",
  ],
  "Uttar Pradesh": [
    "Noida",
    "Ghaziabad",
    "Lucknow",
    "Greater Noida",
    "Greater Noida West",
    "Yamuna Expressway",
    "Jewar",
    "Ayodhya",
    "Agra",
    "Deogarh",
    "Varanasi",
    "Jhansi",
    "Prayagraj",
  ],
  "Union Territory": ["Lakshadweep"],
  "West Bengal": ["Kolkata"],
  Chandigarh: ["Chandigarh"],
  Delhi: ["Delhi"],
  Jharkhand: [
    "Ranchi",
    "Medinagar",
    "Hazaribagh",
    "Lohardaga",
    "Dhanbad",
    "Dumka",
    "Jamshedpur",
  ],
  "Andhra Pradesh": [
    "Visakhapatnam",
    "Vijayawada",
    "Tirumala",
    "Simhachalam",
    "Ahobilam",
    "Nellore",
    "Tirupati",
    "Mangalagiri",
    "Hanuman Junction",
    "Lepakshi",
    "Mantralayam",
    "Nandyal",
    "Kotipalli",
    "Nagalapuram",
    "Kanipakam",
    "Appalayagunta",
    "Srisailam",
    "Annavaram",
    "Kadiri",
    "Dwaraka Tirumala",
    "Guntur",
    "Kurnool",
    "Eluru",
    "Ongole",
    "Srikakulam",
    "Vizianagaram",
    "Amalapuram",
    "Anantapur",
    "Chittoor",
    "Rajamahendravaram",
    "Kadapa",
  ],
  "Arunachal Pradesh": ["Itanagar"],
  Assam: ["Guwahati"],
  Bihar: ["Patna"],
  "Himachal Pradesh": ["Mandi"],
  Kerala: [
    "Trivandrum",
    "Thiruvananthapuram",
    "Sabarimala",
    "Guruvayur",
    "Kottayam",
    "Thrissur",
    "Pathanamthitta",
    "Kollam",
    "Alappuzha",
    "Idukki",
  ],
  "Madhya Pradesh": ["Bhopal"],
  Manipur: ["Imphal"],
  Meghalaya: ["Shillong"],
  Mizoram: ["Aizawl"],
  Nagaland: ["Kohima"],
  Odisha: ["Bhubaneswar"],
  Puducherry: ["Puducherry", "Tirunallar"],
  Sikkim: ["Gangtok"],
  Tripura: ["Agartala"],
  Uttarakhand: ["Gairsain"],
  Chhattisgarh: ["Raipur"],
  UAE: ["Dubai"],
  "Andaman & Nicobar": ["Port Blair"],
  "Sri Lanka": ["Dambulla", "Sooriyawewa", "Colombo", "Pallekele"],
  "Jammu & Kashmir": ["Srinagar"],
};


const categoryFilter = document.getElementById("categorySelect");
for (const category of Object.keys(categories)) {
const option = document.createElement("option");
option.value = category;
option.text = category;
categoryFilter?categoryFilter.appendChild(option):"";
}
// Show/hide fields based on category
function showHideFields(show, hide) {
if (show) {
document
.querySelectorAll(show)
.forEach((element) => (element.style.display = "block"));
}
if (hide) {
document
.querySelectorAll(hide)
.forEach((element) => (element.style.display = "none"));
}
}

// Change category handler
function changeCategory(event) {
const selectedCategory = categories[event.target.value];
showHideFields(selectedCategory.show, selectedCategory.hide);
const subCategoryElement = document.getElementById("subcategorySelect");
subCategoryElement?subCategoryElement.innerHTML = "":"";
selectedCategory.values.sort();
selectedCategory.values.forEach((value) => {
const option = document.createElement("option");
option.value = value;
option.text = value.charAt(0).toUpperCase() + value.slice(1);
subCategoryElement?subCategoryElement.appendChild(option):"";
});
}

const categoryElement = document.getElementById("categorySelect");
for (const category of Object.keys(categories)) {
const option = document.createElement("option");
option.value = category;
option.text = category;
categoryElement?categoryElement.appendChild(option):"";
}
categoryElement?categoryElement.addEventListener("change", changeCategory):"";
changeCategory({ target: { value: "Residential" } }); // Initialize with default category

//state filters
// Populate states
const stateElement = document.getElementById("stateSelect");
// stateElement?stateElement.innerHTML =
//   '<option value="" disabled selected>Select State</option>':"";
Object.keys(statesAndCities).forEach((state) => {
  const option = document.createElement("option");
  option.value = state;
  option.text = state;
  stateElement?stateElement.appendChild(option):"";
});

const stateFilter = document.getElementById("stateFilter");
for (const state of Object.keys(statesAndCities)) {
  const option = document.createElement("option");
  option.value = state;
  option.text = state;
  stateFilter?stateFilter.appendChild(option):"";
}
// Populate cities based on state selection
function updateCities(state) {
  const cityElement = document.getElementById("citySelect1");
  cityElement.style.display = "block";
  cityElement.innerHTML = "";
  if (state) {
    const cities = statesAndCities[state].sort();
    cities.forEach((city) => {
      const option = document.createElement("option");
      option.value = city;
      option.text = city.charAt(0).toUpperCase() + city.slice(1);
      cityElement.appendChild(option);
    });
  }
}

</script>
    <!-- BEGIN VENDOR JS-->
     <script src="custom.js"></script>
     <script src="modelDataUploader.js"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
<?php
require_once 'header.php';
?>
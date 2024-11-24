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
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    

    <!-- ////////////////////////////////////////////////////////////////////////////-->



    <div class="app-content content">
    <div
              style="
                margin: auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
              "
            >
              <div style="display: flex; margin-bottom: 15px">
                <!-- Input Filter -->
                <div style="flex: 1; margin-right: 10px">
                  <input
                    type="text"
                    id="developer_idFilter"
                    placeholder="Enter text..."
                    style="
                      width: 100%;
                      padding: 8px;
                      border: 1px solid #ccc;
                      border-radius: 4px;
                    "
                  />
                </div>
                <!-- First Select Filter -->
                <div style="flex: 1; margin-right: 10px">
                  <select
                    id="developer_nameFilter"
                    style="
                      width: 100%;
                      padding: 8px;
                      border: 1px solid #ccc;
                      border-radius: 4px;
                    "
                  ></select>
                </div>
                <!-- Status Select Filter -->
                <div style="flex: 1; margin-right: 10px">
                  <select
                    id="developer_statusFilter"
                    style="
                      width: 100%;
                      padding: 8px;
                      border: 1px solid #ccc;
                      border-radius: 4px;
                    "
                  >
                    <option value="">Select Status</option>
                    <option value="1">1</option>
                    <option value="0">0</option>
                  </select>
                </div>
                <!-- Remaining Select Filters -->
                <div style="flex: 1; margin-right: 10px">
                  <select
                    id="categoryFilter"
                    style="
                      width: 100%;
                      padding: 8px;
                      border: 1px solid #ccc;
                      border-radius: 4px;
                    "
                  >
                    <option value="" >Select Category</option>

                  </select>
                </div>
                <div style="flex: 1; margin-right: 10px">
                  <select
                    id="subCategoryFilter"
                    style="
                      width: 100%;
                      padding: 8px;
                      border: 1px solid #ccc;
                      border-radius: 4px;
                    "
                  >
                    <option value="">Select SubCategory</option>
                  </select>
                </div>
                <div style="flex: 1">
                  <select
                    id="stateFilter"
                    style="
                      width: 100%;
                      padding: 8px;
                      border: 1px solid #ccc;
                      border-radius: 4px;
                    "
                  >
                    <option value="">Select State</option>
                  </select>
                </div>
                <!-- Button on the same line -->
                <div style="flex: 1; margin-left: 10px">
                  <button
                    style="
                      width: 100%;
                      padding: 8px;
                      background-color: #4caf50;
                      color: white;
                      border: none;
                      border-radius: 4px;
                      cursor: pointer;
                    "
                    onclick="applyFilters()"
                  >
                    Apply Filters
                  </button>
                </div>
              </div>
              <div>
                <!-- Table to Display Fetched Data -->
                <div
                  id="tableDiv"
                  style="width: 100%; margin-top: 20px; display: none"
                >
                  <table style="width: 100%; border-collapse: collapse">
                    <thead>
                      <tr>
                        <th style="border: 1px solid #ccc; padding: 8px">
                          Name
                        </th>
                        <th style="border: 1px solid #ccc; padding: 8px">
                          Developer Name
                        </th>
                        <th style="border: 1px solid #ccc; padding: 8px">
                          Category
                        </th>
                        <th style="border: 1px solid #ccc; padding: 8px">
                          SubCategory
                        </th>
                        <th style="border: 1px solid #ccc; padding: 8px">
                          State
                        </th>
                        <!-- <th style="border: 1px solid #ccc; padding: 8px;">City</th> -->
                        <th style="border: 1px solid #ccc; padding: 8px">
                          Date
                        </th>
                        <th style="border: 1px solid #ccc; padding: 8px">
                          Actions
                        </th>
                      </tr>
                    </thead>
                    <tbody id="dataTableBody">
                      <!-- Fetched data will be inserted here -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div id="viewModel">
              <div class="form-container">
                <button class="button close-button" onclick="closeForm()">
                  Close
                </button>
                <h1>Edit Model Data</h1>
                <form id="editModelForm">
                  <label for="developerName">Developer Name</label>
                  <input
                    readonly
                    type="text"
                    id="developerName"
                    name="developer_name"
                  />

                  <label for="lat">Latitude</label>
                  <input type="text" id="lat" name="lat" />

                  <label for="lng">Longitude</label>
                  <input type="text" id="lng" name="lng" />

                  <label for="category">Category</label>
                  <input type="text" id="category" name="category" />

                  <label for="subcategory">Subcategory</label>
                  <input type="text" id="subcategory" name="subcategory" />

                  <label for="name">Name</label>
                  <input type="text" id="name" name="name" />

                  <label for="state">State</label>
                  <input type="text" id="state" name="state" />

                  <label for="city">City</label>
                  <input type="text" id="city" name="city" />

                  <label for="sector">Sector</label>
                  <input type="text" id="sector" name="sector" />

                  <label for="area">Area</label>
                  <input type="text" id="area" name="area" />

                  <label for="modelPath">Model Path</label>
                  <input
                    readonly
                    type="text"
                    id="modelPath"
                    name="model_path"
                  />

                  <label for="modelStatus">Model Status</label>
                  <select id="modelStatus" name="model_status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>

                  <label for="date">Date</label>
                  <input readonly type="datetime-local" id="date" name="date" />

                  <button type="button" class="button" onclick="updateItem()">
                    Update Changes
                  </button>
                </form>
              </div>
            </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
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


const categoryFilter = document.getElementById("categoryFilter");
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
  const subCategoryElement = document.getElementById("subCategoryFilter");
  subCategoryElement?subCategoryElement.innerHTML = "":"";
  selectedCategory.values.sort();
  selectedCategory.values.forEach((value) => {
    const option = document.createElement("option");
    option.value = value;
    option.text = value.charAt(0).toUpperCase() + value.slice(1);
    subCategoryElement?subCategoryElement.appendChild(option):"";
  });
}

const categoryElement = document.getElementById("categoryFilter");
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
        stateFilter.appendChild(option);
      }
      // Populate cities based on state selection
      function updateCities(state) {
        const cityElement = document.getElementById("citySelect");
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
     <script src="custom.js"></script>
    <script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>

    <!-- END PAGE LEVEL JS-->
  </body>
</html>
<?php
require_once 'header.php';
?>

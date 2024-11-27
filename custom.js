// constants 
base_url = "http://65.0.201.115/api/v1";



// Add project 
const developerElement = document.getElementById("developerElement");
const developer_nameFilter = document.getElementById("developer_nameFilter");
const dataTableBody = document.getElementById("dataTableBodyDeveloper");
const developerName = [];

getAllDevloperName();
async function getAllDevloperName() {
    fetch( base_url + "/getProject", {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
    .then((response) => response.json())
          .then((data) => {
            data.data.forEach((element) => {
              developerName.push(element.developer_name);
            });
            createDeveloperTable(data.data);
            populateDeveloperFilter(developerName);
          })
          .catch((error) => {
            console.error("Error fetching data:", error);
          });
}

function createDeveloperTable(data) {
    console.log(data);
    const tableDivDeveloper = document.getElementById("tableDivDeveloper");
    tableDivDeveloper?tableDivDeveloper.style.display = "block":"";
    // Insert fetched data into the table
    const dataTableBodyDeveloper = document.getElementById(
      "dataTableBodyDeveloper"
    );
    dataTableBodyDeveloper?dataTableBody.innerHTML = "":""; // Clear existing data

    data.forEach((item) => {
      const row = document.createElement("tr");
      row.innerHTML = `
    <td style="border: 1px solid #ccc; padding: 8px;">${
      item.developer_id
    }</td>
    <td style="border: 1px solid #ccc; padding: 8px;">${
      item.developer_name
    }</td>
    <td style="border: 1px solid #ccc; padding: 8px;">${
      item.developer_status
    }</td>
    <td style="border: 1px solid #ccc; padding: 8px;">${new Date(
      item.createdAt
    ).toLocaleDateString()}</td>
     <td style="border: 1px solid #ccc; padding: 8px;">
        <button onclick="viewItem('${item._id}' , '${
        item.developerName
      }')" style="padding: 4px 8px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">View</button>
        <button onclick="deleteItem('${item._id}', '${
        item.developerName
      }')" style="padding: 4px 8px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;">Delete</button>
    </td>
`;
      dataTableBodyDeveloper?dataTableBodyDeveloper.appendChild(row):"";
    });
  }

function openAddDeveloperModel() {
    const viewModelDeveloper =
        document.getElementById("viewModelDeveloper");
    viewModelDeveloper.style.display = "block";
}
function closeDeveloperModel() {
    const viewModelDeveloper =
        document.getElementById("viewModelDeveloper");
    viewModelDeveloper.style.display = "none";

}
async function addDeveloper() {
    const developerForm= document.getElementById("editModelFormDeveloper");
    const formData = new FormData(developerForm);
    const data= Object.fromEntries(formData.entries());
    console.log(data);
    fetch(base_url + '/addProject', {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
      }).then((response) => response.json())
      .then((data) => {
        console.log(data);
        if(data.status === 201){
          alert(data.message);
          closeDeveloperModel();
          window.location.reload();
        } else {
          alert(data.message);
        }
        
      })
      .catch((error) => {
       alert("Error fetching data:", error);
      });
  }
//end Add project 


// Upload Model
function validateForm() {
    let isValid = true;
    const locationInput = document.getElementById("locationInput").value;
    const projectInput = document.getElementById("projectInput").value;
    const developerInput = document.getElementById("developerInput").value;
    const fileUpload = document.getElementById("fileUpload").files[0];
    const stateInput = document.getElementById("stateSelect").value;

    if (!locationInput) {
      document.getElementById("locationError").style.display = "block";
      isValid = false;
    } else {
      document.getElementById("locationError").style.display = "none";
    }

    if (!projectInput) {
      document.getElementById("projectError").style.display = "block";
      isValid = false;
    } else {
      document.getElementById("projectError").style.display = "none";
    }

    if (!developerInput) {
      document.getElementById("developerError").style.display = "block";
      isValid = false;
    } else {
      document.getElementById("developerError").style.display = "none";
    }

    if (!fileUpload) {
      document.getElementById("fileError").style.display = "block";
      isValid = false;
    } else {
      document.getElementById("fileError").style.display = "none";
    }

    if (!stateInput) {
      document.getElementById("stateError").style.display = "block";
      isValid = false;
    } else {
      document.getElementById("stateError").style.display = "none";
    }

    return isValid;
  }
function checkRequired(field, errorFieldId) {
    if (!field.value) {
      document.getElementById(errorFieldId).style.display = "block";
    } else {
      document.getElementById(errorFieldId).style.display = "none";
    }
  }
//Upload Model End

//------------------------------------Models Data ----------------------------------------
function populateDeveloperFilter(developerNames) {
    // Here, we populate the select element with the developer names
    const developerSelect = document.getElementById("developer_nameFilter");
    const developerInput = document.getElementById("developerInput");
    developerNames.forEach((name) => {
        const option = document.createElement("option");
        const option2 = document.createElement("option");
        option.value = name;
        option.textContent = name;
        option2.value = name;
        option2.textContent = name;
        developerInput?developerInput.appendChild(option2):"";
        developerSelect?developerSelect.appendChild(option):"";
    });
}

function validateForm() {
    // Add your validation logic here
    return true; // Return true if valid, false otherwise
  }

  async function applyFilters() {
    // Collect filter values
    const developer_id =
      document.getElementById("developer_idFilter").value;
    const state = document.getElementById("stateFilter").value;
    const developer_name = document.getElementById(
      "developer_nameFilter"
    ).value;
    const developer_status = document.getElementById(
      "developer_statusFilter"
    ).value;
    const category = document.getElementById("categoryFilter").value;
    const subCategoryFilter = document.getElementById(
      "subCategoryFilter"
    ).value

    // Create an object to hold the filter parameters
    const filterParams = {
      ...(developer_id && { developer_id }),
      ...(state && { state }),
      ...(developer_name && { developer_name }),
      ...(developer_status && { developer_status }),
      ...(category && { category }),
      ...(subCategoryFilter && { subCategoryFilter }),
    };

    // Construct the query string from the filter parameters
    const queryString = new URLSearchParams(filterParams).toString();

    // Construct the full URL
    const url = `http://65.0.201.115/api/v1/addModelJson?${queryString}`;

    try {
      // Fetch data from the constructed URL
      const response = await fetch(url);

      // Check if the response is okay (status in the range 200-299)
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }

      // Parse the JSON data from the response
      const data = await response.json();
      if (data.length === 0) {
        alert("No data found");
      } else {
        // You can replace this with your data handling logic
        createTable(data[0].developer_modelData);
      }
    } catch (error) {
      alert("data not found");
      console.error("Error fetching data:", error);
    }
  }

  function createTable(data) {
    const tableDiv = document.getElementById("tableDiv");
    tableDiv.style.display = "block";
    // Insert fetched data into the table
    const dataTableBody = document.getElementById("dataTableBody");
    dataTableBody.innerHTML = ""; // Clear existing data

    data.forEach((item) => {
      const row = document.createElement("tr");
      row.innerHTML = `
    <td style="border: 1px solid #ccc; padding: 8px;">${item.name}</td>
    <td style="border: 1px solid #ccc; padding: 8px;">${
      item.developerName
    }</td>
    <td style="border: 1px solid #ccc; padding: 8px;">${item.category}</td>
    <td style="border: 1px solid #ccc; padding: 8px;">${
      item.subcategory
    }</td>
    <td style="border: 1px solid #ccc; padding: 8px;">${item.state}</td>
    <td style="border: 1px solid #ccc; padding: 8px;">${new Date(
      item.date
    ).toLocaleDateString()}</td>
     <td style="border: 1px solid #ccc; padding: 8px;">
        <button onclick="viewItem('${item._id}' , '${
        item.developerName
      }')" style="padding: 4px 8px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">View</button>
        <button onclick="deleteItem('${item._id}', '${
        item.developerName
      }')" style="padding: 4px 8px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;">Delete</button>
    </td>
`;
      dataTableBody.appendChild(row);
    });
  }
  function viewItem(id, developer_name) {
    userId = id;
    document.getElementById("viewModel").style.display = "flex";

    fetch(
       base_url +`addModelJson?model_id=${id}&developer_name=${developer_name}`
    )
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        populateForm(data);

        // You can implement the logic here to display the data, for example in a modal
      })
      .catch((error) => {
        console.error(
          "There was a problem with the fetch operation:",
          error
        );
      });
  }
  function populateForm(data) {
    document.getElementById("developerName").value =
      data.developer_name || "";
    document.getElementById("lat").value =
      data.matchingModelData[0].lat || "";
    document.getElementById("lng").value =
      data.matchingModelData[0].lng || "";
    document.getElementById("category").value =
      data.matchingModelData[0].category || "";
    document.getElementById("subcategory").value =
      data.matchingModelData[0].subcategory || "";
    document.getElementById("name").value =
      data.matchingModelData[0].name || "";
    document.getElementById("state").value =
      data.matchingModelData[0].state || "";
    document.getElementById("city").value =
      data.matchingModelData[0].city || "";
    document.getElementById("sector").value =
      data.matchingModelData[0].sector || "";
    document.getElementById("area").value =
      data.matchingModelData[0].area || "";
    document.getElementById("modelPath").value =
      data.matchingModelData[0].model_path || "";
    document.getElementById("modelStatus").value =
      data.matchingModelData[0].model_status || "";
    document.getElementById("date").value =
      data.matchingModelData[0].date.slice(0, 16) || "";
  }
  function closeForm() {
    document.getElementById("viewModel").style.display = "none";
  }

  function updateItem() {
    const formData = new FormData(document.getElementById("editModelForm"));
    const data = Object.fromEntries(formData.entries());
    const model_id = userId;
    const developer_name = data.developer_name;
    const developer_modelData = {
      lat: data.lat,
      lng: data.lng,
      category: data.category,
      subcategory: data.subcategory,
      name: data.name,
      state: data.state,
      city: data.city,
      sector: data.sector,
      area: data.area,
      model_path: data.modelPath,
      developerName: data.developerName,
      model_status: data.modelStatus,
    };
    fetch(
       base_url +`/updateModelJson?model_id=${model_id}&developer_name=${developer_name}`,
      {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(developer_modelData),
      }
    )
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        alert("Item updated successfully!" + data.message);
      })
      .catch((error) => {
        console.error(
          "There was a problem with the fetch operation:",
          error
        );
      });
    closeForm();
  }
  function deleteItem(id, developer_name) {
    const confirmDelete = confirm(
      "Are you sure you want to delete this item?"
    );
    if (!confirmDelete) {
      return;
    }
    fetch(
       base_url+`/deleteModelJson?model_id=${id}&developer_name=${developer_name}`,
      {
        method: "DELETE",
      }
    )
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        alert("Item deleted successfully!");
        applyFilters();
      });
    // Implement the delete logic here (e.g., confirm deletion and call your API to delete)
  }
//Models Data End
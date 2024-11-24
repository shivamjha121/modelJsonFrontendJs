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
                <!-- Button on the same line -->
                <div style="flex: 1; margin-left: 10px">
                  <button
                    style="
                      padding: 8px;
                      background-color: #4caf50;
                      color: white;
                      border: none;
                      border-radius: 4px;
                      cursor: pointer;
                    "
                    onclick="openAddDeveloperModel()"
                  >
                    Add Developer
                  </button>
                </div>
              </div>
              <div>
                <!-- Table to Display Fetched Data -->
                <div
                  id="tableDivDeveloper"
                  style="width: 100%; margin-top: 20px; display: none"
                >
                  <table style="width: 100%; border-collapse: collapse">
                    <thead>
                      <tr>
                        <th style="border: 1px solid #ccc; padding: 8px">
                          Developer Id
                        </th>
                        <th style="border: 1px solid #ccc; padding: 8px">
                          Developer Name
                        </th>
                        <th style="border: 1px solid #ccc; padding: 8px">
                          Developer Status
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
                    <tbody id="dataTableBodyDeveloper">
                      <!-- Fetched data will be inserted here -->
                    </tbody>
                  </table>
                </div>
                <div id="viewModelDeveloper">
                  <div class="form-container-developer">
                    <button class="button close-button" onclick="closeDeveloperModel()">
                      Close
                    </button>
                    <h1>Add Developer</h1>
                    <form id="editModelFormDeveloper">
                      <!-- <label for="developerId">Developer Id</label>
                      <input
                        readonly
                        type="text"
                        id="developerId"
                        name="developer_id"
                      /> -->
                      <label for="developerName">Developer Name</label>
                      <input
                        
                        type="text"
                        id="developer_name"
                        name="developer_name"
                      />

                      <label for="developerStatus">Developer Status</label>
                      <select id="developerStatus" name="developer_status">
                        <option value="1">1</option>
                        <option value="0">0</option>
                      </select>
                      <!-- <label for="date">Date</label>
                      <input
                        readonly
                        type="datetime-local"
                        id="dateDeveloper"
                        name="date"
                      /> -->

                      <button
                        type="button"
                        class="button"
                        onclick="addDeveloper()"
                      >
                        Add Developer
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
     <script src="custom.js"></script>
    <script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
    <!-- <script src="theme-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script> -->
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
<?php
require_once 'header.php';
?>
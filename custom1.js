document.write(
  '<script src="https://unpkg.com/three@0.126.0/build/three.min.js"></script>'
);
document.write(
  '<script src="https://unpkg.com/three@0.126.0/examples/js/loaders/GLTFLoader.js"></script>'
);
var map,
  marker,
  alldata,
  d = null,
  f = false,
  id = [],
  path1,
  nam;
var Mdata = {
  model_id: 12345,
  model_path: "",
  state: "",
  city: "",
  area: "",
  sector: "",
  name: "",
  developerName: "",
  categories: "",
  sub_categories: "",
  lng: "",
  lat: "",
};
const addTodbButton = document.getElementById("dbButton");

/* load map */
map = new maplibregl.Map({
  container: "mapContainer",
  center: [78.80152088209013, 28.68558795245437],
  /* style:
      'https://api.maptiler.com/maps/streets/style.json?key=get_your_own_OpIi9ZULNHzrESv6T2vL', */
  style: {
    version: 8,
    sources: {
      "raster-tiles": {
        type: "raster",
        tiles: [
          "https://a.tiles.mapbox.com/v4/mapbox.satellite/{z}/{x}/{y}.png?access_token=sk.eyJ1IjoidmluYXlha2poYSIsImEiOiJjbDVrb2UxMzAwYzRhM2NtcHJsNm5yMDBzIn0.o5CaKuSPs0w9DqDbm1HPBA",
          "https://b.tiles.mapbox.com/v4/mapbox.satellite/{z}/{x}/{y}.png?access_token=sk.eyJ1IjoidmluYXlha2poYSIsImEiOiJjbDVrb2UxMzAwYzRhM2NtcHJsNm5yMDBzIn0.o5CaKuSPs0w9DqDbm1HPBA",
        ],
        tileSize: 256,
      },
    },
    layers: [
      {
        id: "simple-tiles",
        type: "raster",
        source: "raster-tiles",
        minzoom: 0,
        maxzoom: 22,
      },
    ],
  },
  zoom: 6,
});

/* select glb */
const theId = "fileUpload";
const input = document.querySelector(`#${theId}`);
input.addEventListener("change", (event) => {
  const file = event.target.files[0];
  nam = file.name;
  path1 = URL.createObjectURL(file);
});


document.getElementById("submitLocation").onclick = function () {
  addTodbButton.style.display = "none";
  var lat = document.getElementById("locationInput").value.split(",")[0];
  var lng = document.getElementById("locationInput").value.split(",")[1];
  var project_name = document.getElementById("projectInput").value;
  var developer_name = document.getElementById("developerInput").value;
  var state = document.getElementById("stateSelect").value;
  var city = document.getElementById("citySelect1").value;
  var sector = document.getElementById("sectorInput1").value;
  var area = document.getElementById("areaInput").value;
  var category = document.getElementById("categorySelect").value;
  var subcategory = document.getElementById("subcategorySelect").value;
  // var description = document.getElementById("descriptionInput").value;
  var fileUpload = document.getElementById("fileUpload").files[0];
  if (id) {
    maplibregl.modelRemove({ map: map, id: id });
  }
  if (lat && lng) {
    Mdata.lat = lat;
    Mdata.lng = lng;
    Mdata.model_path = path1;
    Mdata.model_path1 = nam;
    Mdata.state = state;
    Mdata.city = city;
    Mdata.area = area;
    Mdata.sector = sector;
    Mdata.name = project_name;
    Mdata.developerName = developer_name;
    Mdata.categories = category;
    Mdata.sub_categories = subcategory;
    // Mdata.description = description;
    Mdata.file = fileUpload;
    maplibregl.Model(
      {
        map: map,
        path: Mdata.model_path,
        lnglat: [lng, lat],
        modelUniqueId: Mdata.model_id,
        mrk: true,
        mdata: Mdata,
      },
      function (data) {
        id.push(data.layer);
      }
    );
    map.flyTo({
      center: [Mdata.lng, Mdata.lat],
      bearing: 0,
      duration: 2000,
      pitch: 0,
      zoom: 17,
    });
  }
};

/* 3Dmodel method */
maplibregl.Model = function (obj, success_callback) {
  const { map, path, lnglat, modelUniqueId, color, mrk, mdata } = obj;
  if (!map) {
    console.error("Map instance is required.");
    return false;
  }
  if (typeof path !== "string") {
    console.error("Path must be a string.");
    return false;
  }
  if (!lnglat ) {
    alert("Please provide lnglat and modelUniqueId.");
    return false;
  }
  const modelElement = {
    gltf: path,
    modelUniqueId: modelUniqueId.toString(),
    lnglat,
    color,
    mrk,
    mObj: mdata,
  };
  console.log(modelElement,"modelElement");
  const layer = maplibregl.model_call(modelElement, map);
  const result = { layer: layer.modelUniqueId };
  if (typeof success_callback === "function") {
    success_callback(result);
  } else {
    return result;
  }
};

/* 3DModel call */
var mrk = "";
maplibregl.model_call = function (parms, mapObj) {
  /* Clear the previous content */
  const clElement = document.getElementById("dataDisplay");
  if (clElement.innerHTML) {
    clElement.innerHTML = "";
  }
  /* Remove existing marker if present */
  if (mrk) {
    mrk.remove();
    mrk = "";
  }
  /* Model parameters */
  const modelOrigin = parms.lnglat;
  const modelAltitude = 0;
  const modelRotate = [Math.PI / 2, 0, 0];
  /* Convert to Mercator coordinates */
  let modelAsMercatorCoordinate = maplibregl.MercatorCoordinate.fromLngLat(
    modelOrigin,
    modelAltitude
  );
  /* Transformation parameters for the model */
  let modelTransform = {
    translateX: modelAsMercatorCoordinate.x,
    translateY: modelAsMercatorCoordinate.y,
    translateZ: modelAsMercatorCoordinate.z,
    rotateX: modelRotate[0],
    rotateY: modelRotate[1],
    rotateZ: modelRotate[2],
    scale: modelAsMercatorCoordinate.meterInMercatorCoordinateUnits(),
  };
  const THREE = window.THREE;
  /* Custom layer configuration */
  let lyr = mapObj.addLayer({
    id: parms.modelUniqueId,
    type: "custom",
    renderingMode: "3d",
    onAdd: function (map, gl) {
      this.camera = new THREE.Camera();
      this.scene = new THREE.Scene();
      /* Ambient light */
      const ambientLight = new THREE.AmbientLight("0xffffff", 1.2);
      this.scene.add(ambientLight);
      /* Load the GLTF model */
      const loader = new THREE.GLTFLoader();
      loader.load(parms.gltf, (gltf) => {
        this.scene.add(gltf.scene);
      });
      this.map = map;
      this.renderer = new THREE.WebGLRenderer({
        canvas: map.getCanvas(),
        context: gl,
        antialias: true,
      });
      this.renderer.autoClear = false;
    },
    render: function (gl, matrix) {
      const m = new THREE.Matrix4().fromArray(matrix);
      const l = new THREE.Matrix4()
        .makeTranslation(
          modelTransform.translateX,
          modelTransform.translateY,
          modelTransform.translateZ
        )
        .scale(
          new THREE.Vector3(
            modelTransform.scale,
            -modelTransform.scale,
            modelTransform.scale
          )
        );
      this.camera.projectionMatrix = m.multiply(l);
      this.renderer.resetState();
      this.renderer.render(this.scene, this.camera);
      this.map.triggerRepaint();
    },
  });
  if (lyr) lyr.modelUniqueId = parms.modelUniqueId;
  /* Model draggable functionality */
  if (parms.mrk) {
    if (mrk) {
      mrk.remove();
    }
    mrk = new maplibregl.Marker({ draggable: true })
      .setLngLat([parms.lnglat[0], parms.lnglat[1]])
      .addTo(map);
    mrk.on("dragend", function (e) {
      addTodbButton.style.display = "block";
      modelAsMercatorCoordinate = maplibregl.MercatorCoordinate.fromLngLat(
        [e.target._lngLat.lng, e.target._lngLat.lat],
        0
      );
      modelTransform = {
        translateX: modelAsMercatorCoordinate.x,
        translateY: modelAsMercatorCoordinate.y,
        translateZ: modelAsMercatorCoordinate.z,
        rotateX: modelRotate[0],
        rotateY: modelRotate[1],
        rotateZ: modelRotate[2],
        scale: modelAsMercatorCoordinate.meterInMercatorCoordinateUnits(),
      };
      const item = parms.mObj;
      console.log(item, "item");
      Object.keys(item).forEach(function (key) {
        if (key === "lat") {
          item[key] = e.target._lngLat.lat;
        }
        if (key === "lng") {
          item[key] = e.target._lngLat.lng;
        }
        /*const ne = [mapObj.getBounds()._ne.lng, mapObj.getBounds()._ne.lat];
        const sw = [mapObj.getBounds()._sw.lng, mapObj.getBounds()._sw.lat];
        const ns = [ne, sw];
        if (key === "b") {
          item[key] = ns;
        } else {
          item["b"] = ns;
        }*/
          // state: document.getElementById("state").value || "",
          // city: document.getElementById("City").value || "",
          // area: document.getElementById("Area").value || "",
          // sector: document.getElementById("Sector").value || "",
          // name: document.getElementById("Name").value || "",
          // developerName: document.getElementById("DeveloperName").value || "",
          // categories: document.getElementById("categories").value || "",
          // sub_categories: document.getElementById("sub_categories").value || "",

        if (key === "h") {
          item[key] = mapObj.getBearing();
        } else {
          item["h"] = mapObj.getBearing();
        }
        delete item.p;
        delete item.file;
        // delete item.model_id;
        delete item.model_path;
      });
      clElement.style.padding = "5px";
      clElement.innerHTML =
        "Updated data..<br>" +
        JSON.stringify(item)
          .replace(/{/g, "<br>{<br>")
          .replace(/}/g, "<br>}<br>")
          .replace(/","/g, '",<br>"')
          .replace(/,"/g, ',<br>"');
      console.log(item,"updated data");
    });
  }
  return lyr;
};

/* Remove 3DModel */
maplibregl.modelRemove = function (parms) {
  if (parms.map) {
    if (parms.id.length > 0) {
      for (var i = 0; i < parms.id.length; i++) {
        if (parms.map.getLayer(parms.id[i])) {
          parms.map.removeLayer(parms.id[i]);
        }
      }
    }
    if (typeof parms.id == "string") {
      if (parms.map.getLayer(parms.id)) {
        parms.map.removeLayer(parms.id);
      }
    }
  } else {
    console.warn("pass map!");
  }
};



addTodbButton.addEventListener("click", function () {

  if (Mdata.lng && Mdata.lat) {
    // const loader =document.getElementById("fullScreenOverlay");
    // loader.style.display = "flex";
    // Create a FormData object to handle file upload along with other data
    var formData = new FormData();
    
    // Append project_name
    formData.append("developer_name", Mdata.developerName);

    // Append project_modelData as a JSON string
    var projectModelData = [
      {
        // "location": `${Mdata.lat},${Mdata.lng}`,
        "lat": Mdata.lat,
        "lng": Mdata.lng,
        "category": Mdata.categories,
        "subcategory": Mdata.sub_categories,
        "project": Mdata.name,
        "name": Mdata.name,
        "developerName": Mdata.developerName,
        "state": Mdata.state,
        "city": Mdata.city,
        "sector": Mdata.sector,
        "area": Mdata.area,
        "model_path": Mdata.model_path // This will be updated below if a file is provided
      }
    ];

    formData.append("developer_modelData", JSON.stringify(projectModelData));

    // Check if a file is selected and append it to the FormData
    const fileInput = document.getElementById('fileUpload'); // Assuming you have a file input element with id 'fileInput'
    if (fileInput && fileInput.files[0]) {
      formData.append("file", fileInput.files[0]); // Append the file
    }

    // Make the fetch request with multipart form data
    fetch('http://65.0.201.115/model/api/v1/addModelJson', {
      method: 'POST',
      body: formData // Send formData instead of JSON
    })
    .then(response => response.json())
    .then(data => {
      // loader.style.display = "none";
      console.log('Success:', data);
      
      // Check if status is either 200 or 201
      if (data.status === 200 || data.status === 201) {
        window.alert('Model Data added successfully');
        window.location.reload();
      } else {
        window.alert('Failed to add Model Data: ' + data.message);
      }
    })
    
    .catch((error) => {
      console.error('Error:', error);
      window.alert('Failed to add Model Data'+ error.error);
    });
  }
});

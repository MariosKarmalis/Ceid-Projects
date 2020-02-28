/**
 * First we setup the year and time picker options 
 * by DOM manipulation, meaning adding HTML.
 * We do this so it is easily manipulated later on.
 * @param {String} : dsta dend msta mend ysta yend tsta tend
 * For (start & end) day , month , year and time values.   
 */

let dsta = document.getElementsByName("start-day")[0];
let dend = document.getElementsByName("end-day")[0];
let msta = document.getElementsByName("start-month")[0];
let mend = document.getElementsByName("end-month")[0];
let ysta = document.getElementsByName("start-year")[0];
let yend = document.getElementsByName("end-year")[0];
let tsta = document.getElementsByName("start-time")[0];
let tend = document.getElementsByName("end-time")[0];
    
for (let i = 2000; i <= 2020; i++) {
    let opt = new Option();
    opt.value = opt.text = i;
    ysta.add(opt);
}
for (let j = 2020; j >= 2000; j--) {
    let opt = new Option();
    opt.value = opt.text = j;
    yend.add(opt);
}
for (let k = 0; k < 24; k++) {
    let opt = new Option();
    opt.value = opt.text = k;
    tsta.add(opt);
}
for (let m = 0; m < 24; m++) {
    let opt = new Option();
    opt.value = opt.text = m;
    tend.add(opt);
}

dsta.addEventListener("change", validate_date);
dend.addEventListener("change", validate_date);
msta.addEventListener("change", validate_date);
mend.addEventListener("change", validate_date);
ysta.addEventListener("change", validate_date);
yend.addEventListener("change", validate_date);
tsta.addEventListener("change", validate_date);
tend.addEventListener("change", validate_date);

function validate_date() {
    // Ensuring start existence --> if end existence.
    // Checking day
    if (dend.value !=""){
        if(dsta.value == "") {
            alert("Can't define end day without start day");
            dend.value = "" ;
        }
    }
    // Checking month 
    if (mend.value !=""){
        if(msta.value == "") {
            alert("Can't define end month without start month");
            mend.value = "" ;
        }
    }
    // Checking time
    if (tend.value !=""){
        if(tsta.value == "") {
            alert("Can't define end time without start time");
            tend.value = "" ;
        }
    }

    // Checking Year
    if (yend.value != ""){
        if (ysta.value > yend.value) {
            alert("Starting year should be less than ending year!");
            yend.value = "";
        }
        if(ysta.value ==""){
            alert("Can't define end year without start year");
            yend.value = "";
        }
    }

}

/**
 * Time for collecting the information and utilizing them. 
 */

document.getElementById("query_submit").onclick = admin_query_data ;

$("#time_form").submit(function(e) {
    e.preventDefault();
});

function admin_query_data() {
    // Gathering data
    let time_data = [dsta.value,
        dend.value,
        msta.value,
        mend.value,
        ysta.value,
        yend.value,
        tsta.value,
        tend.value]

    let types_data =$('#activity_type').val();

    // ? Maybe clear the form? 
    // TODO ADD ANIMATION HERE AND DISABLE USER INPUT.
    return $.ajax({
        type: "POST",
        url: "admin_map.php",
        data : {time_data : time_data, types_data : types_data},
        success : function(response) {
            display_to_Map(response);
        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
        }
    });
}

function display_to_Map(data) {
    // TODO CHANGE ANIMATION.

    // First clear existing layers.
    mymap.eachLayer(function (layer) {
        mymap.removeLayer(layer);
    });

    // Set the map again.

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZXZyaXBpZGlzIiwiYSI6ImNrNm1sb25kZzBmdjQzaHJ1eDIzbWxscTUifQ.K0YS9MGl1aaZ8rnmlRAvmw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);

    // Callback for the data to be converted.
    toGeoJSON(data,function(response){
        let locations = response.features.map(function(rat) {
            var location = rat.geometry.coordinates;
            return location;
          });
          
          var layer = L.TileLayer.maskCanvas({
            radius: 5,  
            useAbsoluteRadius: true, 
            color: '#000',  
            opacity: 0.5,  
            noMask: false,  
            lineColor: '#A00' 
     });
          layer.setData(locations);
          mymap.addLayer(layer);
    });
}

function toGeoJSON(data,callback) {
    /**
     * ! Key Note : Usually in geoJSON for coordinates we have [Long,Lat]
     * But for our needs we went with Lat Long eventually.
     */
    let geojson ={
        type: "FeatureCollection",
        features :[],
    };
        json_data = JSON.parse(data);

        for (i = 0; i < json_data.length; i++) {
            geojson.features.push({
              "type": "Feature",
              "geometry": {
                "type": "Point",
                "coordinates": [Number(json_data[i].Latitude), Number(json_data[i].Longitude)] 
              },
              "properties": {
                "Id": json_data[i].Location_ID,
                "Location DateTime" : json_data[i].Location_DateTime ,
                "Accuracy": json_data[i].Accuracy ,
                "Velocity": json_data[i].Velocity ,
                "Heading": json_data[i].Heading ,
                "Altitude": json_data[i].Altitude ,
                "Activity_DT": json_data[i].Activity_DT ,
                "Type": json_data[i].Type ,
                "Confidence": json_data[i].Confidence 
              }
            });
        }
        callback(geojson);
}


/**
 * For DELETING DATA 
 */

 function deleting(){
     if (confirm("Are you sure you want to delete all of the entries ?")){
        return $.ajax({
            type: "POST",
            url: "delete_all.php",
            success : function(response) {
                document.getElementById("deleted").innerHTML = "Everything was deleted.";
            },
            error: function(xhr, resp, text) {
                console.log(xhr, resp, text);
                document.getElementById("deleted").innerHTML = "There was an error, check the console for more info.";
            }
        });
     }
 }
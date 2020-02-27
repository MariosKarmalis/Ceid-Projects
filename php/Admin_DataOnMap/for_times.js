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
    // Gathering 
    let time_data = [dsta.value,
        dend.value,
        msta.value,
        mend.value,
        ysta.value,
        yend.value,
        tsta.value,
        tend.value]

    let types_data =$('#activity_type').val();

    //? Clearing form ? 
    // dsta.value = "";
    // dend.value = "";
    // msta.value = "";
    // mend.value = "";
    // ysta.value = "";
    // yend.value = "";
    // tsta.value = "";
    // tend.value = "";
    // $('#activity_type').val([]);
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
    // TODO LINK WITH MAP AND CHANGE ANIMATION.
    let test = JSON.parse(data);
    console.log(test);
    
    
}

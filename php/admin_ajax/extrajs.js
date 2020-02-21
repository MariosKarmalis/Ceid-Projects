document.getElementById("clickMe").onclick = get;
document.getElementById("forma").onsubmit = get2;

$("#forma").submit(function(e) {
    e.preventDefault();
});

function getData() {
    return $.ajax({
        type: "POST",
        url: "test.php",             
        dataType: "json",   //expect JSON to be returned
        data : {type : 1}
    });
}

function handleData(data /* , textStatus, jqXHR */ ) {
    var d = JSON.stringify(data);
    d = JSON.parse(d);
    console.log(d);
    //do some stuff
}

function get() {
    getData().done(handleData);
}

/********** WITH HTML FORM INPUT ***********/

function withInput(){
    var formData = JSON.stringify($("#forma").serializeArray());
    console.log (formData);
    return $.ajax({
        type: "POST",
        url: "test.php",
        data: formData
    })
}

function handle2(inp){
    alert(inp);
    console.log(inp);
    // do stuff
}

function get2(){
    withInput().done(handle2);
}

function getRandomColorHex() {
    var hex = "0123456789ABCDEF",
        color = "#";
    for (var i = 1; i <= 6; i++) {
    color += hex[Math.floor(Math.random() * 16)];
    }
    return color;
}
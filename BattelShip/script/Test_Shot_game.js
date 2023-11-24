function shoot(i, j) {
    console.log("sparato a: " + i + " " + j);
    var tdElement = document.getElementById(i + "_" + j);
    tdElement.removeAttribute("onclick");
    tdElement.setAttribute("class", "blu");
}

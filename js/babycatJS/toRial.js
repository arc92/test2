function ToRial(str) {

    var objRegex = new RegExp('(-?[0-9]+)([0-9]{3})');

    while (objRegex.test(str)) {
        str = str.toString().replace(objRegex, '$1,$2');
    }

    return str;
}
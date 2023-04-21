/*! ledvance-2019 1.3.1-95 17-11-2020 17:11:20 */
var url = new URL(window.location.href);
var query = url.searchParams.get("query");
var fq = url.searchParams.get("fq");
if (fq != null && fq != "*") {
    var fqArray = fq.split(" OR ");
    fqArray.forEach(function (element) {
        var selector = element.replace("category:", "").replace("(", "").replace(")", "");
        selector = replaceAll(selector, " ", "_");
        if (selector != "") {
            var checkbox = document.querySelector("#" + selector);
            checkbox.checked = true;
        }
    });
}


function replaceAll(str, search, replacement) {
    var target = str;
    return target.split(search).join(replacement);
};


function doSearch(name, val, val2) {
    var url = new URL(window.location.href);
    var fq = url.searchParams.get("fq");
    var query = url.searchParams.get("query");
    if (query == null || query == "") {
        query = "*";
    }
    if (name == "reset") {
        window.location.href = "?action=dosearch&query=" + query;
    }
    var value = name.replace(" ", "&nbsp;");
    var id = name.replace(" ", "_");
    var selector = replaceAll(name, " ", "_");
    var checkbox = document.querySelector("#" + selector);
    if (checkbox.checked == false) {
        fq = fq.replace("OR " + val + ":" + name + " OR", "OR");
        fq = fq.replace(val + ":" + name, "");
        if (fq.startsWith(" OR ")) {
            window.location.href = "?action=dosearch&query=" + query + "&fq=" + fq.substring(4, fq.length);
        }
        else if (fq.endsWith(" OR ")) {
            window.location.href = "?action=dosearch&query=" + query + "&fq=" + fq.substring(0, fq.length - 4);
        } else {
            window.location.href = "?action=dosearch&query=" + query + "&fq=" + fq;
        }

    } else {
        if (typeof (fq) != 'undefined' && fq != null && fq != "" && fq != "*") {
            window.location.href = "?action=dosearch&query=" + query + "&fq=" + fq + " OR " + val + ":" + name;
        } else {
            window.location.href = "?action=dosearch&query=" + query + "&fq=" + val + ":" + name;
        }
    }
}

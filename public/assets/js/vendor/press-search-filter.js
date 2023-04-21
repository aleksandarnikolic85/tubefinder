/*! ledvance-2019 1.3.1-95 17-11-2020 17:11:20 */
var url = new URL(window.location.href);
var query = url.searchParams.get("query");
var fq = url.searchParams.get("fq");

document.querySelector("#filter-search").addEventListener("keydown", function (e) {
    if (!e) { var e = window.event; }
    // Enter is pressed
    if (e.keyCode == 13) { doSearch("filter-search", document.querySelector("#filter-search").value); }
}, false);
if (fq != null && fq != "*") {
    var fqArrayParts = fq.split(") AND (");
} else {
    var fqArrayParts = [];
}
fqArrayParts.forEach(function (element) {
    if (element != null) {
        var fqArray = element.split(" OR ");
    } else {
        var fqArray = [];
    }
    fqArray.forEach(function (elementInner) {
        var selector = elementInner.replace("category_pressrelease:", "").replace("topic_pressrelease:", "").replace("date_pressrelease:", "").replace(" ", "_").replace("(", "").replace(")", "");
        if (selector != "*" && !selector.startsWith("[") && !selector.startsWith("*_AND")) {
            var checkbox = document.querySelector("#" + selector);
            checkbox.checked = true;
        } else if (selector != "*" && selector.startsWith("[")) {
            var range = selector.split("_TO ");
            document.querySelector("#years-min").value = new Date(parseInt(range[0].replace("[", ""))).getFullYear();
            document.querySelector("#years-max").value = new Date(parseInt(range[1].replace("]", ""))).getFullYear();
        }

    });
});





function doSearch(name, val, val2) {
    var url = new URL(window.location.href);
    var fq = url.searchParams.get("fq");
    var query = url.searchParams.get("query");

    if (query == null || query == "") {
        query = "*";
    } else {
        document.querySelector("#filter-search").value = query;
    }

    if (name == "reset") {
        window.location.href = "?fq=*";
    }

    if (name == "filter-search") {
        if (val == "") {
            val = "*";
        }

        if (fq != null) {
            window.location.href = "?query=" + val + "&fq=" + fq;
        } else {
            window.location.href = "?query=" + val;
        }
    }

    if (name == "years-min" || name == "years-max") {
        var min = new Date(val + "-01-01T00:00:00").getTime();
        var max = new Date(val + "-12-31T23:59:59").getTime();
        var fqArrayParts = fq.split(" AND (date_pressrelease");
        var fqDate = "date_pressrelease:[" + min + " TO " + max + "]";
        if (fq != null) {
            window.location.href = "?query=" + query + "&fq=" + fqArrayParts[0] + " AND (" + fqDate + ")";
        } else {
            window.location.href = "?query=" + query + "&fq=" + fqDate;
        }
    } else {
        var value = name.replace(" ", "&nbsp;");
        var id = name.replace(" ", "_");
        var selector = name.replace(" ", "_");
        var checkbox = document.querySelector("#" + selector);
        if (checkbox.checked == false) {
            fq = fq.replace(val + ":" + name, "");
            if (fq.startsWith("()")) {
                window.location.href = "?query=" + query + "&fq=" + fq.replace("()", "(category_pressrelease:*)");
            }
            else if (fq.endsWith("()")) {
                window.location.href = "?query=" + query + "&fq=" + fq.replace("()", "(topic_pressrelease:*)");
            } else {
                window.location.href = "?query=" + query + "&fq=" + fq.replace(" OR )", ")").replace("( OR ", "(");
            }
        } else {
            if (typeof (fq) != 'undefined' && fq != null && fq != "" && fq != "*") {
                var partsArray = fq.split(") AND (");
                if (val == "category_pressrelease") {
                    if (partsArray[0].substring(1, partsArray[0].length) != "category_pressrelease:*") {
                        categoryPart = partsArray[0].substring(1, partsArray[0].length) + " OR " + val + ":" + value;
                    } else {
                        categoryPart = val + ":" + value;
                    }
                    topicPart = partsArray[1].substring(0, partsArray[1].length - 1);
                } else if (val == "topic_pressrelease") {
                    if (partsArray[1].substring(0, partsArray[1].length - 1) != "topic_pressrelease:*") {
                        topicPart = partsArray[1].substring(0, partsArray[1].length - 1) + " OR " + val + ":" + value;
                    } else {
                        topicPart = val + ":" + value;
                    }
                    categoryPart = partsArray[0].substring(1, partsArray[0].length);
                }
                window.location.href = "?query=" + query + "&fq=(" + categoryPart + ") AND (" + topicPart + ")";
            } else {
                var topicPart = "topic_pressrelease:*";
                var categoryPart = "category_pressrelease:*";
                if (val == "category_pressrelease") {
                    categoryPart = val + ":" + value;
                } else {
                    topicPart = val + ":" + value;
                }
                window.location.href = "?query=" + query + "&fq=(" + categoryPart + ") AND (" + topicPart + ")";
            }
        }

    }
}




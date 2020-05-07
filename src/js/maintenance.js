maintenance = false

if (maintenance == true) {
    if (!(window.location.pathname == "/maintenance/")) {
        window.location.href = "/maintenance/";
    }
} else {
    if (window.location.pathname == "/maintenance/" || window.location.pathname == "/maintenance" || window.location.pathname == "/maintenance/index.html")
    window.location.href = "/";
}

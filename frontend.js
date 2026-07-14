function load_aioa_script() {
    const domain = window.location.hostname;

    fetch("https://ada.skynettechnologies.us/api/widget-settings", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: new URLSearchParams({
            website_url: domain
        })
    })
    .then(response => response.json())
    .then(data => {
        const no_required_eu = data?.Data?.no_required_eu ?? "1";

        let scriptSrc = "";

        if (no_required_eu == "0") {
            // EU script
            scriptSrc = "https://eu.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js?colorcode=420083&token=&position=bottom_right";
        } else {
            // Normal AIO script
            scriptSrc = "https://www.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js?aioa_reg_req=true&colorcode=420083&token=&position=bottom_right";
        }

        const scriptEle = document.createElement("script");
        scriptEle.src = scriptSrc;
        scriptEle.type = "text/javascript";
        scriptEle.async = true;
        scriptEle.id = "aioa-adawidget";

        document.head.appendChild(scriptEle);
    })
    .catch(error => {
        console.error("Widget Settings API Error:", error);

        // Fallback to normal script
        const scriptEle = document.createElement("script");
        scriptEle.src = "https://www.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js?aioa_reg_req=true&colorcode=&token=&position=bottom_right";
        scriptEle.type = "text/javascript";
        scriptEle.async = true;
        scriptEle.id = "aioa-adawidget";

        document.head.appendChild(scriptEle);
    });
}

load_aioa_script();
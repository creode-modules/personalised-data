class PersonalisedData {
    constructor() {
        this.init();
    }

    init() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Parse the response.
                let response = JSON.parse(this.responseText);

                // Fire off a document window event to let other scripts know that the AJAX initialisation has completed.
                let event = new CustomEvent('getPersonalisedDataComplete', { detail: response });

                // Dispatch the event.
                document.dispatchEvent(event);
            }
        };

        xhttp.open("GET", "/ajax/get-personalised-data", true);
        xhttp.send();
    }
}

window.addEventListener("DOMContentLoaded", function () {
    new PersonalisedData();
});

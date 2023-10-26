// Requires jQuery!


function getToday() {
    alert(new Date().toLocaleDateString());
}

function greetings(name) {
    alert(`wellcome ${name}`);
}

function issueCollector() {jQuery.ajax({
    url: "https://jira.vaimo.com/plugins/servlet/issueCollectorBootstrap.js?collectorId=4495dab0&locale=en_UK",
    type: "get",
    cache: true,
    dataType: "script"
});
}


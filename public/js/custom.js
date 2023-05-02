$(document).ready(function () {
    $(".dropdown").click(function () {
        $(".dropdown-content").toggle();
    });
});
$(document).on("click", function (event) {
    var $trigger = $(".dropdown");
    if ($trigger !== event.target && !$trigger.has(event.target).length) {
        $(".dropdown-content").slideUp("fast");
    }
});

$(document).ready(function () {
    $(".dotted-icon").click(function () {
        $(".user-detail").toggle();
    });
});
$(document).on("click", function (event) {
    var $trigger = $(".info");
    if ($trigger !== event.target && !$trigger.has(event.target).length) {
        $(".user-detail").slideUp("fast");
    }
});

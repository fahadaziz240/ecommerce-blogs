$(document).ready(function () {

    //check for have the link delete class

    if ($("a.delete").length) {
        $("a.delete").click(function (e) {
            e.preventDefault();
            if (confirm("are you sure?")) {
                window.location.href = $(this).attr("href");
            }
        });
    }
    if ($(".order-detail").length) {
        $(".order-detail").click(function () {
            let url = window.location.protocol + "order_detail/" + $(this).data("id");
            fetch(url).then(res => res.text()).then(html => $("#orderModel .modal-body").html(html));
        });
    }
});
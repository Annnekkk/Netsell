$(document).ready(function() {
    $("#dang_nhap").submit(function(e) {
        e.preventDefault();
        const form = $(this);
        const url = form.attr("action");
        const method = form.attr("method");
        sign(url, method, form.serialize());
    });
    $("#dang_ki").submit(function(e) {
        e.preventDefault();
        const form = $(this);
        const method = form.attr("method");
        const url = form.attr("action");
        sign(url, method, form.serialize());
        console.log(method);
        console.log(url);
        console.log(form.serialize());
    });

    $("#nap_the_cao").submit(function(e) {
        e.preventDefault();
        const form = $(this);
        const method = form.attr("method");
        const url = form.attr("action");
        console.log(method);
        console.log(url);
        console.log(form.serialize());
        curl(url, method, form.serialize());
    });

    function curl(url, method, data) {
        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data['status'] == "error") {
                    swal("Lỗi", data['msg'], data['status']);
                } else {
                    swal("Thành Công", data['msg'], data['status']);
                    setTimeout(function() {
                        location.href = ""
                    }, 1000);
                }
            }
        });
    }

    function sign(url, method, data) {
        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: "json",
            success: function(data) {

                if (data['status'] == 'error') {
                    var title = "Thất Bại !";
                    var button = "Thử Lại";
                } else {
                    var title = "Thành Công";
                    var button = "Đóng";
                    setInterval(() => {
                        window.location.replace("/");
                    }, 1000);
                }

                Swal.fire({
                    title: title,
                    text: data.msg,
                    icon: data.status,
                    confirmButtonText: button
                });
            }
        });
    }


});
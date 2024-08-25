"use strict";
$(document).ready(function () {
    var myModal = new bootstrap.Modal(document.getElementById("nwpModal"), {});
    var nwpPreloader = new bootstrap.Modal(document.getElementById("nwpPreloader"), {});
    // jQuery.noConflict();
    $(document).on("click", ".getPage", function () {
        var url = $(this).attr('data-link');
        getPage(url);
    });
    $(document).on("click", ".resetData", function () {
        var url = $(this).attr('data-link');
        resetData(url);
    });
    $(document).on("click", ".deleteData", function () {
        destroyData($(this))
    });
    $(document).on("submit", ".storeData", function (e) {
        e.preventDefault();
        var form = document.querySelector('.storeData');
        saveFormData(form)
    });

    $(document).on("change", ".prevImage", function(){
        readURL(this);
    });
    $(document).on("change", ".getSections", function(){
        var id = this.value;
        getSections(id);
    });
    $(document).on("change", ".getStates", function(){
        var id = this.value;
        getStates(id);
    });
    $(document).on("change", ".getDistricts", function(){
        var id = this.value;
        getDistricts(id);
    });

    // Get Page with Ajax
    function getPage(path = false) {

        $("#modalContent").html('');

        onprogressFunction();

        $.ajax({
            url: path,
            type: 'GET',
            success: function (data, status) {
                ajaxresult(data);
            },
            complete: function () {
                onCompleteProgressFunction();
            },
            error: function (xhr, status, error) {
                errorResult(xhr, status, error);
            }
        });
    }

    // Save Form Data
    function saveFormData(e) {
        const formData = new FormData(e);
        var url = e.action;
        var type = e.method;
        console.log(formData);
        console.log(url);
        console.log(type);


        onprogressFunction();
        $.ajax({
            // enctype: enctype,
            url: url,
            type: type,
            contentType: false, // "application/x-www-form-urlencoded",
            processData: false,
            data: formData, // access in body
            success: function (result, status, xhr) {
                ajaxresult(xhr.responseText);

                // console.log('success result = ' + result);
                // console.log('success Status = ' + status);
                // console.log('success xhr.responseText = ' + xhr.responseText);
                // console.log('success xhr.statusText = ' + xhr.statusText);
            },
            error: function (xhr, status, error) {
                errorResult(xhr, status, error);
                // console.log('error error = ' + error);
                // console.log('error Status = ' + status);
                // console.log('error xhr.responseText = ' + xhr.responseText);
                // console.log('error xhr.statusText = ' + xhr.statusText);
            },
            complete: function (xhr, status) {
                onCompleteProgressFunction();

                // console.log('complete Status = ' + status);
                // console.log('complete xhr.responseText = ' + xhr.responseText);
                // console.log('complete xhr.statusText = ' + xhr.statusText);
            }

        });

    }


    // Delete Data
    function destroyData(e) {
        var csrf = e.attr('data-csrf');
        var url = e.attr('data-link');

        swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            buttons: {
                cancel: {
                    visible: true,
                    text: "No, cancel!",
                    className: "btn btn-danger",
                },
                confirm: {
                    text: "Yes, delete it!",
                    className: "btn btn-success",
                },
            },
        }).then((willDelete) => {
            if (willDelete) {
                // var formData = new FormData(e);
                // var url = e.action;
                // var type = e.method;

                $.ajax({
                    // enctype: enctype,
                    url: url,
                    type: "DELETE",
                    cache: false,
                    data: {
                        "_token": csrf
                    },
                    success: function (result, status, xhr) {
                        ajaxresult(xhr.responseText);

                    },
                    error: function (xhr, status, error) {
                        errorResult(xhr, status, error);
                    },
                    complete: function (xhr, status) {
                        onCompleteProgressFunction();
                    }

                });

            } else {
                swal("Your imaginary file is safe!", {
                    buttons: {
                        confirm: {
                            className: "btn btn-success",
                        },
                    },
                });
            }
        });
    }
    // // Reset Data
    function resetData(e) {

        swal({
            title: "Are you sure?",
            text: "This action will be Reset default seetings",
            type: "warning",
            buttons: {
                cancel: {
                    visible: true,
                    text: "No, cancel!",
                    className: "btn btn-danger",
                },
                confirm: {
                    text: "Yes, reset it!",
                    className: "btn btn-success",
                },
            },
        }).then((willDelete) => {
            if (willDelete) {
                onprogressFunction();

                $.ajax({
                    url: e,
                    type: 'GET',
                    success: function (result, status, xhr) {
                        ajaxresult(xhr.responseText);

                    },
                    complete: function () {
                        onCompleteProgressFunction();
                    },
                    error: function (xhr, status, error) {
                        errorResult(xhr, status, error);
                    }
                });

            } else {
                swal("Your imaginary file is safe!", {
                    buttons: {
                        confirm: {
                            className: "btn btn-success",
                        },
                    },
                });
            }
        });
    }
    // // Delete Data
    function destroyFormData(e) {

        swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            buttons: {
                cancel: {
                    visible: true,
                    text: "No, cancel!",
                    className: "btn btn-danger",
                },
                confirm: {
                    text: "Yes, delete it!",
                    className: "btn btn-success",
                },
            },
        }).then((willDelete) => {
            if (willDelete) {
                var formData = new FormData(e);
                var url = e.action;
                var type = e.method;

                $.ajax({
                    // enctype: enctype,
                    url: url,
                    type: type,
                    contentType: false, // "application/x-www-form-urlencoded",
                    processData: false,
                    data: formData, // access in body
                    success: function (result, status, xhr) {
                        ajaxresult(xhr.responseText);

                    },
                    error: function (xhr, status, error) {
                        errorResult(xhr, status, error);
                    },
                    complete: function (xhr, status) {
                        onCompleteProgressFunction();
                    }

                });

            } else {
                swal("Your imaginary file is safe!", {
                    buttons: {
                        confirm: {
                            className: "btn btn-success",
                        },
                    },
                });
            }
        });
    }


    function errorResult(xhr, status, error) {


        var objJSON = JSON.parse(xhr.responseText);
        swal(error, '', {
            icon: status,
            buttons: {
                confirm: {
                    className: "btn btn-danger",
                },
            },
        }).then(function () {
            onCompleteProgressFunction();
            if (typeof objJSON.file !== 'undefined') {
                // the variable is defined
                $("#modalContent").html('<div class="modal-header border-0"><h2 class="modal-title"><span class="fw-mediumbold"> # ' + error + '</span></h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="p-3"><h5>' + objJSON.message + '</h5><p><code>' + objJSON.file + '</code></p><p> <b>On line ' + objJSON.line + '</b></p></div>');
            } else {
                $("#modalContent").html('<div class="modal-header border-0"><h2 class="modal-title"><span class="fw-mediumbold"> # ' + error + '</span></h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="p-3"><h5>' + objJSON.message + '</h5></div>');
            }
        });



    }
    function ajaxresult(result) {

        if (isJson(result)) {
            var objJSON = JSON.parse(result);
            swal(objJSON.title, objJSON.message, {
                icon: objJSON.icon,
                buttons: {
                    confirm: {
                        className: "btn btn-" + objJSON.class,
                    },
                },
            }).then(function () {
                appendJsonError(objJSON);
                if (objJSON.status == 'success') {
                    myModal.hide();
                }
                if (objJSON.reload == true) {
                    window.location.reload(true);
                }
                onCompleteProgressFunction();

            }
            );
        } else {
            myModal.show();
            $("#modalContent").html(result);
        }
    }

    function appendJsonError(objJSON) {
        if (objJSON.status == 'error') {
            $('.error-msg').remove();
            $.each(objJSON.errors, function (key, val) {
                $('<p id="msg-' + key + '" class="error-msg text-danger m-0">' + val + '</p>').insertAfter('[name=' + key + ']');
            });
        }
    }
    function onprogressFunction() {
        nwpPreloader.show();
    }
    function onCompleteProgressFunction() {
        nwpPreloader.hide();
    }

    $(document).on('load', 'body', function () {
        nwpPreloader.hide();
    })

    function serialize(form) {
        if (!form || form.nodeName !== "FORM") {
            return;
        }
        var i, j, q = [];
        for (i = form.elements.length - 1; i >= 0; i = i - 1) {
            if (form.elements[i].name === "") {
                continue;
            }
            switch (form.elements[i].nodeName) {
                case 'INPUT':
                    switch (form.elements[i].type) {
                        case 'text':
                        case 'tel':
                        case 'email':
                        case 'hidden':
                        case 'password':
                        case 'button':
                        case 'reset':
                        case 'datetime-local':
                        case 'datetime':
                        case 'date':
                        case 'time':
                        case 'submit':
                            q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                            break;
                        case 'checkbox':
                        case 'radio':
                            if (form.elements[i].checked) {
                                q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                            }
                            break;
                    }
                    break;
                case 'file':
                    break;
                case 'TEXTAREA':
                    q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                    break;
                case 'SELECT':
                    switch (form.elements[i].type) {
                        case 'select-one':
                            q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                            break;
                        case 'select-multiple':
                            for (j = form.elements[i].options.length - 1; j >= 0; j = j - 1) {
                                if (form.elements[i].options[j].selected) {
                                    q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].options[j].value));
                                }
                            }
                            break;
                    }
                    break;
                case 'BUTTON':
                    switch (form.elements[i].type) {
                        case 'reset':
                        case 'submit':
                        case 'button':
                            q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                            break;
                    }
                    break;
            }
        }
        return q.join("&");
    }
    function isJson(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }

    function getStates(id) {
        $('#state_id').html('<option>Loding...</option>');
        $.ajax({
            url: 'get-states/' + id,
            type: 'GET',
            success: function (data, status) {
                $('#state_id').html('<option value="">Select</option>');
                var obj = JSON.parse(data);
                $.each(obj, function(i){
                    appendOptions(obj[i] ,'state_id');

                })
            },
            complete: function () {

            },
            error: function (xhr, status, error) {
                errorResult(xhr, status, error);
            }
        });
    }
    function getDistricts(id) {
        $('#district_id').html('<option>Loding...</option>');
        $.ajax({
            url: 'get-districts/' + id,
            type: 'GET',
            success: function (data, status) {
                $('#district_id').html('<option value="">Select</option>');
                var obj = JSON.parse(data);
                $.each(obj, function(i){
                    appendOptions(obj[i] ,'district_id');

                })
            },
            complete: function () {

            },
            error: function (xhr, status, error) {
                errorResult(xhr, status, error);
            }
        });
    }
    function getSections(id) {
        $('#section_id').html('<option>Loding...</option>');
        $.ajax({
            url: 'get-sections/' + id,
            type: 'GET',
            success: function (data, status) {
                $('#section_id').html('<option value="">Select</option>');
                var obj = JSON.parse(data);
                $.each(obj, function(i){
                    appendOptions(obj[i] ,'section_id');

                })
            },
            complete: function () {

            },
            error: function (xhr, status, error) {
                errorResult(xhr, status, error);
            }
        });
    }

    function appendOptions(data, container) {
        $('#'+container).append('<option value="'+data['id']+'">'+data['name']+'</option>')
    }
});


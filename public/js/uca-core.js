
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var setSideBar = function(element) {
    $('[id^="menu-"]').removeClass('active');
    $(element).addClass('active');
}
var setSideBarTitle = function(element, _title) {
    $(element+"-title").text(_title);
}

var Controller = {
    Create: function (_url, _data) {
        return $.ajax({
            url: base_url + _url,
            type: 'POST',
            // headers:{    
            //     'Accept': 'application/json',
            //     'Content-Type': 'application/json',
            //     'Access-Control-Allow-Origin': '*' 
            // },
            cache: false,
            data: _data,
            dataType: 'json',
            error: function (xhr, status, error) {},
            complete: function () {}
        });
    },
    Read: function (_url) {
        return $.ajax({
            url: base_url + _url,
            type: 'POST',
            // headers:{    
            //     'Accept': 'application/json',
            //     'Content-Type': 'application/json',
            //     'Access-Control-Allow-Origin': '*' 
            // },
            dataType: 'json',
            cache: false,
            error: function (xhr, status, error) {},
            complete: function () {}
        });
    },
    ReadWithParameter: function (_url, _param) {
        return $.ajax({
            url: base_url + _url,
            type: 'POST',
            // headers:{    
            //     'Accept': 'application/json',
            //     'Content-Type': 'application/json',
            //     'Access-Control-Allow-Origin': '*' 
            // },
            dataType: 'json',
            data: _param,
            cache: false,
            error: function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            },
            complete: function () {}
        })
    },
    Update: function (_url, _data) {
        console.log(base_url + _url)
        return $.ajax({
            url: base_url + _url,
            type: 'POST',
            // headers:{    
            //     'Accept': 'application/json',
            //     'Content-Type': 'application/json',
            //     'Access-Control-Allow-Origin': '*' 
            // },
            cache: false,
            data: _data,
            dataType: 'json',
            error: function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            },
            complete: function () {}
        })
    },
    Delete: function (_url, _data) {
        return $.ajax({
            url: base_url + _url,
            type: 'POST',
            // headers:{    
            //     'Accept': 'application/json',
            //     'Content-Type': 'application/json',
            //     'Access-Control-Allow-Origin': '*' 
            // },
            cache: false,
            data: _data,
            error: function (xhr, status, error) {
                console.log('Error occured while deleting records.', error);
                // alert('Error occured while deleting records.');
            },
            complete: function () {}
        })
    },
    Execute: function (_url) {
        return $.ajax({
            url: base_url + _url,
            type: 'POST',
            // headers:{    
            //     'Accept': 'application/json',
            //     'Content-Type': 'application/json',
            //     'Access-Control-Allow-Origin': '*' 
            // },
            cache: false,
            error: function (xhr, status, error) {},
            complete: function () {}
        })
    },
    ExecuteWithParameter: function (_url, _data) {
        return $.ajax({
            url: base_url + _url,
            type: 'POST',
            // headers:{    
            //     'Accept': 'application/json',
            //     'Content-Type': 'application/json',
            //     'Access-Control-Allow-Origin': '*' 
            // },
            cache: false,
            data: _data,
            error: function (xhr, status, error) {},
            complete: function () {}
        })
    },
    Upload: function (_url, _data) {
        return $.ajax({
            url: base_url + _url,
            type: 'POST',
            // headers:{    
            //     'Accept': 'application/json',
            //     'Content-Type': 'application/json',
            //     'Access-Control-Allow-Origin': '*' 
            // },
            cache: false,
            data: _data,
            async: false,
            contentType: false,
            processData: false,
            error: function (xhr, status, error) {},
            complete: function () {}
        })
    }
}
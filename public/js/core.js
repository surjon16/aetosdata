
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

var setSideBar = function(element) {
    // $('[id^="menu-"]').removeClass('active')
    $(element).addClass('active')
    collapseParent(element)
}
var collapseParent = function(element) {

    try {

        var parent_menu_a = $('li:has(div > ul > li > div > ul > li > ' + element + ') > a')[0]
        var parent_menu_div = $('li:has(div > ul > li > div > ul > li > ' + element + ') > div')[0]

        parent_menu_a.ariaExpanded = true
        parent_menu_div.classList.add('show')

        // $(element).addClass('submenu-item')

    } catch (error) {}

    try {

        var child_menu_a = $('li:has(> div > ul > li > ' + element + ') > a')[0]
        var child_menu_div = $('li:has(> div > ul > li > ' + element + ') > div')[0]

        child_menu_a.ariaExpanded = true
        child_menu_div.classList.add('show')

    } catch (error) {}

}
var setSideBarTitle = function(element, _title) {
    $(element+"-title").text(_title)
}

var Controller = {
    Get: function (_url, _data) {
        return $.ajax({
            url: _url,
            type: 'GET',
            data: _data,
            dataType: 'json',
            cache: false
        })
    },
    Post: function (_url, _data) {
        return $.ajax({
            url: _url,
            type: 'POST',
            data: _data,
            dataType: 'json',
            cache: false,
            beforeSend: function () {
                // console.log(this.data)
            },
            error: function (xhr, status, error) {
                // console.log(error)
            },
            complete: function () { }
        })
    }
}

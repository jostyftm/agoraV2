
var student_id = $('#student_id').val(),
    url = $("#url").val();

    console.log(url);

// LOAD FAMILY TABLE
    var table = $('#tableFamily').DataTable({
        "lengthChange": false,
        "pageLength": 6,
        retrieve: true,
        language: {
            url: '/json/Spanish.json'
        },
        "ajax": {
            "method": "GET",
            "url":url
        },
        "columns": [
            { "data": "name" },
            { "data": "last_name" },
            { "data": "type" },
            // { "data": "identification_number" },
            { "data": "address" },
            { "data": "mobil" },
            { "data": "phone" },
            { "data": "email" },
            {
                "render": function(data, type, full, meta){
                    return '<a class="btn btn-danger btn-sm" data-method="delete" data-id="'+full.id+'" data-action="deleteFamily"><i class="fa fa-trash"></i></a> '+
                    ' <a class="btn btn-primary btn-sm" data-method="edit" data-id="'+full.id+'" data-action="updateFamily"><i class="fa fa-edit"></i></a>';
                }
            }
        ]
    });
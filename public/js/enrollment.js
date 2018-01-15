$(document).ready(function(){

	var student_id = $('#student_id').val(),
        AppUrl = $("#AppUrl").val();

        console.log(AppUrl);
	$('.chosen-select').chosen({width: "100%"});

	$('.chosen-group, .chosen-it, .chosen-ice, .chosen-icb, .chosen-ig, .chosen-ac, .chosen-az, .chosen-ri').chosen({width: "100%"});

	$('.chosen-select-deselect').chosen({ allow_single_deselect: true });

    // LOAD THE WORKINGDAY 
    $('#workingday_id, #headquarter_id').change(function(e){

    	var group_select = $('#group_id'),
    	workingday_id = $('#workingday_id').val(),
    	headquarter_id = $('#headquarter_id').val();

    	$.get(AppUrl+"/ajax/group/getByWorkingday", {workingday_id, headquarter_id}, function($response){

    		console.log($response);

    		group_select.empty();
    		$(".chosen-group").trigger("chosen:updated");

    		if($response.length > 0){
    			$.each($response, function(key, element){

    				group_select.append('<option value='+element.id+'>'+element.name+'<option>');
    			});

    			$(".chosen-group").trigger("chosen:updated");
    		}

    	}, "json");
    });

	// DATE 
	$('.datepicker').datepicker({
		format: 'yyyy/mm/dd',
		startDate: '-3d'
	});

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
			"url": AppUrl+"/ajax/student/getFamily/"+student_id
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

	// ADD EVENT TO BUTTON EDIT AND DELTE
	$('#tableFamily').on( 'click', 'a', function (e) {

		e.preventDefault();

		var that = $(this),
		modalEdit = $('#modalEditFamily'),
		modalDelete = $('#modalDeleteFamily'),
		url = AppUrl+'/institution/student/'+that.data('action')+'/'+that.data('id');

		

		switch(that.attr('data-method')){
			case "edit":
            console.log(AppUrl);
				$.get(AppUrl+'/ajax/student/getFamilyById/'+that.data('id'), function(response){

					var form = modalEdit.find('form');
					form.attr('action', url);

					form.find('#family_id').val(response[0].id);
					form.find('#student_id').val(response[0].student_id);
					form.find('#relationship_id').val(response[0].students[0].pivot.relationship_id);
					form.find('#name').val(response[0].name);
					form.find('#last_name').val(response[0].last_name);
					form.find('#identification_type_id').val(response[0].identification.identification_type_id);
					form.find('#identification_number').val(response[0].identification.identification_number);
					form.find('#id_city_expedition').val(response[0].identification.id_city_expedition);
					form.find('#id_city_of_birth').val(response[0].identification.id_city_of_birth);
					form.find('#gender_id').val(response[0].identification.gender_id);
					form.find('#address').val(response[0].address.address);
					form.find('#neighborhood').val(response[0].address.neighborhood);
					form.find('#phone').val(response[0].address.phone);
					form.find('#mobil').val(response[0].address.mobil);
					form.find('#email').val(response[0].address.email);
					form.find('#id_city_address').val(response[0].address.id_city_address);
					form.find('#zone_id').val(response[0].address.zone_id);

					$(".chosen-it, .chosen-ice, .chosen-icb, .chosen-ig, .chosen-ac, .chosen-az, .chosen-ri").trigger("chosen:updated");

					modalEdit.modal({
						show: true,
						backdrop: 'static',
						keyboard: false
					});

				}, "json");
			break;

			case "delete":
				$.get(AppUrl+'/ajax/student/getFamilyById/'+that.data('id'), function(response){
					
					var formD = modalDelete.find('form');
					formD.attr('action', url);

					formD.find('#family_id').val(response[0].id);
					formD.find('#student_id').val(response[0].student_id);
					formD.find('#relationship_id').val(response[0].students[0].pivot.relationship_id);

					$('#text_delte').text(response[0].name+' '+response[0].last_name);

					modalDelete.modal({
						show: true,
						backdrop: 'static',
						keyboard: false
					});


				}, 'json');
			break;
			default:
				console.log("Defecto");
		}
	});

	// SHOW FORM ADD FAMILY
	$('#addFamily').click(function(){

		$('#modalAddFamily').modal({
			show: true,
			backdrop: 'static',
			keyboard: false
		});
	});

    // SEND DATA FORM ADD DAMILY
    $('#formAddFamily').submit(function(e){

    	e.preventDefault();

    	var that = $(this),
    	url	=	that.attr('action');

    	$.ajax({

    		type: that.attr('method'),
    		url: url,
    		data: that.serialize(),
    		dataType: 'json',
    		success: function(data){
    			
    			if(data.state){
    				$('#modalAddFamily').modal('hide');
    				table.ajax.reload( null, false );
    			}

    		},
    		error: function(jqXhr){
    			
    			if( jqXhr.status === 422 )
    			{
    				//process validation errors here.
    				var errors = jqXhr.responseJSON;

    				errorsHtml = '<div class="alert alert-danger"><ul>';

    				$.each( errors , function( key, value ) {
			            errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
			        });
    				errorsHtml += '</ul></di>';

    				$( '#formerrors' ).html( errorsHtml );

    			}
    		}
    	});
    });

    // SEND DATA FORM EDIT FAMILY
    $('#formEditFamily').submit(function(e){
    	e.preventDefault();

    	var that = $(this),
    	url	=	that.attr('action');

    	$.ajax({

    		type: that.attr('method'),
    		url: url,
    		data: that.serialize(),
    		dataType: 'json',
    		success: function(data){
    			
    			if(data.state){
    				$('#modalEditFamily').modal('hide');
    				table.ajax.reload( null, false );
    			}

    		},
    		error: function(jqXhr){
    			
    			if( jqXhr.status === 422 )
    			{
    				//process validation errors here.
    				var errors = jqXhr.responseJSON;

    				errorsHtml = '<div class="alert alert-danger"><ul>';

    				$.each( errors , function( key, value ) {
			            errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
			        });
    				errorsHtml += '</ul></di>';

    				$( '#formerrorsEdit' ).html( errorsHtml );

    			}
    		}
    	});
    });

    // SEND DATA FORM DELTE FAMILY
    $('#formDeleteFamily').submit(function(e){

    	e.preventDefault();

    	var that = $(this),
    		url	=	that.attr('action');

    	$.ajax({

    		type: that.attr('method'),
    		url: url,
    		data: that.serialize(),
    		dataType: 'json',
    		success: function(data){
    			
    			console.log(data);
    			
    			if(data.state){
    				$('#modalDeleteFamily').modal('hide');
    				table.ajax.reload( null, false );
    			}
    		}
    	});
    });

});
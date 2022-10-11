$(function () {
    $('#formBMI').validate({
        rules: {
			weight: {
                required: true,
				regex: /^[1-9]{1}[0-9]{0,2}[.]{1}[0-9]+|[1-9]{1}[0-9]{0,2}$/
            },
			height: {
                required: true,
				regex: /^[1-9]{1}[0-9]{0,2}$/
            }
            
        },
        messages: {
            weight: {
                required: "Wprowadź wagę",
				regex: 'Wprowadź poprawnie wagę'
            },
			height: {
                required: "Wprowadź hasło",
				regex: 'Wprowadź poprawnie wagę'
            }           
        },
        highlight: function (input) {
            console.log(input);
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },        
		errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
            $(element).parents('.form-group').append(error);
        },
		  submitHandler: function(form) {
            $.ajax({
                url: 'services/calculateBMI.php', 
                type: 'POST', 
                dataType: 'html', 
                data: $(form).serialize(), 
                success: function(data) {
                    $(form).trigger('reset'); 
                   	showSuccessMessage(data);
                },
                error: function(e) {
                    console.log(e)
                }
            });
		}


    });
});


function showSuccessMessage(data) {
    swal("Obliczono poprawnie BMI", "Sukces"+data+" ", "success");
}


$.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        var check = false;
        return this.optional(element) || regexp.test(value);
    },
    "Komentarz jest zbędny"
);

$(function () {
    $('#sign_up').validate({
        rules: {
            name: "required",
            surname: "required",
			login: "required",
            password: {
                required: true,
                minlength: 6 
            },
			confirmpassword: {
                required: true,
                minlength: 6 ,
				equalTo: '[name="password"]'
            }
        },
        messages: {
            name: "Proszę wprowadzić imię",
            surname: "Proszę wprowadzić nazwisko",
			login: "Proszę wprowadzić login",
            password: {
                required: "Wprowadź hasło",
                minlength: "Hasło musi zawierać conajmniej 6 znaków"
            },
			confirmpassword: {
                required: "Wprowadź hasło",
                minlength: "Hasło musi zawierać conajmniej 6 znaków",
				equalTo: "Podane hasła są różne"
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
		  submitHandler: function(form, e) {
			  //e.preventDefault();
			   var o = {};
			  var a = $(form).serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
		 console.log(o);

			 $.ajax({
                url: "\"<?php echo site_url('register/registerData')?>\"", 
                type: 'POST', 
                data: {'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
				dataType: 'JSON',
                success: function(data) {
					alert("");
					$(form).trigger('reset'); 
                },
                error: function(exception) {
					console.log(exception);
                    
                }
            });
		}
    });
});

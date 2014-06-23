
	$(function() {
			   
				/* @reload captcha
				------------------------------------------- */			   
				function reloadCaptcha(){
					$("#captcha").attr("src","libs/validationform-captcha/php/captcha.php?r=" + Math.random());
				}
				
				$('.captcode').click(function(e){
					e.preventDefault();
					reloadCaptcha();
				});
				
				/* @ validation and submition
				---------------------------------- */				
				$( "#smart-form" ).validate({
											
						errorClass: "state-error",
						validClass: "state-success",
						errorElement: "em",
						onkeyup: false,
						onclick: false,						
						rules: {
								nombre: {
										required: true,
										minlength: 2
								},
								apellidos: {
										required: true,
										minlength: 2
								},
								documento: {
										required: true
								},
								documentonum: {
										required: true
								},
								email: {
										required: true,
										email: true
								},
								orderfiles:{
									extension:"jpg",
									filesize: 1048576 
								},
								securitycode:{
										required:true
								}								
						},
						messages:{
								nombre: {
										required: 'Ingresa tu nombre',
										minlength: 'El nombre debe tener al menos 2 caracteres'
								},
								apellidos: {
										required: 'Ingresa tu apellido',
										minlength: 'El nombre debe tener al menos 2 caracteres'
								},
								email: {
										required: 'Ingresa tu email',
										email: 'Ingresa un email válido'
								},
								documento: {
										required: 'Seleccionar un Tipo de Documento'
								},
								documentonum: {
										required: 'Ingresa el Número de Documento'
								},
								securitycode:{
										required: 'Ingresa el Código de Seguridad'
								}								
						},
						highlight: function(element, errorClass, validClass) {
								$(element).closest('.field').addClass(errorClass).removeClass(validClass);
						},
						unhighlight: function(element, errorClass, validClass) {
								$(element).closest('.field').removeClass(errorClass).addClass(validClass);
						},
						errorPlacement: function(error, element) {
						   if (element.is(":radio") || element.is(":checkbox")) {
									element.closest('.option-group').after(error);
						   } else {
									error.insertAfter(element.parent());
						   }
						},				
						submitHandler:function(form) {
							$(form).ajaxSubmit({
									target:'.result',			   
									beforeSubmit:function(){ 
											$('.form-footer').addClass('progress');
									},
									error:function(){
											$('.form-footer').removeClass('progress');
									},
									 success:function(){
											$('.form-footer').removeClass('progress');
											$('.alert-success').show().delay(10000).fadeOut();
											$('.field').removeClass("state-error, state-success");
											if( $('.alert-error').length == 0){
												$('#smart-form').resetForm();
												reloadCaptcha();
											}
									 }
							  });
						}
						
				});		
		
	});				
    
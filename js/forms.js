function validarFormulario(){
	jQuery.validator.messages.required = 'Esta campo es obligatorio.';
	jQuery.validator.messages.number = 'Esta campo debe ser num&eacute;rico.';
	jQuery.validator.messages.email = 'La direcci&oacute;n de correo es incorrecta.';
	$("#formulario").validate();
}

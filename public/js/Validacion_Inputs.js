function Correo_Contraseña(string) {//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
    var filtro = '@.abcdefghijklmnopqrs_-tuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';//Caracteres validos

    for (var i = 0; i < string.length; i++)
        if (filtro.indexOf(string.charAt(i)) != -1)
            out += string.charAt(i);
    return out;
}

function Nombre_Apellidos(string) {
    var out = '';
    //Se añaden las letras validas
    var filtro = 'abcdefghijklmnñopqrstu ÁÉÍÓÚáéíóúvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ';//Caracteres validos

    for (var i = 0; i < string.length; i++)
        if (filtro.indexOf(string.charAt(i)) != -1)
            out += string.charAt(i);
    return out;
}

function Inputs_Producto(string) {
    var out = '';
    var filtro = 'abcdefghijklmnñopqrstuvwxyzAB ÁÉÍÓÚáéíóúCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789,.'

    for (var i = 0; i < string.length; i++)
        if(filtro.indexOf(string.charAt(i)) != -1)
            out += string.charAt(i);
    
    return out;
}

function Inputs_Numeros(string){
    var out = '';
    var filtro = '1234567890'

    for (var i = 0; i < string.length; i++){
        if(filtro.indexOf(string.charAt(i)) != -1){
            out += string.charAt(i);
        }
    }

    return out;

}
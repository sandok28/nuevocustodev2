/**
 * Created by andres on 19/07/2017.
 */


    function generarllaveencriptda()
    {
        var caracteres = "123467890";
        var contrasena = "";
        for (i=0; i<9; i++) contrasena += caracteres.charAt(Math.floor(Math.random()*caracteres.length));
        //console.log(contrasena);
        $('#llave_rfid').val(contrasena).parseInt;
    }
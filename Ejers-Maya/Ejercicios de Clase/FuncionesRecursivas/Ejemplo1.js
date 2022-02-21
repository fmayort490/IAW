
    function funcion_recursiva(numero) {
        if (numero==0){
        return 1;
        }
        else{
            return numero * (funcion_recursiva(numero-1));  // Aquí debo devolver el valor.

        }
    }


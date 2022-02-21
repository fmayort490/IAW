function fibonacci(numero) {
    if (numero==0){
    return 0;
    }
    if (numero==1){
        return 1;
        }
    else{
        return fibonacci(numero-1) + fibonacci(numero-2);  // Aquí debo devolver el valor.

    }
}


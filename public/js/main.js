$(document).ready(function(){
    //Cargar componentes materialize
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
    $('.fixed-action-btn').floatingActionButton();
    $('.modal').modal();
    $('select').formSelect();
    $('.tooltipped').tooltip();

    //COLORES DEL NAVBAR EN LA APP
    //---------------------------------
    var title = $('title').text();


    if(title == 'Inicio'){
        $('.btn-inicio-nav').addClass('teal lighten-1');
    }
    if(title == 'Clientes'){
        $('.btn-clientes-nav').addClass('teal lighten-1');
    }
    if(title == 'Categorias' || title == 'Productos'){
        $('.btn-administrar-nav').addClass('teal lighten-1');
    }

    $('.cantidad').each(function(){
        if(parseInt($(this).text()) > 10){
            $(this).addClass('blue-text');
        } else {
            $(this).addClass('red-text');
        }
    });

    //--------------------------------
    //EDITAR Y BORRAR CLIENTE

    //Editar
    $('.btn-editar-cliente').on('click',function(){
        var fila = $(this).parent();
        var columnas = $(fila).siblings();
        
        $(".edit-cliente").val(columnas[0].innerHTML); //nombre del cliente
        $(".edit-email").val(columnas[3].innerHTML); //email del cliente
        $(".edit-direccion").val(columnas[1].innerHTML); //direccion del cliente
        $(".edit-telefono").val(columnas[2].innerHTML); //telefono del cliente
        $(".edit-id").val(columnas[4].innerHTML);   //id del cliente
    })

    //Borrar
    $('.btn-borrar-cliente').on('click',function(){
        var fila = $(this).parent();
        var columnas = $(fila).siblings();
        $(".nombre-cliente").text(columnas[0].innerHTML);

        //Se le asigna el id a la url del boton aceptar para enviarselo
        //la funcion borrar
        var href = $('.btn-aceptar-borrar').attr('href');
        href = href + columnas[4].innerHTML; //se concatena el id
        $('.btn-aceptar-borrar').attr('href',href);
    });

    //EDITAR Y BORRAR CATEGORIA

    //Editar
    $('.btn-editar-categoria').on('click',function(){
        var fila = $(this).parent();
        var columnas = $(fila).siblings();
        
        $(".edit-categoria").val(columnas[0].innerHTML); //nombre del cliente
        $(".edit-id").val(columnas[1].innerHTML);   //id del cliente
    });

    //Borrar
    $('.btn-borrar-categoria').on('click',function(){
        var fila = $(this).parent();
        var columnas = $(fila).siblings();
        $(".nombre-categoria").text(columnas[0].innerHTML);

        //Se le asigna el id a la url del boton aceptar para enviarselo
        //la funcion borrar
        var href = $('.btn-aceptar-borrar').attr('href');
        href = href + columnas[1].innerHTML; //se concatena el id
        $('.btn-aceptar-borrar').attr('href',href);
    });

    //EDITAR Y BORRAR PRODUCTO

    //Editar
    $('.btn-editar-producto').on('click',function(){
        var fila = $(this).parent();
        var columnas = $(fila).siblings();
        
        $(".edit-producto").val(columnas[0].innerHTML); //nombre del cliente
        $(".edit-descripcion").val(columnas[1].innerHTML); //nombre del cliente
        $(".edit-precio").val(columnas[3].innerHTML); //nombre del cliente
        $(".edit-cantidad").val(columnas[4].innerHTML); //nombre del cliente
        $(".edit-id").val(columnas[5].innerHTML);   //id del cliente
    });

    //Borrar
    $('.btn-borrar-producto').on('click',function(){
        var fila = $(this).parent();
        var columnas = $(fila).siblings();
        $(".nombre-producto").text(columnas[0].innerHTML);

        //Se le asigna el id a la url del boton aceptar para enviarselo
        //la funcion borrar
        var href = $('.btn-aceptar-borrar').attr('href');
        href = href + columnas[5].innerHTML; //se concatena el id
        $('.btn-aceptar-borrar').attr('href',href);
    });
});
        
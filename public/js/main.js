$(document).ready(function(){
    //Cargar componentes materialize
    M.AutoInit();
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
    $('.fixed-action-btn').floatingActionButton();
    $('.modal').modal();
    $('.tooltipped').tooltip();
    $('select').formSelect();

    $('#select-clientes').prop('selectedIndex',0);
    $('#select-categorias').prop('selectedIndex',0);
    $('#select-productos').prop('selectedIndex',0);

    $('#select-clientes').formSelect();
    $('#select-categorias').formSelect();
    $('#select-productos').formSelect();

    //COLORES DEL NAVBAR EN LA APP
    //---------------------------------
    var title = $('title').text();


    if(title == 'Inicio'){
        $('.btn-inicio-nav').addClass('teal lighten-1');
    }
    if(title == 'Clientes'){
        $('.btn-clientes-nav').addClass('teal lighten-1');
    }
    if(title == 'Categorias' || title == 'Productos' || title == 'Facturas'){
        $('.btn-administrar-nav').addClass('teal lighten-1');
    }
    if(title == 'Vender'){
        $('.btn-vender-nav').addClass('teal lighten-1');
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

    //FUNCION PARA AGREGAR EL VALOR DE CANTIDAD AL BADGE
    $('#rango-cantidad').on('change',function(){
        $('.badge-cantidad').text($(this).val());
    })

    //BOTON PARA AGREGAR LA VENTA
    $('.agregar-venta').on('click',function(){

        //console.log('Clientes: ' + $('#select-clientes').prop('selectedIndex'));
        //console.log('Categorias: ' + $('#select-categorias').prop('selectedIndex'));
        //console.log('Productos: ' + $('#select-productos').prop('selectedIndex'));
        //console.log('Cantidad: ' + $('#rango-cantidad').val());

        if($('#select-clientes').prop('selectedIndex') == 0 || $('#select-categorias').prop('selectedIndex') == 0 || $('#select-productos').prop('selectedIndex') == 0 || $('#rango-cantidad').val() == 0){
            
            if($('#rango-cantidad').val() == 0){
                alert('Se agotaron las existencias');
            }
            console.log('error al agregar un prodcuto');

        } else {
            console.log('success');
            var cliente  = $('#select-clientes option:selected').text();
            var producto = $('#select-productos option:selected').text();
            var precio   = $('#select-productos option:selected').attr('precio');
            var id       = $('#select-productos option:selected').val();
            var cantidad = $('#rango-cantidad').val();

            $('#carrito-producto').prepend(
                '<tr class="row-producto">'+
                '<td class="row-id" hidden>'+id+'</td>'+
                '<td class="row-nombre-producto">'+producto+'</td>'+
                '<td class="row-precio">'+precio+'</td>'+
                '<td class="row-cantidad">'+cantidad+'</td>'+
                '<td><a class="waves-effect waves-light btn quitar-producto red"><i class="material-icons">delete</i></a></td>'+
                '</tr>'
            );

            //resetar los select de las tablas
            resetear_select()
            
            //CALCULAR EL TOTAL
            var total = 0;
            var fila = $('.row-producto');
            $.each(fila, function(){
                var precio   = $(this).find('.row-precio').text();
                var cantidad = $(this).find('.row-cantidad').text();
                total += cantidad * precio;
            });
            
            //console.log(total);
            
            $('.row-total').html(total);
            $('.row-cliente').html(cliente);
            $('#select-clientes').attr('disabled',true);
            $('.btn-realizar-venta').attr('disabled',false);
            $('#select-clientes').formSelect();

            //El seteando valores a cero
            $('#rango-cantidad').attr('min',0);
            $('#rango-cantidad').attr('max',0);
            
            //asignar el evento al boton borrar
            remover_producto();
        }
    });

    $('.btn-realizar-venta').on('click',function(){
        var id_productos = $('.row-id');
        var cantidades   = $('.row-cantidad');
        var links = [];
        var error = 0;

        for(var i = 0; i < cantidades.length; i++){
            links.push($('#form-agregar-producto').attr('action') + "vender_producto/"+ id_productos[i].textContent +'/'+ cantidades[i].textContent);
        }
        
        for(var i = 0; i < links.length; i++){
            console.log('Link #'+i+' es: '+links[i])
            $.ajax({
                url:links[i],
                type: 'POST',
                dataType:'json',
                success: function(json){
                    console.log(json);
                    M.toast({html: 'La venta se realizó correctamente'});

                    //resetear los select de las tablas
                    resetear_select();
                    resetear_tablas();
                    $('.row-producto').remove();
                },
                error:function(){
                    console.log("error al realizar la venta");
                    error += 1;
                }
            });
        }

        if(error == 0){
            var total_vendido = $('.row-total').text(); 
            var cliente  = $('.row-cliente').text(); 
            var arreglo = $('.row-producto');
            var productos_vendidos = "";

            $.each(arreglo,function(){
                var producto = $(this).find('.row-nombre-producto').text();
                productos_vendidos += producto.replace(/ /g,'-') + ',';
            });

            var productos_vendidos = productos_vendidos.slice(0, -1);

            var link = $('#form-agregar-producto').attr('action') + "generar_factura/" + total_vendido + "/" + cliente + "/" + productos_vendidos;
            //console.log(link);
            $.ajax({
                url:link,
                type: 'POST',
                dataType:'json',
                success: function(json){
                    console.log(json);
                },
                error:function(){
                    console.log("error al generar factura");
                }
            });
        }
        
    });

}); //fin del on ready



//FUNCIONES
//BOTON PARA QUITAR PRODUCTO
function remover_producto(){
    $('.quitar-producto').on('click',function(e){
        e.preventDefault();
		e.stopImmediatePropagation();

        var columna = $(this).parent();
        var fila = $(columna).parent();

        var cantidad = $(fila).find('.row-cantidad').text();
        var precio = $(fila).find('.row-precio').text();

        var descontar = cantidad * precio;
        var total = $('.row-total').html();
        $('.row-total').html(total - descontar);
        $(fila).remove();

        //Removiendo el cliente
        var productos = $('.row-producto');
        if(productos.length == 0){
            resetear_tablas();
        }
    });
}

//Esta funcion carga los productos de acuerdo a su categoria
//Esta se llama desde el evento onchange del select
function cargar_productos(){
    
    var categoria = $('#select-categorias').val();
    var link = $('#form-agregar-producto').attr('action') + "obtener_productos_por_categoria/"+ categoria;

    
    $.ajax({
        url:link,
        type: 'POST',
        dataType:'json',
        success: function(json){
            llenar_select_productos(json)
        },
        error:function(){
            console.log("error al obtener los productos de una categoria");
        }
    });
}

//Esta funcion carga el select con los productos de acuerdo a la categoria con la info que devuelve el ajax
function llenar_select_productos(json){
    
    $('#select-productos').find('option').remove();
    $('#select-productos').append(
        $("<option disabled selected></option>").val("").html('Seleccione un producto')
    );

    var count = Object.keys(json).length;
    for(var i = 0; i < count; i++){
        $('#select-productos').append(
            $("<option></option>").val(json[i]['id']).html(json[i]['producto']).attr('precio',json[i]['precio'])
        );
    }
        
    $('#select-productos').formSelect();
}

//Esta funcion carga la cantidad de un producto en el range
//Esta se llama desde el evento onchange del select
function cargar_cantidad_range(){
    var id_producto = $('#select-productos').val();
    var link = $('#form-agregar-producto').attr('action') + "obtener_cantidad_producto/" + id_producto;
    console.log("id producto: "+id_producto);
    $.ajax({
        url:link,
        type: 'POST',
        dataType:'json',
        success: function(json){
            console.log('cantidad de producto: '+json['cantidad']);

            //El valor minimo sera 0 producto
            $('#rango-cantidad').attr('min',0);
            //El valor maximo sera el total de producto en existencia
            $('#rango-cantidad').attr('max',json['cantidad']);
            $('#rango-cantidad').val(0);
            $('.badge-cantidad').text(0);
        },
        error:function(){
            console.log("error al obtener la cantidad de un producto");
        }
    });
}

function resetear_select(){
    //Resetear la tabla de agregar producto
    $('#select-categorias').prop('selectedIndex',0);
    $('#select-productos').find('option').remove();
    $('#select-productos').append(
        $("<option disabled selected></option>").val("").html('Seleccione un producto')
    );
    $('#rango-cantidad').val(0);
    $('.badge-cantidad').text(0);

    //Aplicar cambios a los select
    $('#select-categorias').formSelect();
    $('#select-productos').formSelect();
}

function resetear_tablas(){
    $('.row-cliente').html('-');
    $('.row-total').html('0.0');
    $('#select-clientes').attr('disabled',false);
    $('#select-clientes').prop('selectedIndex',0);
    $('.btn-realizar-venta').attr('disabled',true);
    $('#select-clientes').formSelect();
}
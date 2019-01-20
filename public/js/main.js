$(document).ready(function(){
    //Cargar componentes materialize
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
    $('.fixed-action-btn').floatingActionButton();
    $('.modal').modal();

    $('.btn-editar-cliente').on('click',function(){
        var fila = $(this).parent();
        var columnas = $(fila).siblings();

        console.log(columnas[0].innerHTML);
        console.log(columnas[4].innerHTML);
        
        $(".edit-cliente").val(columnas[0].innerHTML);
        $(".edit-email").val(columnas[3].innerHTML);
        $(".edit-direccion").val(columnas[1].innerHTML);
        $(".edit-telefono").val(columnas[2].innerHTML);
        $(".edit-id").val(columnas[4].innerHTML);
    })
});
        
$(function(){
    $("#seleccionar_todos").on('change',function(){
        $('table tbody :checkbox').attr("checked",$("#seleccionar_todos").is(':checked'));
    })

    $(".eliminar_seleccionados").on('click',function(event){
        event.preventDefault()
        $(".form_lista").submit();
    })
    
    $("a.jsShow").on('click' , function(event) {
        event.preventDefault();
        $(this.rel).show();
    });
 
    $("a.jsHide").on('click', function(event) {
        event.preventDefault();
        $(this.rel).hide();
    });
 
    $("a.jsToggle").on('click', function(event) {
        event.preventDefault();
        $(this.rel).toggle();
    });
 
    $("a.jsRemote").on('click', function(event) {
        event.preventDefault();
        $(this.rel).load(this.href)
    });
});
$(function(){
    $("#seleccionar_todos").on('change',function(){
        $('table tbody :checkbox').attr("checked",$("#seleccionar_todos").is(':checked'));
    })

    $(".eliminar_seleccionados").on('click',function(event){
        event.preventDefault()
        $(".form_lista").submit();
    })
    
    var cnt = 1;
    $("#addMore").click(function () {
        cnt++;
        $('<?PHP echo("string"); ?>');
        $('<div id="micampo">'+
                    "<? echo Form::label('Campo', 'nombre') ?>"+
        '<? echo Form::text("campopregunta.nombrecampo"); ?>'+

        '<? echo Form::label("Tipo", "tipo"); ?>'+
        '<? echo Form::dbSelect("campopregunta.tipocampo_id", "nombre"); ?>'+
            '<label for="email'+cnt+'">Email '+cnt+':</label>'+
            '<input type="text" id="email'+cnt+'" name="email'+cnt+'" />'+
            '<button onclick="$(this).parent().remove();">Quitar</button>'+'</div><p>__________________________________________________________________</p>').appendTo('#miscampos');
    })
});
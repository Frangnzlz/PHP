$(document).ready(
    function(){
        $("#method").change(function(){
            $.getJSON("json/comentarios.json", function(juegos) {
            let submit = $("<input>").attr("type", "submit").attr("value", "Enviar");
            let select = $("#method");

                let method = select.val();
                let form = $("#form");

                form.find("input").remove();
                form.find("label").remove();
                form.find("br").remove();
                let br = $("<br>");
                form.append(br.clone())
                let tabla = juegos[method];

                tabla.forEach(function(campo) {
                    let label = $("<label>").text(campo.label);
                    let input = $("<input>")
                        .attr("type", campo.type)
                        .attr("name", campo.name)
                        .attr("placeholder", campo.placeholder);

                    form.append(label);
                    form.append(input);
                    form.append(br.clone());
                });
                form.append(submit);
            });
        });
    }
)
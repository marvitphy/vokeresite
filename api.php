<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <span class="titles"></span>

    <script>

        $(document).ready(function () {

            $.ajax({
                url: "https://api.euvokere.com.br/api/v1/produtos/empresa/"+<?php echo $_GET['id'];?> +  "/groupedLl",
                dataType: 'json',
                type: "GET",
                success: function (response) {
                    const data = response.data
                    Object.keys(data).forEach((titulo, key) => {
                        console.log(data[titulo])
                        $('.titles').append(`<div id="${key}"><h2>${titulo}</h2></div>`)
                        data[titulo].map(item => {
                            $(`#${key}`).append(`<div><span>${item.nome} - R$${item.preco.toFixed(2).replace(".",",")}</span></div>`)
                        })
                    })
                    
                }
            });

        });

    </script>
</body>

</html>
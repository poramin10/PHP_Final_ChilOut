<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form id="myform" action="" method="post">
        <input type="text" id="mytext" name="mytext" value="" placeholder="type here!" />
    </form>

    <script>
        var text = document.getElementById("mytext");
        var form = document.getElementById("myform");
        text.onkeyup = function() {
            form.submit();
        }
    </script>
</body>

</html>
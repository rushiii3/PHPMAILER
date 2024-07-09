<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <button type="button">click</button>
    <script>
        $(document).ready(function(){
          $("button").click(function(){
            $.ajax({
                url:"./sample.php",
                method:"POST",
                data : { id : "helll" },
                success: function(data,status){
                    console.log(data);
                }
            })
          });
        });
        </script>
</body>
</html>
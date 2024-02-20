<!DOCTYPE html>
<?php
require_once('DB.php');
$connect = GetPDO();

echo "<br>";

$connect = null;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Education</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function appendComment(name, message){
            $("#List-of-messages").append(
                "<li class='list-group-item'><strong>" + name + "</strong>: " + text + "</li>"
            );
        }
        $(document).ready(function (){
            $.ajax({
                url: 'messages.php',
                method: 'GET',
                success: function(request){
                    if(request.data){
                        request.data.map(function (comment){
                            let name = comment.name;
                            let text = comment.text;

                            appendComment(comment.name, comment.text);
                        })
                    }
                }
            })
        $("form").submit(function (event){
            event.preventDefault();
            console.log('here');
            let data1 = $(this).serialize();
            let data2 = {
                name: $(this).find('input[name="name"]').val(),
                text: $(this).find('input[name="text"]').val()
            };
            console.log('Variant 1 :' + data1);
            console.log('Variant 2 :' + data2);
            $.ajax({
                url: 'create-new-message.php',
                method: 'POST',
                data: data2,
                success: function(request){
                    console.log('here');
                }
            })
        })
        })

    </script>
</head>
<body>
<div class="card" style="width: 18rem;">
    <div class="card-header">
        Chat
    </div>
    <ul class="list-group list-group-flush" id="List-of-messages">
        <li class="list-group-item">
            <strong>Name</strong> Date : Message
        </li>
    </ul>
    <br>
    <br>
    <br>
    <form method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Message</label>
            <input type="text" class="form-control" name="message">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
</body>

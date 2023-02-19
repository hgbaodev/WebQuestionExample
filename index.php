<?php
include_once("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <title>List questions</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center text-success">Làm đề thi</h2>
        <div class="row justify-content-center">
            <button class="col-1 btn btn-success" id="btnStar">Bắt đầu</button>
        </div>

    </div>
    </div>
    <div class="container">
        <div class="col-10">
            <div class="panel">
                <div class="panel-body">
                    <div class="panel-title" id="listQuestion">
                    </div>
                    <div class="text-center">
                        <h5 id="mark" class="text-danger"></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button class=" btn btn-danger" id="btnFinish" style="display: none;">Kết thúc</button>
    </div>
    <?php
    $arrcookies = json_decode($_COOKIE['answer'], TRUE);
    print_r($arrcookies);
    if(isset($arrcookies)){
        foreach ($arrcookies as $x => $x_value) {
            echo "Cau hoi=" . $x . ", Dap an chon=" . $x_value;
            echo "<br>";
        }
    }
    ?>
</body>

<script>
    var questions = '';

    function showquestion() {
        $.ajax({
            url: "getquestion.php",
            type: "get",
            success: function(data) {
                let result = JSON.parse(data);
                console.log(result);
                questions = result;
                let list = '';
                let index = 1;
                $.each(result, function(key, value) {
                    list += `<div class="row">
                <h6 style="font-weight: bold;" id = "${value['id']}"><span class="text-danger" >Câu hỏi ${index++}: </span>${value['question']}</h6>
                <div class="form-group">
                <div class="col-6" id="group${value['id']}">
                    <input class="form-check-input" type="radio" name="group${value['id']}" id="rdOptionA${value['id']}"  value = "A">
                    <label class="form-check-label" value = "A" for="rdOptionA${value['id']}">${value['option_a']}</label>
                </div>
                <div class="col-6">
                    <input class="form-check-input" type="radio" name="group${value['id']}" id="rdOptionB${value['id']}" value = "B">
                    <label class="form-check-label" value = "B" for="rdOptionB${value['id']}">${value['option_b']}</label>
                </div>
                <div class="col-6">
                    <input class="form-check-input" type="radio" name="group${value['id']}" id="rdOptionC${value['id']}" value = "C">
                    <label class="form-check-label" value = "C" for="rdOptionC${value['id']}">${value['option_c']}</label>
                </div>
                <div class="col-6">
                    <input class="form-check-input" type="radio" name="group${value['id']}" id="rdOptionD${value['id']}"  value = "D">
                    <label class="form-check-label" value = "D" for="rdOptionD${value['id']}">${value['option_d']}</label>
                </div>
                </div>
                </div>`;
                })
                $("#listQuestion").empty();
                $("#listQuestion").append(list);
            }
        });
    }

    $("#btnStar").click(function() {
        $("#mark").empty();
        $('#btnFinish').show();
        $(this).hide();
        showquestion();
    })

    $("#btnFinish").click(function() {
        $('#btnStar').show();
        $(this).hide();
        checkquestion();
    })

    function checkquestion() {
        let mark = 0;
        $("#listQuestion div.row").each(function(key, value) {
            let id = $(value).find('h6').attr('id');
            let question = questions.find(x => x.id == id);
            let answer = question['answer'];
            let da = $(value).find('.form-group input[type="radio"]:checked').attr('value');
            if (da == answer) {
                mark += 2;
            }
            switch (answer) {
                case "A":
                    $(value).find('label[value="A"]').css("background-color", "yellow");
                    break;
                case "B":
                    $(value).find('label[value="B"]').css("background-color", "yellow");
                    break;
                case "C":
                    $(value).find('label[value="C"]').css("background-color", "yellow");
                    break;
                case "D":
                    $(value).find('label[value="D"]').css("background-color", "yellow");
                    break;
            }
        })
        $("#mark").append("Tổng số điểm của bạn là : " + mark);
        $(".form-check-input").prop("disabled", true);
    }

    function createCookie(name, value, days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            var expires = "; expires=" + date.toGMTString();
        } else var expires = "";

        document.cookie = name + "=" + value + expires + "; path=/";
    }
</script>

</html>
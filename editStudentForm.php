<?php
    require_once('./utils/utility.php');
    require_once('./database/dbhelper.php');

    if(!empty($_GET)) {
        $id = getGet('id');
    }

    $sql = "select * from student where id = '$id'";
    $student = executeResult($sql);
    $class_id = $student[0]['id_class'];
    $sql = "select * from class where id = '$class_id'";
    $class = executeResult($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí sinh viên</title>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/ff5a45f6d9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center mb-3">Thông tin sinh viên</h3>
        <form style="width: 500px;margin-left:300px;">
            <div class="form-group">
                <label for="studentid">Mã sinh viên</label>
                <input disabled="true" type="text" class="form-control" id="studentid" aria-describedby="studentid" name="studentid" value="<?=$student[0]['student_id']?>">
            </div>
            <div class="form-group">
                <label for="fullname">Tên sinh viên</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?=$student[0]['fullname']?>">
            </div>
            <div class="form-group">
                <label for="birthday">Ngày sinh</label>
                <input type="date" class="form-control" id="birthday" aria-describedby="birthday" name="birthday" value=<?=$student[0]['dob']?>>
            </div>
            <fieldset class="form-group">
                <legend class="col-form-label">Giới tính:</legend>
                <div class="form-check">
                    <input class="form-check-input" required="true" type="radio" name="gender" id="male" value="Nam">
                    <label class="form-check-label" for="gridRadios1">
                        Nam 
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" required="true" type="radio" name="gender" id="female" value="Nữ">
                    <label class="form-check-label" for="gridRadios2">
                        Nữ
                    </label>
                </div>
            </fieldset>
            <div class="form-group mt-2">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control" id="address" aria-describedby="address" name="address" value="<?=$student[0]['address']?>">
            </div>
            <div class="form-group">
                <label for="class">Mã lớp</label>
                <input type="text" class="form-control" id="class" aria-describedby="class" name="class" value="<?=$class[0]['class_id']?>">
            </div>
            <div class="form-group">
                <label for="gpa">GPA</label>
                <input type="text" class="form-control" id="gpa" aria-describedby="gpa" name="gpa" value="<?=$student[0]['gpa']?>">
            </div>
            <button type="button" class="btn btn-primary" id="edit_student">Cập nhật</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            setGender();
            function setGender() {
                var $radios = $('input:radio[name=gender]');
                if($radios.is(':checked') === false) {
                    $radios.filter('[value=<?=$student[0]['gender']?>]').prop('checked', true);
                }
            }

            $('#edit_student').click(function() {
                var id = <?=$id?>;
                var fullname = $('#fullname').val();
                var birthday = $('#birthday').val();
                var gender = $("input[type='radio'][name='gender']:checked").val();
                var address = $('#address').val();
                var classid = $('#class').val();
                var gpa = $('#gpa').val();
                $.post('./controller/editStudent.php', 
                        {'id':id, 'fullname':fullname, 'birthday':birthday, 'gender':gender, 'address':address, 'class':classid, 'gpa':gpa},
                        function(data) {
                            alert(data);
                        })
            })
        })
    </script>
</body>
</html>
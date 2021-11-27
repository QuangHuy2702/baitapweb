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
        <h3 class="text-center mb-5">Danh sách công ty tuyển dụng</h3>
        <h5 class="mb-2">Chọn ngành học của bạn:</h5>
        <div class="input-group mb-3 form-inline" style="width:50%">
            <select class="custom-select" id="company_list">
            </select>
            <button type="button" class="btn btn-primary ml-3" id="search">Chọn</button>
        </div>
        <table class="table mx-auto mt-4" style="width: 90%;">
            <thead class="thead-dark" style="height:50px;">
                <tr>
                    <th scope="col" style="width: 5%;">STT</th>
                    <th scope="col" style="width: 20%;">TÊN CÔNG TY</th>
                    <th scope="col" style="width: 15%;">YÊU CẦU GPA</th>
                    <th scope="col" style="width: 10%;">SỐ LƯỢNG</th>
                    <th scope="col" style="width: 20%;">NGÀNH</th>
                    <th scope="col" style="width: 15%;">ỨNG TUYỂN</th>
                </tr>
            </thead>
            <tbody id="show_company">

            </tbody>
        </table>   
        <button type="button" class="btn btn-primary" onclick="window.open('userApplyForm.php?id=<?=$_GET['id']?>', '_self')">Xem chi tiết</button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nhập nguyện vọng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" required="true" class="form-control" id="aspiration" name="aspiration">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="apply">Xác nhận</button>
            </div>
            </div>
        </div>
    </div>
    <!--Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            showCompany();

            function showCompany() {
                $.post('./controller/showDepartment.php', function(data) {
                    $('#company_list').html(data);
                })
            }

            $('#search').click(function(){
                var id= $('#company_list').val();
                $.post('./controller/showCompany.php', {'id':id}, function(data){
                    $('#show_company').html(data);
                })
            })

            var id_company;
            $(document).on('click','.get-company', function(){
                id_company = $(this).val();
                console.log(id_company);
            })

            $('#apply').click(function(){
                var aspiration = $('#aspiration').val();
                console.log(aspiration + id_company + <?=$_GET['id']?>)
                $.post('./controller/applyCompany.php', 
                    {'aspiration':aspiration, 'id_student':<?=$_GET['id']?>, 'id_company':id_company},
                    function(data){
                        alert(data);
                    })
            })
        })
    </script>
</body>
</html>
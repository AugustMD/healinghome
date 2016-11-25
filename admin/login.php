<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/style1-uppertool.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>

  <body style="background-color:#555;">
    <?php
    session_start();
    if(isset($_SESSION['admin_is_login'])) {
      header('Location: ./');
    }
    ?>
      <!--=================================== 로그인 모달 ===================================-->
      <div>
          <div class="modal-dialog">
              <!-- Modal 내용-->
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">로그인</h4>
                  </div>
                  <div class="modal-body">
                      <form class="form-horizontal">
                          <div class="form-group">
                              <label class="control-label col-sm-3" for="email">이메일</label>
                              <div class="col-sm-8">
                                  <input type="email" class="form-control" id="email" placeholder="healing@home.com">
                                  <span class="warning" style="color: #FB464C"></span>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-sm-3" for="pwd">비밀번호</label>
                              <div class="col-sm-8">
                                  <input type="password" class="form-control" id="pwd" placeholder="********">
                                  <span class="warning" style="color: #FB464C"></span>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-8">
                                  <button type="button" class="btn btn-primary" id="login">로그인</button>
                                  <span class="warning" style="color: #FB464C"></span>
                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <p style="text-align:center; color:red;">관리자만 접근할 수 있습니다.</p>
                  </div>
              </div>
          </div>
      </div>
      <script>
      $('#login').click(function(){
        login();
      });
      $("#email").keydown(function(e){if(e.keyCode == 13)  login(); });
      $("#pwd").keydown(function(e){if(e.keyCode == 13)  login(); });

      function login() {
        $('.warning').html('');
        if($('#email').val() == '') {
          $('#email').parent().children('span').html("이메일을 입력해주세요.");
        }
        if($('#pwd').val() == '') {
          $('#pwd').parent().children('span').html("비밀번호를 입력해주세요.");
        }
        else if($('#email').val() != '' & $('#pwd').val() != '') {
          $.ajax({
            url:'./login_proc.php',
            type:'post',
            data:{id:$('#email').val(),pwd:$('#pwd').val()},
            success:function(data){
              if(data == $('#email').val()) {
                window.location.replace("./");
              }
              else {
                $('#login').parent().children('span').html(data);
              }
            },
            error:function(data){
              alert('오류가 발생했습니다.');
            }
          });
        }
      }
      </script>

</html>

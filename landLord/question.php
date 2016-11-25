<!DOCTYPE html>
<html>
<?php
    include("config.php");
?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style1-write.css">
    <link rel="stylesheet" type="text/css" href="./css/style1-uppertool.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body>
    <!--=================================== 상단 툴바 ===================================-->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation" style="border-bottom-width:2px; background-color: #fff;">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="./" style="color: #FB464C;"><strong>HealingHome</strong></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                      session_start();
                      if(isset($_SESSION['landLord_is_login'])) {
                        echo '<li>
                            <button type="button" class="btn btn-link" onclick=location.replace("./logout.php")>로그아웃</button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-link" onclick=location.href="./mypage.php";>마이페이지</button>
                        </li>';
                      }
                      else {
                        echo '<li>
                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">로그인</button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal1">회원가입</button>
                        </li>';
                      }
                    ?>
                    <li>
                        <button type="button" class="btn btn-link" onclick="location.href='./customer.php'" style="text-decoration: none; color: #FB464C;">고객센터</button>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!--=================================== 로그인 모달 ===================================-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal 내용-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                    <p>아직 가입을 안하셨습니까?
                        <button type="link" class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#myModal1">회원가입</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
                    </p>
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
              window.location.reload(true);
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
    <!--=================================== 회원가입 모달 ===================================-->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">
            <!-- Modal 내용-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">회원가입</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">이메일</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email2" placeholder="이메일을 입력하시오">
                                <span class="warning" style="color: #FB464C"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="name">이름</label>
                            <div class="col-sm-8">
                                <input type="name" class="form-control" id="name" placeholder="이름을 입력하시오">
                                <span class="warning" style="color: #FB464C"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">비밀번호</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="pwd2" placeholder="비밀번호를 입력하시오">
                                <span class="warning" style="color: #FB464C"></span>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 0px">
                            <label class="control-label col-sm-3" for="pnumber">휴대폰번호</label>
                            <div class="col col-sm-8">
                                <input type="phone-number" class="form-control" id="pnumber" placeholder="'-'없이 입력하시오" maxlength="13">
                                <div class="col-sm-offset-1">
                                    <button type="button" class="btn btn-default">실명확인</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3"></label>
                            <div class="col-sm-8">
                                <span class="warning" style="color: #FB464C"></span>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-8">
                                <button type="button" class="btn btn-primary" id="register">가입하기</button>
                                <span class="warning" style="color: #FB464C"></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>이미 가입하셨습니까?
                        <button type="link" class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#myModal">로그인</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
    $('#register').click(function(){
      $('.warning').html('');
      var validation = true;
      if($('#email2').val() == '') {
        $('#email2').parent().children('span').html("이메일을 입력해주세요.");
        validation = false;
      }
      else {
        var exptext = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;
        //이메일 형식이 알파벳+숫자@알파벳+숫자.알파벳+숫자 형식이 아닐경우
        if(!exptext.test($('#email2').val())){
          $('#email2').parent().children('span').html("이메일을 형식이 올바르지 않습니다.");
          validation = false;
        }
      }
      if($('#name').val() == '') {
        $('#name').parent().children('span').html("이름을 입력해주세요.");
        validation = false;
      }
      if($('#pwd2').val() == '') {
        $('#pwd2').parent().children('span').html("비밀번호를 입력해주세요.");
        validation = false;
      }
      if($('#pnumber').val() == '') {
        $('#pnumber').parent().parent().next().children('div').children('span').html("휴대폰번호를 입력해주세요.");
        validation = false;
      }
      else {
        var regExp = /^(01[016789]{1}|02|0[3-9]{1}[0-9]{1})-?[0-9]{3,4}-?[0-9]{4}$/;
   
        if(!regExp.test($('#pnumber').val())) {
            $('#pnumber').parent().parent().next().children('div').children('span').html("휴대폰번호를 확인해주세요.");
          validation = false;
        }
      }

      if(validation) {
        $.ajax({
          url:'./register_proc.php',
          type:'post',
          data:{id:$('#email2').val(),pwd:$('#pwd2').val(),name:$('#name').val(),phone:$('#pnumber').val()},
          success:function(data){
            if(data == '회원가입이 완료되었습니다.') {
              alert(data);
              window.location.reload(true);
            }
            else {
              $('#register').parent().children('span').html(data);
            }
          },
          error:function(data){
            alert('오류가 발생했습니다.');
          }
        });
      }
    });

    function autoHypenPhone(str){
        str = str.replace(/[^0-9]/g, '');
        var tmp = '';
        if( str.length < 4){
            return str;
        }else if(str.length < 7){
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3);
            return tmp;
        }else if(str.length < 11){
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3, 3);
            tmp += '-';
            tmp += str.substr(6);
            return tmp;
        }else{
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3, 4);
            tmp += '-';
            tmp += str.substr(7);
            return tmp;
        }
        return str;
    }

    $("#pnumber").keyup(function(event){
        event = event || window.event;
        var _val = this.value.trim();
        this.value = autoHypenPhone(_val) ;
    });

    </script>

    <div class="row">
      <div class="left-side-margin">
        <div class="SMjumbo">
          <h1>고객만족센터</h1>
          <p>HealingHome 회원님들을 위해 향상 노력하는 고객만족센터입니다.</p>
          <h1>CALL</h1>
          <h2>1599-3120</h2>
          <p>평일 AM 10:00 ~ PM 05:00</p>
          <p>주말 및 공휴일 제외</p>
        </div>
        <hr>
        <div class="left-side-margin2">
          <div class="subject">
            <form class="form-inline">
              <div>
                <label for="subject" style="width: 10%;">제목</label>
                <?php
                  $sql = "SELECT * FROM customer_land WHERE qid='".$_GET['qid']."'";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_assoc($result);
                  echo $row['title'];
                  ?>
              </div>
              <hr width="100%;">
              <div>
                <label for="wirter" style="width: 10%;">작성자</label>
                <?php
                  $sql2 = "SELECT name FROM user_info WHERE id='".$row[id]."'";
                  $result2 = mysqli_query($conn, $sql2);
                  $row2 = mysqli_fetch_assoc($result2);
                  echo $row2['name'];
                  ?>
              </div>
              <hr width="100%;">
              <div>
                <label for="date" style="width: 10%;">날짜</label>
                <?php
                  echo $row['date'];
                  ?>
              </div>
              <hr width="100%;">
            </form>
          </div>
          <div class="content">
              <label for="content">내용</label>
              <br><br>
              <?php
                echo nl2br($row['content']);
                ?>
              <hr width="100%;">
              <label for="content">첨부자료</label>
              <br><br>
              <?php
              if($row['attachment'] != '') {
                echo'<img src="'.$row['attachment'].'" style="width:300px;">';
              }
              ?>
              <hr width="100%;">
              <form class="form-horizontal">
                <div class="form-group" style="margin: 0px;">
                  <textarea class="form-control" id="comment" style="resize: none; height:80px;"  rows="6" cols="100" placeholder="내용을 입력해주세요"></textarea>
                </div>
                    <div class="form-group" style="margin: 0px;">
                  <button type="button" class="btn btn-default" id="comment_register" style="float:right;">등록</button>
                    </div>
                  <hr width="100%;">
                <div class="comment_content">

                  <?php
                    $sql3 = "SELECT * FROM customer_land_comment WHERE qid='".$_GET['qid']."' ";
                    $result3 = mysqli_query($conn, $sql3);
                    while($row3 = mysqli_fetch_assoc($result3)) {
                      $sql4 = "SELECT name FROM user_info where id='".$row3[id]."'";
                      $result4 = mysqli_query($conn, $sql4);
                      $row4 = mysqli_fetch_assoc($result4);
                      echo '<div class="jumbotron" style="padding:20px; margin-bottom:15px";>';
                      echo '  <span style="font-size:16px;">'.$row4[name].'</span>';
                      echo '  <span style="color:grey; margin-left:15px;">'.$row3[date].'</span>';
                      echo '  <p style="font-size:12px; margin-top:15px; margin-bottom:0px;">'.nl2br($row3[comment]).'</p>';
                      echo '</div>';
                    }
                  ?>
                </div>
                  <hr width="100%;">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function () {
        $("#comment_register").click(function () {
          <?php
            if($row[id] != $_SESSION['landLord_id']) {
              echo 'alert("글쓴이만 작성할 수 있습니다.")';
            }
            else {
              echo '
              $.ajax({
                url:"./comment_proc.php",
                type:"post",
                data:{qid:'.$_GET['qid'].',
                      comment:$("#comment").val(),
                },
                success:function(data){
                  if(data==1) {
                    window.location.reload(true);
                  }
                  else {
                    alert(data);
                  }
                },
                error:function(data){
                  alert("오류가 발생했습니다.");
                }
              });
              ';
            }
          ?>
        });
      });
</script>
  </body>
</html>

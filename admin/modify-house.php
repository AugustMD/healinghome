<!DOCTYPE html>
<html>
<?php
include("config.php");
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/style1-uppertool.css">
    <link rel="stylesheet" type="text/css" href="./css/style-house.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/comma.js"></script>
    <script src="js/bootstrap-formhelpers-phone.js"></script>
</head>
<style>
    .sidebar .nav>li>a,
    .sidebar .nav>li>ul>li>a {
        font-weight: 500;
    }
    input[type=checkbox] {
      margin-right: 8px;
    }

    .radio-inline+.radio-inline {
        margin-left: 0px;
        text-align: left;
        padding-bottom: 10px;
    }

    .checkbox-inline,
    .radio-inline {
        text-align: left;
        padding-bottom: 10px;
    }
    .checkbox-inline,
    .radio-inline {
        text-align: left;
        padding-bottom: 10px;
    }

    .thumbnail {
        margin-bottom: 0px !important;
        background-color: #eee !important;
    }
</style>

<script>
var x=1;
$(document).ready(function(){
    $("#next").click(function(){
      x++;
        if (x == 4) {
          x =3;
        }
        if (x == 2) {
          $("#previous").show();

          $(".register1info").hide();
          $(".register2info").show();

        }
        if (x == 3) {
          $("#register5").show();
          $("#next").hide();
          $(".register2info").hide();
          $(".register3info").show();
        }
    });
    $("#previous").click(function(){
      x--;
      if (x == 0) {
        x =1;
      }
      if (x == 1) {

        $("#previous").hide();
        $("#register5").hide();
        $(".register1info").show();
        $(".register2info").hide();
      }
      if (x == 2) {
        $('#next').show();
        $("#register5").hide();
        $("#previous").show();
        $(".register2info").show();
        $(".register3info").hide();
      }
    });
});

</script>

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
                    if(isset($_SESSION['admin_is_login'])) {
                      echo '<li>
                          <button type="button" class="btn btn-link" onclick=location.replace("./logout.php")>로그아웃</button>
                      </li>
                      <li>
                          <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal1">관리자 등록</button>
                      </li>';
                    }
                    else {
                      header('Location: ./login.php');
                    }
                  ?>
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
  </nav>
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


    <div class="page-content surrounding">
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar content-box" style="display: block;">
                    <ul class="nav">
                        <!-- Main menu -->
                        <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> 대시보드</a></li>
                        <li><a href="land-status.php"><i class="glyphicon glyphicon-th-list"></i> 토지신청 현황</a></li>
                        <li class="submenu">
                            <a href="#">
                                <i class="glyphicon glyphicon-tree-conifer"></i> 주변관광지
                                <span class="caret pull-right"></span>
                            </a>
                            <!-- Sub menu -->
                            <ul>
                                <li><a href="list-surrounding.php">목록</a></li>
                                <li><a href="add-surrounding.php">등록</a></li>
                            </ul>
                        </li>
                        <li class="submenu current">
                            <a href="#">
                                <i class="glyphicon glyphicon-tent"></i> 펜션
                                <span class="caret pull-right"></span>
                            </a>
                            <!-- Sub menu -->
                            <ul>
                                <li><a href="list-house.php">목록</a></li>
                                <li><a href="add-house.php">등록</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#">
                                <i class="glyphicon glyphicon-info-sign"></i> 고객센터
                                <span class="caret pull-right"></span>
                            </a>
                            <!-- Sub menu -->
                            <ul>
                                <li><a href="customer.php">고객용</a></li>
                                <li><a href="customer.php?board=land">토지주용</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 house-info">
                <div class="content-box-large" style="padding:10px; padding-left:40px; margin-bottom:15px;">
                    <div class="panel-body">
                        <h4 class="title" style="float:left;"><i style="margin-right:10px;" class="glyphicon glyphicon-tent"></i> 펜션 수정</h4>
                        <button type="button" onclick="deleteAll()" style="float: right; margin-top:4px; margin-right:10px; font-size:12px;" class="btn btn-danger"><span class="glyphicon glyphicon-remove" style="top:1.5px;"aria-hidden="true"></span>&emsp;삭제</button>
                    </div>
                </div>
            </div>
            <form action="pension_image_upload.php" method="post" id="target" enctype="multipart/form-data">
              <?php
              $sql = "SELECT * FROM pension_list where pid='".$_GET['pid']."'";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>

              <div class="col-md-10 house-info register1info">

                <div class="content-box-large" style="padding-top:20px; padding-bottom:15px; margin-bottom:15px;">
                    <div class="panel-body">

                        <h5 style="margin-left:0px; font-size:15px; margin-bottom:15px;"><strong>1/3단계.&emsp;</strong> 펜션 기본 정보</h5>
                        <table class="table table-reflow">
                            <tbody>
                                <tr>
                                    <th scope="row" style="border-top:2px solid #2D333E">지역</th>
                                    <td style="border-top:2px solid #2D333E">
                                        <div class="container-fluid tdContainer">
                                            <input type="text" class="col-xs-3" id="region" name="region">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">이름</th>
                                    <td>
                                        <div class="container-fluid tdContainer">
                                            <input type="text" class="col-xs-7" id="pname" name="pname">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">주소</th>
                                    <td>
                                        <div class="container-fluid tdContainer">
                                            <div class="container-fluid" style="padding:0 0 0 0; margin-bottom:10px;">
                                                <input type="text" class="col-xs-6" id="sample6_address" name="address" onclick="sample6_execDaumPostcode()" placeholder="주소">
                                                <input type="button" onclick="sample6_execDaumPostcode()" value="주소 찾기" id="btn_search" style="height:24px;"><br>
                                            </div>

                                            <input type="text" class="col-xs-9" id="sample6_address2" name="address2" placeholder="상세주소">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">전화번호</th>
                                    <td>
                                        <div class="container-fluid tdContainer">
                                            <input id="qnumber" name="qnumber" type="text" class="col-xs-3" maxlength="13">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">입퇴실 시간</th>
                                    <td style="padding: 4px 8px;">
                                        <div class="container-fluid tdContainer">
                                            <div class="col-md-6" style="display:flex; padding:5px 15px;">
                                                <span><h5 style="width:80px;">입실 시간 :&emsp;</h5></span>
                                                <span><input type="text" id="checkin" name="checkin" style="text-align:center; width:170px;"></span>
                                            </div>
                                            <div class="col-md-6" style="display:flex; padding:5px 15px;">
                                                <span><h5 style="width:80px;">퇴실 시간 :&emsp;</h5></span>
                                                <span><input type="text" id="checkout" name="checkout" style="text-align:center; width:170px;"></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">성수기</th>
                                    <td style="padding: 4px 8px;">
                                        <div class="container-fluid tdContainer">
                                            <div class="col-md-6" style="display:flex; padding:5px 15px;">
                                                <span><h5 style="width:80px;">여름 성수기 :&emsp;</h5></span>
                                                <span><input type="text" id="summer" name="summer" style="text-align:center; width:170px;"></span>
                                            </div>
                                            <div class="col-md-6" style="display:flex; padding:5px 15px;">
                                                <span><h5 style="width:80px;">겨울 성수기 :&emsp;</h5></span>
                                                <span><input type="text" id="winter" name="winter" style="text-align:center; width:170px;"></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">비고</th>
                                    <td>
                                        <div class="container-fluid tdContainer" style="display:flex">
                                            <textarea class="form-control" id="note" name="note" rows="3" style="font-size:13px;"><?php echo $row[note];?></textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                  <th scope="row" style="border-bottom:2px solid #ddd">
                                      <p style="margin-bottom:3px;">사진첨부</p>
                                      <p style="font-size:11px; font-weight:500;">(펜션 사진 내외부 등)</p>
                                  </th>
                                  <td style="border-bottom:2px solid #ddd;">
                                      <div class="container-fluid tdContainer">
                                        <div class="container-fluid" style="padding:0; margin-bottom:20px;">
                                          <?php
                                          $sql2 = "SELECT image FROM pension_image where pid='".$_GET['pid']."'";
                                          $result2 = mysqli_query($conn,$sql2);
                                          $i=0;
                                          while($row2 = mysqli_fetch_assoc($result2)) {
                                            echo '<label class="radio-inline col-xs-6 col-sm-3"><input type="checkbox" name="chk" checked value="'.$i.'">';
                                            echo '  <div class="thumbnail">';
                                            $_substr = substr($row2[image], 0, 8);
                                            if($_substr != 'uploads/') {
                                              echo '    <img class="img-responsive" src="'.$row2[image].'" name="img" alt="'.$row2[image].'">';
                                            }
                                            else {
                                              echo '    <img class="img-responsive" src="../'.$row2[image].'" name="img" alt="'.$row2[image].'">';
                                            }
                                            echo '  </div>';
                                            echo '</label>';
                                            $i++;
                                          }
                                          ?>
                                        </div>
                                          <div class="filebox">
                                              <label for="ex_file" style="margin-left:20px;"><span class="glyphicon glyphicon-picture" aria-hidden="true" style="font-weight:100; font-size:13px;"></span>&ensp;사진파일 추가</label>
                                              <input type="file" id="ex_file" name="files[]" multiple />
                                              <output id="list"></output>
                                          </div>

                                          <script>
                                              function handleFileSelect(evt) {
                                                  var files = evt.target.files; // FileList object
                                                  // files is a FileList of File objects. List some properties.
                                                  var output = [];
                                                  for (var i = 0, f; f = files[i]; i++) {
                                                      output.push('<li><strong>', f.name, '</strong> - ',
                                                          f.size, ' byte',
                                                          '</li>');
                                                  }
                                                  document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
                                              }

                                              document.getElementById('ex_file').addEventListener('change', handleFileSelect, false);
                                          </script>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>

              <div class="col-md-10 house-info register2info" style="display: none;">

                <div class="content-box-large" style="padding-top:20px; padding-bottom:15px; margin-bottom:15px;">
                    <div class="panel-body">
                        <h5 style="margin-left:0px; font-size:15px; margin-bottom:8px; padding-bottom:7px; border-bottom: 1px dotted #ddd;"><strong>2/3단계.&emsp;</strong> 요금 및 시간</h5>
                        <h5 style="margin-left:0px; font-size:14px; float:left; margin-top:15px;">이용요금</h5>

                        <p style="float: right; margin-top:15px;"><span class="glyphicon glyphicon-ok" style="color: black;" aria-hidden="true"></span>
                            <strong style="font-size:12px;">비성수기</strong>&emsp;/&ensp;
                            <span class="glyphicon glyphicon-ok" aria-hidden="true" style="color: #e62a4a;"></span>
                            <strong style="color: #e62a4a; font-size:12px;">성수기</strong></p>
                        <table class="table">
                            <thead class="thead-inverse">
                                <th align="center" class="request_content" style="width: 28%;">구분</th>
                                <th align="center" class="request_content" style="width: 36%;">월, 화, 수, 목, 금</th>
                                <th align="center" class="request_content" style="width: 36%;">토, 일 (공휴일)</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center" style="vertical-align: middle; font-weight:600;">2인</td>
                                    <td align="center">
                                        <input type="text" id="weekday2_low" name="weekday2_low" style="margin-bottom:5px; text-align:center; width:170px;"><br>
                                        <input type="text" id="weekday2_peak" name="weekday2_peak"style="border: 1px solid #FB464C; color: #E62A4A; text-align:center; width:170px;">
                                    </td>
                                    <td align="center">
                                        <input type="text" id="weekend2_low" name="weekend2_low" style="margin-bottom:5px; text-align:center; width:170px;"><br>
                                        <input type="text" id="weekend2_peak" name="weekend2_peak" style="border: 1px solid #FB464C; color: #E62A4A; text-align:center; width:170px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="vertical-align: middle; font-weight:600;">3인</td>
                                    <td align="center">
                                        <input type="text" id="weekday3_low" name="weekday3_low" style="margin-bottom:5px; text-align:center; width:170px;"><br>
                                        <input type="text" id="weekday3_peak" name="weekday3_peak" style="border: 1px solid #FB464C; color: #E62A4A; text-align:center; width:170px;">
                                    </td>
                                    <td align="center">
                                        <input type="text" id="weekend3_low" name="weekend3_low" style="margin-bottom:5px; text-align:center; width:170px;"><br>
                                        <input type="text" id="weekend3_peak" name="weekend3_peak" style="border: 1px solid #FB464C; color: #E62A4A; text-align:center; width:170px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="vertical-align: middle; font-weight:600;">4인</td>
                                    <td align="center">
                                        <input type="text" id="weekday4_low" name="weekday4_low" style="margin-bottom:5px; text-align:center; width:170px;"><br>
                                        <input type="text" id="weekday4_peak" name="weekday4_peak" style="border: 1px solid #FB464C; color: #E62A4A; text-align:center; width:170px;">
                                    </td>
                                    <td align="center">
                                        <input type="text" id="weekend4_low" name="weekend4_low" style="margin-bottom:5px; text-align:center; width:170px;"><br>
                                        <input type="text" id="weekend4_peak" name="weekend4_peak" style="border: 1px solid #FB464C; color: #E62A4A; text-align:center; width:170px;">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <h5 style="margin-left:0px; font-size:14px; float:left;">옵션</h5>
                        <div style=" margin:7px 0px;float:right;">
                            <button class="additem" type="button" style="background:dimgray; border:0px; color:#fff;">+</button>
                            <button class="subtractitem" type="button" style="background:dimgray; border:0px; color:#fff;">-</button>
                        </div>
                        <table class="table">
                            <thead class="thead-inverse">
                                <th align="center" class="request_content" style="width: 20%;">구분</th>
                                <th align="center" class="request_content" style="width: 60%;">내용</th>
                                <th align="center" class="request_content" style="width: 20%;">가격</th>
                            </thead>
                            <tbody class="addbody">
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $(".additem").click(function() {
                                    $(".addbody").append(
                                        '<tr><td style="vertical-align:middle;"><input type="text" id="option_name" name="option_name" class="form-control" style="width: 70%; margin-left:15%; text-align:center;" ></td><td><textarea rows="4" class="form-control" id="contents" name="contents" style="font-size:13px;"></textarea></td><td style="vertical-align:middle;"><input type="text" id="price" name="price" class="form-control" value=0 style="width: 70%; margin-left:15%; text-align:center;" ></td></tr>'
                                    );
                                });
                                $(".subtractitem").click(function() {
                                    $(".addbody tr:last").remove();
                                });

                            });
                        </script>
                        </table>
                    </div>
                </div>
              </div>

              <div class="col-md-10 house-info  register3info" style="display: none;">
                <div class="content-box-large" style="padding-top:20px; padding-bottom:15px;">
                    <div class="panel-body">
                        <h5 style="margin-left:0px; font-size:15px; margin-bottom:8px; padding-bottom:7px; border-bottom: 1px dotted #ddd;"><strong>3/3단계.&emsp;</strong> 찾아오시는 길 / 주변 관광지</h5>
                        <h5 style="margin-left:0px; font-size:14px;margin-top:15px;">찾아오시는 길</h5>
                        <div class="container-fluid" style="padding:0;">
                            <textarea class="form-control" id="direction" name="direction" rows="12" style="font-size:13px;"><?php echo $row[direction];?></textarea>
                        </div>

                        <h5 style="margin-left:0px; font-size:14px; margin-top:20px;">주변 관광지</h5>
                        <div class="container-fluid" style="padding:0; margin-left: 100px;">
                            <?php
                            $sql3 = "SELECT tid, name FROM tourist_spot";
                            $result3 = mysqli_query($conn, $sql3);
                            while($row3 = mysqli_fetch_assoc($result3)) {
                              echo '<label class="radio-inline col-xs-6 col-sm-3"><input type="checkbox" name="chk_info" value="'.$row3[tid].'">'.$row3[name].'</label>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
              </div>
            </form>
        </div>
    </div>

    <div class="col-md-offset-2 col-md-10 house-info">
        <div class="content-box-large" style="padding:10px; margin-top:15px;">
            <div class="panel-body">
              <button type="button" id="next" style="float: right; " class="col-xs-6 btn btn-primary">다음&emsp;<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
              <button type="button" id="register5" style="float: right; display:none;" class="col-xs-6 btn btn-warning" onclick="modify()"><span class="glyphicon glyphicon-ok" aria-hidden="true">&emsp;수정</span></button>
              <button type="button" id="previous" style="float: right; display:none;" class="col-xs-6 btn btn-default"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&emsp;뒤로</span></button>
            </div>
        </div>
    </div>

</body>

<?php
$sql4 = "SELECT * FROM option_table where pid = '".$_GET['pid']."'";
$result4 = mysqli_query($conn, $sql4);
while($row4 = mysqli_fetch_assoc($result4)) {
  echo '<script>$(".addbody").append(\'<tr><td style="vertical-align:middle;"><input type="text" id="option_name" name="option_name" class="form-control" value="'.$row4[option_name].'" style="width: 70%; margin-left:15%; text-align:center;" ></td><td><textarea rows="4" class="form-control" id="contents" name="contents" style="font-size:13px;">'.$row4[contents].'</textarea></td><td style="vertical-align:middle;"><input type="text" id="price" name="price" class="form-control" value="'.$row4[price].'" style="width: 70%; margin-left:15%; text-align:center;" ></td></tr>\');</script>';
}
$sql5 = "SELECT tid FROM `pension&tourist_spot` where pid = '".$_GET['pid']."'";
$result5 = mysqli_query($conn, $sql5);
while($row5 = mysqli_fetch_assoc($result5)) {
  echo '<script>$("input[name=\'chk_info\'][value='.$row5[tid].']").attr("checked", true);</script>';
}
?>

<script type="text/javascript" src="//apis.daum.net/maps/maps3.js?apikey=9a7200faa71681dc01ff5e0453ff4234&libraries=services,clusterer,drawing"></script>
<script>
    function addressConvert(addr) {
      // 주소-좌표 변환 객체를 생성합니다
      var geocoder = new daum.maps.services.Geocoder();
      // 주소로 좌표를 검색합니다
      geocoder.addr2coord(addr, function(status, result) {
          // 정상적으로 검색이 완료됐으면
          if (status === daum.maps.services.Status.OK) {
              //var coords = new daum.maps.LatLng(result.addr[0].lat, result.addr[0].lng);
              var formData = $("#target").serialize();
              var pid = -1;
              $.ajax({
                url:'./pension_list_modify.php?lat='+result.addr[0].lat+"&lng="+result.addr[0].lng+"&pid="+'<?php echo $_GET['pid'];?>',
                type:'post',
                async:false,
                data:formData,
                success:function(data){
                  if(data == 'error') {
                    alert("오류가 발생했습니다.");
                    window.location.reload(true);
                  }
                  else {
                    pid = data;
                  }
                },
                error:function(data){
                  alert('오류가 발생했습니다.');
                }
              });
              if(pid*1 != -1) {
                console.log(pid);
                var option_name_input = document.getElementsByName("option_name");
                var contents_input = document.getElementsByName("contents");
                var price_input = document.getElementsByName("price");
                for(var i=0; i<option_name_input.length; i++) {
                  if((option_name_input[i].value != '' && contents_input[i].value != '' && price_input[i].value != '')) {
                    $.ajax({
                      url:'./option_upload.php',
                      type:'post',
                      async:false,
                      data:{pid:pid,
                      option_name:option_name_input[i].value,
                      contents:contents_input[i].value,
                      price:price_input[i].value
                      },
                    });
                  }
                }
                var tourist_chk = document.getElementsByName("chk_info");
                for(var i=0; i<tourist_chk.length; i++) {
                  if(tourist_chk[i].checked) {
                    $.ajax({
                      url:'./pension_tourist_upload.php',
                      type:'post',
                      async:false,
                      data:{pid:pid,
                      tid:tourist_chk[i].value,
                      },
                    });
                  }
                }
                $("#target").attr("action", "pension_image_upload.php?pid="+pid);
                $("#target").submit();
              }
              else {
                console.log("else:" + pid);
              }
          }
          else {
              alert("주소를 올바르게 입력해주세요.");
          }
      });
    }

</script>

<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
    $(document).ready(function() {
      $("#pname").val('<?php echo $row[name]?>');
      $("#region").val('<?php echo $row[region]?>');
      $("#sample6_address").val('<?php echo $row[address]?>');
      $("#checkin").val('<?php echo $row[checkin]?>');
      $("#checkout").val('<?php echo $row[checkout]?>');
      $("#summer").val('<?php echo $row[summer]?>');
      $("#winter").val('<?php echo $row[winter]?>');
      $("#qnumber").val('<?php echo $row[number]?>');
      $("#weekday2_low").val('<?php echo $row[weekday2_low]?>');
      $("#weekday2_peak").val('<?php echo $row[weekday2_peak]?>');
      $("#weekend2_low").val('<?php echo $row[weekend2_low]?>');
      $("#weekend2_peak").val('<?php echo $row[weekend2_peak]?>');
      $("#weekday3_low").val('<?php echo $row[weekday3_low]?>');
      $("#weekday3_peak").val('<?php echo $row[weekday3_peak]?>');
      $("#weekend3_low").val('<?php echo $row[weekend3_low]?>');
      $("#weekend3_peak").val('<?php echo $row[weekend3_peak]?>');
      $("#weekday4_low").val('<?php echo $row[weekday4_low]?>');
      $("#weekday4_peak").val('<?php echo $row[weekday4_peak]?>');
      $("#weekend4_low").val('<?php echo $row[weekend4_low]?>');
      $("#weekend4_peak").val('<?php echo $row[weekend4_peak]?>');
    });

    function modify() {
      var option_name_input = document.getElementsByName("option_name");
      var contents_input = document.getElementsByName("contents");
      var flag = 1;
      for(var i=0; i<option_name_input.length; i++) {
        if((option_name_input[i].value != '' && contents_input[i].value != '') || (option_name_input[i].value == '' && contents_input[i].value == '')) {
        }
        else {
          flag = 0;
        }
      }
      if($("#region").val() != '' && $("#pname").val() != '' && $("#sample6_address").val() != '' && $("#qnumber").val() != '' && $("#checkin").val() != '' && $("#checkout").val() != '' && $("#summber").val() != '' && $("#winter").val() != '' && $("#note").val() != '') {
        if($("#weekday2_low").val() != '' && $("#weekday2_peak").val() != '' && $("#weekend2_low").val() != '' && $("#weekend2_peak").val() != '' && $("#weekday3_low").val() != '' && $("#weekday3_peak").val() != '' && $("#weekend3_low").val() != '' && $("#weekend3_peak").val() != '' && $("#weekday4_low").val() != '' && $("#weekday4_peak").val() != '' && $("#weekend4_low").val() != '' && $("#weekend4_peak").val() != '') {
          if($("#direction").val() != '' && flag == 1) {
            //pension_image 삭제
            var chk = document.getElementsByName("chk");
            var img = document.getElementsByName("img");
            for(var i=0; i<chk.length; i++) {
              if(!chk[i].checked) {
                $.ajax({
                  url:"./image_delete.php",
                  type:"post",
                  data:{table:"pension_image",
                        src:img[i].alt,
                  },
                });
              }
            }
            //option_table 삭제

            //pension&tourist_spot 삭제

            addressConvert($("#sample6_address").val()+" "+$("#sample6_address2").val());
          }
        }
      }
      else {
        alert("모든 항목을 입력해주세요.");
      }
    }

    function deleteAll() {
      var chk = document.getElementsByName("chk");
      var img = document.getElementsByName("img");
      for(var i=0; i<chk.length; i++) {
        $.ajax({
          url:"./image_delete.php",
          type:"post",
          data:{table:"pension_image",
                src:img[i].alt,
          },
        });
      }

      $.ajax({
        url:"./pension_list_delete.php",
        type:"post",
        data:{pid:'<?php echo $_GET['pid'];?>',
        },
        success:function(data){
          if(data == '삭제') {
            alert(data);
            location.replace("./list-house.php");
          }
          else {
            alert(data);
          }
        },
        error:function(data){
          alert('오류가 발생했습니다.');
        }
      });

    }


    function sample6_execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var fullAddr = ''; // 최종 주소 변수
                var extraAddr = ''; // 조합형 주소 변수

                // 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    fullAddr = data.roadAddress;

                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    fullAddr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 조합한다.
                if (data.userSelectedType === 'R') {
                    //법정동명이 있을 경우 추가한다.
                    if (data.bname !== '') {
                        extraAddr += data.bname;
                    }
                    // 건물명이 있을 경우 추가한다.
                    if (data.buildingName !== '') {
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                    fullAddr += (extraAddr !== '' ? ' (' + extraAddr + ')' : '');
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('sample6_address').value = fullAddr;

                // 커서를 상세주소 필드로 이동한다.
                document.getElementById('sample6_address2').focus();
            }
        }).open();
    }

    function autoHypenPhone(str) {
        str = str.replace(/[^0-9]/g, '');
        var tmp = '';
        if (str.length < 4) {
            return str;
        } else if (str.length < 7) {
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3);
            return tmp;
        } else if (str.length < 11) {
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3, 3);
            tmp += '-';
            tmp += str.substr(6);
            return tmp;
        } else {
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3, 4);
            tmp += '-';
            tmp += str.substr(7);
            return tmp;
        }
        return str;
    }

    $("#qnumber").keyup(function(event) {
        event = event || window.event;
        var _val = this.value.trim();
        this.value = autoHypenPhone(_val);
    });

    function number_chk(obj){
        var val = obj.value.replace(/,/g, "");
        var val2 = val.substr(0, 1);
        var val3 = val.length;
        if(val2 == 0){
        val = val.substr(1, val3);
        }
        obj.value = num_format(val);
        }
        function num_format(n){
        var reg = /(^[+-]?\d+)(\d{3})/;   // 정규식
        n = String(n);    //숫자 -> 문자변환
        while(reg.test(n)){
        n = n.replace(reg, "$1" + "," + "$2");
        }
        return n;
    }


</script>

</html>

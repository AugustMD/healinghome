<!DOCTYPE html>
<html>
<?php
    include("config.php");
    include("func.php");
    session_start();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/style1-search.css">
    <link rel="stylesheet" type="text/css" href="./css/style1-pinterest.css">
    <link rel="stylesheet" type="text/css" href="./css/rating.css">
    <link rel="stylesheet" type="text/css" href="./css/style1-calendar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/modallocation.css">
    <link rel="stylesheet" type="text/css" href="./css/style1-uppertool.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/calendar.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/pinterest-search.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/search.js" type="text/javascript" charset="utf-8"></script>

    <style>
    html, body { height:100%; overflow:hidden }
    .map_wrap {position:relative;width:100%;height:100%;}
    .hAddr {position:absolute;left:10px;top:10px;border-radius: 2px;background:#fff;background:rgba(255,255,255,0.8);z-index:1;padding:5px;}
    #centerAddr {display:block;margin-top:2px;font-weight: normal;}

    </style>

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
              <div class="col-sm-offset-2 col-md-5 ">
                  <div class="input-group">
                      <input type="text" class="form-control" id="query" onkeypress="if(event.keyCode==13) {simpleSearch(); return false;}" placeholder="어디로 가시나요?">
                      <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick=simpleSearch()>
                        <span class="glyphicon glyphicon-search"></span>
                      </button>
                      </span>
                  </div>
              </div>
              <ul class="nav navbar-nav navbar-right">
                  <?php
                    session_start();
                    if(isset($_SESSION['is_login'])) {
                      echo '<li>
                          <button type="button" class="btn btn-link" onclick=location.replace("./logout.php")>로그아웃</button>
                      </li>
                      <li>
                          <button type="button" class="btn btn-link" onclick=location.href="./mypage.php";>마이페이지</button>
                      </li>';
                      echo '<script>$("#query").attr("placeholder", "'.$_SESSION['name'].'님 어디로 가시나요?")</script>';
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
        <!--=================================== 좌측 메뉴 ===================================-->
        <!-- 상세 검색 및 검색 결과 -->
        <div class="col-md-7">
            <!-- 상세 검색 -->
            <div class="search-menu">
                <!-- 지역 및 상세지역 -->
                <div class="search-menu1">
                    <h5>지역</h5>
                    <div class="search-items" data-toggle="modal" data-target="#location"><input type="text" class="form-control" id="region" placeholder="지역" value=<?php echo $_GET['region']?>></div>
                    <div class="search-items" data-toggle="modal" data-target="#location" style="padding-left:15px;"><input type="text" class="form-control" id="address" placeholder="상세지역" value=<?php echo $_GET['address']?>></div>
                </div>
                <!-- 체크인 및 체크아웃 -->
                <div class="search-menu1">
                    <h5>날짜</h5>
                    <div class="search-items"><input type="text" class="form-control" id="datepicker1" placeholder="체크인" readonly="true" style="background-color:#fff"></div>
                    <div class="search-items" style="padding-left:15px;"><input type="text" class="form-control" id="datepicker2" placeholder="체크아웃" readonly="true" style="background-color:#fff"></div>
                    <?php
                    if($_GET['checkin'] != null && $_GET['checkout'] != null) {
                      echo '
                        <script>
                            $(document).ready(function(){
                                $("#datepicker1").datepicker("setDate", "'.$_GET['checkin'].'");
                                if($("#datecpiekr1").val() != "") {
                                    moveFocusing();
                                }
                                $("#datepicker2").datepicker("setDate", "'.$_GET['checkout'].'");
                            });
                        </script>
                        ';
                    }
                    ?>
                </div>
                <!-- 숙박 인원 / 가격 설정 / 필터 / 검색 -->
                <div class="search-menu1" style="height:75px;">
                    <h5>인원</h5>

                        <div class="search-items">
                            <select class="form-control" id="number">
                                <option <?php if ($_GET['number'] =="숙박인원 2명") echo "selected"?>>숙박인원 2명</option>
                                <option <?php if ($_GET['number'] =="숙박인원 3명") echo "selected"?>>숙박인원 3명</option>
                                <option <?php if ($_GET['number'] =="숙박인원 4명") echo "selected"?>>숙박인원 4명</option>
                            </select>
                          </div>

                        <div class="search-items" style="padding-left:15px; text-align:right;">
                          <button type="button" class="btn btn-default" style="width:60%;" onclick="search()">검색</button>
                        </div>

                </div>

                <!-- 지역 검색 modal -->
                <div class="location modal fade" id="location" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">지역</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btnlocation-1" type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#detaillocation1">서울</button>
                              <button id="btnlocation-2" type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#detaillocation2">경기</button>
                              <button id="btnlocation-3" type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#detaillocation3">인천</button>
                              <button id="btnlocation-4" type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#detaillocation4">강원</button>
                              <button id="btnlocation-5" type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#detaillocation5">부산</button>
                              <button id="btnlocation-6" type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#detaillocation6">경남</button>
                              <button id="btnlocation-7" type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#detaillocation7">대구</button>
                              <button id="btnlocation-8" type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#detaillocation8">경북</button>

                              <button id="btnlocation-9" type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#detaillocation9">대전</button>
                              <button id="btnlocation-10" type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#detaillocation10">충남</button>
                              <button id="btnlocation-11" type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#detaillocation11">충북</button>
                              <button id="btnlocation-12" type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#detaillocation12">광주</button>
                              <button id="btnlocation-13" type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#detaillocation13">전남</button>
                              <button id="btnlocation-14" type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#detaillocation14">울산</button>
                              <button id="btnlocation-15" type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#detaillocation15">전북</button>
                              <button id="btnlocation-16" type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#detaillocation16">제주</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--서울 modal -->
                <div class="location modal fade" id="detaillocation1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">서울</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btndetaillocation-1" type="button" class="btn btn-default" data-dismiss="modal">전체</button>
                              <button id="btndetaillocation-2" type="button" class="btn btn-default" data-dismiss="modal">강남구</button>
                              <button id="btndetaillocation-3" type="button" class="btn btn-default" data-dismiss="modal">강동구</button>
                              <button id="btndetaillocation-4" type="button" class="btn btn-default" data-dismiss="modal">강북구</button>
                              <button id="btndetaillocation-5" type="button" class="btn btn-default" data-dismiss="modal">강서구</button>
                              <button id="btndetaillocation-6" type="button" class="btn btn-default" data-dismiss="modal">관악구</button>
                              <button id="btndetaillocation-7" type="button" class="btn btn-default" data-dismiss="modal">광진구</button>
                              <button id="btndetaillocation-8" type="button" class="btn btn-default" data-dismiss="modal">구로구</button>
                              <button id="btndetaillocation-9" type="button" class="btn btn-default" data-dismiss="modal">금천구</button>
                              <button id="btndetaillocation-10" type="button" class="btn btn-default" data-dismiss="modal">노원구</button>
                              <button id="btndetaillocation-11" type="button" class="btn btn-default" data-dismiss="modal">도봉구</button>
                              <button id="btndetaillocation-12" type="button" class="btn btn-default" data-dismiss="modal">동대문구</button>
                              <button id="btndetaillocation-13" type="button" class="btn btn-default" data-dismiss="modal">동작구</button>
                              <button id="btndetaillocation-14" type="button" class="btn btn-default" data-dismiss="modal">마포구</button>
                              <button id="btndetaillocation-15" type="button" class="btn btn-default" data-dismiss="modal">서대문구</button>
                              <button id="btndetaillocation-16" type="button" class="btn btn-default" data-dismiss="modal">서초구</button>
                              <button id="btndetaillocation-17" type="button" class="btn btn-default" data-dismiss="modal">성동구</button>
                              <button id="btndetaillocation-18" type="button" class="btn btn-default" data-dismiss="modal">성북구</button>
                              <button id="btndetaillocation-19" type="button" class="btn btn-default" data-dismiss="modal">양천구</button>
                              <button id="btndetaillocation-20" type="button" class="btn btn-default" data-dismiss="modal">영등포구</button>
                              <button id="btndetaillocation-21" type="button" class="btn btn-default" data-dismiss="modal">용산구</button>
                              <button id="btndetaillocation-22" type="button" class="btn btn-default" data-dismiss="modal">은평구</button>
                              <button id="btndetaillocation-23" type="button" class="btn btn-default" data-dismiss="modal">종로구</button>
                              <button id="btndetaillocation-24" type="button" class="btn btn-default" data-dismiss="modal">중구</button>
                              <button id="btndetaillocation-25" type="button" class="btn btn-default" data-dismiss="modal">중랑구</button>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal"  data-toggle="modal" data-target="#location">뒤로</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--경기 modal -->
                <div class="location modal fade" id="detaillocation2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">경기</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btndetaillocation-26" type="button" class="btn btn-default" data-dismiss="modal">전체</button>
                              <button id="btndetaillocation-27" type="button" class="btn btn-default" data-dismiss="modal">가평군</button>
                              <button id="btndetaillocation-28" type="button" class="btn btn-default" data-dismiss="modal">고양시</button>
                              <button id="btndetaillocation-29" type="button" class="btn btn-default" data-dismiss="modal">과천시</button>
                              <button id="btndetaillocation-30" type="button" class="btn btn-default" data-dismiss="modal">광명시</button>
                              <button id="btndetaillocation-31" type="button" class="btn btn-default" data-dismiss="modal">광주시</button>
                              <button id="btndetaillocation-32" type="button" class="btn btn-default" data-dismiss="modal">구리시</button>
                              <button id="btndetaillocation-33" type="button" class="btn btn-default" data-dismiss="modal">군포시</button>
                              <button id="btndetaillocation-34" type="button" class="btn btn-default" data-dismiss="modal">김포시</button>
                              <button id="btndetaillocation-35" type="button" class="btn btn-default" data-dismiss="modal">남양주시</button>
                              <button id="btndetaillocation-36" type="button" class="btn btn-default" data-dismiss="modal">동두천시</button>
                              <button id="btndetaillocation-37" type="button" class="btn btn-default" data-dismiss="modal">부천시</button>
                              <button id="btndetaillocation-38" type="button" class="btn btn-default" data-dismiss="modal">성남시</button>
                              <button id="btndetaillocation-39" type="button" class="btn btn-default" data-dismiss="modal">수원시</button>
                              <button id="btndetaillocation-40" type="button" class="btn btn-default" data-dismiss="modal">시흥시</button>
                              <button id="btndetaillocation-41" type="button" class="btn btn-default" data-dismiss="modal">안산시</button>
                              <button id="btndetaillocation-42" type="button" class="btn btn-default" data-dismiss="modal">안성시</button>
                              <button id="btndetaillocation-43" type="button" class="btn btn-default" data-dismiss="modal">안양시</button>
                              <button id="btndetaillocation-44" type="button" class="btn btn-default" data-dismiss="modal">양주시</button>
                              <button id="btndetaillocation-45" type="button" class="btn btn-default" data-dismiss="modal">양평군</button>
                              <button id="btndetaillocation-46" type="button" class="btn btn-default" data-dismiss="modal">여주시</button>
                              <button id="btndetaillocation-47" type="button" class="btn btn-default" data-dismiss="modal">연천군</button>
                              <button id="btndetaillocation-48" type="button" class="btn btn-default" data-dismiss="modal">오산시</button>
                              <button id="btndetaillocation-49" type="button" class="btn btn-default" data-dismiss="modal">용인시</button>
                              <button id="btndetaillocation-50" type="button" class="btn btn-default" data-dismiss="modal">의왕시</button>
                              <button id="btndetaillocation-51" type="button" class="btn btn-default" data-dismiss="modal">의정부시</button>
                              <button id="btndetaillocation-52" type="button" class="btn btn-default" data-dismiss="modal">이천시</button>
                              <button id="btndetaillocation-53" type="button" class="btn btn-default" data-dismiss="modal">파주시</button>
                              <button id="btndetaillocation-54" type="button" class="btn btn-default" data-dismiss="modal">평택시</button>
                              <button id="btndetaillocation-55" type="button" class="btn btn-default" data-dismiss="modal">포천시</button>
                              <button id="btndetaillocation-56" type="button" class="btn btn-default" data-dismiss="modal">하남시</button>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal"  data-toggle="modal" data-target="#location">뒤로</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="location modal fade" id="detaillocation3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">인천</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btndetaillocation-57" type="button" class="btn btn-default" data-dismiss="modal">전체</button>
                              <button id="btndetaillocation-58" type="button" class="btn btn-default" data-dismiss="modal">계양구</button>
                              <button id="btndetaillocation-59" type="button" class="btn btn-default" data-dismiss="modal">남구</button>
                              <button id="btndetaillocation-60" type="button" class="btn btn-default" data-dismiss="modal">남동구</button>
                              <button id="btndetaillocation-61" type="button" class="btn btn-default" data-dismiss="modal">동구</button>
                              <button id="btndetaillocation-62" type="button" class="btn btn-default" data-dismiss="modal">부평구</button>
                              <button id="btndetaillocation-63" type="button" class="btn btn-default" data-dismiss="modal">서구</button>
                              <button id="btndetaillocation-64" type="button" class="btn btn-default" data-dismiss="modal">연수구</button>
                              <button id="btndetaillocation-65" type="button" class="btn btn-default" data-dismiss="modal">중구</button>
                              <button id="btndetaillocation-66" type="button" class="btn btn-default" data-dismiss="modal">강화군</button>
                              <button id="btndetaillocation-67" type="button" class="btn btn-default" data-dismiss="modal">웅진군</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal"  data-toggle="modal" data-target="#location">뒤로</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="location modal fade" id="detaillocation4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">강원</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btndetaillocation-68" type="button" class="btn btn-default" data-dismiss="modal">전체</button>
                              <button id="btndetaillocation-69" type="button" class="btn btn-default" data-dismiss="modal">강릉시</button>
                              <button id="btndetaillocation-70" type="button" class="btn btn-default" data-dismiss="modal">동해시</button>
                              <button id="btndetaillocation-71" type="button" class="btn btn-default" data-dismiss="modal">삼척시</button>
                              <button id="btndetaillocation-72" type="button" class="btn btn-default" data-dismiss="modal">속초시</button>
                              <button id="btndetaillocation-73" type="button" class="btn btn-default" data-dismiss="modal">원주시</button>
                              <button id="btndetaillocation-74" type="button" class="btn btn-default" data-dismiss="modal">춘천시</button>
                              <button id="btndetaillocation-75" type="button" class="btn btn-default" data-dismiss="modal">태백시</button>
                              <button id="btndetaillocation-76" type="button" class="btn btn-default" data-dismiss="modal">고성군</button>
                              <button id="btndetaillocation-77" type="button" class="btn btn-default" data-dismiss="modal">양구군</button>
                              <button id="btndetaillocation-78" type="button" class="btn btn-default" data-dismiss="modal">양양군</button>
                              <button id="btndetaillocation-79" type="button" class="btn btn-default" data-dismiss="modal">영월군</button>
                              <button id="btndetaillocation-80" type="button" class="btn btn-default" data-dismiss="modal">인제군</button>
                              <button id="btndetaillocation-81" type="button" class="btn btn-default" data-dismiss="modal">정선군</button>
                              <button id="btndetaillocation-82" type="button" class="btn btn-default" data-dismiss="modal">철원군</button>
                              <button id="btndetaillocation-83" type="button" class="btn btn-default" data-dismiss="modal">평창군</button>
                              <button id="btndetaillocation-84" type="button" class="btn btn-default" data-dismiss="modal">홍천군</button>
                              <button id="btndetaillocation-85" type="button" class="btn btn-default" data-dismiss="modal">화천군</button>
                              <button id="btndetaillocation-86" type="button" class="btn btn-default" data-dismiss="modal">횡성군</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal"  data-toggle="modal" data-target="#location">뒤로</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="location modal fade" id="detaillocation5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">부산</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btndetaillocation-87" type="button" class="btn btn-default" data-dismiss="modal">전체</button>
                              <button id="btndetaillocation-88" type="button" class="btn btn-default" data-dismiss="modal">강서구</button>
                              <button id="btndetaillocation-89" type="button" class="btn btn-default" data-dismiss="modal">금정구</button>
                              <button id="btndetaillocation-90" type="button" class="btn btn-default" data-dismiss="modal">남구</button>
                              <button id="btndetaillocation-91" type="button" class="btn btn-default" data-dismiss="modal">동구</button>
                              <button id="btndetaillocation-92" type="button" class="btn btn-default" data-dismiss="modal">동래구</button>
                              <button id="btndetaillocation-93" type="button" class="btn btn-default" data-dismiss="modal">부산진구</button>
                              <button id="btndetaillocation-94" type="button" class="btn btn-default" data-dismiss="modal">북구</button>
                              <button id="btndetaillocation-95" type="button" class="btn btn-default" data-dismiss="modal">사상구</button>
                              <button id="btndetaillocation-96" type="button" class="btn btn-default" data-dismiss="modal">사하구</button>
                              <button id="btndetaillocation-97" type="button" class="btn btn-default" data-dismiss="modal">서구</button>
                              <button id="btndetaillocation-98" type="button" class="btn btn-default" data-dismiss="modal">수영구</button>
                              <button id="btndetaillocation-99" type="button" class="btn btn-default" data-dismiss="modal">연제구</button>
                              <button id="btndetaillocation-100" type="button" class="btn btn-default" data-dismiss="modal">영도구</button>
                              <button id="btndetaillocation-101" type="button" class="btn btn-default" data-dismiss="modal">중구</button>
                              <button id="btndetaillocation-102" type="button" class="btn btn-default" data-dismiss="modal">해운대구</button>
                              <button id="btndetaillocation-103" type="button" class="btn btn-default" data-dismiss="modal">기장군</button>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal"  data-toggle="modal" data-target="#location">뒤로</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="location modal fade" id="detaillocation6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">경남</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btndetaillocation-104" type="button" class="btn btn-default" data-dismiss="modal">전체</button>
                              <button id="btndetaillocation-105" type="button" class="btn btn-default" data-dismiss="modal">거제시</button>
                              <button id="btndetaillocation-106" type="button" class="btn btn-default" data-dismiss="modal">김해시</button>
                              <button id="btndetaillocation-107" type="button" class="btn btn-default" data-dismiss="modal">마산시</button>
                              <button id="btndetaillocation-108" type="button" class="btn btn-default" data-dismiss="modal">밀양시</button>
                              <button id="btndetaillocation-109" type="button" class="btn btn-default" data-dismiss="modal">사천시</button>
                              <button id="btndetaillocation-110" type="button" class="btn btn-default" data-dismiss="modal">울산시</button>
                              <button id="btndetaillocation-111" type="button" class="btn btn-default" data-dismiss="modal">진주시</button>
                              <button id="btndetaillocation-112" type="button" class="btn btn-default" data-dismiss="modal">진해시</button>
                              <button id="btndetaillocation-113" type="button" class="btn btn-default" data-dismiss="modal">창원시</button>
                              <button id="btndetaillocation-114" type="button" class="btn btn-default" data-dismiss="modal">통영시</button>
                              <button id="btndetaillocation-115" type="button" class="btn btn-default" data-dismiss="modal">거창군</button>
                              <button id="btndetaillocation-116" type="button" class="btn btn-default" data-dismiss="modal">고성군</button>
                              <button id="btndetaillocation-117" type="button" class="btn btn-default" data-dismiss="modal">남해군</button>
                              <button id="btndetaillocation-118" type="button" class="btn btn-default" data-dismiss="modal">산청군</button>
                              <button id="btndetaillocation-119" type="button" class="btn btn-default" data-dismiss="modal">양산시</button>
                              <button id="btndetaillocation-120" type="button" class="btn btn-default" data-dismiss="modal">의령군</button>
                              <button id="btndetaillocation-121" type="button" class="btn btn-default" data-dismiss="modal">창녕군</button>
                              <button id="btndetaillocation-122" type="button" class="btn btn-default" data-dismiss="modal">하동군</button>
                              <button id="btndetaillocation-123" type="button" class="btn btn-default" data-dismiss="modal">함안군</button>
                              <button id="btndetaillocation-124" type="button" class="btn btn-default" data-dismiss="modal">함양군</button>
                              <button id="btndetaillocation-125" type="button" class="btn btn-default" data-dismiss="modal">합천군</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal"  data-toggle="modal" data-target="#location">뒤로</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="location modal fade" id="detaillocation7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">대구</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btndetaillocation-126" type="button" class="btn btn-default" data-dismiss="modal">전체</button>
                              <button id="btndetaillocation-127" type="button" class="btn btn-default" data-dismiss="modal">남구</button>
                              <button id="btndetaillocation-128" type="button" class="btn btn-default" data-dismiss="modal">달서구</button>
                              <button id="btndetaillocation-129" type="button" class="btn btn-default" data-dismiss="modal">동구</button>
                              <button id="btndetaillocation-130" type="button" class="btn btn-default" data-dismiss="modal">북구</button>
                              <button id="btndetaillocation-131" type="button" class="btn btn-default" data-dismiss="modal">서구</button>
                              <button id="btndetaillocation-132" type="button" class="btn btn-default" data-dismiss="modal">수성구</button>
                              <button id="btndetaillocation-133" type="button" class="btn btn-default" data-dismiss="modal">중구</button>
                              <button id="btndetaillocation-134" type="button" class="btn btn-default" data-dismiss="modal">달성군</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal"  data-toggle="modal" data-target="#location">뒤로</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="location modal fade" id="detaillocation8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">경북</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btndetaillocation-135" type="button" class="btn btn-default" data-dismiss="modal">전체</button>
                              <button id="btndetaillocation-136" type="button" class="btn btn-default" data-dismiss="modal">경산시</button>
                              <button id="btndetaillocation-137" type="button" class="btn btn-default" data-dismiss="modal">경주시</button>
                              <button id="btndetaillocation-138" type="button" class="btn btn-default" data-dismiss="modal">구미시</button>
                              <button id="btndetaillocation-139" type="button" class="btn btn-default" data-dismiss="modal">김천시</button>
                              <button id="btndetaillocation-140" type="button" class="btn btn-default" data-dismiss="modal">문겅시</button>
                              <button id="btndetaillocation-141" type="button" class="btn btn-default" data-dismiss="modal">상주시</button>
                              <button id="btndetaillocation-142" type="button" class="btn btn-default" data-dismiss="modal">안동시</button>
                              <button id="btndetaillocation-143" type="button" class="btn btn-default" data-dismiss="modal">영주시</button>
                              <button id="btndetaillocation-144" type="button" class="btn btn-default" data-dismiss="modal">영천시</button>
                              <button id="btndetaillocation-145" type="button" class="btn btn-default" data-dismiss="modal">포항시</button>
                              <button id="btndetaillocation-146" type="button" class="btn btn-default" data-dismiss="modal">고령군</button>
                              <button id="btndetaillocation-147" type="button" class="btn btn-default" data-dismiss="modal">군위군</button>
                              <button id="btndetaillocation-148" type="button" class="btn btn-default" data-dismiss="modal">봉화군</button>
                              <button id="btndetaillocation-149" type="button" class="btn btn-default" data-dismiss="modal">성주군</button>
                              <button id="btndetaillocation-150" type="button" class="btn btn-default" data-dismiss="modal">영덕군</button>
                              <button id="btndetaillocation-151" type="button" class="btn btn-default" data-dismiss="modal">영양군</button>
                              <button id="btndetaillocation-152" type="button" class="btn btn-default" data-dismiss="modal">예천군</button>
                              <button id="btndetaillocation-153" type="button" class="btn btn-default" data-dismiss="modal">울릉군</button>
                              <button id="btndetaillocation-154" type="button" class="btn btn-default" data-dismiss="modal">울진군</button>
                              <button id="btndetaillocation-155" type="button" class="btn btn-default" data-dismiss="modal">의성군</button>
                              <button id="btndetaillocation-156" type="button" class="btn btn-default" data-dismiss="modal">청도군</button>
                              <button id="btndetaillocation-157" type="button" class="btn btn-default" data-dismiss="modal">청송군</button>
                              <button id="btndetaillocation-158" type="button" class="btn btn-default" data-dismiss="modal">칠곡군</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal"  data-toggle="modal" data-target="#location">뒤로</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="location modal fade" id="detaillocation9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">대전</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btndetaillocation-159" type="button" class="btn btn-default" data-dismiss="modal">전체</button>
                              <button id="btndetaillocation-160" type="button" class="btn btn-default" data-dismiss="modal">대덕구</button>
                              <button id="btndetaillocation-161" type="button" class="btn btn-default" data-dismiss="modal">동구</button>
                              <button id="btndetaillocation-162" type="button" class="btn btn-default" data-dismiss="modal">서구</button>
                              <button id="btndetaillocation-163" type="button" class="btn btn-default" data-dismiss="modal">유성구</button>
                              <button id="btndetaillocation-164" type="button" class="btn btn-default" data-dismiss="modal">중구</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal"  data-toggle="modal" data-target="#location">뒤로</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="location modal fade" id="detaillocation10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">충남</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btndetaillocation-165" type="button" class="btn btn-default" data-dismiss="modal">전체</button>
                              <button id="btndetaillocation-166" type="button" class="btn btn-default" data-dismiss="modal">공주시</button>
                              <button id="btndetaillocation-167" type="button" class="btn btn-default" data-dismiss="modal">보령시</button>
                              <button id="btndetaillocation-168" type="button" class="btn btn-default" data-dismiss="modal">서산시</button>
                              <button id="btndetaillocation-169" type="button" class="btn btn-default" data-dismiss="modal">아산시</button>
                              <button id="btndetaillocation-170" type="button" class="btn btn-default" data-dismiss="modal">천안시</button>
                              <button id="btndetaillocation-171" type="button" class="btn btn-default" data-dismiss="modal">금산군</button>
                              <button id="btndetaillocation-172" type="button" class="btn btn-default" data-dismiss="modal">논산군</button>
                              <button id="btndetaillocation-173" type="button" class="btn btn-default" data-dismiss="modal">당진군</button>
                              <button id="btndetaillocation-174" type="button" class="btn btn-default" data-dismiss="modal">부여군</button>
                              <button id="btndetaillocation-175" type="button" class="btn btn-default" data-dismiss="modal">서천군</button>
                              <button id="btndetaillocation-176" type="button" class="btn btn-default" data-dismiss="modal">연기군</button>
                              <button id="btndetaillocation-177" type="button" class="btn btn-default" data-dismiss="modal">예산군</button>
                              <button id="btndetaillocation-178" type="button" class="btn btn-default" data-dismiss="modal">청양군</button>
                              <button id="btndetaillocation-179" type="button" class="btn btn-default" data-dismiss="modal">태안군</button>
                              <button id="btndetaillocation-180" type="button" class="btn btn-default" data-dismiss="modal">홍성군</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal"  data-toggle="modal" data-target="#location">뒤로</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="location modal fade" id="detaillocation11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">충북</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btndetaillocation-181" type="button" class="btn btn-default" data-dismiss="modal">전체</button>
                              <button id="btndetaillocation-182" type="button" class="btn btn-default" data-dismiss="modal">제천시</button>
                              <button id="btndetaillocation-183" type="button" class="btn btn-default" data-dismiss="modal">청주시</button>
                              <button id="btndetaillocation-184" type="button" class="btn btn-default" data-dismiss="modal">충주시</button>
                              <button id="btndetaillocation-185" type="button" class="btn btn-default" data-dismiss="modal">괴산군</button>
                              <button id="btndetaillocation-186" type="button" class="btn btn-default" data-dismiss="modal">단양군</button>
                              <button id="btndetaillocation-187" type="button" class="btn btn-default" data-dismiss="modal">보은군</button>
                              <button id="btndetaillocation-188" type="button" class="btn btn-default" data-dismiss="modal">연동군</button>
                              <button id="btndetaillocation-189" type="button" class="btn btn-default" data-dismiss="modal">옥천군</button>
                              <button id="btndetaillocation-190" type="button" class="btn btn-default" data-dismiss="modal">음성군</button>
                              <button id="btndetaillocation-191" type="button" class="btn btn-default" data-dismiss="modal">진천군</button>
                              <button id="btndetaillocation-192" type="button" class="btn btn-default" data-dismiss="modal">청원군</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal"  data-toggle="modal" data-target="#location">뒤로</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="location modal fade" id="detaillocation12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">광주</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btndetaillocation-193" type="button" class="btn btn-default" data-dismiss="modal">전체</button>
                              <button id="btndetaillocation-194" type="button" class="btn btn-default" data-dismiss="modal">광산구</button>
                              <button id="btndetaillocation-195" type="button" class="btn btn-default" data-dismiss="modal">남구</button>
                              <button id="btndetaillocation-196" type="button" class="btn btn-default" data-dismiss="modal">동구</button>
                              <button id="btndetaillocation-197" type="button" class="btn btn-default" data-dismiss="modal">북구</button>
                              <button id="btndetaillocation-198" type="button" class="btn btn-default" data-dismiss="modal">서구</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal"  data-toggle="modal" data-target="#location">뒤로</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="location modal fade" id="detaillocation13" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">전남</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btndetaillocation-199" type="button" class="btn btn-default" data-dismiss="modal">전체</button>
                              <button id="btndetaillocation-200" type="button" class="btn btn-default" data-dismiss="modal">광양시</button>
                              <button id="btndetaillocation-201" type="button" class="btn btn-default" data-dismiss="modal">나주시</button>
                              <button id="btndetaillocation-202" type="button" class="btn btn-default" data-dismiss="modal">목포시</button>
                              <button id="btndetaillocation-203" type="button" class="btn btn-default" data-dismiss="modal">순천시</button>
                              <button id="btndetaillocation-204" type="button" class="btn btn-default" data-dismiss="modal">여수시</button>
                              <button id="btndetaillocation-205" type="button" class="btn btn-default" data-dismiss="modal">여천시</button>
                              <button id="btndetaillocation-206" type="button" class="btn btn-default" data-dismiss="modal">강진군</button>
                              <button id="btndetaillocation-207" type="button" class="btn btn-default" data-dismiss="modal">고흥군</button>
                              <button id="btndetaillocation-208" type="button" class="btn btn-default" data-dismiss="modal">곡성군</button>
                              <button id="btndetaillocation-209" type="button" class="btn btn-default" data-dismiss="modal">구례군</button>
                              <button id="btndetaillocation-210" type="button" class="btn btn-default" data-dismiss="modal">담양군</button>
                              <button id="btndetaillocation-211" type="button" class="btn btn-default" data-dismiss="modal">무안군</button>
                              <button id="btndetaillocation-212" type="button" class="btn btn-default" data-dismiss="modal">보성군</button>
                              <button id="btndetaillocation-213" type="button" class="btn btn-default" data-dismiss="modal">신안군</button>
                              <button id="btndetaillocation-214" type="button" class="btn btn-default" data-dismiss="modal">여천군</button>
                              <button id="btndetaillocation-215" type="button" class="btn btn-default" data-dismiss="modal">영광군</button>
                              <button id="btndetaillocation-216" type="button" class="btn btn-default" data-dismiss="modal">영암군</button>
                              <button id="btndetaillocation-217" type="button" class="btn btn-default" data-dismiss="modal">완도군</button>
                              <button id="btndetaillocation-218" type="button" class="btn btn-default" data-dismiss="modal">장성군</button>
                              <button id="btndetaillocation-219" type="button" class="btn btn-default" data-dismiss="modal">장흥군</button>
                              <button id="btndetaillocation-220" type="button" class="btn btn-default" data-dismiss="modal">진도군</button>
                              <button id="btndetaillocation-221" type="button" class="btn btn-default" data-dismiss="modal">함평군</button>
                              <button id="btndetaillocation-222" type="button" class="btn btn-default" data-dismiss="modal">해남군</button>
                              <button id="btndetaillocation-223" type="button" class="btn btn-default" data-dismiss="modal">화순군</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal"  data-toggle="modal" data-target="#location">뒤로</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="location modal fade" id="detaillocation14" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">울산</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btndetaillocation-224" type="button" class="btn btn-default" data-dismiss="modal">전체</button>
                              <button id="btndetaillocation-225" type="button" class="btn btn-default" data-dismiss="modal">남구</button>
                              <button id="btndetaillocation-226" type="button" class="btn btn-default" data-dismiss="modal">동구</button>
                              <button id="btndetaillocation-227" type="button" class="btn btn-default" data-dismiss="modal">북구</button>
                              <button id="btndetaillocation-228" type="button" class="btn btn-default" data-dismiss="modal">중구</button>
                              <button id="btndetaillocation-229" type="button" class="btn btn-default" data-dismiss="modal">울주군</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal"  data-toggle="modal" data-target="#location">뒤로</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="location modal fade" id="detaillocation15" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">전북</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btndetaillocation-230" type="button" class="btn btn-default" data-dismiss="modal">전체</button>
                              <button id="btndetaillocation-231" type="button" class="btn btn-default" data-dismiss="modal">군산시</button>
                              <button id="btndetaillocation-232" type="button" class="btn btn-default" data-dismiss="modal">김제시</button>
                              <button id="btndetaillocation-233" type="button" class="btn btn-default" data-dismiss="modal">남원시</button>
                              <button id="btndetaillocation-234" type="button" class="btn btn-default" data-dismiss="modal">익산시</button>
                              <button id="btndetaillocation-235" type="button" class="btn btn-default" data-dismiss="modal">전주시</button>
                              <button id="btndetaillocation-236" type="button" class="btn btn-default" data-dismiss="modal">정읍시</button>
                              <button id="btndetaillocation-237" type="button" class="btn btn-default" data-dismiss="modal">고창군</button>
                              <button id="btndetaillocation-238" type="button" class="btn btn-default" data-dismiss="modal">무주군</button>
                              <button id="btndetaillocation-239" type="button" class="btn btn-default" data-dismiss="modal">부안군</button>
                              <button id="btndetaillocation-240" type="button" class="btn btn-default" data-dismiss="modal">순창군</button>
                              <button id="btndetaillocation-241" type="button" class="btn btn-default" data-dismiss="modal">완주군</button>
                              <button id="btndetaillocation-242" type="button" class="btn btn-default" data-dismiss="modal">임실군</button>
                              <button id="btndetaillocation-243" type="button" class="btn btn-default" data-dismiss="modal">장수군</button>
                              <button id="btndetaillocation-244" type="button" class="btn btn-default" data-dismiss="modal">진안군</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal"  data-toggle="modal" data-target="#location">뒤로</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="location modal fade" id="detaillocation16" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">제주</h4>
                            </div>
                            <div class="modal-body">
                              <button id="btndetaillocation-245" type="button" class="btn btn-default" data-dismiss="modal">전체</button>
                              <button id="btndetaillocation-246" type="button" class="btn btn-default" data-dismiss="modal">서귀포시</button>
                              <button id="btndetaillocation-247" type="button" class="btn btn-default" data-dismiss="modal">제주시</button>
                              <button id="btndetaillocation-248" type="button" class="btn btn-default" data-dismiss="modal">남제주군</button>
                              <button id="btndetaillocation-249" type="button" class="btn btn-default" data-dismiss="modal">북제주군</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal"  data-toggle="modal" data-target="#location">뒤로</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    var modalVerticalCenterClass = ".location.modal";
                    function centerModals($element) {
                        var $modals;
                        if ($element.length) {
                            $modals = $element;
                        } else {
                            $modals = $(modalVerticalCenterClass + ':visible');
                        }
                        $modals.each( function(i) {
                            var $clone = $(this).clone().css('display', 'block').appendTo('body');
                            var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);
                            top = top > 0 ? top : 0;
                            $clone.remove();
                            $(this).find('.modal-content').css("margin-top", top);
                        });
                    }
                    $(modalVerticalCenterClass).on('show.bs.modal', function(e) {
                        centerModals($(this));
                    });
                    $(window).on('resize', centerModals);
                    $(document).ready(function(){
                        var result;
                        var detailresult;
                        $('button[id^="btnlocation-"]').click(function(){
                            var currentId = $(this).attr('id');
                            result = "#" + currentId;
                            $("#region").val($(result).text());
                        });
                        $('button[id^="btndetaillocation-"]').click(function(){
                            var currentId = $(this).attr('id');
                            detailresult = "#" + currentId;
                            $("#address").val($(detailresult).text());
                        });

                    });
                </script>


                <!--==================== 검색 결과 ==================-->
                <div class="filter">
                    <div class="btn-group pull-right" role="group" style="padding-top: 2px;">
                        <button type="button" class="btn btn-default" onclick="sortByPrice()">가격순</button>
                        <button type="button" class="btn btn-default" onclick="sortByGrade()">평점순</button>
                    </div>
                    <script>
                    function sortByPrice() {
                        var myList=$('section');
                        var items=myList.children('article');
                        items.sort(function(a,b){
                          a = $(a).children('.caption').children('#lowest_price').text().slice(0,-1).replace(",", "");
                          b = $(b).children('.caption').children('#lowest_price').text().slice(0,-1).replace(",", "");
                          return a-b;
                        })
                        $.each(items,function(idx,itm){
                         myList.append(itm);
                        })
                    }
                    function sortByGrade() {
                        var myList=$('section');
                        var items=myList.children('article');
                        items.sort(function(a,b){
                          a = $(a).children('.ratings').children('p').last().children('span').last().children().text();
                          b = $(b).children('.ratings').children('p').last().children('span').last().children().text();
                          console.log(a);
                          console.log(b);
                          return b-a;
                        })
                        $.each(items,function(idx,itm){
                         myList.append(itm);
                        })
                        console.log(items);
                    }

                    </script>
                </div>
                <div class="row">

                    <section id="pinBoot">

                    </section>
                    <hr>
                </div>
            </div>
        </div>


        <!--=================================== 우측 메뉴 ===================================-->
        <!-- 지도 -->
        <div class="col-md-5" style="padding-left: 0px;">
            <div class="map_wrap">
                <div id="map" style="width:100%;height:100%;position:relative;overflow:hidden;"></div>
                <div class="hAddr">
                    <span class="title">지도중심기준 행정동 주소정보</span>
                    <span id="centerAddr"></span>
                </div>
            </div>
            <?php
              $query = '';
              if($_GET['query'] != "") { //simpleSearch
                $query = $_GET['query'];
              }
              else if($_GET['regionName'] != "") { //resionSearch
                $query = $_GET['regionName'];
              }
              else { //search
                if($_GET['address'] != '전체') {
                  $query = $_GET['region'].' '.$_GET['address'];
                }
                else {
                  $query = $_GET['region'];
                }
              }
            ?>

            <script type="text/javascript" src="//apis.daum.net/maps/maps3.js?apikey=9a7200faa71681dc01ff5e0453ff4234&libraries=services,clusterer,drawing"></script>
            <script>
                var map = new daum.maps.Map(document.getElementById('map'), { // 지도를 표시할 div
                    center : new daum.maps.LatLng(36.2683, 127.6358), // 지도의 중심좌표
                    level : 13 // 지도의 확대 레벨
                });

                // 주소-좌표 변환 객체를 생성합니다
                var geocoder = new daum.maps.services.Geocoder();
                // 주소로 좌표를 검색합니다
                geocoder.addr2coord('<?php echo $query;?>', function(status, result) {
                    // 정상적으로 검색이 완료됐으면
                    if (status === daum.maps.services.Status.OK) {
                        var coords = new daum.maps.LatLng(result.addr[0].lat, result.addr[0].lng);
                        // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
                        map.setCenter(coords);
                        map.setLevel(11);
                        searchAddrFromCoords(map.getCenter(), displayCenterInfo);
                    }
                });

                // 마커 클러스터러를 생성합니다
                // 마커 클러스터러를 생성할 때 disableClickZoom 값을 true로 지정하지 않은 경우
                // 클러스터 마커를 클릭했을 때 클러스터 객체가 포함하는 마커들이 모두 잘 보이도록 지도의 레벨과 영역을 변경합니다
                // 이 예제에서는 disableClickZoom 값을 true로 설정하여 기본 클릭 동작을 막고
                // 클러스터 마커를 클릭했을 때 클릭된 클러스터 마커의 위치를 기준으로 지도를 1레벨씩 확대합니다
                var clusterer = new daum.maps.MarkerClusterer({
                    map: map, // 마커들을 클러스터로 관리하고 표시할 지도 객체
                    averageCenter: true, // 클러스터에 포함된 마커들의 평균 위치를 클러스터 마커 위치로 설정
                    minLevel: 1, // 클러스터 할 최소 지도 레벨
                    gridSize: 10,
                    disableClickZoom: true, // 클러스터 마커를 클릭했을 때 지도가 확대되지 않도록 설정한다
                    minClusterSize: 1,

                });

                // 데이터를 가져오기 위해 jQuery를 사용합니다
                // 데이터를 가져와 마커를 생성하고 클러스터러 객체에 넘겨줍니다
                $.get("latlng.php?checkin=<?php echo $_GET['checkin'];?>&checkout=<?php echo $_GET['checkout'];?>", function(data) {
                    // 데이터에서 좌표 값을 가지고 마커를 표시합니다
                    // 마커 클러스터러로 관리할 마커 객체는 생성할 때 지도 객체를 설정하지 않습니다
                    var markers = $(data.positions).map(function(i, position) {
                        return new daum.maps.Marker({
                            position : new daum.maps.LatLng(position.latitude, position.longitude),
                            title : position.pid
                        });
                    });

                    // 클러스터러에 마커들을 추가합니다
                    clusterer.addMarkers(markers);
                });

                // 중심 좌표나 확대 수준이 변경됐을 때 지도 중심 좌표에 대한 주소 정보를 표시하도록 이벤트를 등록합니다
                daum.maps.event.addListener(map, 'idle', function() {
                    searchAddrFromCoords(map.getCenter(), displayCenterInfo);
                });

                function searchAddrFromCoords(coords, callback) {
                    // 좌표로 행정동 주소 정보를 요청합니다
                    geocoder.coord2addr(coords, callback);
                    clusterer.redraw();
                }

                // 지도 좌측상단에 지도 중심좌표에 대한 주소정보를 표출하는 함수입니다
                function displayCenterInfo(status, result) {
                    if (status === daum.maps.services.Status.OK) {
                        var infoDiv = document.getElementById('centerAddr');
                        infoDiv.innerHTML = result[0].fullName;
                    }
                }

                daum.maps.event.addListener( clusterer, 'clustered', function( clusters ) {
                    var where_string = "where_string=where 0";
                    for(var i=0; i<clusters.length; i++) {
                        var markers = clusters[i].getMarkers();
                        for(var j=0; j<markers.length; j++) {
                            where_string += " or pid="+markers[j].getTitle();
                        }
                    }
                    $.ajax({
                      url:'./search_list.php',
                      type:'post',
                      data:where_string,
                      success:function(data){
                        $("#pinBoot").html(data);
                      }
                    });
                });

                var imageSrc = './marker.gif', // 마커이미지의 주소입니다
                imageSize = new daum.maps.Size(180, 180), // 마커이미지의 크기입니다
                imageOption = {offset: new daum.maps.Point(90, 100)}; // 마커이미지의 옵션입니다. 마커의 좌표와 일치시킬 이미지 안에서의 좌표를 설정합니다.

                var marker;
                function _onmouseover(lat, lng) {
                    if(marker != null) {
                      marker.setMap(null);
                    }
                    marker = new daum.maps.Marker({
                        position: new daum.maps.LatLng(lat, lng),
                        image: new daum.maps.MarkerImage(imageSrc, imageSize, imageOption),
                    });
                    marker.setMap(map);
                }

                function _onmouseout() {
                    marker.setMap(null);
                }

            </script>
        </div>
    </div>
</body>

</html>

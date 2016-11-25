<!DOCTYPE html>
<html>
<?php
include("config.php");
include("func.php");

 ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/style1-search.css">
    <link rel="stylesheet" type="text/css" href="./css/style1-tabbar.css">
    <link rel="stylesheet" type="text/css" href="./css/paneltab.css">
    <link rel="stylesheet" type="text/css" href="./css/rating.css">
    <link rel="stylesheet" type="text/css" href="./css/style1-pinterest.css">
    <link rel="stylesheet" type="text/css" href="./css/style1-uppertool.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style1-profile.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/paneltab.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/pinterest.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/search.js" type="text/javascript" charset="utf-8"></script>

</head>
<style>
    body {
        position: relative;
    }

    .affix {
        top: 0;
        width: 100%;
        z-index: 9999 !important;
    }

    .navbar {
        margin-bottom: 0px;
    }

    .affix~.container-fluid {
        position: relative;
        top: 52px;
    }

    #section1 {
        padding-top: 50px;
        padding-bottom: 50px;
    }

    #section2 {
        padding-top: 50px;
        background-color: #f8f8f8;
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        padding-bottom: 50px;
    }

    #section3 {
        padding-top: 50px;
        padding-bottom: 50px;
    }


    .navbar-inverse .navbar-nav>.active>a,
    .navbar-inverse .navbar-nav>.active>a:focus,
    .navbar-inverse .navbar-nav>.active>a:hover {
        background-color: #FB464C;
        height: 50px;
        padding-top: 15px;
        padding-bottom: 15px;
        color: #eee;
        margin-bottom: 0px;
    }

    .navbar-inverse li {
        text-align: center;
    }

    .navbar-inverse {
        border-radius: 0px;
        background-color: gray;
        color: #fff;
        border: 0px;
    }

    .navbar-inverse .navbar-nav>li>a {
        color: #eee;
        padding-top: 15px;
        padding-bottom: 15px;
        margin-bottom: 0px;
    }

    .col-md-6 {
        padding-right: 0px;
    }

    .carousel-inner>.item>img,
    .carousel-inner>.item>a>img {
        width: 130%;
        margin: auto;
        height: 350px;
    }

    .info_cont .days li {
        height: 50px;
    }

    .navbar-inverse .navbar-toggle,
    .navbar-inverse .navbar-collapse,
    .navbar-inverse .navbar-form {
        border-color: #eee;
    }

    h3 {
        margin-top: 10px;
        color: #444;
        margin-top: 10;
        margin-bottom: .5rem;
        -webkit-font-smoothing: antialiased;
        font-weight: 400;
    }

    @media only screen and (min-width: 768px) {
        .nav-justified>li {
            width: 33.3%;
        }
    }

    .navbar-inverse .navbar-toggle {
        margin-right: 30px;
    }

    .thumbnail {
        padding: 0px;
        border-radius: 0;
    }

    .white-panel a {
        color: grey;
    }
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
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
                      echo '<script>alert("로그인이 필요합니다.");</script>';
                      echo '<script>location.replace("./");</script>';
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

  <!-- 리뷰 -->
  <div class="write modal fade" id="reviewWrite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">타임 트래블러 파티 호스텔</h4>
              </div>
              <div class="modal-body writeUl container-fluid">
                  <h5>평점</h5>
                  <div class="container-fluid">
                      <div class="col-xs-4" style="display:flex;">
                          <p>시설</p>
                          <div class="form-group">
                              <select class="form-control" id="facility">
                                <option>10</option>
                                <option>9</option>
                                <option>8</option>
                                <option>7</option>
                                <option>6</option>
                                <option>5</option>
                                <option>4</option>
                                <option>3</option>
                                <option>2</option>
                                <option>1</option>
                          </select>
                          </div>
                      </div>
                      <div class="col-xs-4" style="display:flex">
                          <p>서비스</p>
                          <div class="form-group">
                              <select class="form-control" id="service">
                                <option>10</option>
                                <option>9</option>
                                <option>8</option>
                                <option>7</option>
                                <option>6</option>
                                <option>5</option>
                                <option>4</option>
                                <option>3</option>
                                <option>2</option>
                                <option>1</option>
                          </select>
                          </div>
                      </div>

                      <div class="col-xs-4" style="display:flex;">
                          <p>청결</p>
                          <div class="form-group">
                              <select class="form-control" id="cleanliness">
                                <option>10</option>
                                <option>9</option>
                                <option>8</option>
                                <option>7</option>
                                <option>6</option>
                                <option>5</option>
                                <option>4</option>
                                <option>3</option>
                                <option>2</option>
                                <option>1</option>
                          </select>
                          </div>
                      </div>
                      <div class="col-xs-4" style="display:flex">
                          <p>위치</p>
                          <div class="form-group">
                              <select class="form-control" id="location">
                                <option>10</option>
                                <option>9</option>
                                <option>8</option>
                                <option>7</option>
                                <option>6</option>
                                <option>5</option>
                                <option>4</option>
                                <option>3</option>
                                <option>2</option>
                                <option>1</option>
                          </select>
                          </div>
                      </div>
                      <div class="col-xs-4" style="display:flex;">
                          <p>가격</p>
                          <div class="form-group">
                              <select class="form-control" id="price">
                                <option>10</option>
                                <option>9</option>
                                <option>8</option>
                                <option>7</option>
                                <option>6</option>
                                <option>5</option>
                                <option>4</option>
                                <option>3</option>
                                <option>2</option>
                                <option>1</option>
                          </select>
                          </div>
                      </div>
                      <div class="col-xs-4" style="display:flex">
                          <p>정확성</p>
                          <div class="form-group">
                              <select class="form-control" id="accuracy">
                                <option>10</option>
                                <option>9</option>
                                <option>8</option>
                                <option>7</option>
                                <option>6</option>
                                <option>5</option>
                                <option>4</option>
                                <option>3</option>
                                <option>2</option>
                                <option>1</option>
                          </select>
                          </div>
                      </div>
                  </div>

                  <h5>내용</h5>
                  <div class="container-fluid">
                    <textarea class="form-control" rows="3" placeholder="리뷰를 작성해주세요." style="font-size:13px;"></textarea>
                  </div>
                  <div class="container-fluid">
                      <div>
                          <button type="submit" class="btn btn-primary" id="reviewSubmitBtn">작성하기</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <script>
      var modalVerticalCenterClass = ".write.modal";
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
  </script>

    <!--=================================== 프로필 부분 ===================================-->
    <header class="profile text-center">
        <div class="profileinner container">
            <img src="./img/img_avatar1.png" alt="프로필" class="img-circle" id="logo">
            <p><strong style="color: #FFF; font-size: x-large;"><?php echo $_SESSION['name']?>님</strong></p>
        </div>
    </header>


    <!--=================================== 탭 부분 ===================================-->
    <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="350">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>

            </div>
            <div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav nav-justified">
                        <li><a href="#section1">예약현황</a></li>
                        <li><a href="#section2">이용현황</a></li>
                        <li><a href="#section3">찜한펜션</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div id="section1" class="container-fluid">
        <div class="info_title">
            <h3>예약현황</h3>
        </div>
        <div class="info_cont">
            <table class="rent_price_table" style="width:100%;">
                <thead>
                    <td align="center" class="dayclassify">예약날짜</td>
                    <td align="center" class="dayclassify">예약정보</td>
                    <td align="center" class="dayclassify">결제정보</td>
                </thead>
                <tbody>
                    <?php
                      $sql = "SELECT * FROM `booking` where id = '".$_SESSION['id']."' and checkin > now() ORDER BY `checkin` ASC";
                      $result = mysqli_query($conn, $sql);
                      while($row = mysqli_fetch_assoc($result)) {
                        $dateDiff = date_diff(new DateTime($row[checkin]), new DateTime($row[checkout]));
                        $sql2 = "SELECT name FROM `pension_list` where pid = '".$row[pid]."'";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        $sql3 = "SELECT image FROM `pension_image` where pid = '".$row[pid]."'";
                        $result3 = mysqli_query($conn, $sql3);
                        $row3 = mysqli_fetch_assoc($result3);

                        echo '<tr>
                            <td align="center" id="reserveDate">
                              <p>'.$row[checkin].'</p>
                              <p>~</p>
                              <p>'.$row[checkout].'</p>
                            </td>
                            <td class="substance" align="center">
                              <a href="./house.php?pid='.$row[pid].'">
                                  <img src="'.$row3[image].'" class="img-polaroid voc_list_preview_img">
                                  <p class="text-center">'.$row2[name].'</p>
                              </a>
                            </td>
                            <td align="center" id="priceInfo">

                              <div style="margin-bottom:8px;">
                                <p id="number">'.$row[number].'인</p>
                                <p id="date">'.$dateDiff->days.'박 '.($dateDiff->days+1).'일</p>
                                <p id="option1">+ '.str_replace(" + ", "<br>+ ", "$row[option_name]").'</p>
                              </div>
                              <p>'.number_format($row[total_price]).'원</p>
                            </td>
                        </tr>';
                      }

                     ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="section2" class="container-fluid">
        <div class="info_title">
            <h3>이용현황</h3>
        </div>

        <div class="info_cont">
            <table class="rent_price_table" style="width:100%;">
                <thead>
                    <td align="center" class="dayclassify">예약날짜</td>
                    <td align="center" class="dayclassify">펜션정보</td>
                    <td align="center" class="dayclassify">결제정보</td>
                    <td align="center" class="dayclassify">이용후기</td>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM `booking` where id = '".$_SESSION['id']."' and checkin <= now() ORDER BY `checkin` DESC";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                      $dateDiff = date_diff(new DateTime($row[checkin]), new DateTime($row[checkout]));
                      $sql2 = "SELECT name FROM `pension_list` where pid = '".$row[pid]."'";
                      $result2 = mysqli_query($conn, $sql2);
                      $row2 = mysqli_fetch_assoc($result2);
                      $sql3 = "SELECT image FROM `pension_image` where pid = '".$row[pid]."'";
                      $result3 = mysqli_query($conn, $sql3);
                      $row3 = mysqli_fetch_assoc($result3);

                      echo '<tr>
                          <td align="center" id="reserveDate">
                            <p>'.$row[checkin].'</p>
                            <p>~</p>
                            <p>'.$row[checkout].'</p>
                          </td>
                          <td class="substance" align="center">
                            <a href="./house.php?pid='.$row[pid].'">
                                <img src="'.$row3[image].'" class="img-polaroid voc_list_preview_img">
                                <p class="text-center">'.$row2[name].'</p>
                            </a>
                          </td>
                          <td align="center" id="priceInfo">

                            <div style="margin-bottom:8px;">
                              <p id="number">'.$row[number].'인</p>
                              <p id="date">'.$dateDiff->days.'박 '.($dateDiff->days+1).'일</p>
                              <p id="option1">+ '.str_replace(" + ", "<br>+ ", "$row[option_name]").'</p>
                            </div>
                            <p>'.number_format($row[total_price]).'원</p>
                          </td>
                          <td align="center" id="rating">';
                              $sql4 = "SELECT * FROM `review_list` where pid = '".$row[pid]."' and bid = '".$row[bid]."'";
                              $result4 = mysqli_query($conn, $sql4);
                              $row4 = mysqli_fetch_assoc($result4);
                              if($result4->num_rows != 0) {
                                echo '<p class="col-xs-6">시설</p><p id="rateNum" class="col-xs-6">'.$row4[facility].'</p>
                                <p class="col-xs-6">서비스</p><p id="rateNum" class="col-xs-6">'.$row4[service].'</p>
                                <p class="col-xs-6">청결</p><p id="rateNum" class="col-xs-6">'.$row4[cleanliness].'</p>
                                <p class="col-xs-6">위치</p><p id="rateNum" class="col-xs-6">'.$row4[location].'</p>
                                <p class="col-xs-6">가격</p><p id="rateNum" class="col-xs-6">'.$row4[price].'</p>
                                <p class="col-xs-6">정확성</p><p id="rateNum" class="col-xs-6">'.$row4[accuracy].'</p>
                                <div class="col-md-12" style="margin-top:8px;">';
                                $rating = ($row4[facility] + $row4[service] + $row4[cleanliness] + $row4[location] + $row4[price] + $row4[accuracy]) / 6;
                                $rating = round($rating, 1);
                                rating($rating);
                                echo '<span style="font-size:14px; margin-left:5px;">'.sprintf("%2.1f", $rating).'</span>';
                                echo '</div>';
                                echo '<span style="font-size:10px; color:grey">'.$row4[date].'</span>';
                                echo '</td>';
                              }
                              else {
                                echo '<button type="button" class="btn btn-default write" name="'.$row2[name].'" pid="'.$row[pid].'" bid="'.$row[bid].'">작성하기</button>';
                              }
                      echo '</tr>';
                    }
                   ?>
                   <script>
                   $(document).ready(function() {
                     $(".write").click(function() {
                       $("#reviewWrite").modal();
                       $("#myModalLabel").html($(this).attr("name"));
                       $("#myModalLabel").attr("pid", $(this).attr("pid"));
                       $("#myModalLabel").attr("bid", $(this).attr("bid"));
                     });
                     $("#reviewSubmitBtn").click(function() {
                       if($(".container-fluid textarea").val() != '') {
                         $.ajax({
                           url:"./review_proc.php",
                           type:"post",
                           data:{id:'<?php echo $_SESSION['id']?>',
                                 pid:$("#myModalLabel").attr("pid"),
                                 bid:$("#myModalLabel").attr("bid"),
                                 facility:$("#facility option:selected").text(),
                                 service:$("#service option:selected").text(),
                                 cleanliness:$("#cleanliness option:selected").text(),
                                 location:$("#location option:selected").text(),
                                 price:$("#price option:selected").text(),
                                 accuracy:$("#accuracy option:selected").text(),
                                 text:$(".container-fluid textarea").val(),
                           },
                           success:function(data){
                             if(data==0) {
                               alert("작성이 완료되었습니다.");
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

                       }
                     });
                   });
                   </script>
                </tbody>
            </table>
        </div>
    </div>
    <div id="section3" class="container-fluid">
        <div class="info_title">
            <h3>찜한펜션</h3>
        </div>
        <div class="info_cont">
          <div class="row" style="margin-left:15px;margin-right:15px;">
              <hr style="border-color: lightgrey;">
              <section id="pinBoot">
                <?php
                    $sql = "SELECT * FROM pension_list WHERE pid in (SELECT pid FROM user_like WHERE id='".$_SESSION['id']."')";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                      $pid = $row[pid];
                      $sql2 = "SELECT image FROM pension_image WHERE pid = $pid";
                      $result2 = mysqli_query($conn, $sql2);
                      $row2 = mysqli_fetch_assoc($result2);
                      $sql3 = "SELECT * FROM review_list WHERE pid = $pid";
                      $result3 = mysqli_query($conn, $sql3);
                      $facility = 0;
                      $service = 0;
                      $cleanliness = 0;
                      $location = 0;
                      $price = 0;
                      $accuracy = 0;
                      while($row3 = mysqli_fetch_assoc($result3)) {
                        $facility += $row3[facility];
                        $service += $row3[service];
                        $cleanliness += $row3[cleanliness];
                        $location += $row3[location];
                        $price += $row3[price];
                        $accuracy += $row3[accuracy];
                      }
                      $rating = ($facility + $service + $cleanliness + $location + $price + $accuracy) / (6*$result3->num_rows);
                      $rating = round($rating, 1);

                      echo '<article class="white-panel" style="cursor:pointer" onclick="houseInfo('.$pid.')"><img src='.$row2[image].'>
                          <div class="caption">
                              <h4 class="pull-right" id="lowest_price">'.number_format($row[weekday2_low]).'원</h4>
                              <h4>['.$row[region].'] '.$row[name].'</h4>
                              <p>#'.$row[note].'</p>
                          </div>

                          <div class="ratings">
                              <p class="pull-right">'.$result3->num_rows.' reviews</p>
                              <p>';
                                  rating($rating);?>
                                  <span><strong style="color: #D17581;"><?php echo sprintf("%2.1f", $rating);?></strong></span>
                              <?php echo '
                              </p>
                          </div>
                      </article>';
                      }
                ?>
              </section>
          </div>

    </div>
</body>

</html>

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
    <link rel="stylesheet" type="text/css" href="./css/style1-item.css">
    <link rel="stylesheet" type="text/css" href="./css/style1-tabbar.css">
    <link rel="stylesheet" type="text/css" href="./css/paneltab.css">
    <link rel="stylesheet" type="text/css" href="./css/rating.css">
    <link rel="stylesheet" type="text/css" href="./css/style1-calendar.css">
    <link rel="stylesheet" type="text/css" href="./css/style1-loadmore.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style1-uppertool.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/calendar.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/pinterest-search.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/paneltab.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/surrounding-carousel.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/search.js" type="text/javascript" charset="utf-8"></script>

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
            height: 700px;
            background-color: #f8f8f8;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            padding-bottom: 50px;
        }

        #section3 {
            padding-top: 50px;
            padding-bottom: 50px;
        }

        #section4 {
            padding-top: 50px;
            padding-bottom: 50px;
            background-color: #f8f8f8;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }

        #section5 {
            padding-top: 50px;
            padding-bottom: 50px;
        }

        #section6 {
            padding-top: 50px;
            padding-bottom: 50px;
            background-color: #f8f8f8;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
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
                width: 16.67%;
            }
        }

        .navbar-inverse .navbar-toggle {
            margin-right: 30px;
        }

        .thumbnail {
            padding: 0px;
            border-radius: 0;
        }

        h4 {
            color: darkslategrey;
        }
    </style>
</head>

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
      <!--=================================== 펜션 정보 ===================================-->
    <div class="headline">
        <!--=================================== 펜션 기본 정보 ===================================-->
        <div class="row">
            <!-- Carousel 슬라이더 형식의 펜션 사진 -->
            <div class="col-md-6">
                <div class="slider">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                          <?php
                            $pid = $_GET['pid'];
                            $sql = "SELECT image FROM pension_image WHERE pid = $pid";
                            $result = mysqli_query($conn, $sql);
                            for($i=0; $i<$result->num_rows; $i++) {
                              if($i==0) {
                                echo '<li data-target="#myCarousel" data-slide-to=0 class="active"></li>';
                              }
                              else {
                                echo '<li data-target="#myCarousel" data-slide-to='.$i.'></li>';
                              }
                            }
                          ?>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                          <?php
                            $i = 0;
                            while($row = mysqli_fetch_assoc($result)) {
                              if($i==0) {
                                echo '<div class="item active">
                                    <img src='.$row[image].' width="460" height="300">
                                </div>';
                              }
                              else {
                                echo '<div class="item">
                                    <img src='.$row[image].' width="460" height="300">
                                </div>';
                              }
                              $i++;
                            }
                          ?>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" style="width:1%; background-image: linear-gradient(to right,rgba(0,0,0,0) 0,rgba(0,0,0,0) 100%);">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="margin-left: 8px;"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" style="width:1%; background-image: linear-gradient(to right,rgba(0,0,0,0) 0,rgba(0,0,0,0) 100%);">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="margin-right: 15px;"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 펜션 기본 정보 -->
            <?php
              $sql = "SELECT * FROM pension_list WHERE pid = $pid";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
            ?>
            <div class="col-md-6">
                <div class="container-fluid">
                    <div class="row">
                        <div class="">
                            <h3 style="margin-bottom:8px; padding-left:15px;"><?php echo '['.$row[region].'] '.$row[name].''?></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="pull-right" style="padding-right:18%;">
                            <?php
                              $sql2 = "SELECT * FROM review_list WHERE pid = $pid";
                              $result2 = mysqli_query($conn, $sql2);
                              $facility = 0;
                              $service = 0;
                              $cleanliness = 0;
                              $location = 0;
                              $price = 0;
                              $accuracy = 0;
                              while($row2 = mysqli_fetch_assoc($result2)) {
                                $facility += $row2[facility];
                                $service += $row2[service];
                                $cleanliness += $row2[cleanliness];
                                $location += $row2[location];
                                $price += $row2[price];
                                $accuracy += $row2[accuracy];
                              }
                              $rating = ($facility + $service + $cleanliness + $location + $price + $accuracy) / (6*$result2->num_rows);
                              $rating = round($rating, 1);
                              rating($rating);
                            ?>
                            <span><strong style="color: #D17581;"><?php echo sprintf("%2.1f", $rating);?></strong></span>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <h6><strong>상세주소 </strong></h6>
                        </div>
                        <div class="col-md-9">
                            <h6><?php echo $row[address] ?></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <h6><strong>전화번호 </strong></h6>
                        </div>
                        <div class="col-md-9">
                            <h6><?php echo $row[number] ?></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <h6><strong>입퇴실 시간 </strong></h6>
                        </div>
                        <div class="col-md-9">
                            <h6 style="display:flex; margin-bottom:0px;"><p style="color: cornflowerblue; margin-right:5px;">[입실시간]</p> <?php echo $row[checkin] ?> <p style="color: cornflowerblue; margin-right:5px; margin-left:5px;">[퇴실시간] </p> <?php echo $row[checkout] ?></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <h6><strong>성수기 </strong></h6>
                        </div>
                        <div class="col-md-9">
                            <h6 style="display:flex; margin-bottom:0px;"><p style="color: cornflowerblue; margin-right:5px;">[여름 성수기]</p><?php echo $row[summer] ?></h6>
                            <h6 style="display:flex; margin-top:0px; margin-bottom:0px;"><p style="color: cornflowerblue; margin-right:5px;">[겨울 성수기] </p><?php echo $row[winter] ?></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <h6><strong>비고 </strong></h6>
                        </div>
                        <div class="col-md-9">
                            <h6>#<?php echo $row[note] ?></h6>
                        </div>
                    </div>
                    <container>
                        <div class="row">
                            <div class="col-md-11" style="margin-right:30px;">
                                <button data-toggle="pill" type="button" class="btn btn-lg" id="likeButton" style="width:100%" >
                                <?php
                                if(!isset($_SESSION['is_login'])) {
                                  echo '<p style="font-size:15px; margin-bottom:0px;">찜하기</p>';
                                }
                                else {
                                  $sql_like = "SELECT * FROM `user_like` WHERE id = '".$_SESSION['id']."' and pid = '".$pid."' ";
                                  $result_like = mysqli_query($conn, $sql_like);
                                  if($result_like->num_rows == 0) {
                                    echo '<p style="font-size:15px; margin-bottom:0px;">찜하기</p>';
                                  }
                                  else {
                                    echo '<p style="font-size:15px; margin-bottom:0px;">찜하기 취소</p>';
                                  }
                                }
                                ?>
                            </button>
                            </div>
                        </div>
                    </container>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
      $("#likeButton").click(function() {
        <?php
        if(!isset($_SESSION['is_login'])) {
          echo '$("#myModal").modal();';
        }
        else {
          echo '
          $.ajax({
            url:"./like_valid.php",
            type:"post",
            data:{id:"'.$_SESSION["id"].'", pid:'.$pid.'},
            success:function(data){
              if(data == 0) {
                alert("찜목록에 추가되었습니다.");
                $("#likeButton").children("p").html("찜하기 취소");
              }
              else if(data == 1) {
                alert("찜목록에서 제외되었습니다.");
                $("#likeButton").children("p").html("찜하기");
              }
              else {
                alert("오류가 발생했습니다.");
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
                        <li><a href="#section1">요금 및 시간</a></li>
                        <li><a href="#section2">예약현황</a></li>
                        <li><a href="#section3">찾아오시는 길</a></li>
                        <li><a href="#section4">주변 관광지</a></li>
                        <li><a href="#section5">이용 후기</a></li>
                        <li id="reserve"><a href="#section6">예약하기</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div id="section1" class="container-fluid">
        <div class="info_title">
            <h3>요금 및 시간</h3>
        </div>
        <div class="info_cont">
            <h4 style="margin-bottom: 0px;">이용요금</h4>

            <p style="float: right;"><span class="glyphicon glyphicon-ok" style="color: black;" aria-hidden="true"></span>
                <strong style="font-size:12px; margin-right:15px;">비성수기</strong>
                <span class="glyphicon glyphicon-ok" aria-hidden="true" style="color: #e62a4a;"></span>
                <strong style="color: #e62a4a; font-size:12px;">성수기</strong></p>
            <table class="rent_price_table" style="width:100%;">
                <thead>
                    <td align="center" class="dayclassify">인원</td>
                    <td align="center" class="dayclassify">월, 화, 수, 목, 금</td>
                    <td align="center" class="dayclassify">토, 일 (공휴일)</td>
                </thead>
                <tbody>
                    <tr>
                        <td align="center">2명</td>
                        <td align="center"><?php echo number_format($row[weekday2_low]); ?>원<br>
                            <p><?php echo number_format($row[weekday2_peak]); ?>원</p>
                        </td>
                        <td align="center"><?php echo number_format($row[weekend2_low]); ?>원<br>
                            <p><?php echo number_format($row[weekend2_peak]); ?>원</p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">3명</td>
                        <td align="center"><?php echo number_format($row[weekday3_low]); ?>원<br>
                            <p><?php echo number_format($row[weekday3_peak]); ?>원</p>
                        </td>
                        <td align="center"><?php echo number_format($row[weekend3_low]); ?>원<br>
                            <p><?php echo number_format($row[weekend3_peak]); ?>원</p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">4명</td>
                        <td align="center"><?php echo number_format($row[weekday4_low]); ?>원<br>
                            <p><?php echo number_format($row[weekday4_peak]); ?>원</p>
                        </td>
                        <td align="center"><?php echo number_format($row[weekend4_low]); ?>원<br>
                            <p><?php echo number_format($row[weekend4_peak]); ?>원</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h4 style="margin-bottom: 30px;">이용 및 환불기준</h4>
            <table class="rent_price_table timetable" style="width:100%;">
                <thead>
                    <td align="center" class="head dayclassify">구분</td>
                    <td align="center" class="dayclassify">내용</td>
                </thead>
                <tbody>
                    <tr>
                        <td class="head" align="center">입실</td>
                        <td class="substance">입실은 이용당일 <?php echo $row[checkin]; ?>부터 가능합니다.</td>
                    </tr>
                    <tr>
                        <td class="head" align="center">퇴실</td>
                        <td class="substance">퇴실은 <?php echo $row[checkout] ?>입니다. 꼭 지켜주시기 바랍니다.</td>
                    </tr>
                    <tr>
                        <td class="head" align="center">환불기준</td>
                        <td class="substance">이용일 5일전 취소시 : 90%<br>
                            이용일 4일전 취소시 : 70%<br>
                            이용일 3일전 취소시 : 60%<br>
                            이용일 2일전 취소시 : 50%<br>
                            이용일 1일전 취소시 : 환불불가<br>
                            이용일 당 일 취소시 : 환불불가<br>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php
              $sql7 = "SELECT * FROM `option_table` where pid = $pid";
              $result7 = mysqli_query($conn, $sql7);
              if($result7->num_rows != 0) {
                echo '<h4 style="margin-bottom: 30px; margin-top:50px;">옵션</h4>
                      <table class="rent_price_table timetable" style="width:100%;">
                          <thead>
                              <td align="center" class="head dayclassify">구분</td>
                              <td align="center" class="dayclassify">내용</td>
                          </thead>
                      <tbody>';
                while($row7 = mysqli_fetch_assoc($result7)) {
                  echo '<tr>
                            <td class="head" align="center">'.$row7[option_name].'</td>
                            <td class="substance">
                                '.nl2br($row7[contents]).'
                            </td>
                        </tr>';
                }
                echo '</tbody>
                  </table>';
              }
            ?>
        </div>
    </div>
    <div id="section2" class="container-fluid">
        <div class="info_title">
            <h3>예약현황</h3>
        </div>
        <?php
          $sql6 = "SELECT * FROM `booking` where pid = $pid and checkin >= CURRENT_DATE";
          $result6 = mysqli_query($conn, $sql6);
          while($row6 = mysqli_fetch_assoc($result6)) {
            $checkin = new DateTime($row6[checkin]);
            $checkout = new DateTime($row6[checkout]);
            $dateDiff = date_diff($checkin, $checkout);
            for($i=0; $i<$dateDiff->days; $i++) {
              $string_date = $checkin->format('Y-n-j');
              echo '<script>disabledDays.push("'.$string_date.'")</script>';
              $checkin->modify('+1 day');
            }
          }
        ?>

        <div class="info_cont">
            <div id="bookingCalendar">

            </div>

        </div>

    </div>
    <div id="section3" class="container-fluid">
        <div class="info_title">
            <h3>찾아오시는 길</h3>
        </div>
        <!-- 다음 지도 API -->
        <div class="info_cont">
            <div id="map" style="width:100%;height:600px;"></div>
            <script type="text/javascript" src="//apis.daum.net/maps/maps3.js?apikey=9a7200faa71681dc01ff5e0453ff4234&libraries=services,clusterer,drawing"></script>

            <script>
                var container = document.getElementById('map');
                var options = {
                    center: new daum.maps.LatLng(33.450701, 126.570667),
                    draggable: false,
                    level: 3
                };

                var map = new daum.maps.Map(container, options);
                // 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
                var zoomControl = new daum.maps.ZoomControl();
                map.addControl(zoomControl, daum.maps.ControlPosition.RIGHT);

                // 주소-좌표 변환 객체를 생성합니다
                var geocoder = new daum.maps.services.Geocoder();

                // 주소로 좌표를 검색합니다
                geocoder.addr2coord('<?php echo $row[address];?>', function(status, result) {

                    // 정상적으로 검색이 완료됐으면
                     if (status === daum.maps.services.Status.OK) {
                        var coords = new daum.maps.LatLng(result.addr[0].lat, result.addr[0].lng);
                        // 결과값으로 받은 위치를 마커로 표시합니다
                        var marker = new daum.maps.Marker({
                            map: map,
                            position: coords
                        });
                        // 인포윈도우로 장소에 대한 설명을 표시합니다
                        var infowindow = new daum.maps.InfoWindow({
                            content: '<div style="width:150px;text-align:center;padding:6px 0;"><?php echo $row[name];?></div>'
                        });
                        infowindow.open(map, marker);
                        // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
                        map.setCenter(coords);
                    }
                });
            </script>


            <!-- 펜션 주소 -->
            <p class="room_name">펜션 주소</p>
            <p class="tab_txt"><?php echo $row[address] ?></p>
            <p class="room_name">펜션 찾아가는 길</p>
            <p class="tab_txt"><?php echo nl2br($row[direction]); ?></p>
        </div>

    </div>

    <div id="section4" class="container-fluid">
        <div class="info_title">
            <h3>주변 관광지 정보</h3>
        </div>
        <!-- 주변 관광지마다 탭을 설정 -->
        <ul class="tab">
            <?php
              $sql3 = "SELECT * FROM `pension&tourist_spot` inner join `tourist_spot` WHERE `pension&tourist_spot`.tid=`tourist_spot`.tid and pid = $pid";
              $result3 = mysqli_query($conn, $sql3);
              $i = 0;
              while($row3 = mysqli_fetch_assoc($result3)) {
                if($i==0) {
                  echo '<li class="active"><a data-toggle="pill" href="#Location'.$i.'">'.$row3[name].'</a></li>';
                }
                else {
                  echo '<li><a data-toggle="pill" href="#Location'.$i.'">'.$row3[name].'</a></li>';

                }
                $i++;
              }
            ?>
        </ul>
        <div class="tab-content">
            <?php
              mysqli_data_seek($result3, 0);
              $i = 0;
              while($row3 = mysqli_fetch_assoc($result3)) {
                $tid = $row3[tid];
                $sql4 = "SELECT image FROM tourist_spot_image WHERE tid = $tid";
                $result4 = mysqli_query($conn, $sql4);

                if($i==0) {
                  echo '<div id="Location'.$i.'" class="tab-pane fade in active">';
                }
                else {
                  echo '<div id="Location'.$i.'" class="tab-pane fade">';
                }
                echo '<div class="info_title">
                      <h4>'.$row3[name].'</h4>
                  </div>
                  <div class="surrounding-inner">
                      <table class="table">
                          <tr>
                              <td id="division">상세주소</td>
                              <td id="contents">'.$row3[address].'</td>
                          </tr>
                          <tr>
                              <td id="division">문의전화</td>
                              <td id="contents">'.$row3[number].'</td>
                          </tr>
                          <tr>
                              <td id="division">홈페이지</td>
                              <td id="contents"> <a href='.$row3[homepage].'>'.$row3[homepage].'</a></td>

                          </tr>
                      </table>
                      <div class="container" style="width:100%">
                          <div id="main_area">
                              <!-- Slider -->
                              <div class="row">
                                  <div class="col-xs-12" id="slider">
                                      <!-- Top part of the slider -->
                                      <div class="row">
                                          <div class="col-sm-8" id="carousel-bounding-box">
                                              <div class="carousel slide" id="myCarousel'.($i+2).'">
                                                  <!-- Carousel items -->
                                                  <div class="carousel-inner">';
                                                      $j = 0;
                                                      while($row4 = mysqli_fetch_assoc($result4)) {
                                                        if($j==0) {
                                                          echo '<div class="active item" data-slide-number="'.$j.'">';
                                                        }
                                                        else {
                                                          echo '<div class="item" data-slide-number="'.$j.'">';
                                                        }
                                                        echo '<img src="'.$row4[image].'"></div>';
                                                        $j++;
                                                      }
                                                  echo
                                                  '</div>
                                                  <!-- Carousel nav -->
                                                  <a class="left carousel-control" href="#myCarousel'.($i+2).'" role="button" data-slide="prev">
                                                      <span class="glyphicon glyphicon-chevron-left"></span>
                                                  </a>
                                                  <a class="right carousel-control" href="#myCarousel'.($i+2).'" role="button" data-slide="next">
                                                      <span class="glyphicon glyphicon-chevron-right"></span>
                                                  </a>
                                              </div>
                                          </div>

                                          <div class="col-sm-4" style="height:350; overflow:slider">
                                              <!--/Slider-->
                                              <div class="row hidden-xs" id="slider-thumbs'.$i.'">
                                                  <!-- Bottom switcher of slider -->
                                                  <ul class="hide-bullets">';
                                                      mysqli_data_seek($result4, 0);
                                                      $k = 0;
                                                      while($row4 = mysqli_fetch_assoc($result4)) {
                                                        echo '<li class="col-sm-6">
                                                            <a class="thumbnail" id="carousel-selector-'.$i.'-'.$k.'"><img src='.$row4[image].'></a>
                                                        </li>';
                                                        $k++;
                                                      }
                                                  echo '
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>
                      </div>
                      <p class="tab_txt" id="tourMemo">
                          '.nl2br($row3[introduction]).'
                      </p>
                  </div>

              </div>';
              $i++;
              }
            ?>

        </div>
      </div>
    </div>
    <div id="section5" class="container-fluid">
        <div class="info_title">
            <h4 style="padding-top: 1%;">리뷰 (<?php echo $result2->num_rows;?>개)</h4>
        </div>
        <div class="info_cont">
            <div class="Reviewcontent">
                <div class="reviewallaverage">
                    <div class="average">평점</div>
                    <?php
                      rating($rating);
                    ?>
                    <span><strong><?php echo sprintf("%2.1f", $rating);?></strong></span>
                </div>
                <div class="container ratingsummury" style="padding-top:15px;">
                    <div class="container" style="margin-bottom:15px; padding:0px;">
                        <div class="container col-sm-1 hidden-xs" style="padding-left:15px; font-weight:normal">
                            요약
                        </div>

                        <div class="container col-sm-3">
                            시설
                            <div class="reviewallcontentstar">
                              <?php
                                $facility = round($facility/$result2->num_rows, 1);
                                rating($facility);
                              ?>&nbsp;<?php echo sprintf("%2.1f", $facility); ?>
                            </div>
                        </div>

                        <div class="container col-sm-3">
                            서비스
                            <div class="reviewallcontentstar">
                              <?php
                                $service = round($service/$result2->num_rows, 1);
                                rating($service);
                              ?>&nbsp;<?php echo sprintf("%2.1f", $service); ?>

                            </div>
                        </div>

                        <div class="container col-sm-3">
                            청결
                            <div class="reviewallcontentstar">
                              <?php
                                $cleanliness = round($cleanliness/$result2->num_rows, 1);
                                rating($cleanliness);
                              ?>&nbsp;<?php echo sprintf("%2.1f", $cleanliness); ?>

                            </div>
                        </div>
                    </div>
                    <div class="container" style="margin-bottom:15px; padding:0px;">
                        <div class="container col-sm-offset-1 col-sm-3">
                            위치
                            <div class="reviewallcontentstar">
                              <?php
                                $location = round($location/$result2->num_rows, 1);
                                rating($location);
                              ?>&nbsp;<?php echo sprintf("%2.1f", $location); ?>

                            </div>
                        </div>

                        <div class="container col-sm-3">
                            가격
                            <div class="reviewallcontentstar">
                              <?php
                                $price = round($price/$result2->num_rows, 1);
                                rating($price);
                              ?>&nbsp;<?php echo sprintf("%2.1f", $price); ?>

                            </div>
                        </div>

                        <div class="container col-sm-3">
                            정확성
                            <div class="reviewallcontentstar">
                              <?php
                                $accuracy = round($accuracy/$result2->num_rows, 1);
                                rating($accuracy);
                              ?>&nbsp;<?php echo sprintf("%2.1f", $accuracy); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="Reviewcontent2" style="background: #fff;">
                <!-- Left-aligned -->
                <?php
                  mysqli_data_seek($result2, 0);
                  while($row2 = mysqli_fetch_assoc($result2)) {
                    $id = $row2[id];
                    $sql5 = "SELECT name FROM user_info WHERE id='$id'";
                    $result5 = mysqli_query($conn, $sql5);
                    $row5 = mysqli_fetch_assoc($result5);
                    $total = $row2[facility]+$row2[service]+$row2[cleanliness]+$row2[location]+$row2[price]+$row2[accuracy];
                    $total = round(($total/6), 1);

                    echo '<div class="review">
                        <div class="bubble">
                            <div class="user col-sm-3" style="text-align:center">
                                <img src="./img/img_avatar1.png" class="img-circle" style="width:70px; height:70px;">
                                <h6>'.$row5[name].'</h6>
                            </div>
                            <div class="reviewcomment col-sm-9">
                                <div class="ratingsection">
                                    <span class="reviewdate"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>'.$row2[date].'</span>
                                    <span class="reviewstar">';
                                      rating($total);
                                      echo
                                    '</span>
                                    <span class="ratingnum">'.sprintf("%2.1f", $total).'</span>
                                </div>
                                <div class="reviewtext">
                                    <p>'.nl2br($row2[review]).'</p>
                                </div>
                            </div>
                        </div>
                    </div>';
                  }

                 ?>

                 <a href="#" id="loadMore">더보기</a>

                 <script>
                 $(function () {
                     $(".Reviewcontent2 .bubble").slice(0, 3).show();
                     $("#loadMore").on('click', function (e) {
                         e.preventDefault();
                         $(".Reviewcontent2 .bubble:hidden").slice(0, 2).slideDown();
                         if ($(".Reviewcontent2 .bubble:hidden").length == 0) {
                             $("#load").fadeOut('slow');
                         }
                     });
                 });

                 $('a[href=#top]').click(function () {
                     $('body,html').animate({
                         scrollTop: 0
                     }, 600);
                     return false;
                 });

                 $(window).scroll(function () {
                     if ($(this).scrollTop() > 50) {
                         $('.totop a').fadeIn();
                     } else {
                         $('.totop a').fadeOut();
                     }
                 });

                 </script>

               </div>
        </div>
    </div>
    <div id="section6" class="container-fluid">
        <div class="info_title">
            <h4 style="padding-top: 1%;">예약</h4>
        </div>
        <div class="info_cont container">
          <div class="col-md-4">
              <h2>체크인</h2>
              <div class="item2-search"><input type="text" id="datepicker1" class="form-control" placeholder="체크인" readonly="true" style="background-color:#fff"></div>
          </div>

          <div class="col-md-4">
              <h2>체크아웃</h2>
              <div class="item2-search"><input type="text" id="datepicker2" class="form-control" placeholder="체크아웃" readonly="true" style="background-color:#fff"></div>
          </div>
          <div class="col-md-4">
              <h2>숙박인원</h2>
              <div class="info" style="border: 0;">
                  <div style="display:flex; border-radius:4px;">
                      <div class="form-group">
                          <select class="form-control" id="number">
                              <option value="2">&nbsp;숙박 인원 2명</option>
                              <option value="3">&nbsp;숙박 인원 3명</option>
                              <option value="4">&nbsp;숙박 인원 4명</option>
                          </select>
                      </div>
                  </div>
              </div>
          </div>


          <div class="col-md-12" style="padding-right:0px;">
              <h2>옵션</h2>

              <div class="info" style="border: 0;">
                  <div class="btn-group" role="group" aria-label="...">
                      <?php
                        mysqli_data_seek($result7, 0);
                        $i = 0;
                        while($row7 = mysqli_fetch_assoc($result7)) {
                          if($row7[price] != 0) {
                            echo '<button value="'.$i.'" type="button" id="option" class="btn btn-default formgroup-order">
                              <h4>'.$row7[option_name].'</h4>
                              <div>
                                  <h3 id="price" price="'.$row7[price].'">'.number_format($row7[price]).'원</h3>
                              </div>
                            </button>';
                            $i++;
                          }
                        }
                      ?>

                      <script>
                      var number=0, number_price=0, option=0, price=0;
                      var eventList = new Array();
                      var option_price=0, temp_option=0;

                      /* 비성수기 주중 기준 가격 로직 -*/
                      var weekday2_low = '<?php echo $row[weekday2_low]?>';
                      var weekday3_low = '<?php echo $row[weekday3_low]?>';
                      var weekday4_low = '<?php echo $row[weekday4_low]?>';
                      $(document).ready(function(){
                        $('#number').change(function(){
                          number = $('#number').val();
                          if(number == 2) {
                              number_price = weekday2_low;
                          } else if(number == 3) {
                              number_price = weekday3_low;
                          } else if(number == 4) {
                              number_price = weekday4_low;
                          }
                          price = days * number_price + option_price;
                          $('#totalPrice').attr("total", price);
                          $('#totalPrice').html(comma(price) + " 원");
                          $("#numberText").text($("#number").val() + "인");
                        })

                        $('[id^=option]').click(function(){
                          temp_option = 1 * $(this).children('div').children('h3').attr('price');
                          if($(this).hasClass('active')) {
                            // 없애는 로직
                            for(var i=0; i<eventList.length; i++) {
                              if(eventList[i] == $(this).children("h4").text()) {
                                eventList.splice(i,1);
                              }
                            }
                            option_price = option_price - temp_option;
                          }
                          else {
                            // 추가하는 로직
                            eventList.push($(this).children("h4").text());
                            option_price = option_price + temp_option;
                          }
                          var str = "";
                          for(var i=0; i<eventList.length; i++) {
                            if(i==0) {
                              str += eventList[i];
                            }
                            else {
                              str += " + " + eventList[i];
                            }
                          }
                          $("#opText").html(str);
                          $(this).blur();
                          $(this).toggleClass('active');
                          price = days * number_price + option_price;
                          $('#totalPrice').attr("total", price);
                          $('#totalPrice').html(comma(price) + " 원");
                        });

                      })
                      function comma(num){
                          var len, point, str;

                          num = num + "";
                          point = num.length % 3 ;
                          len = num.length;

                          str = num.substring(0, point);
                          while (point < len) {
                              if (str != "") str += ",";
                              str += num.substring(point, point + 3);
                              point += 3;
                          }
                          return str;
                      }

                      var days = 0;
                      function dateCalculate() {
                          if($('#datepicker1').val() != '' && $('#datepicker2').val() != '') {
                              var start = new Date($('#datepicker1').val()),
                              end   = new Date($('#datepicker2').val());
                              if(end!='' && start!='') {
                                  var diff  = new Date(end - start);
                                  days  = diff/1000/60/60/24;
                              } else {
                                days = 0;
                              }
                              number = $('#number').val();
                              if(number == 2) {
                                  number_price = weekday2_low;
                              } else if(number == 3) {
                                  number_price = weekday3_low;
                              } else if(number == 4) {
                                  number_price = weekday4_low;
                              }
                              price = days * number_price + option_price;
                              $('#totalPrice').attr("total", price);
                              $('#totalPrice').html(comma(price) + " 원");

                              $("#datepickerReserve1").html($("#datepicker1").val() + " ~&nbsp;");
                              $("#datepickerReserve2").html($("#datepicker2").val() + " (" + days + "박 " + (days+1) +"일)");
                          }
                      }
                      $("#datepicker1").datepicker({
                          dateFormat: 'yy-mm-dd',
                          monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                          monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                          dayNames: ['일', '월', '화', '수', '목', '금', '토'],
                          dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
                          dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
                          showMonthAfterYear: true,
                          yearSuffix: '년',
                          maxDate: "+2M",
                          minDate: 0,
                          onSelect: function() {
                            var date = new Date($("#datepicker1").val());
                            date.setDate(date.getDate() + 1);
                            $("#datepicker2").datepicker("option", "minDate", date);
                            dateCalculate();
                          }
                      });

                      $("#datepicker2").datepicker({
                          dateFormat: 'yy-mm-dd',
                          monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                          monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                          dayNames: ['일', '월', '화', '수', '목', '금', '토'],
                          dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
                          dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
                          showMonthAfterYear: true,
                          yearSuffix: '년',
                          maxDate: "+2M 1D",
                          minDate: 1,
                          onSelect: dateCalculate
                      });
                      </script>
                  </div>
              </div>
          </div>

          <div class="col-md-12" style="padding-right:0px;">
              <h2>결제 정보</h2>
              <div style="margin-top:20px;"></div>
              <div style="float:left;">
                  <p id="reservename"><?php echo $row[name] ?></p>
                  <div class="detailreserve" style="display:flex">
                      <p id="numberText" style="margin-right:20px;">2인</p>
                      <p id="datepickerReserve1" style="margin-right: 0px"></p>
                      <p id="datepickerReserve2"></p>
                      <p id="opText"></p>
                  </div>
              </div>
              <div id="reserveprice" style="float:right;">
                  <p id="totalPrice">0 원</p>
              </div>
          </div>
          <hr style="width:98%; margin: 15px 15px 15px 15px; border-top: 1px dotted #ddd;">
          <div class="col-md-12" style="padding-right:0px; border-top:1px">
              <button type="button" class="btn btn-warning" id="paymentButton" style="background-color: coral; border-color: #ff9700; height:40px; font-size:15px; width:100%;">
          결제하기</button>
          </div>
          <script>
          $(document).ready(function() {
            $("#paymentButton").click(function() {
              if($("#datepicker1").val() != '' && $("#datepicker2").val() != null) {
                  <?php
                  if(!isset($_SESSION['is_login'])) {
                    echo '$("#myModal").modal();';
                  }
                  else {
                    echo '
                    $.ajax({
                      url:"./booking_valid.php",
                      type:"post",
                      data:{id:"'.$_SESSION["id"].'",
                            pid:'.$pid.',
                            checkin:$("#datepicker1").val(),
                            checkout:$("#datepicker2").val(),
                            number:$("#number").val(),
                            option_name:$("#opText").text(),
                            total_price:$("#totalPrice").attr("total")
                      },
                      success:function(data){
                        if(data==0) {
                          alert("예약이 완료되었습니다.");
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
              }
            });
          });
          </script>


        </div>

    </div>

</body>

</html>

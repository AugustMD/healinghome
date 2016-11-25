<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/style1-uppertool.css">
    <link rel="stylesheet" type="text/css" href="./css/style-landLord.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>
    .item {
      height: 570px;
      overflow: hidden;
    }
</style>

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


        <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <div class="item active">
                    <img src="./img/carousel0.jpg">
                    <div class="carousel-caption">
                        <a href="./land_register.php"><button class="button" style="vertical-align:middle"><span>토지 등록하기</span></button></a>
                        <h2>좋은 인재가<br>토지를 빛나게 하는 법!</h2>
                        <p>대한민국 대표 펜션예약 사이트 토지임대 솔루션 'HealingHome'<br>효율적인 토지임대 사이트에 접속하세요. </p>
                        <a data-toggle="modal" data-target="#carousel0" target="_blank" class="label label-danger">자세히 살펴보기</a>
                    </div>
                </div>
                <!-- End Item -->

                <div class="item">
                    <img src="./img/carousel1.jpg">
                    <div class="carousel-caption">
                      <a href="./land_register.php"><button class="button" style="vertical-align:middle"><span>토지 등록하기</span></button></a>
                      <h2>모든 토지 등록 기능! 사용하기 어렵다면<br>필수로 봐야하는 "토지 등록 가이드"</h2>
                      <p>어떤기능이 있는지 찾기 어려우신가요?<br><strong>토지 등록 가이드</strong>에 대해 자세히 알려드립니다.</p>
                      <a data-toggle="modal" data-target="#carousel1" target="_blank" class="label label-danger">자세히 살펴보기</a>
                    </div>
                </div>
                <!-- End Item -->

                <div class="item">
                    <img src="./img/carousel2.jpg">
                    <div class="carousel-caption">
                      <a href="./land_register.php"><button class="button" style="vertical-align:middle"><span>토지 등록하기</span></button></a>
                      <h2>토지에 가장 최적화된 맞춤 광고는?<br>성공 비결 가이드!</h2>
                      <p>토지가 어떻게 광고되는지 궁금하신가요?<br>10여개의 광고를 비교하시고, 효과적인 광고를 경험해보세요.</p>
                      <a data-toggle="modal" data-target="#carousel2" target="_blank" class="label label-danger">자세히 살펴보기</a>
                    </div>
                </div>
                <!-- End Item -->

                <div class="item">
                    <img src="./img/carousel3.jpg">
                    <div class="carousel-caption">
                      <a href="./land_register.php"><button class="button" style="vertical-align:middle"><span>토지 등록하기</span></button></a>
                      <h2>이용자 수, 제휴점 수, 만족도 1위!<br>왜 HealingHome은 선택이 아닌 필수인가</h2>
                      <p>토지! 어디서부터, 어떻게 시작할지 막막하신가요?<br>왜 'HealingHome'을 선택해야 하는지 자세히 알려드립니다.</p>
                      <a data-toggle="modal" data-target="#carousel3" target="_blank" class="label label-danger">자세히 살펴보기</a>
                    </div>
                </div>
                <!-- End Item -->

            </div>
            <!-- End Carousel Inner -->


            <ul class="nav nav-pills nav-justified">
                <li id="first" data-target="#myCarousel" data-slide-to="0" class="active"><a href="#">사이트<small>사이트에 대한 설명</small></a></li>
                <li data-target="#myCarousel" data-slide-to="1"><a href="#">가이드<small>토지 등록 가이드 북</small></a></li>
                <li data-target="#myCarousel" data-slide-to="2"><a href="#">맞춤광고<small>업체의 토지 사용 정보</small></a></li>
                <li data-target="#myCarousel" data-slide-to="3"><a href="#">업체소개<small>HealingHome이란?</small></a></li>
            </ul>


        </div>
        <!-- End Carousel -->

        <div class="manual modal fade" id="carousel0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">사이트</h4>
                    </div>
                    <div class="modal-body container-fluid">
                        <p>
                            웹사이트(영어: website, 문화어: 웨브싸이트)는 인터넷 프로토콜 기반의 네트워크에서 도메인 이름이나 IP 주소, 루트 경로만으로 이루어진 일반 URL을 통하여 보이는 웹 페이지 (Web Page)들의 의미 있는 묶음이다. 대한민국에서 흔히 말하는 홈페이지는 엄밀히 말해 웹사이트를 지칭한다. 최초의 웹사이트는 팀 버너스리가 1990년에 CERN에서 만든 info.cern.ch이다.(지금도 CERN사이트 안에 존재함.)<br><br>

                            웹사이트는 인터넷이나 랜과 같은 네트워크를 통해 접속할 수 있는, 적어도 하나의 웹 서버 상에서 호스팅된다. 웹 페이지는 HTML/XHTML의 형식으로 표현되지만 일반적으로 순수 문자열로 쓰여진 문서이다. 웹 페이지는 HTTP를 통하여 접속되며 가끔씩은 HTTPS를 통한 암호화를 사용하여 웹 페이지 콘텐츠를 이용한 사람들에게 보안과 개인 정보 보호를 제공한다. 사용자가 이용하는 웹 브라우저는 HTML 마크업 명령을 모니터에 표시하는 그대로 페이지 내용을 표현한다.<br><br>

                            공식적으로 접속할 수 있는 모든 웹사이트는 총체적으로 월드 와이드 웹을 이루고 있다.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="manual modal fade" id="carousel1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">가이드</h4>
                    </div>
                    <div class="modal-body container-fluid">
                        <p>
                            가이드북(Guide book)은 특정 이벤트나 시설 등에 대한 안내와 설명을 담은 책이나 소책자를 말한다. 그 중에서도 특히 특정 지역에 대한 지리적 위치, 관광지, 여정을 자세하게 제공하는 여행자들을 위한 책을 말한다.<br><br>

                            일반적으로, 전화 번호, 주소, 가격 등의 내용을 포함하고 호텔 및 기타 숙박 시설, 레스토랑 리뷰, 세부 사항과 지도를 포함시킨다. 가끔은 역사와 문화 정보도 제공한다. 어떤 책에는 여행 예산, 특정 관심사에 집중하여, 동성애 커플을 위한 책도 있다.<br><br>

                            제작자의 느낀 점이 별로 서술되지 않고, 보다 자세한 정보를 제공한다는 점에서 기행문과는 다르다. 안내서와 가이드북은 서로 비슷하나, 대체로 가이드 북은 여행자를 위한 여행 관련 정보를 제공하는 데에 중점을 두지만 안내서는 내용에 관계없이 안내를 목적으로 하는 도서이기 때문에 더 넓은 의미로 볼 수 있다.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="manual modal fade" id="carousel2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">맞춤광고</h4>
                    </div>
                    <div class="modal-body container-fluid">
                        <p>
                            광고(廣告, 영어: advertising)는 명시적인 광고주가 광고를 접하는 수용자의 태도를 변화시키려고 매체를 통해 일방적으로 의사전달을 하는 행위이다. "광고"라는 한자어는 축자적으로 "널리 알리다"라는 뜻을 가지고 있다. 광고는 20세기의 사회를 상징하는 현상 가운데 하나이다. 그 기원은 대단히 오랜 것이어서 거의 문자가 발생되었을 당시에까지 거슬러 올라갈 수 있다. 또한 동서양을 막론하고 그때그때의 사회발전의 모습에 따른 광고 활동을 찾아볼 수 있다. 그러나 광고가 오늘날처럼 왕성해지고 사회·경제·문화의 각 방면에 걸쳐 적지 않은 영향을 미치게 된 것은 금세기에 들어와서의 일이며 특히 대한민국에서는 해방 후에 자본주의 경제체제의 도입에 따라서 눈부신 발전을 하게 되었다. 현대의 광고는 대중 매체를 이용하는 일이 많기 때문에 매스 커뮤니케이션의 한 형태라고도 말할 수 있다.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="manual modal fade" id="carousel3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">업체소개</h4>
                    </div>
                    <div class="modal-body container-fluid">
                        <p>
                            <strong>Healing</strong><br>
                            치유(治癒)는 심리적인 안정감을 주는 것. 또는 그것을 주는 능력을 가진 존재의 속성이다. 치료랑 비슷한 의미로, 병을 치료하다는 뜻도 있으나, 치료는 심리적으로 안정감을 준다는 의미는 없다.<br><br>
                            <strong>Home</strong><br>
                            집(영어: house)은 사람이나 동물이 거주하기 위해 지은 건물로, 보통 벽과 지붕이 있으며, 추위와 더위, 비바람을 막아 준다. 좁은 뜻으로는 인간이 사는 집, 곧 주택(住宅)만을 가리키기도 한다.
                        </p>
                    </div>
                </div>
            </div>
        </div>



    <script>
        $(document).ready(function() {
            $('#myCarousel').carousel({
                interval: 4000
            });

            var clickEvent = false;
            $('#myCarousel').on('click', '.nav a', function() {
                clickEvent = true;
                $('.nav li').removeClass('active');
                $(this).parent().addClass('active');
            }).on('slid.bs.carousel', function(e) {
                if (!clickEvent) {
                    var count = 3;
                    console.log("count="+count);
                    var current = $('.nav li.active');
                    current.removeClass('active').next().addClass('active');
                    var id = parseInt(current.data('slide-to'));
                    console.log("id="+id);
                    if (count == id) {
                        $('#first').addClass('active');
                    }
                }
                clickEvent = false;
            });

        });
    </script>

    <!-- modal center -->
    <script>
        var modalVerticalCenterClass = ".manual.modal";
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

</body>

</html>

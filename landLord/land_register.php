<!DOCTYPE html>
<html>
<?php
include("config.php");
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/style-landLordRental.css">
    <link rel="stylesheet" type="text/css" href="./css/style1-calendar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style1-uppertool.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/calendar.js" type="text/javascript" charset="utf-8"></script>

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


    <div class="container-fluid" style="padding-top: 20px; width:80%;">

        <table class="table table-reflow">
            <tbody>
                <form action="land_upload.php" method="post" id="target" enctype="multipart/form-data">
                    <tr>
                        <th scope="row" style="border-top:2px solid #2D333E">주소</th>
                        <td style="border-top:2px solid #2D333E">
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
                        <th scope="row">면적</th>
                        <td>
                            <div class="container-fluid tdContainer">
                                <input type="text" class="col-xs-7" id="area" name="area" onkeyup="number_chk(this);" onkeypress="javascript:if((event.keyCode<48)||(event.keyCode>57))event.returnValue=false;" style="margin-right:15px; text-align:right;">
                                <p style="margin-bottom:0; padding-top:5px">m<sup>2</sup></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">가격</th>
                        <td>
                            <div class="container-fluid tdContainer">
                                <input type="text" id="price" name="price" onkeyup="number_chk(this);" onkeypress="javascript:if((event.keyCode<48)||(event.keyCode>57))event.returnValue=false;" class="col-xs-7" style="margin-right:15px; text-align:right;">
                                <p style="margin-bottom:0; padding-top:5px">원</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">기간</th>
                        <td>
                            <div class="container-fluid tdContainer">
                                <input type="text" id="datepicker1" name="start" class="col-xs-4" placeholder="시작일">
                                <p class="col-xs-1" style="text-align:center; margin-bottom:0; padding-top:5px;">~</p>
                                <input type="text" id="datepicker2" name="end" class="col-xs-4" placeholder="마감일">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><p style="margin-bottom:3px;">사진자료</p><p style="font-size:11px; font-weight:500;">(토지 사진 등)</p></th>
                        <td>
                            <div class="container-fluid tdContainer">
                                <div class="filebox">
                                    <label for="ex_file" class><span class="glyphicon glyphicon-picture" aria-hidden="true" style="font-weight:100; font-size:13px;"></span>&ensp;사진파일 추가</label>
                                    <input type="file" id="ex_file" name="files[]" multiple accept="image/*"/>
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
                    <tr>
                        <th scope="row" style="border-bottom:2px solid #ddd"><p style="margin-bottom:3px;">첨부자료</p><p style="font-size:11px; font-weight:500;">(서류,소유자 정보 등)</p></th>
                        <td style="border-bottom:2px solid #ddd">
                            <div class="container-fluid tdContainer">
                                <div class="filebox">
                                    <label for="ex_file2" class><span class="glyphicon glyphicon-duplicate" aria-hidden="true" style="font-weight:100; font-size:13px;"></span>&ensp;첨부파일 추가</label>
                                    <input type="file" id="ex_file2" name="files2[]" multiple />
                                    <output id="list2"></output>
                                </div>

                                <script>
                                    function handleFileSelect2(evt) {
                                        var files = evt.target.files; // FileList object
                                        // files is a FileList of File objects. List some properties.
                                        var output = [];
                                        for (var i = 0, f; f = files[i]; i++) {
                                            output.push('<li><strong>', f.name, '</strong> - ',
                                                f.size, ' byte',
                                                '</li>');
                                        }
                                        document.getElementById('list2').innerHTML = '<ul>' + output.join('') + '</ul>';
                                    }

                                    document.getElementById('ex_file2').addEventListener('change', handleFileSelect2, false);
                                </script>

                            </div>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
        <a class="col-xs-6" href="#"><button type="button" class="btn btn-success" onclick="submit()"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&emsp;등록</button></a>
        <a class="col-xs-6" href="./"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&emsp;취소</button></a>
    </div>

    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
    <script>
        function submit() {
            if($("#sample6_address").val() != '' && $("#area").val() != '' && $("#price").val() != '' && $("#datepicker1").val() != '' && $("#datepicker2").val() != '') {
              $("#target").submit();
            }
            else {
              alert("모든 항목을 입력해주세요.");
            }
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
                    if(data.userSelectedType === 'R'){
                        //법정동명이 있을 경우 추가한다.
                        if(data.bname !== ''){
                            extraAddr += data.bname;
                        }
                        // 건물명이 있을 경우 추가한다.
                        if(data.buildingName !== ''){
                            extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                        }
                        // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                        fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
                    }

                    // 우편번호와 주소 정보를 해당 필드에 넣는다.
                    document.getElementById('sample6_address').value = fullAddr;

                    // 커서를 상세주소 필드로 이동한다.
                    document.getElementById('sample6_address2').focus();
                }
            }).open();
        }

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



</body>

</html>

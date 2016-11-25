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
  <link rel="stylesheet" type="text/css" href="./css/style-surrounding.css">

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/comma.js"></script>
  <script src="js/bootstrap-formhelpers-phone.js"></script>


</head>
<style>
  .sidebar .nav > li > a, .sidebar .nav > li > ul > li > a {
    font-weight: 500;
  }
  .img-responsive {
    height: 100px !important;
  }

  .thumbnail {
      margin-bottom: 0px !important;
      background-color: #eee !important;
  }

  .radio-inline+.radio-inline {
    margin-left: 0px;
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
                  <li class="submenu current">
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
                  <li class="submenu">
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
		  <div class="col-md-10 land-info">

		  			<div class="content-box-large">
		  				<div class="panel-body">
                <h4 class="title" style="float:left"><i style="margin-right:10px; margin-bottom:19px; top:3px;" class="glyphicon glyphicon-erase"></i> 주변관광지 수정</h4>
                <button type="button" onclick="deleteAll()" style="float: right; margin-top:3px; margin-right:10px; font-size:12px;" class="btn btn-danger"><span class="glyphicon glyphicon-remove" style="top:1.5px;"aria-hidden="true"></span>&emsp;삭제</button>
                <table class="table table-reflow">
                    <tbody>
                      <form action="tourist_spot_modify.php?tid=<?php echo $_GET['tid'];?>" method="post" id="target" enctype="multipart/form-data">
                        <?php
                        $sql = "SELECT * FROM tourist_spot where tid='".$_GET['tid']."'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        ?>

                        <tr>
                            <th scope="row" style="border-top:2px solid #2D333E">이름</th>
                            <td style="border-top:2px solid #2D333E">
                                <div class="container-fluid tdContainer">
                                    <input type="text" class="col-xs-7" name="tname" id="tname">
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
                              <th scope="row">문의전화</th>
                              <td>
                                  <div class="container-fluid tdContainer">
                                      <input id="qnumber" type="text" class="col-xs-3" name="number" maxlength="13">
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <th scope="row">홈페이지</th>
                              <td>
                                  <div class="container-fluid tdContainer">
                                      <input type="text" class="col-xs-7" name="homepage" id="homepage">
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <th scope="row">설명</th>
                              <td>
                                  <div class="container-fluid tdContainer" style="display:flex">
                                      <textarea class="form-control" name="introduction" id="introduction" rows="15" style="font-size:13px;"><?php echo $row[introduction];?></textarea>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <th scope="row" style="border-bottom:2px solid #ddd"><p style="margin-bottom:3px;">사진자료</p><p style="font-size:11px; font-weight:500;">(관광지 사진)</p></th>
                              <td style="border-bottom:2px solid #ddd;">
                                <div class="container-fluid tdContainer">
                                  <div class="container-fluid" style="padding:0; margin-bottom:20px;">
                                      <?php
                                      $sql2 = "SELECT image FROM tourist_spot_image where tid='".$_GET['tid']."'";
                                      $result2 = mysqli_query($conn,$sql2);
                                      $i=0;
                                      while($row2 = mysqli_fetch_assoc($result2)) {
                                        echo '<label class="radio-inline col-xs-6 col-sm-3"><input type="checkbox" name="chk_info" checked value="'.$i.'">';
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
                        </form>
                    </tbody>
                </table>
                <a href="#"><button type="button" class="col-md-offset-3 col-md-6 btn btn-warning" onclick="modify()"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&emsp;수정</button></a>
		  				</div>
		  			</div>


		  </div>
		</div>
    </div>

  </body>

      <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
      <script>
          $(document).ready(function() {
            $("#tname").val('<?php echo $row[name]?>');
            $("#sample6_address").val('<?php echo $row[address]?>');
            $("#qnumber").val('<?php echo $row[number]?>');
            $("#homepage").val('<?php echo $row[homepage]?>');
          });

          function modify() {
              if($("#tname").val() != '' && $("#sample6_address").val() != '' && $("#qnumber").val() != '' && $("#homepage").val() != '' && $("#introduction").val() != '') {
                var chk = document.getElementsByName("chk_info");
                var img = document.getElementsByName("img");
                for(var i=0; i<chk.length; i++) {
                  if(!chk[i].checked) {
                    $.ajax({
                      url:"./image_delete.php",
                      type:"post",
                      data:{table:"tourist_spot_image",
                            src:img[i].alt,
                      },
                    });
                  }
                }
                $("#target").submit();
              }
              else {
                alert("모든 항목을 입력해주세요.");
              }
          }

          function deleteAll() {
            var chk = document.getElementsByName("chk_info");
            var img = document.getElementsByName("img");
            for(var i=0; i<chk.length; i++) {
              $.ajax({
                url:"./image_delete.php",
                type:"post",
                data:{table:"tourist_spot_image",
                      src:img[i].alt,
                },
              });
            }

            $.ajax({
              url:"./tourist_spot_delete.php",
              type:"post",
              data:{tid:'<?php echo $_GET['tid'];?>',
              },
              success:function(data){
                if(data == '삭제') {
                  alert(data);
                  location.replace("./list-surrounding.php");
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

          $("#qnumber").keyup(function(event){
              event = event || window.event;
              var _val = this.value.trim();
              this.value = autoHypenPhone(_val) ;
          });
      </script>

</html>

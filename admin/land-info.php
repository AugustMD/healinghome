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
  <link rel="stylesheet" type="text/css" href="./css/style-landInfo.css">

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/comma.js"></script>

</head>
<style>
  .sidebar .nav > li > a, .sidebar .nav > li > ul > li > a {
    font-weight: 500;
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
                  <li class="current"><a href="land-status.php"><i class="glyphicon glyphicon-th-list"></i> 토지신청 현황</a></li>
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
                <h4 class="title"><i class="glyphicon glyphicon-chevron-right" style="margin-right:10px; margin-bottom:20px;"></i>토지 상세 정보</h4>
                <table class="table table-reflow">
                    <tbody>
                      <?php
                        $sql = "SELECT * FROM land_list where lid = '".$_GET['lid']."'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $sql2 = "SELECT name, phone FROM user_info where id = '".$row[id]."'";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);

                      ?>
                      <tr>
                          <th scope="row" style="border-top:2px solid #2D333E">이름</th>
                          <td style="border-top:2px solid #2D333E">
                              <div class="container-fluid tdContainer">
                                  <h5><?php echo $row2[name];?></h5>
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <th scope="row" >연락처</th>
                          <td>
                              <div class="container-fluid tdContainer">
                                  <h5><?php echo $row2[phone];?></h5>
                              </div>
                          </td>
                      </tr>
                        <tr>
                            <th scope="row">주소</th>
                            <td>
                                <div class="container-fluid tdContainer">
                                    <h5><?php echo $row[address];?></h5>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">면적</th>
                            <td>
                                <div class="container-fluid tdContainer" style="display:flex">
                                    <h5><?php echo number_format($row[area]);?></h5>
                                    <p style="margin-bottom:0; padding-top:8px; padding-left:5px;">m<sup>2</sup></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">가격</th>
                            <td>
                                <div class="container-fluid tdContainer" style="display:flex">
                                    <h5><?php echo number_format($row[price]);?></h5>
                                    <p style="margin-bottom:0; padding-top:8px; padding-left:5px;">원</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">기간</th>
                            <td>
                                <div class="container-fluid tdContainer" style="display:flex">
                                    <h5><?php echo $row[start];?></h5>
                                    <p class="col-xs-1" style="text-align:center; margin-bottom:0; padding-top:8px;">~</p>
                                    <h5><?php echo $row[end];?></h5>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">진행 상황</th>
                            <td>
                                <div class="container-fluid tdContainer" style="display:flex">
                                    <h5 id="progid"><?php echo $row[progress];?></h5>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">사진자료<p style="font-size:11px; font-weight:500;">(토지 사진 등)</p></th>
                            <td style="padding-bottom:0px !important;">
                              <?php
                              $sql3 = "SELECT * FROM land_attachment where lid = '".$_GET['lid']."' and length(image) > 0";
                              $result3 = mysqli_query($conn, $sql3);
                              while($row3 = mysqli_fetch_assoc($result3)) {
                                echo '<div class="col-lg-3 col-md-4 col-xs-6 thumb">';
                                echo '  <div class="thumbnail">';
                                $_substr = substr($row3[image], 0, 8);
                                if($_substr != 'uploads/') {
                                  echo '    <img class="img-responsive" src="'.$row3[image].'" alt="">';
                                }
                                else {
                                  echo '    <img class="img-responsive" src="../landlord/'.$row3[image].'" alt="">';
                                }
                                echo '  </div>';
                                echo '</div>';
                              }
                              ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" style="border-bottom:2px solid #ddd"><p style="margin-bottom:3px;">첨부자료</p><p style="font-size:11px; font-weight:500;">(서류,소유자 정보 등)</p></th>
                            <td style="border-bottom:2px solid #ddd; vertical-align:middle;">
                                <div class="container-fluid tdContainer">
                                    <?php
                                    $sql4 = "SELECT * FROM land_attachment where lid ='".$_GET['lid']."' and length(attachment) > 0";
                                    $result4 = mysqli_query($conn, $sql4);
                                    while($row4 = mysqli_fetch_assoc($result4)) {
                                      $_substr = substr($row4[attachment], 0, 8);
                                      if($_substr != 'uploads/') {
                                        $fileName = str_replace("uploads/","",$row4[attachment]);
                                        $array = explode("_", $fileName);
                                        $fileName = str_replace($array[0]."_", "", $fileName);
                                        echo '<a href="'.$row4[attachment].'" download="'.$fileName.'">'.$fileName.'</a>';
                                      }
                                      else {
                                        $fileName = str_replace("uploads/","",$row4[attachment]);
                                        $array = explode("_", $fileName);
                                        $fileName = str_replace($array[0]."_", "", $fileName);
                                        echo '<a href="../landlord/'.$row4[attachment].'" download="'.$fileName.'">'.$fileName.'</a>';
                                      }
                                      echo '<br>';
                                    }
                                    ?>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a class="col-xs-4"><button type="button" class="btn btn-judging" onclick="change_progress('서류심사')"><span class="glyphicon glyphicon-random" aria-hidden="true"></span>&emsp;서류심사</button></a>
                <a class="col-xs-4"><button type="button" class="btn btn-complete" onclick="change_progress('계약중')"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&emsp;계약중</button></a>
                <a class="col-xs-4"><button type="button" class="btn btn-return" onclick="change_progress('취소 및 종료')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&emsp;취소 및 종료</button></a>
		  				</div>
		  			</div>


		  </div>
		</div>
    </div>

  </body>
  <script>
      function change_progress(prog) {
        $.ajax({
          url:"./progress_proc.php",
          type:"post",
          data:{lid:'<?php echo $_GET['lid'];?>',
                progress:prog,
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
      }

      $(document).ready(function(){
          if($('#progid').text()=="등록완료") {
              $('#progid').css("color", "#3B978A");
          } else if($('#progid').text()=="서류심사") {
              $('#progid').css("color", "#E69215");
          } else if($('#progid').text()=="계약중") {
              $('#progid').css("color", "#443647");
          } else if($('#progid').text()=="취소 및 종료") {
              $('#progid').css("color", "#C73935");
          }
      })
  </script>

</html>

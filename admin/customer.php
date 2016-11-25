<!DOCTYPE html>
<html>
<?php
    include("config.php");
?>

  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="./css/style1-customer.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link href="css/styles.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="./css/style1-uppertool.css">

      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="js/custom.js"></script>

      <style>
        .sidebar .nav > li > a, .sidebar .nav > li > ul > li > a {
          font-weight: 500;
        }
        .page-content .row {
          border-top: 0px;
        }
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

    <div class="page-content">
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
                      <li class="submenu current">
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
        <div class="col-md-10">
          <div class="content-box-large">
            <div class="panel-body">

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
                  <div class=board_list>
                    <table>
                      <thead class="tablehead">
                        <tr>
                          <th style="width:10%">번호</th>
                          <th style="width:*">제목</th>
                          <th style="width:12%">작성자</th>
                          <th style="width:12%">날짜</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if($_GET['board'] == "land") { // 토지주용
                            $sql = "SELECT * FROM customer_land ORDER BY qid DESC";
                            $result = mysqli_query($conn, $sql);
                            $total_question = $result->num_rows;
                            if($total_question != 0) {
                              $page_num = ceil($total_question / 10);
                              $page = 1;
                              if($_GET['page'] != NULL) $page = $_GET['page'];
                              if(($page < 1) || ($page > $page_num)) {
                                echo '<script>location.replace("./customer.php?board=land");</script>';
                              }
                              $start_qid = ($page - 1) * 10;
                              $sql = "SELECT * FROM customer_land ORDER BY qid DESC LIMIT $start_qid,10";
                              $result = mysqli_query($conn, $sql);
                              $i = ($page_num - $page + 1) * 10 + ($total_question - $page_num * 10);
                              while( $row = mysqli_fetch_assoc($result)){
                                $sql2 = "SELECT name FROM user_info where id = '".$row[id]."'";
                                $result2 = mysqli_query($conn, $sql2);
                                $row2 = mysqli_fetch_assoc($result2);
                                $sql3 = "SELECT count(*) FROM customer_land_comment where qid='".$row[qid]."'";
                                $result3 = mysqli_query($conn, $sql3);
                                $row3 = mysqli_fetch_assoc($result3);
                                $title = $row[title];
                                if($row3['count(*)'] > 0) {
                                  $title = "".$row[title]." [".$row3['count(*)']."]";
                                }
                                echo '<tr>';
                                echo '<th style="width:10%; color:#555555">'.$i.'</th>';
                                echo '<th style="width:*%">'.'<a href="./question.php?board=land&qid='.$row[qid].'" style="color:#555555">'.$title.'</a>'.'</th>';
                                echo '<th style="width:12%; color:#555555">'.$row2[name].'</th>';
                                echo ' <th style="width:12%; color:#939393;">'.$row[date].'</th>';
                                echo '</tr>';
                                $i--;
                              }
                            }
                            echo '</tbody>
                          </table>
                          <div style="text-align: center; margin-top:40px;">
                            <ul class="pagination pagination-sm">';

                            if($total_question != 0) {
                              if($page <= 1) {
                                echo '<li><a href="./customer.php?board=land&page=1"><span class="glyphicon glyphicon-chevron-left"></span></a></li>';
                              }
                              else {
                                echo '<li><a href="./customer.php?board=land&page='.($page-1).'"><span class="glyphicon glyphicon-chevron-left"></span></a></li>';
                              }
                              $end_page = ceil($page/10) * 10;
                              if($end_page > $page_num) {
                                $end_page = $page_num;
                                $i = $page_num-9;
                              }
                              else {
                                $i = $end_page-9;
                              }
                              if($i < 1) $i = 1;
                              for($i; $i <= $end_page; $i++) {
                                if($i == $page) {
                                  echo '<li class="active"><a href="./customer.php?board=land&page='.$i.'">'.$i.'</a></li>';
                                }
                                else {
                                  echo '<li><a href="./customer.php?board=land&page='.$i.'">'.$i.'</a></li>';
                                }
                              }
                              if($page >= $page_num) {
                                echo '<li><a href="./customer.php?board=land&page='.$page_num.'"><span class="glyphicon glyphicon-chevron-right"></span></a></li>';
                              }
                              else {
                                echo '<li><a href="./customer.php?board=land&page='.($page+1).'"><span class="glyphicon glyphicon-chevron-right"></span></a></li>';
                              }
                            }

                          }
                          else { // 고객용
                            $sql = "SELECT * FROM customer ORDER BY qid DESC";
                            $result = mysqli_query($conn, $sql);
                            $total_question = $result->num_rows;
                            if($total_question != 0) {
                              $page_num = ceil($total_question / 10);
                              $page = 1;
                              if($_GET['page'] != NULL) $page = $_GET['page'];
                              if(($page < 1) || ($page > $page_num)) {
                                echo '<script>location.replace("./customer.php");</script>';
                              }
                              $start_qid = ($page - 1) * 10;
                              $sql = "SELECT * FROM customer ORDER BY qid DESC LIMIT $start_qid,10";
                              $result = mysqli_query($conn, $sql);
                              $i = ($page_num - $page + 1) * 10 + ($total_question - $page_num * 10);
                              while( $row = mysqli_fetch_assoc($result)){
                                $sql2 = "SELECT name FROM user_info where id = '".$row[id]."'";
                                $result2 = mysqli_query($conn, $sql2);
                                $row2 = mysqli_fetch_assoc($result2);
                                $sql3 = "SELECT count(*) FROM customer_comment where qid='".$row[qid]."'";
                                $result3 = mysqli_query($conn, $sql3);
                                $row3 = mysqli_fetch_assoc($result3);
                                $title = $row[title];
                                if($row3['count(*)'] > 0) {
                                  $title = "".$row[title]." [".$row3['count(*)']."]";
                                }
                                echo '<tr>';
                                echo '<th style="width:10%; color:#555555">'.$i.'</th>';
                                echo '<th style="width:*%">'.'<a href="./question.php?qid='.$row[qid].'" style="color:#555555">'.$title.'</a>'.'</th>';
                                echo '<th style="width:12%; color:#555555">'.$row2[name].'</th>';
                                echo ' <th style="width:12%; color:#939393;">'.$row[date].'</th>';
                                echo '</tr>';
                                $i--;
                              }
                            }
                            echo '</tbody>
                          </table>
                          <div style="text-align: center; margin-top:40px;">
                            <ul class="pagination pagination-sm">';

                            if($total_question != 0) {
                              if($page <= 1) {
                                echo '<li><a href="./customer.php?page=1"><span class="glyphicon glyphicon-chevron-left"></span></a></li>';
                              }
                              else {
                                echo '<li><a href="./customer.php?page='.($page-1).'"><span class="glyphicon glyphicon-chevron-left"></span></a></li>';
                              }
                              $end_page = ceil($page/10) * 10;
                              if($end_page > $page_num) {
                                $end_page = $page_num;
                                $i = $page_num-9;
                              }
                              else {
                                $i = $end_page-9;
                              }
                              if($i < 1) $i = 1;
                              for($i; $i <= $end_page; $i++) {
                                if($i == $page) {
                                  echo '<li class="active"><a href="./customer.php?page='.$i.'">'.$i.'</a></li>';
                                }
                                else {
                                  echo '<li><a href="./customer.php?page='.$i.'">'.$i.'</a></li>';
                                }
                              }
                              if($page >= $page_num) {
                                echo '<li><a href="./customer.php?page='.$page_num.'"><span class="glyphicon glyphicon-chevron-right"></span></a></li>';
                              }
                              else {
                                echo '<li><a href="./customer.php?page='.($page+1).'"><span class="glyphicon glyphicon-chevron-right"></span></a></li>';
                              }
                            }

                          }

                          ?>

                      </ul>
                    </div>
                  </div>


                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>

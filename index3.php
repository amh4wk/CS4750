<!-- Ashley Hoang and jessica Phan -->
<!-- Schedule page -->
<!DOCTYPE>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="index3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
  <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet'>
    
  <title>Schedule4Me</title>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    

</head>

<body>


  <?php
    require "dbutil.php";
    session_start();
    
    $username = $_SESSION['email'];
    $school = $_SESSION['school'];
    $major = $_SESSION['major'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
      $db = mysqli_connect('localhost:3306', 'jlp4ub', 'password', 'jlp4ub');
      $check = 1;
      $columns=array();
      foreach ($_POST as $key=>$value){
        array_push($columns, $value);
      }
  
      $db_values = $columns[0];
      if ($school == 'College of Arts and Sciences') {
        foreach ($db_values as $key => $value) {
          $sql = "SELECT $value FROM college WHERE email='$username'";
          $vset = mysqli_query($db, $sql);
          $row = mysqli_fetch_array($vset, MYSQLI_NUM);
          $num = $row[0];
          $num = $num+1;
          $query = "UPDATE college SET $value=$num WHERE email ='$username'";
          mysqli_query($db, $query);
        }
      }
      if ($school == 'Engineering School') {
        foreach ($db_values as $key => $value) {
          $sql = "SELECT $value FROM eSchool WHERE email='$username'";
          $vset = mysqli_query($db, $sql);
          $row = mysqli_fetch_array($vset, MYSQLI_NUM);
          $num = $row[0];
          $num = $num+1;
          $query = "UPDATE eSchool SET $value=$num WHERE email ='$username'";
          mysqli_query($db, $query);
        }
      }
      if ($school == 'Architecture') {
        foreach ($db_values as $key => $value) {
          $sql = "SELECT $value FROM aSchool WHERE email='$username'";
          $vset = mysqli_query($db, $sql);
          $row = mysqli_fetch_array($vset, MYSQLI_NUM);
          $num = $row[0];
          $num = $num+1;
          $query = "UPDATE aSchool SET $value=$num WHERE email ='$username'";
          mysqli_query($db, $query);
        }
      }
      if ($school == 'Nursing School') {
        foreach ($db_values as $key => $value) {
          $sql = "SELECT $value FROM nSchool WHERE email='$username'";
          $vset = mysqli_query($db, $sql);
          $row = mysqli_fetch_array($vset, MYSQLI_NUM);
          $num = $row[0];
          $num = $num+1;
          $query = "UPDATE nSchool SET $value=$num WHERE email ='$username'";
          mysqli_query($db, $query);
        }
      }
      if ($major == 'Accounting') {
        foreach ($db_values as $key => $value) {
          $sql = "SELECT $value FROM accounting WHERE email='$username'";
          $vset = mysqli_query($db, $sql);
          $row = mysqli_fetch_array($vset, MYSQLI_NUM);
          $num = $row[0];
          $num = $num+1;
          $query = "UPDATE accounting SET $value=$num WHERE email ='$username'";
          mysqli_query($db, $query);
        }
      }
      if ($major == 'Finance') {
        foreach ($db_values as $key => $value) {
          $sql = "SELECT $value FROM finance WHERE email='$username'";
          $vset = mysqli_query($db, $sql);
          $row = mysqli_fetch_array($vset, MYSQLI_NUM);
          $num = $row[0];
          $num = $num+1;
          $query = "UPDATE finance SET $value=$num WHERE email ='$username'";
          mysqli_query($db, $query);
        }
      }
      if ($major == 'Business') {
        foreach ($db_values as $key => $value) {
          $sql = "SELECT $value FROM business WHERE email='$username'";
          $vset = mysqli_query($db, $sql);
          $row = mysqli_fetch_array($vset, MYSQLI_NUM);
          $num = $row[0];
          $num = $num+1;
          $query = "UPDATE business SET $value=$num WHERE email ='$username'";
          mysqli_query($db, $query);
        }
      }
    }
    ?>

  <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #61C2A2">
        <a class="navbar-brand" href="#">Schedule4Me</a>
        <!-- Hamburger collapsible -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Collapse class -->

        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">   
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Account</a>
            </li>              
                         
            <li class="nav-item"> 
              <a class="nav-link" href="#">MySchedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index2.php">Recommended</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Log Out</a>
            </li>
            
          </ul>
        </div>  
      </nav>

  <div class = "left" style="color:#E8E8E8; height:95%">
      <form name="check" action='' method="post">
        <div class ="general-req" >
          <!-- <p><u>CLAS Requirements</u></p> -->
            <?php
              $db = mysqli_connect('localhost:3306', 'jlp4ub', 'password', 'jlp4ub');
              
              $username = $_SESSION['email'];
              $school = $_SESSION['school'];
              $checkboxes=array();
              if ($school == 'College of Arts and Sciences'){
                echo 'CLAS Requirements';
                
                $query="SELECT * FROM college WHERE email='$username'";
                $result=mysqli_query($db, $query);
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                $checkboxes=array();
                $checkboxes[0]='<br>';
                $checkboxes[1]='<input type="checkbox" id="1" name="row[1]" value="foreignlang" onclick="task(this.id);"> Foreign Language Requirement<br>';
                $checkboxes[2]='<input type="checkbox" id="2" name="row[2]" value="firstwrite" onclick="task(this.id);"> First Writing Requirement<br><br>';
                $checkboxes[3]='<input type="checkbox" id="3" name="row[3]" value="secondwrite" onclick="task(this.id);"  > Second Writing Requirement<br>';
                $checkboxes[4]='<input type="checkbox" id="4" name="row[4]" value="socialscience" onclick="task(this.id);"> Social Sciences<br>';
              
                $checkboxes[5]='<input type="checkbox" id="5" name="row[5]" value="humanities" onclick="task(this.id);"> Humanities<br>';
               
                $checkboxes[6]='<input type="checkbox" id="6" name="row[6]" value="history" onclick="task(this.id);"> Historical Studies<br>';              
                $checkboxes[7]='<input type="checkbox" id="7" name="row[7]" value="nonwest" onclick="task(this.id);"> Non-Western Perspective<br>';
              
                $checkboxes[8]='<input type="checkbox" id="8" name="row[8]" value="science" onclick="task(this.id);"> Natural Science and Mathematics<br>';
             
                
                $checkboxes[9]='<input type="hidden" id="hidden1" name="row[1]" value="foreignlang" onclick="task(this.id);">';
                $checkboxes[10]='<input type="hidden" id="hidden2" name="row[2]" value="firstwrite" onclick="task(this.id);">';
                $checkboxes[11]='<input type="hidden" id="hidden3" name="row[3]" value="secondwrite" onclick="task(this.id);">';
                $checkboxes[12]='<input type="hidden" id="hidden4" name="row[4]" value="socialscience" onclick="task(this.id);">';
                $checkboxes[13]='<input type="hidden" id="hidden5" name="row[5]" value="humanities" onclick="task(this.id);">';
                $checkboxes[14]='<input type="hidden" id="hidden6" name="row[6]" value="history" onclick="task(this.id);">';
                $checkboxes[15]='<input type="hidden" id="hidden7" name="row[7]" value="nonwest" onclick="task(this.id);">';
                $checkboxes[16]='<input type="hidden" id="hidden8" name="row[8]" value="science" onclick="task(this.id);">';
                foreach ($row as $key=>$value){
                  //echo $key.":".$value."<br>";
                  //echo $value;
                  if ($value !=0){
                    $mod = $value%2;
                  } else{
                    $mod = 0;
                  }
                  
                  if ($mod != 0){
                      $print = $checkboxes[$key];
                      $index = strpos($print, ">");
                      $str = 'checked';
                      $checkboxes[$key]= substr_replace($print, $str, $index, 0);
            
                    
                    //echo $checkboxes[$key];
                    //$checkboxes[$key]=
                  }
                }
                echo implode($checkboxes);
                //echo implode($hidden_checkboxes);
                // echo "<input type='submit' name='Update' value='Save'/>";
                
                
                //while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                //  print_r($row);
                //}
              } if ($school == 'Engineering School'){
                echo 'Engineering Requirements';
                
                $query="SELECT * FROM eSchool WHERE email='$username'";
                $result=mysqli_query($db, $query);
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                //print_r($row);
                $checkboxes=array();
                // for($i=1; $i<10; $i++){
                //   //print_r($row[$i]);
                //   $checkboxes[]='<input type="checkbox" value=row>;
                // }
                $checkboxes[0]='<br>';
                $checkboxes[1]='<input type="checkbox" id="1" name="row[1]" value="e1" onclick="task(this.id);"> Engineering1 Requirement<br>';
                $checkboxes[2]='<input type="checkbox" id="2" name="row[2]" value="e2" onclick="task(this.id);"> Engineering2 Requirement<br>';
                $checkboxes[3]='<input type="checkbox" id="3" name="row[3]" value="e3" onclick="task(this.id);"  > Engineering3 Requirement<br>';
                $checkboxes[4]='<input type="checkbox" id="4" name="row[4]" value="e4" onclick="task(this.id);"> Engineering4 Requirement<br>';
              
                $checkboxes[5]='<input type="checkbox" id="5" name="row[5]" value="e5" onclick="task(this.id);"> Engineering5 Requirement<br>';
               
                $checkboxes[6]='<input type="checkbox" id="6" name="row[6]" value="e6" onclick="task(this.id);"> Engineering6 Requirement<br>';              
                $checkboxes[7]='<input type="checkbox" id="7" name="row[7]" value="e7" onclick="task(this.id);"> Engineering7 Requirement<br>';
              
                $checkboxes[8]='<input type="checkbox" id="8" name="row[8]" value="e8" onclick="task(this.id);"> Engineering8 Requirement<br>';
             
                
                $checkboxes[9]='<input type="hidden" id="hidden1" name="row[1]" value="e1" onclick="task(this.id);">';
                $checkboxes[10]='<input type="hidden" id="hidden2" name="row[2]" value="e2" onclick="task(this.id);">';
                $checkboxes[11]='<input type="hidden" id="hidden3" name="row[3]" value="e3" onclick="task(this.id);">';
                $checkboxes[12]='<input type="hidden" id="hidden4" name="row[4]" value="e4" onclick="task(this.id);">';
                $checkboxes[13]='<input type="hidden" id="hidden5" name="row[5]" value="e5" onclick="task(this.id);">';
                $checkboxes[14]='<input type="hidden" id="hidden6" name="row[6]" value="e6" onclick="task(this.id);">';
                $checkboxes[15]='<input type="hidden" id="hidden7" name="row[7]" value="e7" onclick="task(this.id);">';
                $checkboxes[16]='<input type="hidden" id="hidden8" name="row[8]" value="e8" onclick="task(this.id);">';
                foreach ($row as $key=>$value){
                  //echo $key.":".$value."<br>";
                  //echo $value;
                  if ($value !=0){
                    $mod = $value%2;
                  } else{
                    $mod = 0;
                  }
                  
                  if ($mod != 0){
                      $print = $checkboxes[$key];
                      $index = strpos($print, ">");
                      $str = 'checked';
                      $checkboxes[$key]= substr_replace($print, $str, $index, 0);
            
                    
                    //echo $checkboxes[$key];
                    //$checkboxes[$key]=
                  }
                }
                echo implode($checkboxes);
                //echo implode($hidden_checkboxes);
                // echo "<input type='submit' name='Update' value='Save'/>";
                
                
                //while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                //  print_r($row);
                //}
              } if ($school == 'Architecture'){
                echo 'Architecture Requirements';
                $query="SELECT * FROM aSchool WHERE email='$username'";
                $result=mysqli_query($db, $query);
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                //print_r($row);
                $checkboxes=array();
                // for($i=1; $i<10; $i++){
                //   //print_r($row[$i]);
                //   $checkboxes[]='<input type="checkbox" value=row>;
                // }
                $checkboxes[0]='<br>';
                $checkboxes[1]='<input type="checkbox" id="1" name="row[1]" value="a1" onclick="task(this.id);"> Architecture1 Requirement<br>';
                $checkboxes[2]='<input type="checkbox" id="2" name="row[2]" value="a2" onclick="task(this.id);"> Architecture2 Requirement<br>';
                $checkboxes[3]='<input type="checkbox" id="3" name="row[3]" value="a3" onclick="task(this.id);"  > Architecture3 Requirement<br>';
                $checkboxes[4]='<input type="checkbox" id="4" name="row[4]" value="a4" onclick="task(this.id);"> Architecture4 Requirement<br>';
              
                $checkboxes[5]='<input type="checkbox" id="5" name="row[5]" value="a5" onclick="task(this.id);"> Architecture5 Requirement<br>';
               
                $checkboxes[6]='<input type="checkbox" id="6" name="row[6]" value="a6" onclick="task(this.id);"> Architecture6 Requirement<br>';              
                $checkboxes[7]='<input type="checkbox" id="7" name="row[7]" value="a7" onclick="task(this.id);"> Architecture7 Requirement<br>';
              
                $checkboxes[8]='<input type="checkbox" id="8" name="row[8]" value="a8" onclick="task(this.id);"> Architecture8 Requirement<br>';
             
                
                $checkboxes[9]='<input type="hidden" id="hidden1" name="row[1]" value="a1" onclick="task(this.id);">';
                $checkboxes[10]='<input type="hidden" id="hidden2" name="row[2]" value="a2" onclick="task(this.id);">';
                $checkboxes[11]='<input type="hidden" id="hidden3" name="row[3]" value="a3" onclick="task(this.id);">';
                $checkboxes[12]='<input type="hidden" id="hidden4" name="row[4]" value="a4" onclick="task(this.id);">';
                $checkboxes[13]='<input type="hidden" id="hidden5" name="row[5]" value="a5" onclick="task(this.id);">';
                $checkboxes[14]='<input type="hidden" id="hidden6" name="row[6]" value="a6" onclick="task(this.id);">';
                $checkboxes[15]='<input type="hidden" id="hidden7" name="row[7]" value="a7" onclick="task(this.id);">';
                $checkboxes[16]='<input type="hidden" id="hidden8" name="row[8]" value="a8" onclick="task(this.id);">';
                foreach ($row as $key=>$value){
                  //echo $key.":".$value."<br>";
                  //echo $value;
                  if ($value !=0){
                    $mod = $value%2;
                  } else{
                    $mod = 0;
                  }
                  
                  if ($mod != 0){
                      $print = $checkboxes[$key];
                      $index = strpos($print, ">");
                      $str = 'checked';
                      $checkboxes[$key]= substr_replace($print, $str, $index, 0);
            
                    
                    //echo $checkboxes[$key];
                    //$checkboxes[$key]=
                  }
                }
                echo implode($checkboxes);
                //echo implode($hidden_checkboxes);
                // echo "<input type='submit' name='Update' value='Save'/>";
                
                
                //while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                //  print_r($row);
                //}
              } if ($school == 'Nursing School'){
                echo 'Nursing School Requirements';
                
                $query="SELECT * FROM nSchool WHERE email='$username'";
                $result=mysqli_query($db, $query);
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                //print_r($row);
                $checkboxes=array();
                // for($i=1; $i<10; $i++){
                //   //print_r($row[$i]);
                //   $checkboxes[]='<input type="checkbox" value=row>;
                // }
                $checkboxes[0]='<br>';
                $checkboxes[1]='<input type="checkbox" id="1" name="row[1]" value="n1" onclick="task(this.id);"> N1 Requirement<br>';
                $checkboxes[2]='<input type="checkbox" id="2" name="row[2]" value="n2" onclick="task(this.id);"> N2 Requirement<br>';
                $checkboxes[3]='<input type="checkbox" id="3" name="row[3]" value="n3" onclick="task(this.id);"  > N3 Requirement<br>';
                $checkboxes[4]='<input type="checkbox" id="4" name="row[4]" value="n4" onclick="task(this.id);"> N4 Requirement<br>';
              
                $checkboxes[5]='<input type="checkbox" id="5" name="row[5]" value="n5" onclick="task(this.id);"> N5 Requirement<br>';
               
                $checkboxes[6]='<input type="checkbox" id="6" name="row[6]" value="n6" onclick="task(this.id);"> N6 Requirement<br>';              
                $checkboxes[7]='<input type="checkbox" id="7" name="row[7]" value="n7" onclick="task(this.id);"> N7 Requirement<br>';
              
                $checkboxes[8]='<input type="checkbox" id="8" name="row[8]" value="n8" onclick="task(this.id);"> N8 Requirement<br>';
             
                
                $checkboxes[9]='<input type="hidden" id="hidden1" name="row[1]" value="n1" onclick="task(this.id);">';
                $checkboxes[10]='<input type="hidden" id="hidden2" name="row[2]" value="n2" onclick="task(this.id);">';
                $checkboxes[11]='<input type="hidden" id="hidden3" name="row[3]" value="n3" onclick="task(this.id);">';
                $checkboxes[12]='<input type="hidden" id="hidden4" name="row[4]" value="n4" onclick="task(this.id);">';
                $checkboxes[13]='<input type="hidden" id="hidden5" name="row[5]" value="n5" onclick="task(this.id);">';
                $checkboxes[14]='<input type="hidden" id="hidden6" name="row[6]" value="n6" onclick="task(this.id);">';
                $checkboxes[15]='<input type="hidden" id="hidden7" name="row[7]" value="n7" onclick="task(this.id);">';
                $checkboxes[16]='<input type="hidden" id="hidden8" name="row[8]" value="n8" onclick="task(this.id);">';
                foreach ($row as $key=>$value){
                  //echo $key.":".$value."<br>";
                  //echo $value;
                  if ($value !=0){
                    $mod = $value%2;
                  } else{
                    $mod = 0;
                  }
                  
                  if ($mod != 0){
                      $print = $checkboxes[$key];
                      $index = strpos($print, ">");
                      $str = 'checked';
                      $checkboxes[$key]= substr_replace($print, $str, $index, 0);
            
                    
                    //echo $checkboxes[$key];
                    //$checkboxes[$key]=
                  }
                }
                echo implode($checkboxes);
                //echo implode($hidden_checkboxes);
                // echo "<input type='submit' name='Update' value='Save'/>";
              }
            ?>
        </div>
    </form>

        <br>
        <br>

        <div class ="major-req">
          <!-- <p><u>Major: Accounting</u></p> -->
          <form name="check" action='' method="post">

          <?php
              $db = mysqli_connect('localhost:3306', 'jlp4ub', 'password', 'jlp4ub');
              $username = $_SESSION['email'];
              $major = $_SESSION['major'];
              $checkboxes=array();
              if ($major == 'Accounting'){
                echo 'Accounting Major Requirements';
                
                // $query="SELECT * FROM accounting WHERE email='$username'";
                $query = "SELECT * FROM requirements WHERE major_id='$major_id'";
                $result=mysqli_query($db, $query);
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                $checkboxes=array();
                $checkboxes[0]='<br>';
                $checkboxes[1]='<input type="checkbox" id="1" name="row[1]" value="ac1" onclick="task(this.id);"> Accounting1 Requirement<br>';
                $checkboxes[2]='<input type="checkbox" id="2" name="row[2]" value="ac2" onclick="task(this.id);"> Accounting2 Requirement<br>';
                $checkboxes[3]='<input type="checkbox" id="3" name="row[3]" value="ac3" onclick="task(this.id);"  > Accounting3 Requirement<br>';
                $checkboxes[4]='<input type="checkbox" id="4" name="row[4]" value="ac4" onclick="task(this.id);"> Accounting4 Requirement<br>';
              
                $checkboxes[5]='<input type="checkbox" id="5" name="row[5]" value="ac5" onclick="task(this.id);"> Accounting5 Requirement<br>';
               
                $checkboxes[6]='<input type="checkbox" id="6" name="row[6]" value="ac6" onclick="task(this.id);"> Accounting6 Requirement<br>';              
                $checkboxes[7]='<input type="checkbox" id="7" name="row[7]" value="ac7" onclick="task(this.id);"> Accounting7 Requirement<br>';
              
                $checkboxes[8]='<input type="checkbox" id="8" name="row[8]" value="ac8" onclick="task(this.id);"> Accounting8 Requirement<br>';
             
                
                $checkboxes[9]='<input type="hidden" id="hidden1" name="row[1]" value="ac1" onclick="task(this.id);">';
                $checkboxes[10]='<input type="hidden" id="hidden2" name="row[2]" value="ac2" onclick="task(this.id);">';
                $checkboxes[11]='<input type="hidden" id="hidden3" name="row[3]" value="ac3" onclick="task(this.id);">';
                $checkboxes[12]='<input type="hidden" id="hidden4" name="row[4]" value="ac4" onclick="task(this.id);">';
                $checkboxes[13]='<input type="hidden" id="hidden5" name="row[5]" value="ac5" onclick="task(this.id);">';
                $checkboxes[14]='<input type="hidden" id="hidden6" name="row[6]" value="ac6" onclick="task(this.id);">';
                $checkboxes[15]='<input type="hidden" id="hidden7" name="row[7]" value="ac7" onclick="task(this.id);">';
                $checkboxes[16]='<input type="hidden" id="hidden8" name="row[8]" value="ac8" onclick="task(this.id);">';
                foreach ($row as $key=>$value){
                  if ($value !=0){
                    $mod = $value%2;
                  } else{
                    $mod = 0;
                  }
                  
                  if ($mod != 0){
                      $print = $checkboxes[$key];
                      $index = strpos($print, ">");
                      $str = 'checked';
                      $checkboxes[$key]= substr_replace($print, $str, $index, 0);
                  }
                }
                echo implode($checkboxes);
                // echo "<input type='submit' name='Update' value='Save'/>";
              } if ($major == 'Finance'){
                echo 'Finance Major Requirements';
                
                $query="SELECT * FROM finance WHERE email='$username'";
                $result=mysqli_query($db, $query);
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                $checkboxes=array();
                $checkboxes[0]='<br>';
                $checkboxes[1]='<input type="checkbox" id="1" name="row[1]" value="f1" onclick="task(this.id);"> Finance1 Requirement<br>';
                $checkboxes[2]='<input type="checkbox" id="2" name="row[2]" value="f2" onclick="task(this.id);"> Finance2 Requirement<br>';
                $checkboxes[3]='<input type="checkbox" id="3" name="row[3]" value="f3" onclick="task(this.id);"  > Finance3 Requirement<br>';
                $checkboxes[4]='<input type="checkbox" id="4" name="row[4]" value="f4" onclick="task(this.id);"> Finance4 Requirement<br>';
              
                $checkboxes[5]='<input type="checkbox" id="5" name="row[5]" value="f5" onclick="task(this.id);"> Finance5 Requirement<br>';
               
                $checkboxes[6]='<input type="checkbox" id="6" name="row[6]" value="f6" onclick="task(this.id);"> Finance6 Requirement<br>';              
                $checkboxes[7]='<input type="checkbox" id="7" name="row[7]" value="f7" onclick="task(this.id);"> Finance7 Requirement<br>';
              
                $checkboxes[8]='<input type="checkbox" id="8" name="row[8]" value="f8" onclick="task(this.id);"> Finance8 Requirement<br>';
             
                
                $checkboxes[9]='<input type="hidden" id="hidden1" name="row[1]" value="f1" onclick="task(this.id);">';
                $checkboxes[10]='<input type="hidden" id="hidden2" name="row[2]" value="f2" onclick="task(this.id);">';
                $checkboxes[11]='<input type="hidden" id="hidden3" name="row[3]" value="f3" onclick="task(this.id);">';
                $checkboxes[12]='<input type="hidden" id="hidden4" name="row[4]" value="f4" onclick="task(this.id);">';
                $checkboxes[13]='<input type="hidden" id="hidden5" name="row[5]" value="f5" onclick="task(this.id);">';
                $checkboxes[14]='<input type="hidden" id="hidden6" name="row[6]" value="f6" onclick="task(this.id);">';
                $checkboxes[15]='<input type="hidden" id="hidden7" name="row[7]" value="f7" onclick="task(this.id);">';
                $checkboxes[16]='<input type="hidden" id="hidden8" name="row[8]" value="f8" onclick="task(this.id);">';
                foreach ($row as $key=>$value){
                  if ($value !=0){
                    $mod = $value%2;
                  } else{
                    $mod = 0;
                  }
                  
                  if ($mod != 0){
                      $print = $checkboxes[$key];
                      $index = strpos($print, ">");
                      $str = 'checked';
                      $checkboxes[$key]= substr_replace($print, $str, $index, 0);
                  }
                }
                echo implode($checkboxes);
                // echo "<input type='submit' name='Update' value='Save'/>";
              } if ($major == 'Business'){
                echo 'Business Major Requirements';
                
                $query="SELECT * FROM business WHERE email='$username'";
                $result=mysqli_query($db, $query);
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                $checkboxes=array();
                $checkboxes[0]='<br>';
                $checkboxes[1]='<input type="checkbox" id="1" name="row[1]" value="b1" onclick="task(this.id);"> Business1 Requirement<br>';
                $checkboxes[2]='<input type="checkbox" id="2" name="row[2]" value="b2" onclick="task(this.id);"> Business2 Requirement<br>';
                $checkboxes[3]='<input type="checkbox" id="3" name="row[3]" value="b3" onclick="task(this.id);"  > Business3 Requirement<br>';
                $checkboxes[4]='<input type="checkbox" id="4" name="row[4]" value="b4" onclick="task(this.id);"> Business4 Requirement<br>';
              
                $checkboxes[5]='<input type="checkbox" id="5" name="row[5]" value="b5" onclick="task(this.id);"> Business5 Requirement<br>';
               
                $checkboxes[6]='<input type="checkbox" id="6" name="row[6]" value="b6" onclick="task(this.id);"> Business6 Requirement<br>';              
                $checkboxes[7]='<input type="checkbox" id="7" name="row[7]" value="b7" onclick="task(this.id);"> Business7 Requirement<br>';
              
                $checkboxes[8]='<input type="checkbox" id="8" name="row[8]" value="fb8" onclick="task(this.id);"> Business8 Requirement<br>';
             
                
                $checkboxes[9]='<input type="hidden" id="hidden1" name="row[1]" value="b1" onclick="task(this.id);">';
                $checkboxes[10]='<input type="hidden" id="hidden2" name="row[2]" value="b2" onclick="task(this.id);">';
                $checkboxes[11]='<input type="hidden" id="hidden3" name="row[3]" value="b3" onclick="task(this.id);">';
                $checkboxes[12]='<input type="hidden" id="hidden4" name="row[4]" value="b4" onclick="task(this.id);">';
                $checkboxes[13]='<input type="hidden" id="hidden5" name="row[5]" value="b5" onclick="task(this.id);">';
                $checkboxes[14]='<input type="hidden" id="hidden6" name="row[6]" value="b6" onclick="task(this.id);">';
                $checkboxes[15]='<input type="hidden" id="hidden7" name="row[7]" value="b7" onclick="task(this.id);">';
                $checkboxes[16]='<input type="hidden" id="hidden8" name="row[8]" value="b8" onclick="task(this.id);">';
                foreach ($row as $key=>$value){
                  if ($value !=0){
                    $mod = $value%2;
                  } else{
                    $mod = 0;
                  }
                  
                  if ($mod != 0){
                      $print = $checkboxes[$key];
                      $index = strpos($print, ">");
                      $str = 'checked';
                      $checkboxes[$key]= substr_replace($print, $str, $index, 0);
                  }
                }
                echo implode($checkboxes);
                // echo "<input type='submit' name='Update' value='Save'/>";
              }
          ?>

        </div>
      </form>
      
  </div>

  <div class="right" style="height:95%">
  
    <div class="select-course" style="float:left;">
      <p><u>Selected Courses</u></p>
      <table id="options" border="0">
        
      </table>
    </div>

    <div class="container">
      <form class="searchbar">
        <input type="text" placeholder="Search" name="search"  id="courseID">
        <input type="button" class="btn btn-light" value="Add Class" onclick="addElement()">
          <i class="fa fa-search"></i>
        </input>
      </form>

      <div class="main-right">
        
          <table id="schedule" name="schedule" align="center">
            <tr>
              <th>1st</th>
                  <th>2nd</th>
                  <th>3rd</th>
                  <th>4th</th>
                </tr>

                <tr>
                  <th>Fall</th>
                  <th>Fall</th>
                  <th>Fall</th>
                  <th>Fall</th>
                </tr>

                <tr class="drop-row">
                  <td class="sched" ondragover="allowDrop(event)" ondrop="drop(event, this)"></td>
                  <td class="sched" ondragover="allowDrop(event)" ondrop="drop(event, this)"></td>
                  <td class="sched" ondragover="allowDrop(event)" ondrop="drop(event, this)"></td>
                  <td class="sched" ondragover="allowDrop(event)" ondrop="drop(event, this)"></td>
                </tr>

                <tr>
                  <th>Spring</th>
                  <th>Spring</th>
                  <th>Spring</th>
                  <th>Spring</th>
                </tr>

                <tr class="drop-row">
                  <td class="sched" ondragover="allowDrop(event)" ondrop="drop(event, this)"></td>
                  <td class="sched" ondragover="allowDrop(event)" ondrop="drop(event, this)"></td>
                  <td class="sched" ondragover="allowDrop(event)" ondrop="drop(event, this)"></td>
                  <td class="sched" ondragover="allowDrop(event)" ondrop="drop(event, this)"></td>
                </tr>

                <tr>
                  <th style="border:1px solid black; text-align:left; font-size: 12px">1st year:</th>
                  <th style="border:1px solid black; text-align:left; font-size: 12px">2nd year:</th>
                  <th style="border:1px solid black; text-align:left; font-size: 12px">3rd year:</th>
                  <th style="border:1px solid black; text-align:left; font-size: 12px">4th year:</th>
                </tr>
            </table>
          

          <!-- <div style="float:right; padding-top: 5px; padding-right: 25px">
            <input type="submit" name="Save" value="Save"/>
          </div> -->

      </div>
    </div>
  </div>


</body>

<script>
  function task(e){
    var hidden_e = 'hidden'.concat(e);
    for(i=1;i<9;i++){
      var hiddenid='hidden'.concat(i);
      if ((i == e) || (hiddenid == hidden_e)){
        document.getElementById(e).disabled=false;
        document.getElementById(hidden_e).disabled=false;
      } else{
        document.getElementById(i).disabled=true;
        document.getElementById(hiddenid).disabled=true;
      } 
    }
    document.getElementsByName("check")[0].submit();
  }
  function drop(ev, el){
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    el.appendChild(document.getElementById(data)).style.display="block";
  }
  var allowDrop = (ev)=> ev.preventDefault();
  function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
  }
  function addElement() {
    var table = document.getElementById("options");
    var row = table.insertRow(0);
    var cell = document.createElement("TD");
    var name = document.getElementById("courseID").value;
    var cell = row.insertCell(0);
    cell.innerHTML = document.getElementById("courseID").value;
    cell.classList.add("event");
  
    //cell.classList.insertBefore("event");
    
        cell.setAttribute("id", name);
        cell.setAttribute("draggable", true);
        cell.addEventListener("dragstart", drag);
        
  }
</script>

</html>

<!DOCTYPE>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="schedule2.css">
</head>
<body>

<div class="dashboard">
  <div class="left">
    <div class="sidebar">
      <div class="wrapper">
        <div class="menu">
          <img src="https://i.ibb.co/B4Dn7CT/menu.png" />
        </div>

        <div class="profile" style="margin-top: 20px;">
          <img src="https://www.seekclipart.com/clipng/middle/103-1032140_graphic-transparent-1-vector-flat-small-user-icon.png" />
        </div>
      </div>
    </div>
    <div class="navigation">
      <form action="schedule_action.php" method="post" id="form">
      <div class="wrapper2">

        <div class="abilan">
          <img src="https://i.ibb.co/5GRg92W/fullsizeoutput-2fc7.jpg" />
        </div>

        <button class="school-req">CLAS Requirements</button>
        
        <div class="folder-icons">
          <input type="checkbox" name="req"> Foreign Language Requirement<br>
        </div>

        <div class="folder-icons">
          <input type="checkbox" name="req"> First Writing Requirement<br>
        </div>

        <div class="folder-icons">
          <input type="checkbox" name="req"> Second Writing Requirement<br>
        </div>

        <div class="folder-icons">
          <input type="checkbox" name="req"> Social Sciences<br>
        </div>

        <div class="folder-icons">
          <input type="checkbox" name="req"> Humanities<br>
        </div>

        <div class="folder-icons">
          <input type="checkbox" name="req"> Historical Studies<br>
        </div>

        <div class="folder-icons">
          <input type="checkbox" name="req"> Non-Western Perspective<br>
        </div>

        <div class="folder-icons">
          <input type="checkbox" name="req"> Natural Science and Mathematics<br>
        </div>

        <button class="school-req" style="margin-top:10px;">Major Requirements</button>
        <?php
          session_start();
          $username = $_SESSION['email'];

          //$school = $_SESSION['school'];
          //$major = $_SESSION['major'];

          //$con = new mysqli("192.168.64.2", "amh4wk", "123456", "amh4wk_project");

          $con = new mysqli("cs4750.cs.virginia.edu", "amh4wk", "123456", "amh4wk_project");
          $username = $_SESSION['email'];
          $query = "SELECT * FROM student WHERE computing_id = '$username'";
          $result = mysqli_query($con, $query);

          while($row=mysqli_fetch_array($result)){
            $major = $row['dept_name'];
          }

          $checkboxes=array();
          $major_query = "SELECT major_id FROM student LEFT JOIN major USING(dept_name) WHERE computing_id='$username'";
          $major_result = mysqli_query($con, $major_query);
          //SELECT requirement FROM major_requirements WHERE major_id = 1
          while ($row = $major_result->fetch_assoc()){
            $major_id = $row['major_id'];
          }

          //Retrieve list of requirements for user's major
          $retrieve_req_query = "SELECT requirement, major_requirement_id FROM major_requirements WHERE major_id = $major_id";
          $req_result = mysqli_query($con, $retrieve_req_query);
          $counter = 1;
          $checkboxes[0] = "<br><br>";
          while ($row = $req_result->fetch_assoc()){

            $major_requirement_id = $row['major_requirement_id'];
            //check to see if the checkbox is checked
            $check_query = "SELECT checked FROM `major_check_table` WHERE major_requirement_id=".$major_requirement_id;
            $check_result = mysqli_query($con, $check_query);
            $result = mysqli_fetch_assoc($check_result);
            $checked = $result['checked'];
            if($checked == 1){
              $checkboxes[$counter] = "<input type='checkbox' value='". $row['requirement'] ."' name='reqs[]' checked>".$row['requirement']."<br>";
            }
            else{
              $checkboxes[$counter] = "<input type='checkbox' value='". $row['requirement'] ."' name='reqs[]'>".$row['requirement']."<br>";
            }
            $counter++;
          }
          echo implode($checkboxes);

        ?>

        <input class="submit" type="submit" value="submit"/>
      </div>
    </div>
  </form>
  </div>
  <div class="right-side">
    <div class="right-header">
      <div class="top-bar">
        <div class="top-bar-justify">
          <div class="big-inbox">
            Schedule
          </div>

          <div class="top-bar-items">
            
            <img src="https://i.ibb.co/52Vkq4M/earth-globe.png"/>
            <div class="icon-name5"> English </div>
          </div>
        </div>
        <div class="profile2">
          <img src="https://www.seekclipart.com/clipng/middle/103-1032140_graphic-transparent-1-vector-flat-small-user-icon.png" />
          <div class="icon-name5">Larry Nunez</div>
        </div>
      </div>
      <hr class="new-hr">

      <div class="right-bottom">


        <div class="middle-buttons" style="margin: auto;">

          <div class="form has-search">
            <input class="text" type="search" placeholder="Search here..." name="search" id="courseID">
            <span class="searchIcon">
              <img src="https://i.ibb.co/sqFgRq8/search.png" />
            </span>
          </div>

          <input type="button" class="btn btn-light" value="Add Class" onclick="addElement()">
            <i class="fa fa-search"></i>
          </input>
        </div>

      </div>
    </div>
    <div class="right-body">
      <div class="scroll-cards">
        <button class="btn1 buton0" style="margin-bottom: 20px;">Selected Courses</button>
        <table id="options" border="0">
          
        </table>

      </div>
      <div class="message">
        <table id="schedule" name="schedule" align="center">
            <tr class="tr_color">
              <th>1st</th>
              <th>2nd</th>
              <th>3rd</th>
              <th>4th</th>
            </tr>

            <tr class="tr_season">
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

            <tr class="tr_season">
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


        </table>
      </div>
    </div>
  </div>
</body>
  <script>

  $("input[type='checkbox']").on('click', function(){

    var checked = $(this).attr('checked');
    if(checked){
      var value = $(this).val();

    }

  })

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

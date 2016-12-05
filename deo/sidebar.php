<div class="side_dental">
    <script language="javascript" type="text/javascript">
        /* Visit http://www.yaldex.com/ for full source code
         and get more free JavaScript, CSS and DHTML scripts! */
        < !--Begin
        var timerID = null;
        var timerRunning = false;
        function stopclock() {
            if (timerRunning)
                clearTimeout(timerID);
            timerRunning = false;
        }
        function showtime() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds()
            var timeValue = "" + ((hours > 12) ? hours - 12 : hours)
            if (timeValue == "0")
                timeValue = 12;
            timeValue += ((minutes < 10) ? ":0" : ":") + minutes
            timeValue += ((seconds < 10) ? ":0" : ":") + seconds
            timeValue += (hours >= 12) ? " P.M." : " A.M."
            document.clock.face.value = timeValue;
            timerID = setTimeout("showtime()", 1000);
            timerRunning = true;
        }
        function startclock() {
            stopclock();
            showtime();
        }
        window.onload = startclock;
        // End -->
    </SCRIPT>								      
    <p>
    <form name="clock">
        Time is:&nbsp;<input type="submit" class="trans" name="face" value="">
    </form>
</p>	

<div class="alert alert-info">
    <i class="icon-calendar icon-large"></i>
    <?php
    $Today = date('y:m:d');
    $new = date(' d/m/Y', strtotime($Today));
    echo $new;
    ?>
</div>

<div class="navbar">
    <div class="navbar-inner">
        <div class="pull-right">					
        </div>
    </div>
</div>
<ul class="nav nav-pills nav-stacked">
    <li class="active">
        <a href="dasboard.php"><i class="icon-home icon-large"></i>&nbsp;Home<i class="icon-arrow-right icon-large"></i></a>
    </li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="sched_today.php"><i class="icon-file-alt icon-large"></i>&nbsp;Schedule for Today <i class="icon-arrow-right icon-large"></i>
	<span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
      <li><a href="sched_today.php">Schedule</a></li>
      <li><a href="#">Submenu 1-2</a></li>
      <li><a href="#">Submenu 1-3</a></li> 
    </ul>
	</li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="schedule.php"><i class="icon-list icon-large"></i>&nbsp;Schedule<i class="icon-arrow-right icon-large"></i>
	<span class="caret"></span>
	</a>
		<ul class="dropdown-menu">
      <li><a href="schedule.php">General Schedule</a></li>
      <li><a href="#">Submenu 1-2</a></li>
      <li><a href="#">Submenu 1-3</a></li> 
    </ul>
	</li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="service.php"><i class="icon-medkit	icon-large"></i>&nbsp;Service<i class="icon-arrow-right icon-large"></i>
	<span class="caret"></span>
	</a>
		<ul class="dropdown-menu">
      <li><a href="service.php">Services Offered</a></li>
      <li><a href="#">Submenu 1-2</a></li>
      <li><a href="#">Submenu 1-3</a></li> 
    </ul>
	</li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="members.php"><i class="icon-user icon-large"></i>&nbsp;Member Accounts<i class="icon-arrow-right icon-large"></i>
	<span class="caret"></span>
	</a>
		<ul class="dropdown-menu">
      <li><a href="members.php">Members</a></li>
      <li><a href="#">Members Pending</a></li>
      <li><a href="#">Members Approved</a></li> 
    </ul>
	</li>
	
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="note.php"><i class="icon-group icon-large"></i>&nbsp;Permit<i class="icon-arrow-right icon-large"></i>
	<span class="caret"></span>
	</a>
		<ul class="dropdown-menu">
      <li><a href="note.php">New Permit Entry</a></li>
	  <li><a href="update_permits.php">Update Permits</a></li>
	  <li><a href="print_permit.php">Print Permits</a></li>
      <li><a href="generate_receipt.php">Generate New Receipts</a></li>
      <li><a href="reprint_receipt.php">Reprint Receipts</a></li> 
    </ul>
	</li>
	
    <!--    <li><a href="note.php"><i class="icon-file icon-large"></i>&nbsp;Permit<i class="icon-arrow-right icon-large"></i></a></li> -->  
</ul>
</div>
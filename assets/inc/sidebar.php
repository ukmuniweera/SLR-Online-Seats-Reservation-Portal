<div class="be-left-sidebar">
  <div class="left-sidebar-wrapper">
    <a class="left-sidebar-toggle" href="#">Dashboard</a>
    <div class="left-sidebar-spacer">
      <div class="left-sidebar-scroll">
        <div class="left-sidebar-content">
          <ul class="sidebar-elements">
            <li class="divider">Menu</li>
            <li class="">
              <a href="pass-dashboard.php">
                <i class="icon mdi mdi-view-dashboard"></i><span>Dashboard</span>
              </a>
            </li>
            <?php
            $aid=$_SESSION['pass_id'];
            $ret="select * from orrs_passenger where pass_id=?";
            $stmt= $mysqli->prepare($ret);
            $stmt->bind_param('i',$aid);
            $stmt->execute();
            $res=$stmt->get_result();
            while($row=$res->fetch_object()) { ?>
            <?php } ?>
            <li><a href="pass-book-train.php"><i class="icon mdi mdi-train"></i><span>Reserve Train</span></a></li>
			<li><a href="pass-cancel-train.php"><i class="icon mdi mdi-briefcase-edit-outline"></i><span>Cancel Train</span></a></li>
            <li><a href="pass-print-ticket.php"><i class="icon mdi mdi-ticket-confirmation"></i><span>Print Ticket</span></a></li>
            <li><a href="pass-logout.php"><i class="icon mdi mdi-exit-run"></i><span>Logout</span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

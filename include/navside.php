<?php 
if($access == 1){ ?>
      <div class="sidebar-heading"> Management </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#UserManagement" aria-expanded="true" aria-controls="UserManagement">
          <i class="fas fa-fw fa-users-cog"> </i>
          <span> User Management </span>
        </a>
        <div id="UserManagement" class="collapse" aria-labelledby="UserManagement" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> Components: </h6>
            <a class="collapse-item" href="account.php"> Account Registered </a>
            <a class="collapse-item" href="department.php"> Department Registered </a>
            <a class="collapse-item" href="section.php"> Section Registered </a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#TaskManagement" aria-expanded="true" aria-controls="TaskManagement">
          <i class="fas fa-fw fa-tasks"> </i>
          <span> Task Management </span>
        </a>
        <div id="TaskManagement" class="collapse" aria-labelledby="TaskManagement" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> Components: </h6>
            <a class="collapse-item" href="task_import.php"> Task Import </a>
            <a class="collapse-item" href="task_registered.php"> Task Registered </a>
            <a class="collapse-item" href="task_assignment.php"> Task Assignment </a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#DeployedTasks" aria-expanded="true" aria-controls="DeployedTasks">
          <i class="fas fa-fw fa-rocket"> </i>
          <span> Deployed Tasks </span>
        </a>
        <div id="DeployedTasks" class="collapse" aria-labelledby="DeployedTasks" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> Status: </h6>
            <a class="collapse-item" href="tasks.php?status=NOT YET STARTED"> To-Do </a>
            <a class="collapse-item" href="tasks.php?status=IN PROGRESS"> In-Progress </a>
            <a class="collapse-item" href="tasks.php?status=FINISHED"> Finished </a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading"> Record </div>
      <li class="nav-item"> <a class="nav-link" href="day_off.php"> <i class="fas fa-fw fa-calendar-day"> </i> <span> Day-off </span> </a> </li>
      <li class="nav-item"> <a class="nav-link" href="attendance.php"> <i class="fas fa-fw fa-calendar-check"> </i> <span> Attendance </span> </a> </li>
      <li class="nav-item"> <a class="nav-link" href="system_log.php"> <i class="fas fa-fw fa-scroll"> </i> <span> System </span> </a> </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading"> Report </div>
      <li class="nav-item"> <a class="nav-link" href="performance.php"><i class="fas fa-fw fa-file-pdf"></i> <span> Performance </span> </a> </li>
      <hr class="sidebar-divider">
<?php } ?>
<aside>
	<div id="sidebar" class="nav-collapse ">
		<!-- sidebar menu start-->
		<ul class="sidebar-menu" id="nav-accordion">
			<li>
				<a class="<?php if ($page == 'addTask') echo " active ";
							else echo " "; ?>" href="addTask.php">
					<i class="fa fa-tasks"></i>
					<span>Add Task</span>
				</a>
			</li>
			<li class="sub-menu">
				<a href="listTask.php" class="<?php if ($page == 'taskList') echo " active ";
												else echo " "; ?>">
					<i class="fa fa-tasks"></i>
					<span>Task List</span>
				</a>
			</li>

			<!--multi level menu end-->

		</ul>
		<!-- sidebar menu end-->
	</div>
</aside>
<?php

/********************* Include Common Header ********************/
include('inc/header.inc.php');
/********************* Include Common Menu ********************/
include('inc/menu.inc.php');

?>
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class='col-md-12 alert d-none' id="msgDiv"></div>
			<div class="col-lg-12">

				<section class="panel panel-primary">

					<header class="panel-heading">
						<strong>Task List</strong>
					</header>
					<div class="panel-body">
						<div class="row mb4">
							<div class="col-md-2">
								<select id="filter_status" class="form-control">
									<option value="">Select Status</option>
									<option value="New">New</option>
									<option value="Incomplete">Incomplete</option>
									<option value="Complete">Complete</option>
								</select>
							</div>

							<div class="col-md-2">
								<input type="date" class="form-control" placeholder="Due Date" name="filter_due_date" id="filter_due_date">
							</div>

							<div class="col-md-2">
								<select class="form-control" id="filter_priority" name="filter_priority">
									<option value="">Select Priority</option>
									<option value="High">High</option>
									<option value="Medium">Medium</option>
									<option value="Low">Low</option>
								</select>
							</div>

							<div class="col-md-1">
								<input type="checkbox" name="filter_notes" id="filter_notes">&nbsp;Notes
							</div>

							<div class="col-md-2">
								<button type="button" class="btn btn-danger" name="filter_notes" id="filter_task_btn">Filter</button>

							</div>
						</div>
						<div class="clearfix"></div><br>

						<div class="adv-table mt-3">
							<table class="table table-striped table-advance table-hover" id="table">
								<thead>
									<tr>
										<th>Subject</th>
										<th>Description</th>
										<th>Start Date</th>
										<th>Due Date</th>
										<th>Status</th>
										<th>Priority</th>
										<th>View</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</section>
			</div>
		</div>
	</section>
</section>
<?php
/********************* Include Common Footer ********************/
include('inc/footer.inc.php');
?>
<script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
<script src="api-js/task-list-api.js"></script>
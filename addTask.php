<?php

/********************* Include Common Header ********************/
include('inc/header.inc.php');
/********************* Include Common Menu ********************/
include('inc/menu.inc.php');
?>

<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">

				<section class="panel panel-primary">
					<header class="panel-heading"> <strong>Add Task</strong> </header>

					<form id="addTaskForm" enctype="multipart/form-data">
						<div class="panel-body">
							<div class='col-md-12 alert d-none' id="msgDiv"></div>

							<div class="form-group">
								<label for="firstName">Subject<span class="mandatory">*</span></label>
								<textarea class="form-control" id="subject" name="subject" placeholder="Enter Subject"></textarea>
								<div id="subjectError" class="mandatory"></div>
							</div>

							<div class="form-group">
								<label for="firstName">Description<span class="mandatory">*</span></label>
								<textarea class="form-control" id="description" name="description" placeholder="Enter Description"></textarea>
								<div id="descriptionError" class="mandatory"></div>
							</div>

							<div class="form-group">
								<label for="lastName">Start Date<span class="mandatory">*</span></label>
								<input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
								<div id="startDateError" class="mandatory"></div>
							</div>

							<div class="form-group">
								<label for="lastName">Due Date<span class="mandatory">*</span></label>
								<input type="date" class="form-control" id="due_date" name="due_date" placeholder="Due Date">
								<div id="endDateError" class="mandatory"></div>
							</div>

							<div class="form-group">
								<label for="volume">Status<span class="mandatory">*</span></label>
								<select class="form-control" id="status" name="status">
									<option value="">--Select Status--</option>
									<option value="New">New</option>
									<option value="Incomplete">Incomplete</option>
									<option value="Complete">Complete</option>
								</select>
								<div id="statusError" class="mandatory"></div>
							</div>

							<div class="form-group">
								<label for="volume">Priority<span class="mandatory">*</span></label>
								<select class="form-control" id="priority" name="priority">
									<option value="">--Select Priority--</option>
									<option value="High">High</option>
									<option value="Medium">Medium</option>
									<option value="Low">Low</option>
								</select>
								<div id="priorityError" class="mandatory"></div>
							</div>

							<hr>
							<button type="button" class="btn btn-danger" id="addNote">+</button>&nbsp;&nbsp;<button type="button" class="btn btn-danger" id="removeNote">-</button>
							<div class="noteDiv">

								<section>
									<h4>Note 1</h4>
									<div class="form-group">
										<label for="firstName">Subject<span class="mandatory">*</span></label>
										<textarea class="form-control" id="note_subject" name="note_subject[]" placeholder="Enter Subject"></textarea>
										<div id="subjectError" class="mandatory"></div>
									</div>

									<div class="form-group">
										<label for="firstName">Attachment<span class="mandatory">*</span></label>
										<input type="file" class="form-control" id="attachment" name="attachment[][]" multiple>
										<div id="descriptionError" class="mandatory"></div>
									</div>

									<div class="form-group">
										<label for="firstName">Note<span class="mandatory">*</span></label>
										<textarea class="form-control" id="note" name="note[]" placeholder="Enter Note"></textarea>
										<div id="descriptionError" class="mandatory"></div>
									</div>
								</section>

							</div>





							<button type="button" class="btn btn-success" id="addtask" name="submit" value="update">Save</button>

						</div>
					</form>
				</section>
			</div>
		</div>
	</section>
</section>

<?php
/********************* Include Common Footer ********************/
include('inc/footer.inc.php');

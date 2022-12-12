<?php

/******************************************
	Class Name - Task
	Developer - Shankar Kanase
	Created Date 10-12-2022
 *******************************************/

class Task extends DbConnect
{

	/***************************************************************************
		Function Name - addTask()
		Parameters - data - array of task data to be inserted
		Purpose - To add task to the system
		Return - flag to indicate success or failure
		Developer - Shankar Kanase
	 ***************************************************************************/
	public function addTask($data)
	{
		$this->table('tb_tasks');
		$this->parameters($data);
		$id = $this->insert();

		return $id;
	}

	/***************************************************************************
		Function Name - listTask()
		Parameters -
		Purpose - To get list of Tasks
		Return - array of tasks
		Developer - Shankar Kanase
	 ***************************************************************************/
	public function listTask()
	{
		$query = "select * from tb_tasks";
		$this->query($query);
		$tasks = $this->selectAll();
		return $tasks;
	}

	/***************************************************************************
		Function Name - getTasks()
		Parameters -
		Purpose - To get details for Tasks
		Return - array of quote details
		Developer - Shankar Kanase
	 ***************************************************************************/
	public function getTasks($user_id, $status, $due_date, $priority, $note)
	{
		$cond = "";
		if ($status != '') {
			$cond .= " and task_list.status='" . $status . "'";
		}
		if ($due_date != '') {
			$cond .= " and task_list.due_date='" . $due_date . "'";
		}
		if ($priority != '') {
			$cond .= " and task_list.priority='" . $priority . "'";
		}
		if ($note == '1') {
			$cond .= " and task_list.note_count>0";
		}

		$query = "select task_list.* from (select id,subject,description,start_date,due_date,status,priority,(case when priority='High' then 1 when priority='Medium' then 2 else 3 end) as priority_sequence,(select count(id) from tb_notes where task_id=tb_tasks.id) as note_count from tb_tasks where user_id='" . $user_id . "') as task_list where 1 " . $cond . " order by task_list.priority_sequence,task_list.note_count ";
		$this->query($query);
		$tasks = $this->selectAll('');

		return $tasks;
	}

	/***************************************************************************
		Function Name - getNotes()
		Parameters -
		Purpose - To get details for Notes
		Return - array of quote details
		Developer - Shankar Kanase
	 ***************************************************************************/
	public function getNotes($task_id)
	{
		$query = "select id,subject,note from tb_notes where task_id='" . $task_id . "'";
		$this->query($query);
		$notes = $this->selectAll('');

		$count = 0;
		foreach ($notes as $note) {
			$query = "select attachment from tb_attachment where note_id='" . $note['id'] . "'";
			$this->query($query);
			$attachments = $this->selectAll('');

			$notes[$count]['attachments'] = $attachments;
			$count++;
		}

		return $notes;
	}

	/***************************************************************************
		Function Name - addNote()
		Parameters - data - array of note data to be inserted
		Purpose - To add note to the system
		Return - flag to indicate success or failure
		Developer - Shankar Kanase
	 ***************************************************************************/
	public function addNote($data)
	{
		$this->table('tb_notes');
		$this->parameters($data);
		$id = $this->insert();

		return $id;
	}

	/***************************************************************************
		Function Name - addAttachment()
		Parameters - data - array of attachment data to be inserted
		Purpose - To add attachment to the system
		Return - flag to indicate success or failure
		Developer - Shankar Kanase
	 ***************************************************************************/
	public function addAttachment($data)
	{
		$this->table('tb_attachment');
		$this->parameters($data);
		$this->insert();
	}
}

var taskController = (function() {
	var Task = function(id, name, deadlineFh) {
		this.id = id
		this.name = name,
		this.deadlineFh = deadlineFh
		//this.status = FALSE
	};

	var data = {
		allTasks: []
	};

	return {
		addItem: function(taskName, taskDeadline) {
			var newTask, ID;

			if (data.allTasks.length >0) {
				ID = data.allTasks[data.allTasks.length - 1].id + 1;
			} else {
				ID = 0;
			}

			newTask = new Task(ID, taskName, taskDeadline);
			data.allTasks.push(newTask);
			return newTask;

		},

		deleteItem: function(taskId) {
			var ids;

			ids = data.allTasks.map(function(current) {
				return current.id;
			});

			index = ids.indexOf(taskId);

			if(index !== -1) {
				data.allTasks.splice(index, 1);
			}
		},

		// passDataToCI: function() {
		// 	var xhr = new XMLHttpRequest();
		// 	xhr.onreadystatechange = function() {
		// 	    if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
		// 	        // this is where the return information is
		// 	        //alert('Status: '+xhr.status+' Response: '+xhr.responseText);
		// 	        console.log(xhr.responseText)
		// 	    }
		// 	}

		// 	xhr.open('POST', 'tasks/create', true);
		// 	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		// 	xhr.send('dataNumber=Engine Check');
		// },

		testing: function() {
			//console.log(data);
			return data;
		}
	};

})();

var UIController = (function() {
	var DOMstrings = {
		inputTask: 'inputTask',
		inputDeadline: 'inputDeadline',
		addBtn: 'add-btn',
		tableBody: 'table-body',
		saveBtn: 'save-btn'
	};

	return {
		getInput: function() {
			return {
				name: document.getElementById(DOMstrings.inputTask).value,
				deadline: document.getElementById(DOMstrings.inputDeadline).value
			}
		},

		addListItem: function(obj) {
			var html, newHtml, el;

			html = '<tr class="task-item" id="task-%id%"><th scope="row">%taskId%</th><td>%taskName%</td><td>%taskDeadlineFh%</td><td><button class="btn btn-outline-danger btn-sm">X</button></td></tr>';
			newHtml = html.replace('%id%', obj.id);
			newHtml = newHtml.replace('%taskId%', obj.id);
			newHtml = newHtml.replace('%taskName%', obj.name);
			newHtml = newHtml.replace('%taskDeadlineFh%', obj.deadlineFh);

			el = document.getElementById(DOMstrings.tableBody);
			el.insertAdjacentHTML('beforeend', newHtml);

		},

		deleteListItem: function(selectorID) {
			el = document.getElementById(selectorID);
			el.parentNode.removeChild(el);
		},

		clearFields: function() {
			document.getElementById(DOMstrings.inputTask).value = "";
			document.getElementById(DOMstrings.inputDeadline).value = "";
			document.getElementById(DOMstrings.inputTask).focus();
		},

		getDOMstrings: function() {
			return DOMstrings;
		}
	}
})();

var controller = (function(taskCtrl, UICtrl) {
	
	var setupEventListener = function() {
		var DOM = UICtrl.getDOMstrings();

		document.getElementById(DOM.addBtn).addEventListener('click', ctrlAddInputs);
		document.getElementById(DOM.tableBody).addEventListener('click', ctrlDeleteItem);
		//document.getElementById(DOM.saveBtn).addEventListener('click', taskCtrl.passDataToCI);
	};

	var ctrlAddInputs = function() {
		var inputData, newItem;

		inputData = UICtrl.getInput();
		if (inputData.name !== "" && !isNaN(inputData.deadline) && inputData.deadline > 0) {
			newItem = taskCtrl.addItem(inputData.name, inputData.deadline);
			UICtrl.addListItem(newItem);
			UICtrl.clearFields();
		}
	};

	var ctrlDeleteItem = function(event) {
		var item, itemID, splitID, ID;

		item = event.target.parentNode.parentNode;
		itemID = event.target.parentNode.parentNode.id;

		if (itemID && item.matches('tr.task-item')) {
			splitID = itemID.split('-');
			ID = parseInt(splitID[1]);
			taskCtrl.deleteItem(ID);
			UICtrl.deleteListItem(itemID);
		}

	};

	return {
		init: function() {
			console.log('App has started')
			setupEventListener();
		}
	}

})(taskController, UIController);

controller.init();

//AJAX - send tasks to Codeigniter's Tasks Controller
$('#save-btn').on('click', function() {
	var dataTasks = taskController.testing().allTasks;
	console.log(dataTasks);
	//event.preventDefault();

	if (Object.keys(dataTasks).length > 0) {
		$.ajax(
		{
			type: 'POST',
			//url is needed?
			//url: '<?php echo base_url(); ?>tasks/create',
			data: { 'dataAjax': dataTasks },
			success: function(res)
			{
				console.log(res);
			},
			error: function()
			{
				console.log('Error!');
			}
		}
	);
	}
});

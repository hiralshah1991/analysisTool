
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	<script src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css">
	<style>
		
	</style>
</head>

<div id="example"></div>
<button name="save" value="1">Save</button>

<script type="text/javascript">
{literal}


/*var data = [
	  ['Date','0:00','0:15','0:30','0:45','1:00','1:15','1:30','1:45','2:00','2:15','2:30','2:45','3:00','3:15',
		    '3:30','3:45','4:00','4:15','4:30','4:45','5:00','5:15','5:30','5:45','6:00','6:15','6:30','6:45',
		    '7:00','7:15','7:30','7:45','8:00','8:15','8:30','8:45','9:00','9:15','9:30','9:45','10:00','10:15',
		    '10:30','10:45','11:00','11:15','11:30','11:45','12:00','12:15','12:30','12:45','13:00','13:15','13:30',
		    '13:45','14:00','14:15','14:30','14:45','15:00','15:15','15:30','15:45','16:00','16:15','16:30',
		    '16:45','17:00','17:15','17:30','17:45','18:00','18:15','18:30','18:45','19:00','19:15','19:30','19:45',
		    '20:00','20:15','20:30','20:45','21:00','21:15','21:30','21:45','22:00','22:15','22:30','22:45','23:00','23:15','23:30','23:45'],
	  ['2017', 10, 11, 12, 13],
	  ['2018', 20, 11, 14, 13],
	  ['2019', 30, 15, 12, 13]
	];*/
	
	var data = [['Date', '0','1','2','3'],
				['01/01/2019','','','',''],
				['01/02/2019','','','','']];

	var container = document.getElementById('example');
	var hot = new Handsontable(container, {
	  data: data,
	  rowHeaders: true,
	  colHeaders: true,
	  filters: true,
	  dropdownMenu: true,
	  licenseKey: 'non-commercial-and-evaluation'
	});
	
	
	$('button[name=save]').click(function () {
		alert("test");
		alert(hot.getData());
	    $.ajax({
	        url: "interactiveTable.php",
	        data: {"data": hot.getData()}, //returns all cells' data
	        type: 'POST',
	        success: function (data) {
	            alert(data);
	        },
	        error: function () {
	            console.log('Error');
	        }
	    });
	});

{/literal}
</script>
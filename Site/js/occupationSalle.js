
	google.load('visualization', '1', {packages: ['corechart']});
	google.setOnLoadCallback(drawMouseoverVisualization);

	// barsVisualization must be global in our script tag to be able
	// to get and set selection.
	var barsVisualization;
	
	function drawMouseoverVisualization()
	{
		var data = new google.visualization.DataTable();
			data.addColumn('string', 'Year');
			data.addColumn('number', 'Score');
			data.addRows([
			  ['2005',3.6],
			  ['2006',4.1],
			  ['2007',3.8],
			  ['2008',3.9],
			  ['2009',4.6]
		]);

		barsVisualization = new google.visualization.ColumnChart(document.getElementById('mouseoverdiv'));
		barsVisualization.draw(data, null);

		// Add our over/out handlers.
		google.visualization.events.addListener(barsVisualization, 'onmouseover', barMouseOver);
		google.visualization.events.addListener(barsVisualization, 'onmouseout', barMouseOut);
	}

	function barMouseOver(e)
	{
		barsVisualization.setSelection([e]);
	}

	function barMouseOut(e)
	{
		barsVisualization.setSelection([{'row': null, 'column': null}]);
	}

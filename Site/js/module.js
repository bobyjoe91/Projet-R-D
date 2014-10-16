
function loadSeanceList()
{
	var codeModule = $('#module :selected').val();
	
	/* fonction recuperant la liste des groupe dans lequel n'est pas un utilisateur */
	createSeanceTable = function(seance)
	{
		$('#tableContent').empty();
		if(seance.length)
		{
			for(i=0; i<seance.length; i++)
			{
				var ligne = "<tr>";
				var seanceInfo = seance[i].split("#");
				for(j=0; j<seanceInfo.length; j++)
				{
					ligne += "<td>";
					if (j == (seanceInfo.length - 1))
					{
						if (seanceInfo[j] == 1)
						{
							ligne += "<span class='glyphicon glyphicon-ok-circle'></span>"
						}
					}
					else
					{
						ligne += seanceInfo[j];
					}
					ligne += "</td>";
				}
				ligne += "</tr>";
				
				$('#tableContent').append(ligne);
			}
		}
	}
	
	$.ajax({
		type: "POST",
		url: "./script/getSeanceByUserAndModule.php",
		data: {module : codeModule},
		cache: false,
		dateType: 'text',
		success: function(data)
		{
			createSeanceTable(data.split("~"));
		},
		error: function(data)
		{
			alert(data);
		}
	});
	
	return false;
}
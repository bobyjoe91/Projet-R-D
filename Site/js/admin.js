function displayDroits()
{
		var codeProf = $('#profs :selected').val();
		
		$.ajax({
			type: "POST",
			url: "./script/getDroitsByCodeProf.php",
			data: {
				code: codeProf,
			},
			dataType: "json"
		})
		.done(function(elem)
		{
			if (elem.admin == 1)
			{
				$("#admin").addClass("checked");
			}
			else
			{
				$("#admin").removeClass("checked");
			}
			
			if (elem.giseh == 1)
			{
				$("#giseh").addClass("checked");
			}
			else
			{
				$("#giseh").removeClass("checked");
			}
			
			if (elem.salle == 1)
			{
				$("#bilan_salle").addClass("checked");
			}
			else
			{
				$("#bilan_salle").removeClass("checked");
			}
			
			if (elem.bilan_formation == 1)
			{
				$("#bilan_formation").addClass("checked");
			}
			else
			{
				$("#bilan_formation").removeClass("checked");
			}
			
			if (elem.bilan_salle == 1)
			{
				$("#bilan_salle").addClass("checked");
			}
			else
			{
				$("#bilan_salle").removeClass("checked");
			}
			
			if (elem.bilan_salle == 1)
			{
				$("#bilan_salle").addClass("checked");
			}
			else
			{
				$("#bilan_salle").removeClass("checked");
			}
			
			if (elem.mes_droits == 1)
			{
				$("#droits").addClass("checked");
			}
			else
			{
				$("#droits").removeClass("checked");
			}
			
			if (elem.bilan_heure == 1)
			{
				$("#heures").addClass("checked");
			}
			else
			{
				$("#heures").removeClass("checked");
			}
			
			if (elem.pdf == 1)
			{
				$("#pdf").addClass("checked");
			}
			else
			{
				$("#pdf").removeClass("checked");
			}
			
			if (elem.rss == 1)
			{
				$("#rss").addClass("checked");
			}
			else
			{
				$("#rss").removeClass("checked");
			}
			
			if (elem.configuration == 1)
			{
				$("#configuration").addClass("checked");
			}
			else
			{
				$("#configuration").removeClass("checked");
			}
			
			if (elem.reservation == 1)
			{
				$("#reservation").addClass("checked");
			}
			else
			{
				$("#reservation").removeClass("checked");
			}
			
			if (elem.module == 1)
			{
				$("#module").addClass("checked");
			}
			else
			{
				$("#module").removeClass("checked");
			}
			
			if (elem.dialogue == 1)
			{
				$("#dialogue").addClass("checked");
			}
			else
			{
				$("#dialogue").removeClass("checked");
			}
		})
		.fail(function(elem)
		{
			alert("Appel AJAX impossible");
		});
}

$(document).ready(function()
{
	displayDroits();
	
	$('#modifyConfigForm').submit(function(event)
	{

        event.preventDefault();

        $.ajax({
                type: "POST",
                url: "./script/updateDroits.php",
                data: {
                    code: $('#profs :selected').val(),
					admin: $('#admin').val(),
					reservation: $('#reservation').val(),
					mes_droits : $('#droits').val(),
                    module  : $('#module').val(),
					bilan_heure : $("#heures").val(),
					configuration : $("#configuration").val(),
					rss : $("#rss").val(),
					bilan_heure_global : $("#bilan_heure_global").val(),
					bilan_formation : $("#bilan_formation").val(),
					pdf : $("#pdf").val(),
					giseh : $("#giseh").val(),
					dialogue : $("#dialogue").val(),
					salle : $("#salle").val()
                },
                dataType: "json"
            })
            .done(function(elem)
			{
                // connexion �chou�e
                $("#retourLoginJs")
                    .html("<span class='glyphicon glyphicon-ok-circle'></span> "  + elem)
                    .addClass('alert alert-success col-centered alert-dismissible')
            })
            .fail(function(elem)
			{
                alert("Appel AJAX impossible");
            });
    });
});
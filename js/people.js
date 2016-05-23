function sec() {

  jQuery.ajax({
	url:"http://192.168.56.101/refreshpeople.php",
	type: "GET",

	success: function (data, textStatus, xhr)
		{
			
			$('#refreshpeople').html(data);
		},
	error: function (xhr, textStatus, errorThrown)
		{
			$('#refreshpeople').html('ERROR');
		}
		
});

}

setInterval(sec, 10000);
function sec() {

  jQuery.ajax({
	url:"http://192.168.56.101/refresh.php",
	type: "GET",

	success: function (data, textStatus, xhr)
		{
			
			$('#refresh').html(data);
		},
	error: function (xhr, textStatus, errorThrown)
		{
			$('#refresh').html('ERROR');
		}
		
});

}

setInterval(sec, 1000);
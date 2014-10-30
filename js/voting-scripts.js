
jQuery(document).ready(function($)
	{
		
		
		$(document).on('click', '.tab-nav li', function()
			{
				$(".active").removeClass("active");
				$(this).addClass("active");
				
				var nav = $(this).attr("nav");
				
				$(".box li.tab-box").css("display","none");
				$(".box"+nav).css("display","block");
		
			})
		

		
		$(document).on('click', '.voting a', function()
			{
				
				var limit = $(this).attr("limit");
				var votetype = $(this).attr("class");
				var data_id = $(this).attr("data-id");
				
				$(".voting"+data_id+" .count").addClass("loding");
				$(".voting"+data_id+" .count").html("&nbsp;");
								
				

				
				jQuery.ajax(
					{
				type: 'POST',
				url: voting_ajax.voting_ajaxurl,
				data: {"action": "voting_ajax_result","data_id":data_id, votetype:votetype},
				success: function(data)
						{	
							$(".voting"+data_id+" .count").removeClass("loding");
							$(".voting"+data_id+" .count").html(data);
							
							
							if(limit == "single")
								{
									document.cookie="voting_limit["+data_id+"]=voted";
								}
							
							
							
						}
					});
						
						
						
			
				

				
				
				
				
				
				})

		
		

		
	
 		

	});	








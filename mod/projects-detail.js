/* start: projects detail page functionality */


$(document).ready(function(){
	if ( $('#slideshow-blog-post-type').length > 0 )
	{
		
		var thisId = $('#blog-post-type').find('li').attr('id');	
		var post_type = $('#blog-post-type ul#slider-post-type').attr('class'); /* this post_type is used to retrive posts */
		
		
		
		
		$('#ajax_loader').css({'display':'block'});
		$('#ajax_loader').html('<img src="../../../wp-content/themes/davidhowell/ajax/loader_latest.png">').load(function() {});
		$.ajax({
			url: "../../../wp-content/themes/davidhowell/ajax/projects/custom.php",
			data: {'thisid':thisId,'current':'true','postType':post_type},
			type: "POST",
			dataType: "json",
			success: function(data){
				if ( data.output != '' )
				{
					$('#blog-post-type').find('#slider-post-type li').fadeOut("fast",function(){
						/*start: setting width for whole dragger*/						
						$('#slider-post-type li').remove();
												
						$('#blog-post-type').find('#slider-post-type').append(data.output);											
						$('#slideshow-blog-post-type .handle').css({'width':'0px','left':'0px'});
						
						$('#blog-post-type').find('#slider-post-type li').show();
						
						drg = new Dragdealer('slideshow-blog-post-type',
						{
							loose: true,
							animationCallback: function(x, y)
							{
								/*var top = x * (menuWrapper.offsetHeight - cursor.offsetHeight);
								cursor.style.top = String(top) + 'px';*/
							}
						});						

						$('#slideshow-blog-post-type img').load(function(){
							var t_width = 0;
							$('#slideshow-blog-post-type img').each(function(index)
							{
								t_width += ($(this).width()+12);
							});
							$('#slideshow-blog-post-type .handle').css('width',t_width-11);
							
							$(this).fadeIn();
							drg.setBounds();
						});
						
						$('#slideshow-blog-post-type img').each(function(){
							var f = $(this);
							if ( f[0].complete )
							{
								t_width = 0;
								$('#slideshow-blog-post-type img').each(function(index)
								{
									t_width += ($(this).width()+12);
								});
								$('#slideshow-blog-post-type .handle').css('width',t_width-11);
								
								$(this).fadeIn();
								drg.setBounds();
							}
						});
						
						/* start: arrow hover effect */
						$(".bottom").mouseenter(function () {
							$('.moveleft').stop().fadeTo(250,1);
							$('.moveright').stop().fadeTo(250,1);	
						});
					 
						$(".bottom").mouseleave(function () {
							$('.moveleft').stop().fadeTo(200,0);
							$('.moveright').stop().fadeTo(200,0);	
						});
						/* end: arrow hover effect */

						thisId = data.thisid;

						/*end: setting width for whole dragger*/
					});
				}
				
				//remove loader
				$('#ajax_loader').html('');
			}
		});
		
	}
		
		
		
		
		
		
		
		
		/*
		var drag1 = new Dragdealer('slideshow-blog-post-type',
		{
			loose: true,
			animationCallback: function(x, y)
			{
			}
		});

		$('#slideshow-blog-post-type img').load(function(){
			var t_width = 0;
			$('#slideshow-blog-post-type img').each(function(index)
			{
				t_width += ($(this).width()+12);
			});
			t_width -= 11;
			
			$('#slideshow-blog-post-type .handle').css({'width':t_width+'px'});
			
			$(this).fadeIn();
			drag1.setBounds();
		});

		$('#slideshow-blog-post-type img').each(function(){
			f = $(this);
			//if ( f[0].complete )
			{
				t_width = 0;
				$('#slideshow-blog-post-type img').each(function(index)
				{
					t_width += ($(this).width() + 12);
				});
				
				t_width -= 11;

				$('#slideshow-blog-post-type .handle').css({'width':t_width+'px'});

				$(this).fadeIn();
				drag1.setBounds();
			}
		});			
				
	}
	
	/* start: scroll with hover effect */
	
	$("#blog-post-type .moveright").hover(function(){
		 $(this).parent().find('.handle').data('loop', true).stop().loopingAnimationRight1({ left : "-=10px"}, 10);
	}, function(){
		 $(this).parent().find('.handle').data('loop', false);
		 // Now our animation will stop after fully completing its last cycle
	});

	$("#blog-post-type .moveleft").hover(function(){
		$(this).parent().find('.handle').data('loop', true).stop().loopingAnimationLeft1({ left : "+=10px"}, 10);
	}, function(){
		 $(this).parent().find('.handle').data('loop', false);
		 // Now our animation will stop after fully completing its last cycle
	}); /* end: scroll with hover effect */
	
	/* start: next project with ajax funtionality */
	

	$('#blog-post-type .top_panel').find('.sign-next').click(function(){
		$('#ajax_loader').css({'display':'block'});
		$('#ajax_loader').html('<img src="../../../wp-content/themes/davidhowell/ajax/loader_latest.png">').load(function() {});
		$.ajax({
			url: "../../../wp-content/themes/davidhowell/ajax/projects/custom.php",
			data: {'thisid':thisId,'postType':post_type},
			type: "POST",
			dataType: "json",
			success: function(data){
				if ( data.output != '' )
				{
					$('#blog-post-type').find('#slider-post-type li').fadeOut("fast",function(){
						/*start: setting width for whole dragger*/						
						$('#slider-post-type li').remove();
						
						
						$('#blog-post-type').find('#slider-post-type').append(data.output);											
						$('#slideshow-blog-post-type .handle').css({'width':'0px','left':'0px'});
						
						$('#blog-post-type').find('#slider-post-type li').fadeIn();
						
						
						drg = new Dragdealer('slideshow-blog-post-type',
						{
							loose: true,
							animationCallback: function(x, y)
							{
								/*var top = x * (menuWrapper.offsetHeight - cursor.offsetHeight);
								cursor.style.top = String(top) + 'px';*/
							}
						});
						

						$('#slideshow-blog-post-type img').load(function(){
							var t_width = 0;
							$('#slideshow-blog-post-type img').each(function(index)
							{
								t_width += ($(this).width()+12);
							});
							$('#slideshow-blog-post-type .handle').css('width',t_width-11);
							
							$(this).fadeIn();
							drg.setBounds();
						});
						
						$('#slideshow-blog-post-type img').each(function(){
							var f = $(this);
							if ( f[0].complete )
							{
								t_width = 0;
								$('#slideshow-blog-post-type img').each(function(index)
								{
									t_width += ($(this).width()+12);
								});
								$('#slideshow-blog-post-type .handle').css('width',t_width-11);
								
								$(this).fadeIn();
								drg.setBounds();
							}
						});
						
						/* start: arrow hover effect */
						$(".bottom").mouseenter(function () {
							$('.moveleft').stop().fadeTo(250,1);
							$('.moveright').stop().fadeTo(250,1);	
						});
					 
						$(".bottom").mouseleave(function () {
							$('.moveleft').stop().fadeTo(200,0);
							$('.moveright').stop().fadeTo(200,0);	
						});
						/* end: arrow hover effect */

						thisId = data.thisid;

						/*end: setting width for whole dragger*/
					});
				}
				
				//remove loader
				$('#ajax_loader').html('');
			}
		});
	});	
	/* end: next project with ajax funtionality */
	
	/* start: arrow hover effect */
	$(".bottom").mouseenter(function () {
		$('.moveleft').stop().fadeTo(250,1);
		$('.moveright').stop().fadeTo(250,1);	
	});
 
	$(".bottom").mouseleave(function () {
		$('.moveleft').stop().fadeTo(200,0);
		$('.moveright').stop().fadeTo(200,0);	
	});
	/* end: arrow hover effect */
	
	/* start: plus/minus sign activities */
	var ua = navigator.userAgent,
    	event = (ua.match(/iPad/i)) ? "touchstart" : "click";
		
	$('#blog-post-type li .sign .plus').live(event, function(){
		$(this).parent().parent().find('.blogdetails').fadeIn("slow");
		$(this).removeClass('plus');
		$(this).addClass('minus');
	});
		
	$('#blog-post-type li .sign .minus').live(event, function(){
		
		$(this).parent().parent().find('.blogdetails').fadeOut("slow");
		$(this).removeClass('minus');
		$(this).addClass('plus');
					
	});	
	/* end: plus/minus sign activities */
	
	
	

}); 
/* end: projects detail page functionality */


$(document).ready(function () {
										$('.dropdown-toggle').dropdown();
											$('.simple').mouseover(function(){
													$(this).siblings().removeClass('open');
											});
											$('.dropdown').mouseover(function(){
													
													$(this).addClass('open');
													var id = $(this).attr('id');
													$(this).siblings().removeClass('open');
													// alert(id);
													// $('li:#not(.'+id+'.)')removeClass('open');
													
											});

											$('.dropdown ul').mouseleave(function(){
												$(this).delay(1000).removeClass('open');
												
											});

											$('.navb').mouseleave(function(){
												$('ul.nav li.open').delay(1000).removeClass('open');
											});
											
										});

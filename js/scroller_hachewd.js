$( window ).ready(function() {
	var showmap = 0;
	var widthSlider = $('#slider').width();
	var contenedor = $('#content');
	var cantElements = contenedor.find('article').length;
	var articles = contenedor.find('article');
	var widthContent = widthSlider * cantElements;
	var pos;
	var posArt = new Array();
	var Art = new Array();
	$('.rotador').width(widthSlider+40);
	articles.width(widthSlider-2);
	contenedor.width(widthContent);

	$('#next').click(function(){
		pos = contenedor.position();
		if(pos.left == -(widthContent-widthSlider) ){
			console.log(pos.left);
		}
		else{
			contenedor.animate({
				left: '-=' + widthSlider+'',
			});
			
		}
	});

	$('#prev').click(function(){
		pos = contenedor.position();
		if(pos.left >= 0){
			console.log(pos.left);
		}
		else{
			contenedor.animate({
				left: '+='+ widthSlider+'',
			});
		}
	});

	for(i=0;i<cantElements;i++){
		Art[i] = $('.art' + i);
		//posArt[i]= posA.left;
		posArt[i] = Art[i].position();
		$('.link'+ i + '').click(pasar(i));
	}
	function pasar(num){
		Art[num] = $('.art' + num);
		//posArt[i]= posA.left;
		posArt[num] = Art[num].position();

		$('.link'+ num + '').click(function(){
			contenedor.animate({
				left: -posArt[num].left,
				//console.log(posArt[i].left);
			});
		});
	};

	$('#showmap').click(function(){
		if(showmap == 0){
			$('#encuentranos').animate({
				height: 800,
			});
			$(this).removeClass( "icon-arrow-down" ).addClass( "icon-arrow-up" );
			showmap = 1;
		}
		else{
			$('#encuentranos').animate({
				height: 100,
			});
			$(this).removeClass( "icon-arrow-up" ).addClass('icon-arrow-down');
			showmap = 0;
		}
	});

});
	
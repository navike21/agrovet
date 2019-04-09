$(document).ready(function() {
	var plantas = $("#plantas").html();
	if (plantas != undefined) {
		$("#plantas").bxSlider({
			mode: 'horizontal',
			minSlides: 1,
			maxSlides: 1,
			slideWidth: 10000,
			infiniteLoop: false,
			pager: false,
			hideControlOnEnd: true
		});
	}
	var novedades = $("#novedades").html();
	if (novedades != undefined) {
		$("#novedades").bxSlider({
			mode: 'horizontal',
			minSlides: 1,
			maxSlides: 1,
			slideWidth: 10000,
			infiniteLoop: false,
			pager: false,
			adaptiveHeight: true,
			hideControlOnEnd: true
		});
	}

	var historia = $("#historia_wrapp").html();
	if (historia != undefined) {
		$('.slider-nav').slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			asNavFor: '.slider-for',
			dots: false,
			centerMode: true,
			infinite: false,
			focusOnSelect: true,
			responsive: [
				{
			        breakpoint: 500,
			        settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						asNavFor: '.slider-for',
						dots: false,
						centerMode: true,
						infinite: false,
						focusOnSelect: true,
			        }
			    },
				{
			        breakpoint: 800,
			        settings: {
						slidesToShow: 3,
						slidesToScroll: 1,
						asNavFor: '.slider-for',
						dots: false,
						centerMode: true,
						infinite: false,
						focusOnSelect: true,
			        }
			    }

			]
		});
		$('.slider-for').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			infinite: false,
			asNavFor: '.slider-nav'
		});

	}

	var novedades_home = $("#novedades_home").html();
	if (novedades_home != undefined) {
		$("#novedades_home").slick({
			infinite: false,
			slidesToShow: 3,
			slidesToScroll: 1,
			responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: false,
					dots: false
				}
		    },
			{
				breakpoint: 700,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					infinite: false,
					dots: false,
					autoplaySpeed: 2000
				}
		    }
			]
		});
	}

	var servicio_home = $("#servicio_home").html();
	if (servicio_home != undefined) {
		$("#servicio_home").slick({
			infinite: false,
			slidesToShow: 5,
			slidesToScroll: 1,
			responsive: [
				{
					breakpoint: 1200,
					settings: {
						slidesToShow: 4,
						slidesToScroll: 1,
						infinite: false,
						dots: false
					}
			    },
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1,
						infinite: false,
						dots: false
					}
			    },
				{
					breakpoint: 800,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2,
						infinite: false,
						dots: false,
						autoplaySpeed: 2000
					}
			    },
				{
					breakpoint: 470,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						infinite: false,
						dots: false,
						autoplaySpeed: 2000
					}
			    }
			]
		});
	}
	scrollFunction();
	window.onscroll = function() {scrollFunction()};

	// alert($(window).width());

	//Productos
	var productos = $(".productos").html();
	if (productos != undefined) {
		$(".productos").find("figure").each(function(index, el) {
			var image = $(this).find('img').attr('src');
			$(this).css({
				'background': 'url('+image+') no-repeat center center',
				'background-size': 'auto 100%'
			});
		});
	}
	//novedades
	var novedad_home = $(".novedad_home").html();
	if (novedad_home != undefined) {
		$(".novedad_home").each(function(index, el) {
			var image = $(this).find('img').attr('src');
			$(this).find('img').css({
				'width': '1px',
				'height': '1px',
				'opacity': 0
			});
			$(this).find('figure').css({
				'background': 'url('+image+') no-repeat center center',
				'background-size': 'cover'
			});
		});
	}

	//Servicios
	var servicios_wrapp = $(".servicios_wrapp").html();
	if (servicios_wrapp != undefined) {
		$(".servicios_wrapp").find('.fotos_fondo').each(function(index, el) {
			var imgval = $(this).find('img').attr('src');
			$(this).css({
				'background': 'url('+imgval+') no-repeat center center',
				'background-size': 'cover'
			});
		});
	}

	var imagen_default = $(".custom-logo").attr('src');
	console.log(imagen_default);
	var imagen_footer = $("footer").find('img').attr('src');

	function scrollFunction() {

	    if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
			$("#navbar").addClass('header_slide').find('img').attr('src', imagen_footer);
	        // document.getElementById("navbar").style.top = "0";
	    } else {
			$("#navbar").removeClass('header_slide').find('img').attr('src', imagen_default);
	        // document.getElementById("navbar").style.top = "-50px";
	    }
	};

	var pilares_nosotros = $("#pilares_nosotros").html();
	if (pilares_nosotros != undefined) {
		$("#pilares_nosotros").find('ul').addClass('section_top_center lista_pilares');
	}

	var valores_nosotros = $("#valores_nosotros").html();
	if (valores_nosotros != undefined) {
		$("#valores_nosotros").find('ul').addClass('section_middle_center valores');
	}

	var comprometidos_calidad = $("#comprometidos_calidad").html();
	if (comprometidos_calidad != undefined) {
		$("#comprometidos_calidad").find('.textwidget').addClass('section_middle_center');
	}

	var certificacion_nosotros = $("#certificacion_nosotros").html();
	if (certificacion_nosotros != undefined) {
		$("#certificacion_nosotros").find('.textwidget').addClass('section_middle_center');
	}

	//Detalle de PRODUCTOS
	lista_producto = $("#lista_producto").html();
	if (lista_producto != undefined) {
		$("#lista_producto").find("li").on('click', function(event) {
			event.preventDefault();
			var foto_animal = $(this).data('foto_animal');
			var detalle = $(this).data('detalle');
			// alert(detalle);
			$("#lista_producto").find("li").removeClass('producto_activado');
			$(this).addClass('producto_activado');

			$("#detalle_producto_seleccionado").find('li').removeClass('producto_activado');
			$("#"+detalle).addClass('producto_activado');
		});
	}

	var open_modal = function( idtag, overflow ){
	    if (overflow == "") {
	        overflow = "overflow";
	    }
	    if (idtag == "") {
	        console.log("ERROR: Debe definir el parámetro idtag usando data-idtagmodal");
	    }
	    else{
	        $("."+overflow).addClass('fadeInoverflow').css('z-index', '999998');
	        $("#"+idtag).addClass('fadeInmodal').css('z-index', '999999');
	    }
	}

	var close_modal = function( idtag, overflow ){
	    if (overflow == "") {
	        overflow = "overflow";
	    }
	    if (idtag == "") {
	        console.log("ERROR: Debe definir el parámetro idtag usando data-idtagmodal");
	    }
	    else{
	        $("."+overflow).addClass('fadeOutoverflow').removeClass('fadeInoverflow');
	        $("#"+idtag).addClass('fadeOutmodal').removeClass('fadeInmodal');
			setTimeout(function(){
				$("."+overflow).removeClass('fadeOutoverflow').css('z-index', '-1');
				$("#"+idtag).removeClass('fadeOutmodal').css('z-index', '-1');
			}, 700);
	    }
	}

	var modal_productos_func = function (){
		$("#lista_producto").find("li").on('click', function(event) {
			event.preventDefault();
			open_modal( "detalle_producto_seleccionado", "overflow" );
		});
		$(".close_modal").on('click', function(event) {
			event.preventDefault();
			close_modal( "detalle_producto_seleccionado", "overflow" );
		});
	};

	var modal_productos = function( widthscreen ){
		if (widthscreen <= 800) {
			$(".lista_producto").find("li").removeClass('producto_activado');
			modal_productos_func();
		}
		else{
			$(".activar_pro").addClass('producto_activado');
			$("#detalle_producto_seleccionado").removeClass('fadeoutmodal fadeInmodal');
			$(".overflow").removeClass('fadeOutmodal fadeInmodal');
		}
	};

	modal_productos( $(window).width() );

	$(window).resize(function(event) {
		var ancho_pantalla = $(this).width();
		modal_productos( ancho_pantalla );
		// console.log(ancho_pantalla);
	})


	//Menú Home
	var a = 1;
	$("#menu-menu-principal > li").each(function(index, el) {
		// console.log(a);
		if (a == 4) {
			$(this).removeClass('current_page_item');
		}
		a ++;
	});

	var pathname = window.location.pathname;
	console.log(pathname);

	if (pathname == '/servicios/'){
		$('#menu-item-53 > ul > li > a').click(function(e){
			var yo = $(this).attr('href');
			console.log(yo);
		});
	}
});

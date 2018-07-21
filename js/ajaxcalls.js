$(function() {
	let isLoaded = false;
	let backgroundImg;
	let carouselImages;
	let wW = $( window ).innerWidth();

	$( window ).on( 'load', function() {
		wW = $( window ).innerWidth();
		if ( wW >= 992 ) {
			isLoaded = true;
		}

		jQuery.ajax({
			url : ajaxObj.ajaxURL,
			method : 'POST',
			data : {
				action : 'getCarouselImages',
			},
			success : function( carouselImg ) {
				carouselImages = carouselImg;
				outputCarouselImages( carouselImages );
			}
		});
	});

	function outputImage( backgroundImg ) {
		if ( backgroundImg ) {
			if ( wW >= 992 ) { //&& isLoaded === false ) {
				$('.ava-background-image').append(
					'<div style="background: url(' + backgroundImg + ');" />'
				);
			}
		}
	}

	function outputCarouselImages( carouselImages ) {
		if ( wW >= 992 ) { //&& isLoaded === false ) {
			$('#front-page-carousel').append( carouselImages );
		}
	}

	$( window ).on( 'resize', function() {
		wW = $( window ).innerWidth();
		if ( wW >= 992 && isLoaded === false ) {
			isLoaded = true;
			outputImage( backgroundImg );
			outputCarouselImages( carouselImages );
		}
	});
});
//@prepros-append ajaxcalls.js

/*
prepros-append ../MDB-Pro/js/popper.min.js
prepros-append ../MDB-Pro/js/bootstrap.js
prepros-append ../MDB-Pro/js/mdb.js
*/

$( () => {
	$( window ).on( 'load', onLoad );
	$( window ).on( 'resize', onResize );
	//$( window ).on( 'scroll', onScroll );
});

function onLoad() {
	fireOnce();
	headerFunctions();
	// Instantiante Carousel
	$( '#front-page-carousel' ).carousel({
		interval: 7000,
	});
	// Instantiante Carousel
	$( 'select' ).material_select();
}

function onResize() {
	headerFunctions();
}

function onScroll() {
	headerFunctions();
}

function headerFunctions() {
	let wW = $( window ).outerWidth();
	let headerHeight = $( 'nav.navbar' ).outerHeight();
	let siteContent = $( '.site-content' );
	let frontPageCarousel = $( '#front-page-carousel' );
	let blogHome = $( '.blog .site-content' );
	frontPageCarousel.css( 'margin-top', headerHeight );
	if ( ! frontPageCarousel.length || wW < 767 ) {
		siteContent.css( 'margin-top', headerHeight );
	} else {
		siteContent.css( 'margin-top', 0 );
	}
}

function fireOnce() {
	$( '.page-item .page-numbers' ).addClass( 'page-link' );
	$( '.nav-links div a' ).addClass( 'btn' );
}
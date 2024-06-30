/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
	const siteNavigation = document.getElementById( 'main-navigation' );

	const menu = document.getElementById( 'main-menu' );

	const button = document.getElementById('button-toggle');
	
	const icon = button.querySelector('.bi');

	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'toggled' );

		if ( icon.classList.contains("bi-list") ) {
			icon.classList.remove("bi-list")
			icon.classList.add("bi-x-lg")
		} else if (icon.classList.contains("bi-x-lg")) {
			icon.classList.remove("bi-x-lg")
			icon.classList.add("bi-list")
		}
	} );

}() );

// const myCarouselElement = document.querySelector('#carouselExampleCaptions')

// const carousel = new bootstrap.Carousel(myCarouselElement)
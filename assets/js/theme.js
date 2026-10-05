( function () {
	function menu() {
		return document.querySelector( '.tw-nav' );
	}

	function button() {
		return document.querySelector( '.tw-nav-toggle' );
	}

	function setOpen( open ) {
		var nav = menu();
		var toggle = button();
		if ( ! nav || ! toggle ) {
			return;
		}
		nav.classList.toggle( 'is-open', open );
		toggle.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
	}

	document.addEventListener( 'click', function ( event ) {
		var toggle = event.target.closest( '.tw-nav-toggle' );
		if ( toggle ) {
			var nav = menu();
			setOpen( !! nav && ! nav.classList.contains( 'is-open' ) );
			return;
		}
		if ( event.target.closest( '.tw-nav a' ) || ! event.target.closest( '.tw-nav' ) ) {
			setOpen( false );
		}
	} );

	document.addEventListener( 'keydown', function ( event ) {
		if ( 'Escape' === event.key ) {
			setOpen( false );
		}
	} );
}() );

( function ( api ) {
	api.bind( 'ready', function () {
		api.control.each( function ( control ) {
			if ( ! /_coming_soon$/.test( control.id ) ) {
				return;
			}

			var imageControl = api.control( control.id.replace( /_coming_soon$/, '_image' ) );
			if ( ! imageControl ) {
				return;
			}

			var setting = api( control.id );
			var sync = function () {
				imageControl.active.set( ! setting.get() );
			};

			sync();
			setting.bind( sync );
		} );
	} );
}( wp.customize ) );

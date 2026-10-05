( function ( api ) {
	var map = {
		tw_color_primary: '--tw-primary',
		tw_color_primary_hover: '--tw-primary-hover',
		tw_color_accent: '--tw-accent',
		tw_color_heading: '--tw-heading',
		tw_color_muted: '--tw-muted',
		tw_color_surface: '--tw-surface',
		tw_color_cta_text: '--tw-cta-text'
	};

	Object.keys( map ).forEach( function ( settingId ) {
		api( settingId, function ( setting ) {
			setting.bind( function ( value ) {
				if ( value ) {
					document.documentElement.style.setProperty( map[ settingId ], value );
				}
			} );
		} );
	} );
}( wp.customize ) );

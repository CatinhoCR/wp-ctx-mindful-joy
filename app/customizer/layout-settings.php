<?php 

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// Register Panel
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
add_filter( 'tokoo_new_customizer_data', 'catix_customizer_layout_settings' );
function catix_customizer_layout_settings( $customizer_options ) {

	/* ==================================================== *
	 *  Site Section  										*
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'catix_layout_settings',
		'label'		=> esc_html__( 'Layout', 'catix' ),
		'priority'	=> 3,
		'type' 		=> 'section'
	);

		/* ============================================================ *
		 *  Layout Data  													*
		 * ============================================================ */
		$customizer_options[] = array(
			'slug'		=> 'catix_global_layout',
			'default'	=> 'fullwidth',
			'priority'	=> 1,
			'label'		=> esc_html__( 'Global Site Layout', 'catix' ),
			'section'	=> 'catix_layout_settings',
			'output'    => false,
			'transport'	=> 'refresh',
			'type' 		=> 'select',
			'choices'	=> array(
				'fullwidth'			=> esc_html__( 'Fullwidth', 'catix' ),
				'left-sidebar'		=> esc_html__( 'Left Sidebar', 'catix' ),
				'right-sidebar'		=> esc_html__( 'Right Sidebar', 'catix' ),
			)
		);


	return $customizer_options;
}


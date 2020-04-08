<?php

# Check: https://onexa.nl/wordpress/toolbar-link-redis-object-cache/

/**
 * Add a link to the Admin Toolbar to easily flush the Redis cache (Redis Object Cache plugin)
 * 
 * @author Hiranthi Herlaar, onexa.nl
 * 
 * @var $wp_admin_bar > https://codex.wordpress.org/Class_Reference/WP_Admin_Bar
**/
function redis_add_toolbar_link( $wp_admin_bar )
{
	if ( current_user_can( 'manage_options' ) && is_plugin_active( 'redis-cache/redis-cache.php' ) )
	{
		$RedisObjectCache = new RedisObjectCache;
		
		if ( $RedisObjectCache->get_redis_status() )
		{
			
			$RedisPage = is_multisite() ? 'settings.php?page=redis-cache' : 'options-general.php?page=redis-cache';
			
			// Flush Redis Cache trough WP Rocket Admin Bar Menu
			$args = array(
				'id'     => 'flush-redis-cache',
				'title'  => __( 'Flush Redis Cache' ) . '',
				'parent' => false,
				'href'  => wp_nonce_url( network_admin_url( add_query_arg( 'action', 'flush-cache', $RedisPage ) ), 'flush-cache' )
			);
			
			$wp_admin_bar->add_node( $args );
		
		} // end REDIS
	}
} // end add_toolbar_link
add_action( 'admin_bar_menu', 'redis_add_toolbar_link', 999 );

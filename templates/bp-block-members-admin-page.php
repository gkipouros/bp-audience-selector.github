<?php
/**
 * This template is used in class-admin to load the admin page content.
 *
 */
$blocked_members_table = '';
if ( function_exists( 'bp_core_fetch_avatar' ) ) {
    $blocked_members_table = new BP_Block_Member_Admin_Table();
}

?>
	<div class="wrap">
		<h1><?php _e( 'BuddyPress Blocked Member List', 'bp-audience-selector' ); ?></h1>
        <?php if ( ! empty( $blocked_members_table ) ) { ?>
			<form id="bp-blocked-members-table" method="get"  >
				<input type="hidden" name="page" value="bp-audience-selector"/>
                <?php
                $blocked_members_table->prepare_items();
                $blocked_members_table->search_box( __( 'Search', 'bp-audience-selector' ), 'search' );
                $blocked_members_table->display();
                ?>
			</form>
            <?php
        } else {
            __( 'Unfortunately, BuddyPress is disabled!', 'bp-audience-selector' );

        }
        ?>
	</div>
<?php

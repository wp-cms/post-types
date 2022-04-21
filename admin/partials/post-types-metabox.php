<?php

/**
 *
 * This file is used to markup the content of the metabox in Custom Post Types.
 *
 * @link       https://profiles.wordpress.org/pattihis/
 * @since      1.0.0
 *
 * @package    post_type
 * @subpackage post_type/admin/partials
 */

wp_nonce_field( 'post_type_meta_box_nonce_action', 'post_type_meta_box_nonce_field' );

?>
<table class="post_types">
    <tr>
        <td class="first">
            <label for="post_type_name"><span class="required">*</span> <?php _e( 'CPT Name', 'post-types' ); ?></label>
            <input type="text" name="post_type_name" id="post_type_name" class="widefat" tabindex="1" value="<?php echo $post_type_name; ?>" />
            <p><?php _e( 'Must not exceed 20 characters and may only contain lowercase alphanumeric characters, dashes, and underscores', 'post-types' ); ?></p>
        </td>
        <td>
            <label for="post_type_label"><?php _e( 'Label', 'post-types' ); ?></label>
            <input type="text" name="post_type_label" id="post_type_label" class="widefat" tabindex="2" value="<?php echo $post_type_label; ?>" />
            <p><?php _e( 'Name of the post type shown in the menu. Usually plural.', 'post-types' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="post_type_singular_name"><?php _e( 'Singular Name', 'post-types' ); ?></label>
            <input type="text" name="post_type_singular_name" id="post_type_singular_name" class="widefat" tabindex="3" value="<?php echo $post_type_singular_name; ?>" />
            <p><?php _e( 'Name for one object of this post type.', 'post-types' ); ?></p>
            <label for="post_type_custom_rewrite_slug"><?php _e( 'Rewrite Slug', 'post-types' ); ?></label>
            <input type="text" name="post_type_custom_rewrite_slug" id="post_type_custom_rewrite_slug" class="widefat" tabindex="4" value="<?php echo $post_type_custom_rewrite_slug; ?>" />
            <p><?php _e( 'Customize the permalink slug.', 'post-types' ); ?></p>
        </td>
        <td>
            <label for="post_type_description"><?php _e( 'Description', 'post-types' ); ?></label>
            <textarea name="post_type_description" id="post_type_description" class="widefat" tabindex="5" rows="4"><?php echo $post_type_description; ?></textarea>
            <p><?php _e( 'A short descriptive summary of what the post type is.', 'post-types' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="post_type_rewrite"><?php _e( 'Rewrite', 'post-types' ); ?></label>
            <select name="post_type_rewrite" id="post_type_rewrite" tabindex="6">
                <option value="1" <?php selected( $post_type_rewrite, '1' ); ?>><?php _e( 'Yes', 'post-types' ); ?> (<?php _e( 'default', 'post-types' ); ?>)</option>
                <option value="0" <?php selected( $post_type_rewrite, '0' ); ?>><?php _e( 'No', 'post-types' ); ?></option>
            </select>
            <p><?php _e( 'Triggers the handling of rewrites for this post type.', 'post-types' ); ?></p>
        </td>
        <td>
            <label for="post_type_withfront"><?php _e( 'With Front', 'post-types' ); ?></label>
            <select name="post_type_withfront" id="post_type_withfront" tabindex="7">
                <option value="1" <?php selected( $post_type_withfront, '1' ); ?>><?php _e( 'Yes', 'post-types' ); ?> (<?php _e( 'default', 'post-types' ); ?>)</option>
                <option value="0" <?php selected( $post_type_withfront, '0' ); ?>><?php _e( 'No', 'post-types' ); ?></option>
            </select>
            <p><?php _e( 'Should the permastruct be prepended with the front base.', 'post-types' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="post_type_public"><?php _e( 'Public', 'post-types' ); ?></label>
            <select name="post_type_public" id="post_type_public" tabindex="8">
                <option value="1" <?php selected( $post_type_public, '1' ); ?>><?php _e( 'Yes', 'post-types' ); ?> (<?php _e( 'default', 'post-types' ); ?>)</option>
                <option value="0" <?php selected( $post_type_public, '0' ); ?>><?php _e( 'No', 'post-types' ); ?></option>
            </select>
            <p><?php _e( 'Whether this post type is intended to be used publicly either via the admin interface or by front-end users.', 'post-types' ); ?></p>
        </td>
        <td>           
            <label for="post_type_has_archive"><?php _e( 'Has Archive', 'post-types' ); ?></label>
            <select name="post_type_has_archive" id="post_type_has_archive" tabindex="9">
                <option value="0" <?php selected( $post_type_has_archive, '0' ); ?>><?php _e( 'No', 'post-types' ); ?> (<?php _e( 'default', 'post-types' ); ?>)</option>
                <option value="1" <?php selected( $post_type_has_archive, '1' ); ?>><?php _e( 'Yes', 'post-types' ); ?></option>
            </select>
            <p><?php _e( 'Whether there should be post type archives.', 'post-types' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="post_type_exclude_from_search"><?php _e( 'Exclude From Search', 'post-types' ); ?></label>
            <select name="post_type_exclude_from_search" id="post_type_exclude_from_search" tabindex="10">
                <option value="0" <?php selected( $post_type_exclude_from_search, '0' ); ?>><?php _e( 'No', 'post-types' ); ?> (<?php _e( 'default', 'post-types' ); ?>)</option>
                <option value="1" <?php selected( $post_type_exclude_from_search, '1' ); ?>><?php _e( 'Yes', 'post-types' ); ?></option>
            </select>
            <p><?php _e( 'Whether to exclude this post type from front end search results.', 'post-types' ); ?></p>
        </td>
        <td>
            <label for="post_type_show_ui"><?php _e( 'Show UI', 'post-types' ); ?></label>
            <select name="post_type_show_ui" id="post_type_show_ui" tabindex="11">
                <option value="1" <?php selected( $post_type_show_ui, '1' ); ?>><?php _e( 'Yes', 'post-types' ); ?> (<?php _e( 'default', 'post-types' ); ?>)</option>
                <option value="0" <?php selected( $post_type_show_ui, '0' ); ?>><?php _e( 'No', 'post-types' ); ?></option>
            </select>
            <p><?php _e( 'Whether to generate UI for managing this post type in the admin', 'post-types' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="post_type_show_in_menu"><?php _e( 'Show in Menu', 'post-types' ); ?></label>
            <select name="post_type_show_in_menu" id="post_type_show_in_menu" tabindex="12">
                <option value="1" <?php selected( $post_type_show_in_menu, '1' ); ?>><?php _e( 'Yes', 'post-types' ); ?> (<?php _e( 'default', 'post-types' ); ?>)</option>
                <option value="0" <?php selected( $post_type_show_in_menu, '0' ); ?>><?php _e( 'No', 'post-types' ); ?></option>
            </select>
            <p><?php _e( 'Show this post type in its own top level menu. "Show UI" must be true.', 'post-types' ); ?></p>
        </td>
        <td>
            <label for="post_type_menu_position"><?php _e( 'Menu Position', 'post-types' ); ?></label>
            <input type="text" name="post_type_menu_position" id="post_type_menu_position" class="widefat" tabindex="13" value="<?php echo $post_type_menu_position; ?>" />
            <p><?php _e( 'The position in the menu order the post type should appear, e.g. 25. "Show in Menu" must be true.', 'post-types' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="post_type_icon_slug">
            <?php if ( $post_type_icon_slug ) { ?><span id="post_type_icon_slug_before" class="dashicons-before <?php echo $post_type_icon_slug; ?>"></span> <?php } ?>
            <?php _e( 'Slug Icon', 'post-types' ); ?>
            </label>
            <input type="text" name="post_type_icon_slug" id="post_type_icon_slug" class="widefat" tabindex="14" value="<?php echo $post_type_icon_slug; ?>" />
            <p><?php _e( 'This uses (<a href="https://developer.WordPress.org/resource/dashicons/">Dashicons</a>), e.g. dashicons-heart', 'post-types' ); ?></p>
        </td>
        <td>
            <label for="post_type_publicly_queryable"><?php _e( 'Publicly Queryable', 'post-types' ); ?></label>
            <select name="post_type_publicly_queryable" id="post_type_publicly_queryable" tabindex="15">
                <option value="1" <?php selected( $post_type_publicly_queryable, '1' ); ?>><?php _e( 'Yes', 'post-types' ); ?> (<?php _e( 'default', 'post-types' ); ?>)</option>
                <option value="0" <?php selected( $post_type_publicly_queryable, '0' ); ?>><?php _e( 'No', 'post-types' ); ?></option>
            </select>
            <p><?php _e( 'Whether queries can be performed on the front end for this post type', 'post-types' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="post_type_feeds"><?php _e( 'Feeds', 'post-types' ); ?></label>
            <select name="post_type_feeds" id="post_type_feeds" tabindex="16">
                <option value="0" <?php selected( $post_type_feeds, '0' ); ?>><?php _e( 'No', 'post-types' ); ?> (<?php _e( 'default', 'post-types' ); ?>)</option>
                <option value="1" <?php selected( $post_type_feeds, '1' ); ?>><?php _e( 'Yes', 'post-types' ); ?></option>
            </select>
            <p><?php _e( 'Should a feed permastruct be built for this post type.', 'post-types' ); ?></p>
        </td>
        <td>
            <label for="post_type_pages"><?php _e( 'Pages', 'post-types' ); ?></label>
            <select name="post_type_pages" id="post_type_pages" tabindex="17">
                <option value="1" <?php selected( $post_type_pages, '1' ); ?>><?php _e( 'Yes', 'post-types' ); ?> (<?php _e( 'default', 'post-types' ); ?>)</option>
                <option value="0" <?php selected( $post_type_pages, '0' ); ?>><?php _e( 'No', 'post-types' ); ?></option>
            </select>
            <p><?php _e( 'Should the permastruct provide for pagination.', 'post-types' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="post_type_capability_type"><?php _e( 'Capability Type', 'post-types' ); ?></label>
            <select name="post_type_capability_type" id="post_type_capability_type" tabindex="18">
                <option value="post" <?php selected( $post_type_capability_type, 'post' ); ?>><?php _e( 'Post', 'post-types' ); ?> (<?php _e( 'default', 'post-types' ); ?>)</option>
                <option value="page" <?php selected( $post_type_capability_type, 'page' ); ?>><?php _e( 'Page', 'post-types' ); ?></option>
            </select>
            <p><?php _e( 'The post type to use to build the read, edit, and delete capabilities.', 'post-types' ); ?></p>
        </td>
        <td>
            <label for="post_type_hierarchical"><?php _e( 'Hierarchical', 'post-types' ); ?></label>
            <select name="post_type_hierarchical" id="post_type_hierarchical" tabindex="19">
                <option value="0" <?php selected( $post_type_hierarchical, '0' ); ?>><?php _e( 'No', 'post-types' ); ?> (<?php _e( 'default', 'post-types' ); ?>)</option>
                <option value="1" <?php selected( $post_type_hierarchical, '1' ); ?>><?php _e( 'Yes', 'post-types' ); ?></option>
            </select>
            <p><?php _e( 'Whether the post type is hierarchical. Allows Parent to be specified.', 'post-types' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="post_type_show_in_rest"><?php _e( 'Show in REST', 'post-types' ); ?></label>
            <select name="post_type_show_in_rest" id="post_type_show_in_rest" tabindex="20">
                <option value="1" <?php selected( $post_type_show_in_rest, '1' ); ?>><?php _e( 'Yes', 'post-types' ); ?> (<?php _e( 'default', 'post-types' ); ?>)</option>
                <option value="0" <?php selected( $post_type_show_in_rest, '0' ); ?>><?php _e( 'No', 'post-types' ); ?></option>
            </select>
            <p><?php _e( 'Whether to expose this post type in the REST API. Must be true to enable the Gutenberg editor.', 'post-types' ); ?></p>
        </td>
        <td>
            <label for="post_type_query_var"><?php _e( 'Query Var', 'post-types' ); ?></label>
            <select name="post_type_query_var" id="post_type_query_var" tabindex="21">
                <option value="1" <?php selected( $post_type_query_var, '1' ); ?>><?php _e( 'Yes', 'post-types' ); ?> (<?php _e( 'default', 'post-types' ); ?>)</option>
                <option value="0" <?php selected( $post_type_query_var, '0' ); ?>><?php _e( 'No', 'post-types' ); ?></option>
            </select>
            <p><?php _e( 'Sets the query_var key for this post type.', 'post-types' ); ?></p>
        </td>
    </tr>
    <tr>
        <td class="first">
            <label for="post_type_supports"><?php _e( 'Supports', 'post-types' ); ?></label>
            <p><?php _e( 'Enable core features for this post type', 'post-types' ); ?></p>
            <input type="checkbox" tabindex="22" name="post_type_supports[]" id="post_type_supports_title" value="title" <?php checked( $post_type_supports_title, 'title' ); ?> /> <label class="checkbox" for="post_type_supports_title"><?php _e( 'Title', 'post-types' ); ?> <span class="default">(<?php _e( 'default', 'post-types' ); ?>)</span></label><br />
            <input type="checkbox" tabindex="23" name="post_type_supports[]" id="post_type_supports_editor" value="editor" <?php checked( $post_type_supports_editor, 'editor' ); ?> /> <label class="checkbox" for="post_type_supports_editor"><?php _e( 'Editor', 'post-types' ); ?> <span class="default">(<?php _e( 'default', 'post-types' ); ?>)</span></label><br />
            <input type="checkbox" tabindex="24" name="post_type_supports[]" id="post_type_supports_excerpt" value="excerpt" <?php checked( $post_type_supports_excerpt, 'excerpt' ); ?> /> <label class="checkbox" for="post_type_supports_excerpt"><?php _e( 'Excerpt', 'post-types' ); ?> <span class="default">(<?php _e( 'default', 'post-types' ); ?>)</span></label><br />
            <input type="checkbox" tabindex="25" name="post_type_supports[]" id="post_type_supports_trackbacks" value="trackbacks" <?php checked( $post_type_supports_trackbacks, 'trackbacks' ); ?> /> <label class="checkbox" for="post_type_supports_trackbacks"><?php _e( 'Trackbacks', 'post-types' ); ?></label><br />
            <input type="checkbox" tabindex="26" name="post_type_supports[]" id="post_type_supports_custom_fields" value="custom-fields" <?php checked( $post_type_supports_custom_fields, 'custom-fields' ); ?> /> <label class="checkbox" for="post_type_supports_custom_fields"><?php _e( 'Custom Fields', 'post-types' ); ?></label><br />
            <input type="checkbox" tabindex="27" name="post_type_supports[]" id="post_type_supports_comments" value="comments" <?php checked( $post_type_supports_comments, 'comments' ); ?> /> <label class="checkbox" for="post_type_supports_comments"><?php _e( 'Comments', 'post-types' ); ?></label><br />
            <input type="checkbox" tabindex="28" name="post_type_supports[]" id="post_type_supports_revisions" value="revisions" <?php checked( $post_type_supports_revisions, 'revisions' ); ?> /> <label class="checkbox" for="post_type_supports_revisions"><?php _e( 'Revisions', 'post-types' ); ?></label><br />
            <input type="checkbox" tabindex="29" name="post_type_supports[]" id="post_type_supports_featured_image" value="thumbnail" <?php checked( $post_type_supports_featured_image, 'thumbnail' ); ?> /> <label class="checkbox" for="post_type_supports_featured_image"><?php _e( 'Featured Image', 'post-types' ); ?></label><br />
            <input type="checkbox" tabindex="30" name="post_type_supports[]" id="post_type_supports_author" value="author" <?php checked( $post_type_supports_author, 'author' ); ?> /> <label class="checkbox" for="post_type_supports_author"><?php _e( 'Author', 'post-types' ); ?></label><br />
            <input type="checkbox" tabindex="31" name="post_type_supports[]" id="post_type_supports_page_attributes" value="page-attributes" <?php checked( $post_type_supports_page_attributes, 'page-attributes' ); ?> /> <label class="checkbox" for="post_type_supports_page_attributes"><?php _e( 'Page Attributes', 'post-types' ); ?></label><br />
            <input type="checkbox" tabindex="32" name="post_type_supports[]" id="post_type_supports_post_formats" value="post-formats" <?php checked( $post_type_supports_post_formats, 'post-formats' ); ?> /> <label class="checkbox" for="post_type_supports_post_formats"><?php _e( 'Post Formats', 'post-types' ); ?></label><br />
        </td>
        <td>
            <label for="post_type_builtin_tax"><?php _e( 'Core Taxonomies', 'post-types' ); ?></label>
            <p><?php _e( 'Enable core taxonomies for this post type', 'post-types' ); ?></p>
            <input type="checkbox" tabindex="33" name="post_type_builtin_tax[]" id="post_type_builtin_tax_categories" value="category" <?php checked( $post_type_builtin_tax_categories, 'category' ); ?> /> <label class="checkbox" for="post_type_builtin_tax_categories"><?php _e( 'Categories', 'post-types' ); ?></label><br />
            <input type="checkbox" tabindex="34" name="post_type_builtin_tax[]" id="post_type_builtin_tax_tags" value="post_tag" <?php checked( $post_type_builtin_tax_tags, 'post_tag' ); ?> /> <label class="checkbox" for="post_type_builtin_tax_tags"><?php _e( 'Tags', 'post-types' ); ?></label><br />
        </td>
    </tr>
</table>

<?php

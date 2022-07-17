<?php

wp_nonce_field( 'post_type_meta_box_nonce_action', 'post_type_meta_box_nonce_field' );

?>
    <table class="post_types">
        <tr>
            <td class="first">
                <label for="post_type_name"><span
                            class="required">*</span> <?php esc_html_e( 'CPT Name', 'post-types' ); ?>
                </label>
                <input type="text" name="post_type_name" id="post_type_name" class="widefat" tabindex="1"
                       value="<?php echo esc_attr( $post_type_name ); ?>" pattern="[a-zA-Z-_]+" maxlength="20">
                <p><?php esc_html_e( 'Must not exceed 20 characters and may only contain lowercase alphanumeric characters, dashes, and underscores', 'post-types' ); ?></p>
            </td>
            <td>
                <label for="post_type_label"><?php esc_html_e( 'Label', 'post-types' ); ?></label>
                <input type="text" name="post_type_label" id="post_type_label" class="widefat" tabindex="2"
                       value="<?php echo esc_attr( $post_type_label ); ?>">
                <p><?php esc_html_e( 'Name of the post type shown in the menu. Usually plural.', 'post-types' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="post_type_singular_name"><?php esc_html_e( 'Singular Name', 'post-types' ); ?></label>
                <input type="text" name="post_type_singular_name" id="post_type_singular_name" class="widefat"
                       tabindex="3" value="<?php echo esc_attr( $post_type_singular_name ); ?>">
                <p><?php esc_html_e( 'Name for one object of this post type.', 'post-types' ); ?></p>
                <label for="post_type_custom_rewrite_slug"><?php esc_html_e( 'Rewrite Slug', 'post-types' ); ?></label>
                <input type="text" name="post_type_custom_rewrite_slug" id="post_type_custom_rewrite_slug"
                       class="widefat" tabindex="4" value="<?php echo esc_attr( $post_type_custom_rewrite_slug ); ?>">
                <p><?php esc_html_e( 'Customize the permalink slug.', 'post-types' ); ?></p>
            </td>
            <td>
                <label for="post_type_description"><?php esc_html_e( 'Description', 'post-types' ); ?></label>
                <textarea name="post_type_description" id="post_type_description" class="widefat" tabindex="5"
                          rows="4"><?php echo esc_textarea( $post_type_description ); ?></textarea>
                <p><?php esc_html_e( 'A short descriptive summary of what the post type is.', 'post-types' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="post_type_rewrite"><?php esc_html_e( 'Rewrite', 'post-types' ); ?></label>
                <select name="post_type_rewrite" id="post_type_rewrite" tabindex="6">
                    <option value="1" <?php selected( $post_type_rewrite, '1' ); ?>><?php esc_html_e( 'Yes', 'post-types' ); ?>
                        (<?php esc_html_e( 'default', 'post-types' ); ?>)
                    </option>
                    <option value="0" <?php selected( $post_type_rewrite, '0' ); ?>><?php esc_html_e( 'No', 'post-types' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Triggers the handling of rewrites for this post type.', 'post-types' ); ?></p>
            </td>
            <td>
                <label for="post_type_withfront"><?php esc_html_e( 'With Front', 'post-types' ); ?></label>
                <select name="post_type_withfront" id="post_type_withfront" tabindex="7">
                    <option value="1" <?php selected( $post_type_withfront, '1' ); ?>><?php esc_html_e( 'Yes', 'post-types' ); ?>
                        (<?php esc_html_e( 'default', 'post-types' ); ?>)
                    </option>
                    <option value="0" <?php selected( $post_type_withfront, '0' ); ?>><?php esc_html_e( 'No', 'post-types' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Should the link be prepended with the front base.', 'post-types' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="post_type_public"><?php esc_html_e( 'Public', 'post-types' ); ?></label>
                <select name="post_type_public" id="post_type_public" tabindex="8">
                    <option value="1" <?php selected( $post_type_public, '1' ); ?>><?php esc_html_e( 'Yes', 'post-types' ); ?>
                        (<?php esc_html_e( 'default', 'post-types' ); ?>)
                    </option>
                    <option value="0" <?php selected( $post_type_public, '0' ); ?>><?php esc_html_e( 'No', 'post-types' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Whether this post type is intended to be used publicly either via the admin interface or by front-end users.', 'post-types' ); ?></p>
            </td>
            <td>
                <label for="post_type_has_archive"><?php esc_html_e( 'Has Archive', 'post-types' ); ?></label>
                <select name="post_type_has_archive" id="post_type_has_archive" tabindex="9">
                    <option value="0" <?php selected( $post_type_has_archive, '0' ); ?>><?php esc_html_e( 'No', 'post-types' ); ?>
                        (<?php esc_html_e( 'default', 'post-types' ); ?>)
                    </option>
                    <option value="1" <?php selected( $post_type_has_archive, '1' ); ?>><?php esc_html_e( 'Yes', 'post-types' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Whether there should be post type archives.', 'post-types' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="post_type_exclude_from_search"><?php esc_html_e( 'Exclude From Search', 'post-types' ); ?></label>
                <select name="post_type_exclude_from_search" id="post_type_exclude_from_search" tabindex="10">
                    <option value="0" <?php selected( $post_type_exclude_from_search, '0' ); ?>><?php esc_html_e( 'No', 'post-types' ); ?>
                        (<?php esc_html_e( 'default', 'post-types' ); ?>)
                    </option>
                    <option value="1" <?php selected( $post_type_exclude_from_search, '1' ); ?>><?php esc_html_e( 'Yes', 'post-types' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Whether to exclude this post type from front end search results.', 'post-types' ); ?></p>
            </td>
            <td>
                <label for="post_type_show_ui"><?php esc_html_e( 'Show UI', 'post-types' ); ?></label>
                <select name="post_type_show_ui" id="post_type_show_ui" tabindex="11">
                    <option value="1" <?php selected( $post_type_show_ui, '1' ); ?>><?php esc_html_e( 'Yes', 'post-types' ); ?>
                        (<?php esc_html_e( 'default', 'post-types' ); ?>)
                    </option>
                    <option value="0" <?php selected( $post_type_show_ui, '0' ); ?>><?php esc_html_e( 'No', 'post-types' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Whether to generate UI for managing this post type in the admin', 'post-types' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="post_type_show_in_menu"><?php esc_html_e( 'Show in Menu', 'post-types' ); ?></label>
                <select name="post_type_show_in_menu" id="post_type_show_in_menu" tabindex="12">
                    <option value="1" <?php selected( $post_type_show_in_menu, '1' ); ?>><?php esc_html_e( 'Yes', 'post-types' ); ?>
                        (<?php esc_html_e( 'default', 'post-types' ); ?>)
                    </option>
                    <option value="0" <?php selected( $post_type_show_in_menu, '0' ); ?>><?php esc_html_e( 'No', 'post-types' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Show this post type in its own top level menu. "Show UI" must be true.', 'post-types' ); ?></p>
            </td>
            <td>
                <label for="post_type_menu_position"><?php esc_html_e( 'Menu Position', 'post-types' ); ?></label>
                <input type="text" name="post_type_menu_position" id="post_type_menu_position" class="widefat"
                       tabindex="13" value="<?php echo esc_attr( $post_type_menu_position ); ?>">
                <p><?php esc_html_e( 'The position in the menu order the post type should appear, e.g. 25. "Show in Menu" must be true.', 'post-types' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="post_type_icon_slug">
					<?php if ( $post_type_icon_slug ) { ?>
                        <span id="post_type_icon_slug_before"
                              class="dashicons-before <?php echo esc_attr( $post_type_icon_slug ); ?>"></span> <?php } ?>
					<?php esc_html_e( 'Slug Icon', 'post-types' ); ?>
                </label>
                <input type="text" name="post_type_icon_slug" id="post_type_icon_slug" class="widefat" tabindex="14"
                       value="<?php echo esc_attr( $post_type_icon_slug ); ?>">
                <p><?php esc_html_e( 'This uses Dashicons, e.g. dashicons-heart', 'post-types' ); ?></p>
            </td>
            <td>
                <label for="post_type_publicly_queryable"><?php esc_html_e( 'Publicly Queryable', 'post-types' ); ?></label>
                <select name="post_type_publicly_queryable" id="post_type_publicly_queryable" tabindex="15">
                    <option value="1" <?php selected( $post_type_publicly_queryable, '1' ); ?>><?php esc_html_e( 'Yes', 'post-types' ); ?>
                        (<?php esc_html_e( 'default', 'post-types' ); ?>)
                    </option>
                    <option value="0" <?php selected( $post_type_publicly_queryable, '0' ); ?>><?php esc_html_e( 'No', 'post-types' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Whether queries can be performed on the front end for this post type', 'post-types' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="post_type_feeds"><?php esc_html_e( 'Feeds', 'post-types' ); ?></label>
                <select name="post_type_feeds" id="post_type_feeds" tabindex="16">
                    <option value="0" <?php selected( $post_type_feeds, '0' ); ?>><?php esc_html_e( 'No', 'post-types' ); ?>
                        (<?php esc_html_e( 'default', 'post-types' ); ?>)
                    </option>
                    <option value="1" <?php selected( $post_type_feeds, '1' ); ?>><?php esc_html_e( 'Yes', 'post-types' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Should a feed permalink structure be built for this post type.', 'post-types' ); ?></p>
            </td>
            <td>
                <label for="post_type_pages"><?php esc_html_e( 'Pages', 'post-types' ); ?></label>
                <select name="post_type_pages" id="post_type_pages" tabindex="17">
                    <option value="1" <?php selected( $post_type_pages, '1' ); ?>><?php esc_html_e( 'Yes', 'post-types' ); ?>
                        (<?php esc_html_e( 'default', 'post-types' ); ?>)
                    </option>
                    <option value="0" <?php selected( $post_type_pages, '0' ); ?>><?php esc_html_e( 'No', 'post-types' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Should pagination be enabled?', 'post-types' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="post_type_capability_type"><?php esc_html_e( 'Capability Type', 'post-types' ); ?></label>
                <select name="post_type_capability_type" id="post_type_capability_type" tabindex="18">
                    <option value="post" <?php selected( $post_type_capability_type, 'post' ); ?>><?php esc_html_e( 'Post', 'post-types' ); ?>
                        (<?php esc_html_e( 'default', 'post-types' ); ?>)
                    </option>
                    <option value="page" <?php selected( $post_type_capability_type, 'page' ); ?>><?php esc_html_e( 'Page', 'post-types' ); ?></option>
                </select>
                <p><?php esc_html_e( 'The post type to use to build the read, edit, and delete capabilities.', 'post-types' ); ?></p>
            </td>
            <td>
                <label for="post_type_hierarchical"><?php esc_html_e( 'Hierarchical', 'post-types' ); ?></label>
                <select name="post_type_hierarchical" id="post_type_hierarchical" tabindex="19">
                    <option value="0" <?php selected( $post_type_hierarchical, '0' ); ?>><?php esc_html_e( 'No', 'post-types' ); ?>
                        (<?php esc_html_e( 'default', 'post-types' ); ?>)
                    </option>
                    <option value="1" <?php selected( $post_type_hierarchical, '1' ); ?>><?php esc_html_e( 'Yes', 'post-types' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Whether the post type is hierarchical. Allows Parent to be specified.', 'post-types' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="post_type_show_in_rest"><?php esc_html_e( 'Show in REST', 'post-types' ); ?></label>
                <select name="post_type_show_in_rest" id="post_type_show_in_rest" tabindex="20">
                    <option value="1" <?php selected( $post_type_show_in_rest, '1' ); ?>><?php esc_html_e( 'Yes', 'post-types' ); ?>
                        (<?php esc_html_e( 'default', 'post-types' ); ?>)
                    </option>
                    <option value="0" <?php selected( $post_type_show_in_rest, '0' ); ?>><?php esc_html_e( 'No', 'post-types' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Whether to expose this post type in the REST API.', 'post-types' ); ?></p>
            </td>
            <td>
                <label for="post_type_query_var"><?php esc_html_e( 'Query Var', 'post-types' ); ?></label>
                <select name="post_type_query_var" id="post_type_query_var" tabindex="21">
                    <option value="1" <?php selected( $post_type_query_var, '1' ); ?>><?php esc_html_e( 'Yes', 'post-types' ); ?>
                        (<?php esc_html_e( 'default', 'post-types' ); ?>)
                    </option>
                    <option value="0" <?php selected( $post_type_query_var, '0' ); ?>><?php esc_html_e( 'No', 'post-types' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Sets the query_var key for this post type.', 'post-types' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="post_type_supports"><?php esc_html_e( 'Supports', 'post-types' ); ?></label>
                <p><?php esc_html_e( 'Enable core features for this post type', 'post-types' ); ?></p>
                <input type="checkbox" tabindex="22" name="post_type_supports[]" id="post_type_supports_title"
                       value="title" <?php checked( $post_type_supports_title, 'title' ); ?> /> <label class="checkbox"
                                                                                                       for="post_type_supports_title"><?php esc_html_e( 'Title', 'post-types' ); ?>
                    <span class="default">(<?php esc_html_e( 'default', 'post-types' ); ?>)</span></label><br/>
                <input type="checkbox" tabindex="23" name="post_type_supports[]" id="post_type_supports_editor"
                       value="editor" <?php checked( $post_type_supports_editor, 'editor' ); ?> /> <label
                        class="checkbox" for="post_type_supports_editor"><?php esc_html_e( 'Editor', 'post-types' ); ?>
                    <span
                            class="default">(<?php esc_html_e( 'default', 'post-types' ); ?>)</span></label><br/>
                <input type="checkbox" tabindex="24" name="post_type_supports[]" id="post_type_supports_excerpt"
                       value="excerpt" <?php checked( $post_type_supports_excerpt, 'excerpt' ); ?> /> <label
                        class="checkbox"
                        for="post_type_supports_excerpt"><?php esc_html_e( 'Excerpt', 'post-types' ); ?> <span
                            class="default">(<?php esc_html_e( 'default', 'post-types' ); ?>)</span></label><br/>
                <input type="checkbox" tabindex="25" name="post_type_supports[]" id="post_type_supports_custom_fields"
                       value="custom-fields" <?php checked( $post_type_supports_custom_fields, 'custom-fields' ); ?> />
                <label class="checkbox"
                       for="post_type_supports_custom_fields"><?php esc_html_e( 'Custom Fields', 'post-types' ); ?></label><br/>
                <input type="checkbox" tabindex="26" name="post_type_supports[]" id="post_type_supports_revisions"
                       value="revisions" <?php checked( $post_type_supports_revisions, 'revisions' ); ?> /> <label
                        class="checkbox"
                        for="post_type_supports_revisions"><?php esc_html_e( 'Revisions', 'post-types' ); ?></label><br/>
                <input type="checkbox" tabindex="27" name="post_type_supports[]" id="post_type_supports_featured_image"
                       value="thumbnail" <?php checked( $post_type_supports_featured_image, 'thumbnail' ); ?> /> <label
                        class="checkbox"
                        for="post_type_supports_featured_image"><?php esc_html_e( 'Featured Image', 'post-types' ); ?></label><br/>
                <input type="checkbox" tabindex="28" name="post_type_supports[]" id="post_type_supports_author"
                       value="author" <?php checked( $post_type_supports_author, 'author' ); ?> /> <label
                        class="checkbox"
                        for="post_type_supports_author"><?php esc_html_e( 'Author', 'post-types' ); ?></label><br/>
                <input type="checkbox" tabindex="29" name="post_type_supports[]" id="post_type_supports_page_attributes"
                       value="page-attributes" <?php checked( $post_type_supports_page_attributes, 'page-attributes' ); ?> />
                <label class="checkbox"
                       for="post_type_supports_page_attributes"><?php esc_html_e( 'Page Attributes', 'post-types' ); ?></label><br/>
                <input type="checkbox" tabindex="30" name="post_type_supports[]" id="post_type_supports_post_formats"
                       value="post-formats" <?php checked( $post_type_supports_post_formats, 'post-formats' ); ?> />
                <label class="checkbox"
                       for="post_type_supports_post_formats"><?php esc_html_e( 'Post Formats', 'post-types' ); ?></label><br/>
            </td>
            <td>
                <label for="post_type_builtin_tax"><?php esc_html_e( 'Core Taxonomies', 'post-types' ); ?></label>
                <p><?php esc_html_e( 'Enable core taxonomies for this post type', 'post-types' ); ?></p>
                <input type="checkbox" tabindex="31" name="post_type_builtin_tax[]"
                       id="post_type_builtin_tax_categories"
                       value="category" <?php checked( $post_type_builtin_tax_categories, 'category' ); ?> /> <label
                        class="checkbox"
                        for="post_type_builtin_tax_categories"><?php esc_html_e( 'Categories', 'post-types' ); ?></label><br/>
                <input type="checkbox" tabindex="32" name="post_type_builtin_tax[]" id="post_type_builtin_tax_tags"
                       value="post_tag" <?php checked( $post_type_builtin_tax_tags, 'post_tag' ); ?> /> <label
                        class="checkbox"
                        for="post_type_builtin_tax_tags"><?php esc_html_e( 'Tags', 'post-types' ); ?></label><br/>
            </td>
        </tr>
    </table>
<?php

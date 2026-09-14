<?php
if ( post_password_required() ) {
    return;
}
?>
<?php echo 'COMMENTS BLOG FILE LOADED'; ?>
<div class="blog-comments-4">

    <div class="comments-header">
        <h3 class="title">Community Feedback</h3>

        <div class="comments-stats">
            <span class="count"><?php echo get_comments_number(); ?></span>
            <span class="label">Comments</span>
        </div>
    </div>

    <?php if ( have_comments() ) : ?>
<?php if ( have_comments() ) : ?>

    <h3 style="color:green;">
        COMMENTS FOUND: <?php echo get_comments_number(); ?>
    </h3>

    <div class="comments-container">

        <?php
        wp_list_comments(
            array(
                'style'       => 'div',
                'avatar_size' => 60,
                'callback'    => 'arsha_comment_callback',
            )
        );
        ?>

    </div>

<?php else : ?>

    <h3 style="color:red;">
        NO COMMENTS FOUND
    </h3>

<?php endif; ?>
        <div class="comments-container">

            <?php
            wp_list_comments(
                array(
                    'style'       => 'div',
                    'avatar_size' => 60,
                    'callback'    => 'arsha_comment_callback',
                )
            );
            ?>

        </div>

    <?php endif; ?>

    <div class="comment-form-wrap">

        <?php
        comment_form();
        ?>

    </div>

</div>
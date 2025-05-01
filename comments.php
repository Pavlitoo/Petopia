<?php

/**
 * The template for displaying comments
 *
 * @package Pet
 */

// Якщо пост захищений паролем, не відображаємо коментарі
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if ($comment_count === '1') {
                printf(
                    esc_html__('Один відгук про %s', 'pet'),
                    get_the_title()
                );
            } else {
                printf(
                    esc_html(_n('%1$s відгук про %2$s', '%1$s відгуки про %2$s', $comment_count, 'pet')),
                    number_format_i18n($comment_count),
                    get_the_title()
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 60,
            ));
            ?>
        </ol>

        <?php
        the_comments_navigation();

        if (!comments_open()) :
        ?>
            <p class="no-comments"><?php esc_html_e('Коментування закрито.', 'pet'); ?></p>
    <?php
        endif;
    endif;

    comment_form(array(
        'title_reply'        => __('Залишити відгук', 'pet'),
        'title_reply_to'     => __('Відповісти %s', 'pet'),
        'comment_field'      => '<p class="comment-form-comment"><label for="comment">' . _x('Ваш відгук', 'noun', 'pet') . '</label><textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required></textarea></p>',
        'label_submit'       => __('Опублікувати', 'pet'),
        'comment_notes_before' => '<p class="comment-notes">' . __('Ваша email адреса не буде опублікована.', 'pet') . '</p>',
    ));
    ?>
</div>
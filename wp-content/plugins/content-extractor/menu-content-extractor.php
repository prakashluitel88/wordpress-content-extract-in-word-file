<div class="wrap">
<?php
if($_GET['post_id']) {
    echo "<b>Your post ID is " . $_GET['post_id'] . "</b>";
} else {
    echo "<b>Please input the Post Id</b>";
}
?>
    <h2>Content Export</h2>
    <form method="get" action="<?php echo admin_url( 'admin.php' ); ?>">
        <input type="hidden" name="page" value="content-extract">
        Post ID:<br>
        <input type="number" name="post_id"><input type="submit">
    </form>
</div>
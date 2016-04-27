<?php
    require_once 'PHPWord.php';
    $plugin_dir = plugin_dir_path( __FILE__ );
?>
<div class="wrap">
<?php
if($_GET['post_id']) {
    echo "<b>Your post ID that you want to export is " . $_GET['post_id'] . "</b>";

    wp_reset_query();
    $id = $_GET['post_id'];
    $post = get_post($id);

    $title = $post->post_title;
    $content = $post->post_content;

// Start Export in word file
    $PHPWord = new PHPWord();
    $section = $PHPWord->createSection();
    $section->addText("Title: " . $title, array('name'=>'Tahoma', 'size'=>16, 'bold'=>true));
    $section->addText("Content: " . $content, array('name'=>'Tahoma', 'size'=>16, 'bold'=>true));

    $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');

    // Make directory named current timestamp
    $time = time();
    mkdir($plugin_dir .  "/files/" . $time , 0777, true);


    $objWriter->save( $plugin_dir . "/files/" . $time . "/" . $title . ".docx");
// End File Export in Excel
} else {
    echo "<b>Please input the Post Id.</b>";
}
?>
    <h2>Content Export</h2>
    <form method="get" action="<?php echo admin_url( 'admin.php' ); ?>">
        <input type="hidden" name="page" value="content-extract">
        Post ID:<br>
        <input type="number" name="post_id"><input type="submit">
    </form>
</div>
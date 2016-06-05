<?php
//global $wpdb;
//
//$table_name = $wpdb->prefix . "posts";
//$sql = "SELECT * FROM " . $table_name ;
//$posts = $wpdb->get_results($sql, OBJECT);
//foreach ($posts as $post) {
//    //echo $post->ID;
//    $meta_table_name = $wpdb->prefix . "postmeta";
//    $meta_sql = "SELECT * FROM " . $meta_table_name . " WHERE (meta_key='_yoast_wpseo_title' OR meta_key= '_yoast_wpseo_metadesc') AND post_id=" . $post->ID;
//    //echo $meta_sql; die;
//    $meta_data = $wpdb->get_results($meta_sql, OBJECT);
//    $meta_title = $meta_data[0]->meta_value;
//    $meta_desc = $meta_data[1]->meta_value;
//    //echo '<pre>';print_r($meta_data[0]->meta_value);
//    //echo '<pre>';print_r($meta_data[1]->meta_value);die;
//    //die;
//}
//
//die;
?>

<?php
    require_once 'PHPWord.php';
    $plugin_dir = plugin_dir_path( __FILE__ );
?>
<div class="wrap">
<?php
if($_GET['post_id']) {
//    echo "<b>Your post ID that you want to export is " . $_GET['post_id'] . "</b>";
//
//    wp_reset_query();
//    $id = $_GET['post_id'];
//    $post = get_post($id);
//
//    $content_name = $post->post_title;
//    $url = $post->post_name;
//    $filename = $post->post_name;
//    $seo_title = "";
//    $seo_desc = "";
//    $content = $post->post_content;

    global $wpdb;

    $table_name = $wpdb->prefix . "posts";
    $sql = "SELECT * FROM " . $table_name ;
    $posts = $wpdb->get_results($sql, OBJECT);
    // Make directory named current timestamp
    $time = time();
    mkdir($plugin_dir .  "/files/" . $time , 0777, true);

        foreach ($posts as $post) {
            $meta_table_name = $wpdb->prefix . "postmeta";
            $meta_sql = "SELECT * FROM " . $meta_table_name . " WHERE (meta_key='_yoast_wpseo_title' OR meta_key= '_yoast_wpseo_metadesc') AND post_id=" . $post->ID;
            $meta_data = $wpdb->get_results($meta_sql, OBJECT);
            $content_name = $post->post_title;
            $url = $post->post_name;
            $filename = $post->post_name;
            $meta_title = $meta_data[0]->meta_value;
            $meta_desc = $meta_data[1]->meta_value;
            $content = $post->post_content;



$arr = array("blue","red","green","yellow");
print_r(str_replace("red","pink",$arr,$i));
echo "Replacements: $i";
die;

            preg_match_all("#<.*?>([^<]+)</.*>#", $content, $foo);

            //echo htmlspecialchars($content); die;
            print_r($foo[1]);
            $vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
            print_r($vowels);

            $onlyconsonants = str_replace($foo[1], $foo[1] . 'test', $content);
            print_r($onlyconsonants);
            die;

            // Start Export in word file
            $PHPWord = new PHPWord();
            $section = $PHPWord->createSection();

            $section->addText("Content Name: ", array('name'=>'Times New Roman (Headings CS)', 'size'=>16, 'bold'=>true));
            $section->addText("" . $content_name, array('name'=>'Times New Roman (Headings CS)', 'size'=>12, 'bold'=>false));
            $section->addText("Url: " . $url, array('name'=>'Times New Roman (Headings CS)', 'size'=>16, 'bold'=>true));
            $section->addText("Meta Title: " . $meta_title, array('name'=>'Times New Roman (Headings CS)', 'size'=>16, 'bold'=>true));
            $section->addText("Meta Desc: " . $meta_desc, array('name'=>'Times New Roman (Headings CS)', 'size'=>16, 'bold'=>true));
            $section->addText("Content: " . $content, array('name'=>'Times New Roman (Headings CS)', 'size'=>6, 'bold'=>false));

//            $str = '{%title=append me to the title%}';
//            preg_match('/{%title=([\w ]+)%}/', $str, $matches);
//            print_r($matches);
//            if (strpos($content, 'are') !== false) {
//                echo 'true'; die;
//            }

            $str = <<<EOF
<div>Do not match me</div>
<div type="special_type" src="bla"> match me</div>
<a>not me</a>
<div src="blaw" type="special_type" > match me too</div>
EOF;

            $stri = '<option value="123">abc</option>
        <option value="123">aabbcc</option>';

            /*preg_match_all("#<option.*?>([^<]+)</option>#", $str, $foo);*/
            preg_match_all("#<.*?>([^<]+)</.*>#", $str, $foo);

            print_r($foo[1]); die;


            $doc = new DOMDocument();
            $doc->loadHTML($content);
            $selector = new DOMXPath($doc);

            //$result = $selector->query('//div[@type="special_type"]');
            $result = $selector->query("/<\s*(.*)\>(.*)<\/>/");
            echo '<pre>';
            print_r($result);

// loop through all found items
            foreach($result as $node) {
                echo $node->getAttribute('src');
            }

            die;

            echo htmlspecialchars($content); die;

            $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
            $objWriter->save( $plugin_dir . "/files/" . $time . "/" . $content_name . ".docx");
    // End File Export in Excel
        }
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
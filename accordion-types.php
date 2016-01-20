<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>jQuery Accordion with WP-Types for Wordpress</title>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
$(function() {
    $( "#accordion" ).accordion({
      heightStyle: "content"
    });
  });
  </script>  
</head>

<body>
 <div id="accordion">
    
    <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

	<?php 
	/* Variable declarations */
	for ($i = 1; $i <= 10; $i++) 
	/* For sets up the number. Use the number above to set how many you need. Here it will create 10 */
		{
		  ${"tab".$i."Title"} = types_render_field("field-".$i."-title");
		  // sets variables named tabXTitle x = number, using types field named field-X-title.
		  ${"tab".$i."Content"} = types_render_field("field-".$i."-content");
		  // sets variables named tabXContent x = number, using types field named field-X-content.
		}    
	/* End Variable Declarations */
	?>
    <!-- Tab Structure --> 
    
    <?php 
	for ($i = 1; $i <= 10; $i++)
		{
	 if ( !empty(${"tab".$i."Title"}) && !empty(${"tab".$i."Content"}) ){ 
	 // Checks to see if fields are empty, because of For loop, will do a set of 10, if fields are both NOT empty:
    ?>
        <h3><?php echo ${"tab".$i."Title"} ?></h3>
        	<?php // Passes tab variable ?>
        <div>
            <p><?php echo ${"tab".$i."Content"} ?></p>
            <?php // Passes content variable ?>
        </div>
        <?php }?>
    <?php } ?>
    <!-- end Tab Structure -->
    <?php endwhile; ?>
   <?php endif; ?>
</div>
</body>
</html>
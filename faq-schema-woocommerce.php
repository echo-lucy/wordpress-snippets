// ACF repeater
  <!--FAQ's-->
	<div class="faq-section">
  <?php $term = get_queried_object(); $faqTitle = get_field('faq_title', $term);?>
  <h2><?php echo $faqTitle; ?></h2>
  <!---->
  <?php $repeater = get_queried_object(); $faq = get_field('faq', $repeater);?>
  <!---->
  <?php
  if ( have_rows( 'faq', $term ) ):
    while ( have_rows( 'faq', $term ) ): the_row();
  echo get_sub_field( 'question' );
  echo get_sub_field( 'answer' ) . '</p>';
  endwhile;
  endif;
  ?>
<!----> 
    
//Output schema
<?php if( have_rows('faq', $term) ): ?>

<?php $faqSchema = "";
while( have_rows('faq', $term) ): the_row();
$questionField = get_sub_field('question');
$answerField = get_sub_field('answer');
$question = addslashes(wp_strip_all_tags($questionField));
$answer = addslashes(wp_strip_all_tags($answerField));
$faqSchema .= '{

"@type": "Question",
"name": "' . $question . '",
"acceptedAnswer": {
"@type": "Answer",
"text": "' . $answer . '"
} },';
endwhile;
?>
<script type="application/ld+json">

{
"@context": "https://schema.org",

"@type": "FAQPage",
"mainEntity":[
<?php echo rtrim($faqSchema,','); ?>
]
}
<?php endif; ?>

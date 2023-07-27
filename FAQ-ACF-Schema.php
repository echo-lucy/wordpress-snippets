<?php
// Get the ACF repeater field data. Replace 'faq_repeater' with the actual name of your repeater field.
$faq_repeater = get_field('faq_repeater');

// Check if there is data in the repeater field.
if ($faq_repeater) {
    $faq_schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array()
    );

    // Loop through the repeater field data.
    foreach ($faq_repeater as $faq_item) {
        $question = $faq_item['question']; // Replace 'question' with the actual subfield name for the question.
        $answer = $faq_item['answer'];     // Replace 'answer' with the actual subfield name for the answer.

        // Add each FAQ item to the schema.
        $faq_schema['mainEntity'][] = array(
            '@type' => 'Question',
            'name' => $question,
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => $answer
            )
        );
    }

    // Convert the schema array to JSON format.
    $faq_schema_json = json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    // Print the JSON data or use it as needed.
    echo $faq_schema_json;
}
?>

<?
/*
Currently hard coding words into the filter.
Request some help with building a profanity filter
*/
function profanityFilter($txt)
{
	$filtered_text = $txt;
    $filtered_text = str_replace('JEW', 'J&hearts;W', $filtered_text);
    $filtered_text = str_replace('NIGGE', 'N&hearts;&hearts;&hearts;&hearts;', $filtered_text);
    // ... and so on
    return $filtered_text;
}
?>
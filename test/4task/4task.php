<?php 

	$tags = [
		"<div>",
		"<span>",
		"</span>",
		"</div>",
		"<a>",
		"</a>"
	];

	function HTML_struct($tags){

		global $name;

		$regexp = "|<[^/>]+>|U";

		$match = [];

		$mas_in = [];

		$mas_out = [];

		if(preg_match($regexp, $tags[0], $match)){

			$final_tag = "</".substr($match[0], 1, strlen($match[0])-1);

			$regexp1 = '|'.$final_tag.'|';

			$iter_f_t = preg_grep($regexp1, $tags);

			if (!empty($iter_f_t)) {

				$id = key($iter_f_t);

				for ($i = 1; $i < $id; $i++) {

					$mas_in[$i-1] = $tags[$i];

				}

				for ($y = $id+1; $y < count($tags); $y++ ) {

					$mas_out[] = $tags[$y];

				}

				if (empty($mas_in) && empty($mas_out)) {

					$name = "Верно";

				} else if(!empty($mas_in) && !empty($mas_out)) {

					HTML_struct($mas_in);
					HTML_struct($mas_out);

				} else if(empty($mas_out)){

					HTML_struct($mas_in);

				} else if(empty($mas_in)){

					HTML_struct($mas_out);

				}

			} else {

				$name = "Не верно";

			}


		} else {

			$name = "Не верно";

		}

		return $name;
	}

	var_dump(HTML_struct($tags));
	
?>
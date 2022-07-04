<?php 


error_reporting(E_ALL ^ E_NOTICE);

		$output =' <div class="card-offre">';
   foreach ($tab_u as $o) {

    $output .='  <div class="basic-card basic-card-light">
    <div class="card-content">
        <p class="card-text">'.$o->getIdCandidat().' 
        </p>
    
	   <div class="card-content">
        <p class="card-text">'.$o->getIdOffre() .'
        </p>
  
        <p class="card-text">'.$o->getDateCandidature() .'
        </p>
		</div>
    </div>

</div>';
}
$output .='</div>';

echo $output;
?>

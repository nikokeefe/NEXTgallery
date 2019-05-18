<?php

$html = null;
$html .= "<div class='{$grid} {$class}'>";
    $html .= '<div class="rt-holder">';

		if(!empty($imgSrc)) {
			$html .= '<div class="rt-img-holder">';
			if($overlay) {
				$html .= '<div class="overlay">';
				$html .= "<a class='view-details' href='{$pLink}'>
                            <i class='fa fa-info'></i>
                        </a>";
				$html .= '</div>';
			}
			$html .= "<a href='{$pLink}'><img class='img-responsive' src='{$imgSrc}' alt='{$title}'></a>";
			$html .= '</div> ';
		}
        $html .= '<div class="rt-detail">';
           
            if(in_array('title', $items)){
                $html .= sprintf('<%1$s class="entry-title"><a href="%2$s">%3$s</a></%1$s>', $title_tag, $pLink, $title);
            }
            $postMetaTop = $postMetaMid =null;

            
            //$html .= "</hr>";
            if(in_array('excerpt', $items)){
                $html .= "<div class='post-content'>{$excerpt}</div>";
            }
            $postMetaBottom = null;


            if(in_array('read_more', $items)){
                $postMetaBottom .= "<span class='read-more'><a href='{$pLink}'>{$read_more_text}</a></span>";
            }
            if(!empty($postMetaBottom)){
                $html .= "<div class='post-meta'>$postMetaBottom</div>";
            }
        $html .= '</div>'; 
    $html .= '</div>';
$html .='</div>';

echo $html;
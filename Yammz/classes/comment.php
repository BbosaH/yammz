<?php 
require_once('db_config.php');

function pick_comment($comment)
{
	if(substr( $comment["user"]["avatar"], 0, 4 ) === "http")
	{
		$comment["user"]["avatar"]=$comment["user"]["avatar"];
	}else
	{
		$comment["user"]["avatar"]=BaseImageURL.$comment["user"]["avatar"];
	}
	$likes = count($comment['likes']);
	//$imageUrl=BaseImageURL;
	$return1 = <<<comment_patch1
	<table >
											<tr style="">
												<td style=" width:22px; height:22px; vertical-align:top;"><img src="{$comment["user"]["avatar"]}" class="img-circle" style="width:35px;height:35px"  alt="Generic placeholder thumbnail"></td>
												
												<td style="vertical-align:top;">
													<span>																									
														
														<span style="font-size:11;padding-left:8px;"> <span style='color:#555555;font-size:12;'><B>{$comment["user"]["first_name"]} {$comment["user"]["last_name"]}</B></span> &nbsp; </span>
														<div style="height:0px;"></div>
														<p style="font-size:11;  padding-left:8px;padding-right:50px;">
															{$comment["details"]}
														</p>
														<div style="height:0px;"></div>
														
														
														<div style="margin-top:-10px; margin-left:10px;">
														<span style="font-size:11; visibility :visible; " id="unlikecard {$comment["id"]}"><span  class="icon icon-like85 simplegrey"></span><span>&nbsp;&nbsp;Like</span>
														<span  style="font-size:10;padding-top:50px;color:#CFCFCF;padding-left:8px;">12/03/2016</span>&nbsp;
													    </span >
													    </div>
																			
													   
														<!--<span style="font-size:11; visibility :visible; font-color:grey;" id="unlikecard {$comment["id"]}"><span  class="icon icon-like85 redbright " ></span><span>&nbsp;&nbsp;Like</span>
													    </span >-->

														

														 
														
													   
													    
												</td>
											</tr>
											
										</table>
	
comment_patch1;

echo $return1;
}



?>
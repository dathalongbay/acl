<h1>Ky thuat de qui</h1>
<?php 
	
	$menu = array();
	$menu[] = array('id'=>1,'name'=>'Home','parents'=>0);
	$menu[] = array('id'=>2,'name'=>'About','parents'=>0);
	$menu[] = array('id'=>3,'name'=>'News','parents'=>0);
	$menu[] = array('id'=>4,'name'=>'Products','parents'=>0);
	$menu[] = array('id'=>5,'name'=>'Contact','parents'=>0);
	$menu[] = array('id'=>6,'name'=>'Tin trong nuoc','parents'=>3);
	$menu[] = array('id'=>7,'name'=>'Tin nuoc ngoai','parents'=>3);
	$menu[] = array('id'=>8,'name'=>'CNTT','parents'=>6);
	$menu[] = array('id'=>9,'name'=>'Lap trinh','parents'=>6);
	$menu[] = array('id'=>10,'name'=>'IT','parents'=>7);
	$menu[] = array('id'=>11,'name'=>'Programming','parents'=>7);
	$menu[] = array('id'=>12,'name'=>'Software','parents'=>4);
	$menu[] = array('id'=>13,'name'=>'Mobi','parents'=>4);
	$menu[] = array('id'=>14,'name'=>'Anti virus','parents'=>12);
	$menu[] = array('id'=>15,'name'=>'Tool','parents'=>12);
	$menu[] = array('id'=>16,'name'=>'Nokia','parents'=>13); 
	$menu[] = array('id'=>17,'name'=>'Samsung','parents'=>13);
	$menu[] = array('id'=>18,'name'=>'China','parents'=>13);  	
	$menu[] = array('id'=>19,'name'=>'S1','parents'=>17);
	$menu[] = array('id'=>20,'name'=>'S2','parents'=>17);
	$menu[] = array('id'=>21,'name'=>'S2.1','parents'=>20);
	$menu[] = array('id'=>22,'name'=>'S2.1.1','parents'=>21);

	function recursive($sourceArr,$parents = 0,$level = 1,&$resultArr){
		if(count($sourceArr)>0){
			foreach ($sourceArr as $key => $value){
				if($value['parents'] == $parents){
					$value['level'] = $level;
					$resultArr[] = $value;
					$newParents = $value['id'];
					unset($sourceArr[$key]);
					recursive($sourceArr,$newParents, $level + 1,$resultArr);
				}
			}
		}
	}
	
	recursive($menu,0,1,$newArray);
	
?>
<select name="abc" id="abc" style="min-width:250px" size="10" >
	<?php 
		foreach ($newArray as $key=> $info){
			if($info['level'] == 1){
				echo '<option value="' . $info['id'] . '">+' . $info['name'] . '</option>';
			}else{
				$string = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				$newString = '';
				for($i=1;$i<$info['level']; $i++){
					$newString .= $string;
				}
				$info['name'] = $newString . '-' . $info['name'];
				echo '<option value="' . $info['id'] . '">' . $info['name'] . '</option>';
			}
		}
	?>
</select> 






	
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

	
	foreach ($menu as $key => $value){
		if($value['parents'] == 0){
			$value['level'] = $value['parents'] + 1;
			$newArray[] = $value;
			//Tim kiem trong mang co mang co parents = $value['id']
			$parents = $value['id'];
			unset($menu[$key]);
			foreach ($menu as $key_1 => $val_1){
				if($val_1['parents'] == $parents ){
					$val_1['level'] = $value['level'] + 1;
					$newArray[] = $val_1;
					$parents_1 = $val_1['id'];
					unset($menu[$key_1]);
					foreach ($menu as $key_2 => $val_2){
						if($val_2['parents'] == $parents_1){
							$val_2['level'] = $val_1['level'] + 1;
							$newArray[] = $val_2;
							unset($menu[$key_2]);
						}
					}
				}
			}
		}
	}
	/*echo '<pre>';
	print_r($menu);
	echo '</pre>';*/
	foreach ($newArray as $key => $info){
		if($info['level'] == 1){
			echo '<div style="border: 1px solid #ccc">+ ' . $info['name'] . '</div>';
		}else{
			$padding  = ($info['level'] - 1) * 25;
			$padding = 'padding-left: ' . $padding . 'px;';
			echo '<div style="border: 1px solid #ccc;' . $padding . '">- ' . $info['name'] . '</div>';
		}
	}
	echo '<pre>';
	print_r($newArray);
	echo '</pre>';
	
	
	
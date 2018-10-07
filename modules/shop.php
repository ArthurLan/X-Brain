<div class="center row"/>
	<div class="column" style="position: absolute">
		<div class="center back_pic" style=""/> 
		</div>
	</div>
	<div class="column side shadow">
		<div class="cat"><a href="index.php?shop"><b>ALL</b></a></div>
		<div class="cat"><a href="index.php?shop&souvenir"><b>Souvenirs</b></a></div>
		<div class="cat"><a href="index.php?shop&physical"><b>Physical</b></a></div>
		<div class="cat"><a href="index.php?shop&culture"><b>Culture</b></a></div>
	</div>
	<div class="column middle shadow" style="display: inline-block:">
<?PHP

// << Creating serialized data for a new item >>
//$new_item['name'] = "africa";
//$new_item['price'] = "200€";
////$new_item['img'] = "img";
//$new_item['tags'] = "souvenir";
//file_put_contents("private/product_base/".$new_item['name'].".product", serialize($new_item))


$list = glob("private/product_base/*.product");
//print_r($list);

foreach ($list as $item)
{
	@$item_data = unserialize(file_get_contents($item));
//			print_r($item_data);
	if (!(isset(array_keys($_GET)[1])) || array_keys($_GET)[1] == $item_data['tags'])
		echo "<div class=\"item\"><p>".$item_data['name']."</p><p>".$item_data['price']."</p></div>";
}

//	$i = 0;
//while ($i < 20)
//{
//		echo "<div class=\"item\"><p>"."test"."</p><p>"."test"."</p></div>";
//	$i++;
//}
?>
	</div>
</div>

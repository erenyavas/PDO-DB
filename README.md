# PDO-DB v:1.0.0
$db = new Database('servername','dbname','usrname','pw')

#listData
$db->listData('tablename')
this function return array

#getData
$db->getData('users','users_id','1','whichcolumn');
this function return $query['whichcolumn']

#insertData
$data = [
			'admin_name' => 'root',
			'admin_pass' => '1234',
			'admin_id' =>1
		];
   
$db->insertData($tablename,$data)
this function return true/false

#update

$data = [
			'name' => 'John',
			'surname' => 'Fast',
			
		];

$db->update('tablename',$data,$wherefromchange,$whereformchangevalue)
ex::$db->update('users',$data','id','1')

#delete
$db->delete('tablename','where','wherevalue')

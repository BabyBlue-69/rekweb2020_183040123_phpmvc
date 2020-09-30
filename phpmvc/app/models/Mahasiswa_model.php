<?php 

class Mahasiswa_model {
	// private $mhs = [
	// 	[
	// 		"Nama" => "Nabila Aura",
	// 		"NRP" => "193040123",
	// 		"Email" => "nabilaura@gmail.com",
	// 		"Jurusan" => "Ilmu Ekonomi"
	// 	],
	// 	[
	// 		"Nama" => "Nada Shafa Soraya Gandakusuma",
	// 		"NRP" => "183040122",
	// 		"Email" => "nada.shafa12@gmail.com",
	// 		"Jurusan" => "Teknik Sipil"
	// 	],
	// 	[
	// 		"Nama" => "Nur Syifa Maulinda",
	// 		"NRP" => "183040124",
	// 		"Email" => "syifamaulin@gmail.com",
	// 		"Jurusan" => "Ilmu Biologi"
	// 	]
	// ];

	// private $dbh; //database handler
	// private $stmt;

	// public function __construct()
	// {
	// 	//data source name
	// 	$dsn = 'mysql:host=localhost;dbname=phpmvc';

	// 	try{
	// 		$this->dbh = new PDO($dsn, 'root', '');
	// 	} 
	// 	catch(PDOException $e){
	// 		die($e->getMessage());
	// 	}
	// }

	private $table = 'mahasiswa';
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function getAllMahasiswa(){
		// return $this->mhs;
		// $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
		// $this->stmt->execute();
		// return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();//result set dipake kalo isinya banyak
	}

	public function getMahasiswaById($id){
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id'); //untuk nyimpen data yang di binding
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahDataMahasiswa($data){
		$query = "INSERT INTO mahasiswa
					VALUES
				   ('', :Nama, :NRP, :Email, :Jurusan)";

		$this->db->query($query);
		$this->db->bind('Nama', $data['Nama']);
		$this->db->bind('NRP', $data['NRP']);
		$this->db->bind('Email', $data['Email']);
		$this->db->bind('Jurusan', $data['Jurusan']);
		
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataMahasiswa($id){
		$query = "DELETE FROM mahasiswa WHERE id = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function ubahDataMahasiswa($data){
		$query = "UPDATE mahasiswa SET
					Nama = :Nama,
					NRP = :NRP,
					Email = :Email,
					Jurusan = :Jurusan
					WHERE id = :id";

		$this->db->query($query);
		$this->db->bind('Nama', $data['Nama']);
		$this->db->bind('NRP', $data['NRP']);
		$this->db->bind('Email', $data['Email']);
		$this->db->bind('Jurusan', $data['Jurusan']);
		$this->db->bind('id', $data['id']);
		
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariDataMahasiswa(){
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM mahasiswa WHERE Nama LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword', "%$keyword%");
		return $this->db->resultSet();
	}
}

 ?>
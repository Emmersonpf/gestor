<?php

require_once 'Crud.php';

class Usuarios extends Crud{
	
	protected $table = 'usuarios';

	private $profissional;
	private $login;
	private $senha;
	private $perfil;
	private $permissao;
	private $datacriado;
	private $criou;

	//Get's e Set's


public function getProfissional() {
    return $this->profissional;
}
 
public function setProfissional($profissional) {
    $this->profissional = $profissional;
}
public function getLogin() {
    return $this->login;
}
 
public function setLogin($login) {
    $this->login = $login;
}
public function getSenha() {
    return $this->senha;
}
 
public function setSenha($senha) {
    $this->senha = $senha;
}
public function getPerfil() {
    return $this->perfil;
}
 
public function setPerfil($perfil) {
    $this->perfil = $perfil;
}
public function getPermissao() {
    return $this->permissao;
}
 
public function setPermissao($permissao) {
    $this->permissao = $permissao;
}
public function getDatacriado() {
    return $this->datacriado;
}
 
public function setDatacriado($datacriado) {
    $this->datacriado = $datacriado;
}
public function getCriou() {
    return $this->criou;
}
 
public function setCriou($criou) {
    $this->criou = $criou;
}

	public function insert(){

		$sql  = "INSERT INTO $this->table (`user_profissional`, `user_login`, `user_senha`, `user_perfil`, `user_permissao`, `user_datacriado`, `user_criou`) VALUES (:profissional, :login, :senha, :perfil, :permissao, :datacriado, :criou)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':profissional', $this->profissional);
		$stmt->bindParam(':login', $this->login);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':perfil', $this->perfil);
		$stmt->bindParam(':permissao', $this->permissao);
		$stmt->bindParam(':datacriado', $this->datacriado);
		$stmt->bindParam(':criou', $this->criou);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET user_profissional = :profissional, user_login = :login, user_senha = :senha, user_perfil = :perfil, user_permissao = :permissao, user_datacriado = :datacriado, user_criou = :criou WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':profissional', $this->profissional);
		$stmt->bindParam(':login', $this->login);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':perfil', $this->perfil);
		$stmt->bindParam(':permissao', $this->permissao);
		$stmt->bindParam(':datacriado', $this->datacriado);
		$stmt->bindParam(':criou', $this->criou);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();

	}

}
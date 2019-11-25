<?php
	class RefUsuarioGrupo{
		public $id;
		public $grupo_id;
		public $usuario_id;


		/*------------------------------------/*
       ENCAPSULAMENTOS DO ID
       /*------------------------------------*/

       	public function getId(){
         	return $this->id;
       	}

       public function setId($id){
         $this->id = $id;
       }

       /*------------------------------------/*
       ENCAPSULAMENTOS DO GRUPO_ID
       /*------------------------------------*/

       	public function getGrupoId(){
         	return $this->grupo_id;
       	}

       public function setGrupoId($grupo_id){
         $this->grupo_id = $grupo_id;
       }

       /*------------------------------------/*
       ENCAPSULAMENTOS DO USUARIO_ID
       /*------------------------------------*/

       	public function getUsuarioId(){
         	return $this->usuario_id;
       	}

       public function setUsuarioId($usuario_id){
         $this->usuario_id = $usuario_id;
       }

	}
?>
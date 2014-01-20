<?php

class Controller_Usuarios extends Controller_Template
{

	public function action_index()
	{
		$data["usuarios"] = \Model\Auth_User::find('all');
		$this->template->title = 'Usuarios &raquo; Index';
		$this->template->content = View::forge('usuarios/index', $data);
	}

	public function action_nuevo()
	{
		$this->template->title = 'Usuarios &raquo; Nuevo';
		$this->template->content = View::forge('usuarios/nuevo');
	}

	public function action_crear()
	{
		\Auth::create_user(
			\Input::post('username'),
			\Input::post('password'),
			\Input::post('email')
		);

		// informar al usuario de que el usuario se ha creado
		\Session::set_flash('user-created', __('users.created'));

		\Response::redirect('/usuarios');
	}

	public function action_mostrar()
	{
		$data["usuario"] = \Model\Auth_User::find($this->param('id'));
		$this->template->title = 'Mostrar &raquo; Usuario';
		$this->template->content = View::forge('usuarios/mostrar', $data);
	}

	public function action_editar()
	{
		$data["usuario"] = \Model\Auth_User::find($this->param('id'));

		$this->template->title = 'Editar &raquo; Usuario';
		$this->template->content = View::forge('usuarios/editar', $data);
	}

	public function action_actualizar()
	{
		$usuario = \Model\Auth_User::find($this->param('id'));

		$usuario->username = \Input::post('username');
		$usuario->email = \Input::post('email');
		$usuario->save();

		// Informar al usuario de que la actualización fué correcta
		\Session::set_flash('user-updated', __('users.updated'));

		\Response::redirect('/usuarios/'.$this->param('id'));
	}

	public function action_borrar()
	{
		$usuario = \Model\Auth_User::find($this->param('id'));
		$usuario->delete();

	    // informar al usuario de que la eliminación de usuario fué correcta
        \Session::set_flash('user-destroyed', __('users.destroyed'));

		\Response::redirect('/usuarios');
	}
}

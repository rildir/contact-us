<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{

		$this->load->view("form");
	}
	public function send_mail()
	{

		$this->load->library('form_validation');


		$this->form_validation->set_rules(
			'from',
			'Your Email Address',
			'required|valid_email',
			array(
				'required' => '<div class="error">Please provide your <strong>email address</strong>.</div>',
				'valid_email' => '<div class="error">Please enter a valid <strong>email address</strong>.</div>',
			)
		);
		$this->form_validation->set_rules(
			'subject',
			'Subject',
			'required',
			array(
				'required' => '<div class="error">Please provide a <strong>subject</strong> for the email.</div>',
			)
		);
		$this->form_validation->set_rules(
			'name',
			'Name',
			'required',
			array(
				'required' => '<div class="error">Please provide your <strong>name</strong>.</div>',
			)
		);
		$this->form_validation->set_rules(
			'message',
			'Message',
			'required',
			array(
				'required' => '<div class="error">Please provide a <strong>message</strong> for the email.</div>',
			)
		);


		$config = [
			"protocol" => "smtp",
			"smtp_host" => "ssl://smtp.gmail.com",
			"smtp_port" => "465",
			"smtp_user" => "user@gmail.com",
			"smtp_pass" => "password",
			"starttls" => true,
			"charset" => "utf-8",
			"mailtype" => "html",
			"wordwrap" => true,
			"newline" => "\r\n",
		];

		if ($this->form_validation->run() == FALSE) {
			$viewData = new stdClass();
			$viewData->form_error = validation_errors();
			$this->load->view("form", $viewData);
		} else {


			$this->load->library("email", $config);
			$from = $this->input->post('from');
			$subject = $this->input->post('subject');
			$name = $this->input->post('name');
			$msg = $this->input->post('message');
			$to = "example@gmail.com";
			$this->email->from($from, "Coderec");
			$this->email->to($to);
			$this->email->subject($subject);

			$message = '<div style="font-family: Arial, sans-serif; padding: 20px; background-color: #f7f7f7;">
                        <h2 style="color: #333;">Merhaba, ' . $from . ' tarafından mesajınız var.</h2>
                        <h5 style="color: #777;">' . $name . ' tarafından gönderilen bir mesajla karşınızdayız! 🐱</h5>
                        <p style="color: #555;">' . $msg . '</p>
                        <p style="color: #777;">Saygılarımızla,<br>Coderec Ekibi</p>
                    </div>';

			$this->email->message($message);

			if ($this->email->send()) {
				echo "E-posta gönderimi başarılı";
			} else {
				echo "<span style='color: red'>E-posta gönderimi sırasında bir hata oluştu</span>";
				echo "<hr>";
				echo $this->email->print_debugger((array('headers')));

			}
		}
	}
}
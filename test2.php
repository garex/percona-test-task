<?php

class Main {

	/**
	 * @var Form
	 */
	public $form;

	private $_formErrors = array();
	private $_formData = array();

	public function __construct($data, MailSender $sender) {
		$this->form = $f = new Form($data);
		if ($f->isValid()) {
			$sender->send($f->getValue('email'), $f->getValue('message'), $f->getValue('name'));
			header('Location: ' . $_SERVER['PHP_SELF']);
		}
	}

}

class Form {

	private $_errors = array();
	private $_data = array();
	private $_spamQuestion = '';
	private $_spamSalt = 'yaiPh7ai oCah9aC7 iShahf1o Libier8w Uighoow1 ua7Et4da Aireil3p Ceicu6Co';

	public function __construct($data) {
		if (!empty($data)) {
			$this->_validate($data);
		}
	}

	public function hasErrors() {
		return !empty($this->_errors);
	}

	public function isValid() {
		return (!empty($this->_data) && empty($this->_errors));
	}

	public function getValue($name) {
		return isset($this->_data[$name]) ? $this->_data[$name] : '';
	}

	public function getEscapedValue($name) {
		return htmlspecialchars($this->getValue($name));
	}

	public function getSpamQuestion() {
		return $this->_generateSpamQuestionOnce();
	}

	public function getSpamHash() {
		$answer = eval('return ' . $this->_generateSpamQuestionOnce() . ';');
		return $this->_generateSpamHash($answer);
	}

	public function getErrors() {
		$errors = array();
		array_walk_recursive($this->_errors, function($error) use (&$errors) {
			$errors[] = $error;
		});
		return $errors;
	}

	private function _validate($data) {
		$this->_data = $data;
		$this
			->_required('name')->_required('email')->_required('message')
			->_maxLength('name', 25)->_maxLength('email', 25)->_maxLength('message', 255)
			->_emailAddress('email')
			->_plainText('name')->_plainText('email')->_plainText('message')
			->_required('answer', 'mathematical answer')->_noSpam('answer', 'hash')
		;
	}

	private function _addError($name, $message) {
		$this->_errors[$name][] = $message;
		return $this;
	}

	private function _required($name, $messageName = null) {
		if ($this->getValue($name)) {
			return $this;
		}
		$messageName = ($messageName) ? $messageName : $name;
		return $this->_addError($name, $messageName . ' is required');
	}

	private function _maxLength($name, $value) {
		if (mb_strlen($this->getValue($name), 'UTF-8') <= $value) {
			return $this;
		}
		return $this->_addError($name, $name . ' max length is ' . $value);
	}

	private function _emailAddress($name) {
		return $this->_hasChar($name, '@', $name . ' must be a valid email address');
	}

	private function _plainText($name) {
		$value = $this->getValue($name);
		if ($value == strip_tags($value)) {
			return $this;
		}
		return $this->_addError($name, $name . ' must not contain HTML tags');
	}

	private function _hasChar($name, $char, $message = null) {
		if (mb_strstr($this->getValue($name), $char) !== false) {
			return $this;
		}
		if (!$message) {
			$message = $name . ' must contain a ' . $char . ' character';
		}
		return $this->_addError($name, $message);
	}

	private function _generateSpamQuestionOnce() {
		if (!empty($this->_spamQuestion)) {
			return $this->_spamQuestion;
		}
		$this->_spamQuestion = '1 + 2';
		return $this->_spamQuestion;
	}

	private function _generateSpamHash($answer) {
		return md5(date('Ymd') . $answer . $this->_spamSalt);
	}

	private function _noSpam($name, $hashName) {
		if ($this->getValue($hashName) == $this->_generateSpamHash($this->getValue($name))) {
			return $this;
		}
		return $this->_addError($name, 'spam is a bad practice! pls answer correclty');
	}

}

class MailSender {

	private $_sendTo;
	private $_subject;

	public function __construct($sendTo, $subject) {
		if (empty($sendTo)) {
			throw new BadMethodCallException('Send to param is required');
		}
		$this->_sendTo = $sendTo;
		if (empty($subject)) {
			throw new BadMethodCallException('Subject is required');
		}
		$this->_subject = $subject;
	}

	public function send($fromEmail, $message, $fromName = '') {
		$fromValue = $fromEmail;
		if ($fromName) {
			$fromValue = $fromName . ' <' . $fromValue . '>';
		}
		return mail($this->_sendTo, $this->_subject, $message, $fromValue);
	}

}

$action = new Main($_POST, new MailSender('a@ustimen.co', 'Message from ' . __FILE__));
$f      = $action->form;

// BONUS: PHP) add some very basic logging system;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Task for Hire</title>
	<link href="style.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
	<h1>Example</h1>

	<?php // BONUS: JS) make the transition between sections look really nice ?>
	<div>
		<ul id="menu">
			<li class="round-corner-10"><a href="#about">about</a></li>
			<li class="round-corner-10"><a href="#services">services</a></li>
			<li class="round-corner-10"><a href="#customers">customers</a></li>
			<li class="round-corner-10"><a href="#contacts">contacts</a></li>
		</ul>
	</div>

	<p>&nbsp;</p>

	<?php // BONUS - DESIGN/CSS) improve how the section contents looks ?>
	<div id="about" class="hidden">
		about lorem<!-- // -->
	</div>
	<div id="services" class="hidden">
		services lorem<!-- // -->
	</div>
	<div id="customers" class="hidden">
		customers lorem<!-- // -->
	</div>
	<div id="contacts" class="hidden">
		contacts lorem<!-- // -->

		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>#contacts">
		<?php if ($f->hasErrors()): ?>
			<div class="errors">
				<ul>
				<?php foreach ($f->getErrors() as $error): ?>
					<li><?php echo $error ?></li>
				<?php endforeach ?>
				</ul>
			</div>
		<?php endif ?>
			<div class="first-row">
				<div class="two-cells first-cell">
					<div>
						<label>Name</label>
						<input type="text" maxlength="25" name="name" value="<?php echo $f->getEscapedValue('name') ?>" />
					</div>
				</div>
				<div class="two-cells last-cell">
					<div>
						<label>E-mail</label>
						<input type="text" maxlength="25" name="email" value="<?php echo $f->getEscapedValue('email') ?>" />
					</div>
				</div>
			</div>
			<div>
				<div class="one-cell">
					<div>
						<label>Message</label>
						<textarea rows="5" cols="10" id="message" name="message"><?php echo $f->getEscapedValue('message') ?></textarea>
					</div>
				</div>
			</div>
			<div class="last-row">
				<div class="two-cells first-cell">
					<div>
						<label>How many will be <?php echo $f->getSpamQuestion() ?>?</label>
						<input type="text" maxlength="2" class="inline" name="answer" />
						<input type="hidden" name="hash" value="<?php echo $f->getSpamHash() ?>"/>
					</div>
				</div>
				<div class="two-cells last-cell">
					<div class="right-aligned">
						<input type="submit" value="Send" />
					</div>
				</div>
			</div>
		</form>
	</div>

	<?php
	if (false) {
		// FIXME Add simple antispam protection (anyone you propose // please explain why)
		// BONUS - JS/CSS) make the form look awesome
	}
	?>

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
</body>
</html>
